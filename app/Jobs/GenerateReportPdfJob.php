<?php

namespace App\Jobs;

use App\Models\Report;
use App\Services\ReportPdfService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GenerateReportPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $reportId;

    public function __construct(int $reportId)
    {
        $this->reportId = $reportId;
    }

    public function handle(ReportPdfService $reportPdfService)
    {
        try {
            $report = Report::find($this->reportId);
            if (! $report || empty($report->html)) {
                return;
            }

            $pdfData = $reportPdfService->generate($report);
            $report->update([
                'filename' => $pdfData['filename'],
                'file_url' => $pdfData['file_url'],
                'sharepoint_url' => $pdfData['sharepoint_url'] ?? null,
            ]);
        } catch (\Throwable $exception) {
            Log::error("GenerateReportPdfJob failed for report {$this->reportId}: {$exception->getMessage()}", [
                'report_id' => $this->reportId,
                'exception' => $exception,
            ]);
        }
    }
}
