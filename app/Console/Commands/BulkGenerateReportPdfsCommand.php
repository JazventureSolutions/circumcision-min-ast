<?php

namespace App\Console\Commands;

use App\Jobs\GenerateReportPdfJob;
use App\Models\Report;
use App\Services\ReportPdfService;
use Illuminate\Console\Command;

class BulkGenerateReportPdfsCommand extends Command
{
    protected $signature = 'reports:bulk-generate
                            {--start_patient_id= : Minimum patient_id to include}
                            {--end_patient_id= : Maximum patient_id to include}
                            {--patient_ids= : Comma-separated list of patient IDs to include}
                            {--appointment_date_from= : Filter reports for patients with appointments on or after this date}
                            {--appointment_date_to= : Filter reports for patients with appointments on or before this date}
                            {--missing_sharepoint : Only include reports where sharepoint_url is null or empty}
                            {--batch=200 : Number of reports to process per chunk}
                            {--force : Regenerate all eligible reports even if they already have file metadata}
                            {--direct : Generate reports directly in this command instead of dispatching jobs}';

    protected $description = 'Generate report PDFs and upload them to SharePoint in bulk.';

    public function handle()
    {
        $batch = (int) $this->option('batch');
        $start = $this->option('start_patient_id');
        $end = $this->option('end_patient_id');
        $patientIds = $this->option('patient_ids');
        $appointmentDateFrom = $this->option('appointment_date_from');
        $appointmentDateTo = $this->option('appointment_date_to');
        $force = $this->option('force');
        $missingSharePoint = $this->option('missing_sharepoint');

        $query = Report::query()
            ->whereNotNull('html')
            ->where('html', '!=', '');

        if ($appointmentDateFrom || $appointmentDateTo) {
            $query->whereIn('patient_id', function ($subQuery) use ($appointmentDateFrom, $appointmentDateTo) {
                $subQuery->select('patient_id')->from('appointments')
                    ->when($appointmentDateFrom, function ($q) use ($appointmentDateFrom) {
                        $q->whereDate('date', '>=', $appointmentDateFrom);
                    })
                    ->when($appointmentDateTo, function ($q) use ($appointmentDateTo) {
                        $q->whereDate('date', '<=', $appointmentDateTo);
                    });
            });
        }

        if ($start !== null) {
            $query->where('patient_id', '>=', (int) $start);
        }

        if ($end !== null) {
            $query->where('patient_id', '<=', (int) $end);
        }

        if (! empty($patientIds)) {
            $ids = array_filter(array_map('trim', explode(',', $patientIds)));
            if (! empty($ids)) {
                $query->whereIn('patient_id', $ids);
            }
        }

        $eligibleHtmlCount = $query->count();

        if ($missingSharePoint) {
            $query->where(function ($subQuery) {
                $subQuery->whereNull('sharepoint_url')
                    ->orWhere('sharepoint_url', '');
            });
        } elseif (! $force) {
            $query->where(function ($subQuery) {
                $subQuery->whereNull('filename')
                    ->orWhere('filename', '')
                    ->orWhereNull('file_url')
                    ->orWhere('file_url', '');

                if (config('sharepoint.enabled')) {
                    $subQuery->orWhereNull('sharepoint_url')
                        ->orWhere('sharepoint_url', '');
                }
            });
        }

        $this->info('Starting bulk report generation...');
        $this->info("Reports matched by HTML filter: {$eligibleHtmlCount}");

        $total = $query->count();
        $this->info("Reports queued: {$total}");

        if ($total === 0 && ! $force) {
            if ($eligibleHtmlCount > 0) {
                $this->info('No reports need regeneration: existing file metadata is already present. Use --force to regenerate.');
            } else {
                $this->info('No reports have html content in the selected range/IDs.');
            }
        }

        $useDirect = $this->option('direct') || config('queue.default') === 'sync';

        if (! $this->option('direct') && config('queue.default') === 'sync') {
            $this->warn('Queue driver is configured as sync. Jobs will execute immediately during dispatch.');
            $this->warn('For true background processing, switch to a queue driver like database or redis and run `php artisan queue:work` separately.');
        }

        $reportPdfService = $useDirect ? app(ReportPdfService::class) : null;

        $processed = 0;
        $failed = 0;

        $progressBar = null;
        if ($total > 0) {
            $progressBar = $this->output->createProgressBar($total);
            $progressBar->setFormat(' %current%/%max% [%bar%] %percent:3s%% | Remaining: %remaining:6s% | Elapsed: %elapsed:6s% ');
            $progressBar->start();
        }

        $query->orderBy('id')->chunkById($batch, function ($reports) use (&$processed, &$failed, $useDirect, $reportPdfService, $progressBar) {
            foreach ($reports as $report) {
                if ($useDirect && $reportPdfService) {
                    try {
                        $pdfData = $reportPdfService->generate($report);
                        $updates = [
                            'filename' => $pdfData['filename'],
                            'file_url' => $pdfData['file_url'],
                            'sharepoint_url' => $pdfData['sharepoint_url'] ?? null,
                        ];

                        if (! empty($pdfData['sharepoint_html_url'])) {
                            $updates['sharepoint_html_url'] = $pdfData['sharepoint_html_url'];
                            $updates['html'] = '';
                        }

                        $report->update($updates);
                        $processed++;
                    } catch (\Throwable $exception) {
                        $failed++;
                        $this->error("Failed report {$report->id}: {$exception->getMessage()}");
                    }
                } else {
                    GenerateReportPdfJob::dispatch($report->id);
                    $processed++;
                }

                if ($progressBar) {
                    $progressBar->advance();
                }
            }
        });

        if ($progressBar) {
            $progressBar->finish();
            $this->newLine(2);
        }

        $this->info(($useDirect ? 'Bulk generation complete.' : 'Bulk generation dispatch complete.'));
        $this->info("Total reports handled: {$processed}");
        if ($failed > 0) {
            $this->info("Total failed: {$failed}");
        }

        return 0;
    }
}
