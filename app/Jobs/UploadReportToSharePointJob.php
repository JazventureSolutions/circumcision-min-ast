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

class UploadReportToSharePointJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $reportId;
    public string $filename;
    public string $slug;

    public $tries = 3;
    public $backoff = 5;

    public function __construct(int $reportId, string $filename, string $slug)
    {
        $this->reportId = $reportId;
        $this->filename = $filename;
        $this->slug = $slug;
    }

    public function handle(SharePointBackupService $service)
    {
        $report = Report::find($this->reportId);
        if (! $report) {
            Log::warning("UploadReportToSharePointJob: report {$this->reportId} not found");
            return;
        }

        $patientId = $report->patient_id;
        $reportPath = "patient_reports/{$patientId}/{$this->filename}";
        $localFilePath = public_path($reportPath);

        $needsSave = false;

        if (empty($report->sharepoint_url)) {
            $sharepointUrl = $service->upload($localFilePath, $reportPath);
            if ($sharepointUrl) {
                $report->sharepoint_url = $sharepointUrl;
                $needsSave = true;
            } else {
                Log::error("UploadReportToSharePointJob: PDF upload failed for report {$this->reportId}");
            }
        }

        $html = $report->getRawOriginal('html');
        if (is_string($html) && trim($html) !== '') {
            $htmlFilename = str_replace('.pdf', '.html', $this->filename);
            $htmlRemotePath = "patient_reports/{$patientId}/HTML/{$htmlFilename}";
            $sharepointHtmlUrl = $service->uploadContent($html, $htmlRemotePath, 'text/html');
            if ($sharepointHtmlUrl) {
                $report->sharepoint_html_url = $sharepointHtmlUrl;
                $report->html = '';
                $needsSave = true;
            } else {
                Log::error("UploadReportToSharePointJob: HTML upload failed for report {$this->reportId}");
            }
        }

        if ($needsSave) {
            $report->save();
        }
    }
}
