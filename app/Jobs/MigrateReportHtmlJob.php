<?php

namespace App\Jobs;

use App\Models\Report;
use App\Services\SharePointBackupService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MigrateReportHtmlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $reportId;

    public $tries = 3;

    public $backoff = 5;

    public function __construct(int $reportId)
    {
        $this->reportId = $reportId;
    }

    public function handle(SharePointBackupService $service)
    {
        try {
            $report = Report::find($this->reportId);
            $html = $report ? $report->getRawOriginal('html') : null;

            if (! $report || ! is_string($html) || trim($html) === '') {
                return;
            }

            $slug = self::deriveSlug($report);

            $htmlFilename = "report-{$report->patient_id}-{$slug}.html";
            $htmlRemotePath = "patient_reports/{$report->patient_id}/HTML/{$htmlFilename}";

            $sharepointHtmlUrl = $service->uploadContent($html, $htmlRemotePath, 'text/html');

            if ($sharepointHtmlUrl) {
                $report->update([
                    'sharepoint_html_url' => $sharepointHtmlUrl,
                    'html' => '',
                ]);
            } else {
                Log::error("MigrateReportHtmlJob: upload returned null for report {$this->reportId}");
            }
        } catch (\Throwable $exception) {
            Log::error("MigrateReportHtmlJob failed for report {$this->reportId}: {$exception->getMessage()}", [
                'report_id' => $this->reportId,
                'exception' => $exception,
            ]);
        }
    }

    public static function deriveSlug(Report $report): string
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
