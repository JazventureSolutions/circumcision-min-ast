<?php

namespace App\Console\Commands;

use App\Jobs\MigrateReportHtmlJob;
use App\Models\Report;
use App\Services\SharePointBackupService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MigrateHtmlToSharePoint extends Command
{
    protected $signature = 'reports:migrate-html
                            {--ids= : Comma-separated report IDs to process}
                            {--patient_id_from= : Minimum patient_id to include}
                            {--patient_id_to= : Maximum patient_id to include}
                            {--id_from= : Minimum report id to include}
                            {--id_to= : Maximum report id to include}
                            {--created_from= : Only include reports created on or after this date (Y-m-d)}
                            {--created_to= : Only include reports created on or before this date (Y-m-d)}
                            {--batch=50 : Number of reports to process per chunk}
                            {--missing_sharepoint_html_url : Only include reports where sharepoint_html_url is null or empty}
                            {--queue : Dispatch jobs to the queue instead of processing inline}
                            {--dry-run : Show what would be done without actually uploading}';

    protected $description = 'Upload existing report HTML content to SharePoint and clear the DB html column.';

    public function handle()
    {
        $batch = (int) $this->option('batch');
        $dryRun = (bool) $this->option('dry-run');

        $query = Report::query()
            ->whereNotNull('html')
            ->where('html', '!=', '')
            ->whereNotNull('sharepoint_url')
            ->where('sharepoint_url', '!=', '');

        if ($this->option('missing_sharepoint_html_url')) {
            $query->where(function ($q) {
                $q->whereNull('sharepoint_html_url')
                    ->orWhere('sharepoint_html_url', '');
            });
        }

        if ($ids = $this->option('ids')) {
            $ids = array_map('intval', array_filter(explode(',', $ids), 'is_numeric'));
            if (! empty($ids)) {
                $query->whereIn('id', $ids);
            }
        }

        if ($this->option('patient_id_from') !== null) {
            $query->where('patient_id', '>=', (int) $this->option('patient_id_from'));
        }

        if ($this->option('patient_id_to') !== null) {
            $query->where('patient_id', '<=', (int) $this->option('patient_id_to'));
        }

        if ($this->option('id_from') !== null) {
            $query->where('id', '>=', (int) $this->option('id_from'));
        }

        if ($this->option('id_to') !== null) {
            $query->where('id', '<=', (int) $this->option('id_to'));
        }

        if ($this->option('created_from')) {
            $query->whereDate('created_at', '>=', $this->option('created_from'));
        }

        if ($this->option('created_to')) {
            $query->whereDate('created_at', '<=', $this->option('created_to'));
        }

        $total = $query->count();

        if ($total === 0) {
            $this->info('No reports found that need HTML migration.');
            return 0;
        }

        $this->info("Found {$total} reports with HTML content but no SharePoint HTML URL.");

        if ($dryRun) {
            $this->warn('Dry-run mode: no changes will be made.');
        }

        $useQueue = (bool) $this->option('queue');

        $service = app(SharePointBackupService::class);

        if (! $service->isEnabled() && ! $dryRun && ! $useQueue) {
            $this->error('SharePoint is not enabled. Check sharepoint.enabled config.');
            return 1;
        }

        if (config('sharepoint.enabled', false) && ! $dryRun && ! $useQueue && ! $this->confirm("Upload HTML for {$total} reports to SharePoint and clear DB html column?", true)) {
            $this->info('Aborted.');
            return 0;
        }

        $processed = 0;
        $skipped = 0;
        $failed = 0;

        $progressBar = $this->output->createProgressBar($total);
        $progressBar->setFormat(' %current%/%max% [%bar%] %percent:3s%% | Remaining: %remaining:6s% | Elapsed: %elapsed:6s% ');
        $progressBar->start();

        if ($useQueue) {
            $this->info('Queue mode: dispatching jobs instead of processing inline.');
            $query->orderBy('id')->chunkById($batch, function ($reports) use (&$processed, $progressBar) {
                foreach ($reports as $report) {
                    MigrateReportHtmlJob::dispatch($report->id);
                    $processed++;
                    $progressBar->advance();
                }
            });
        } else {
            $query->orderBy('id')->chunkById($batch, function ($reports) use ($service, $dryRun, &$processed, &$skipped, &$failed, $progressBar) {
                foreach ($reports as $report) {
                    $slug = $this->deriveSlug($report);

                    $htmlFilename = "report-{$report->patient_id}-{$slug}.html";
                    $htmlRemotePath = "patient_reports/{$report->patient_id}/HTML/{$htmlFilename}";

                    if ($dryRun) {
                        $processed++;
                        $progressBar->advance();
                        continue;
                    }

                    try {
                        $maxAttempts = 3;
                        $attempt = 0;
                        $sharepointHtmlUrl = null;

                        while ($attempt < $maxAttempts) {
                            $attempt++;
                            $sharepointHtmlUrl = $service->uploadContent($report->html, $htmlRemotePath, 'text/html');

                            if ($sharepointHtmlUrl !== null) {
                                break;
                            }

                            if ($attempt < $maxAttempts) {
                                $this->warn("Report {$report->id}: upload returned null (attempt {$attempt}/{$maxAttempts}), retrying...");
                                sleep(2);
                            }
                        }

                        if ($sharepointHtmlUrl) {
                            $report->update([
                                'sharepoint_html_url' => $sharepointHtmlUrl,
                                'html' => '',
                            ]);
                            $processed++;
                        } else {
                            $failed++;
                            $this->error("Report {$report->id}: SharePoint upload returned null after {$maxAttempts} attempts.");
                        }
                    } catch (\Throwable $e) {
                        $failed++;
                        $this->error("Report {$report->id}: {$e->getMessage()}");
                    }

                    $progressBar->advance();
                }
            });
        }

        $progressBar->finish();
        $this->newLine(2);

        $this->info("Done. Processed: {$processed}, Skipped: {$skipped}, Failed: {$failed}");

        return $failed > 0 ? 1 : 0;
    }

    protected function deriveSlug(Report $report): string
    {
        if (! empty($report->filename)) {
            $filename = pathinfo($report->filename, PATHINFO_FILENAME);
            $prefix = "report-{$report->patient_id}-";
            if (str_starts_with($filename, $prefix)) {
                $slug = substr($filename, strlen($prefix));
                if (! empty($slug)) {
                    return $slug;
                }
            }
            $slug = Str::slug($filename);
            if (! empty($slug)) {
                return $slug;
            }
        }

        return 'report';
    }
}
