<?php

namespace App\Services;

use App\Models\Branch;
use App\Models\Patient;
use App\Models\Report;
use App\Models\Template;
use App\Services\SharePointBackupService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportPdfService
{
    protected SharePointBackupService $sharePointService;

    public function __construct(SharePointBackupService $sharePointService)
    {
        $this->sharePointService = $sharePointService;
    }

    public function generate(Report $report): array
    {
        $template = Template::find($report->template_id);
        if (! $template) {
            throw new \RuntimeException("Missing template {$report->template_id} for report {$report->id}");
        }

        $patient = Patient::find($report->patient_id);
        if (! $patient) {
            throw new \RuntimeException("Missing patient {$report->patient_id} for report {$report->id}");
        }

        $branch = Branch::find($patient->branch_id ?? null);
        $branchName = $branch ? $branch->name : '';

        $slug = Str::slug($template->name ?: 'report');
        $filename = 'report-' . $report->patient_id . '-' . $slug . '.pdf';
        $reportPath = "patient_reports/{$report->patient_id}/{$filename}";

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('settings.templates.preview', [
            'title' => $template->name ? $template->name : 'Circumcision Clinic ' . trim($branchName),
            'branch_name' => $branchName,
            'html' => $report->html,
            'has_footer' => $template->has_footer ?? false,
            'address' => $branch ? $branch->address : '',
            'tel' => $branch ? $branch->tel : '',
        ])->render());

        $localFilePath = public_path($reportPath);
        $localDirectory = dirname($localFilePath);

        if (! is_dir($localDirectory)) {
            mkdir($localDirectory, 0755, true);
        }

        file_put_contents($localFilePath, $pdf->output());

        $sharepointUrl = null;
        $sharepointHtmlUrl = null;
        if ($this->sharePointService->isEnabled()) {
            $sharepointUrl = $this->sharePointService->upload($localFilePath, $reportPath);

            $htmlFilename = str_replace('.pdf', '.html', $filename);
            $htmlRemotePath = "patient_reports/{$report->patient_id}/HTML/{$htmlFilename}";
            $sharepointHtmlUrl = $this->sharePointService->uploadContent($report->html, $htmlRemotePath, 'text/html');
        }

        return [
            'filename' => $filename,
            'file_url' => url('public/'.$reportPath),
            'sharepoint_url' => $sharepointUrl,
            'sharepoint_html_url' => $sharepointHtmlUrl,
        ];
    }
}
