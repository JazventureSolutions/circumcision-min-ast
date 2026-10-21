<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Jobs\UploadReportToSharePointJob;
use App\Models\AdditionalReport;
use App\Models\Appointment;
use App\Models\Audit;
use App\Models\Branch;
use App\Models\Patient;
use App\Models\Report;
use App\Models\Template;
use App\Services\SharePointBackupService;
// use Barryvdh\DomPDF\Facade as PDF;
// use niklasravnsborg\LaravelPdf\Facades\Pdf as PPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    public function reports(Request $request, $appointment_id = 0)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        $patient = $appointment->patient;
        $title = $patient->name . '\'s Reports';

        $reports = Template::isReport()->active()
            ->orderBy('name')->get();

        $patient_reports = Report::where('patient_id', $patient->id)
            ->whereIn('template_id', $reports->pluck('id') ?? [])
            ->get();

        $patient_types = Helper::getPatientTypesForSelect();

        return view('patients.appointments.reports.list', [
            'title' => $title,
            'appointment' => $appointment,
            'patient' => $patient,
            'reports' => $reports,
            'patient_reports' => $patient_reports,
            'patient_types' => $patient_types,
        ]);
    }

    public function reportsIndex(Request $request)
    {
        $appointments = Appointment::select('appointments.*')
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->join('reports', 'patients.id', '=', 'reports.patient_id')
            ->whereNotNull('appointments.patient_id')
            ->when(Auth::check() && Auth::user()->branch_id, function ($query) {
                $query->where('patients.branch_id', Auth::user()->branch_id);
            })
            ->whereNotNull('reports.sharepoint_url')
            ->where('reports.sharepoint_url', '!=', '')
            ->when($request->filled('from_date'), function ($query) use ($request) {
                $query->whereDate('appointments.date', '>=', $request->input('from_date'));
            })
            ->when($request->filled('to_date'), function ($query) use ($request) {
                $query->whereDate('appointments.date', '<=', $request->input('to_date'));
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->input('search'));
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('appointments.id', $search)
                        ->orWhere('appointments.patient_id', $search)
                        ->orWhere('patients.name', 'LIKE', "%{$search}%")
                        ->orWhere('patients.phone', 'LIKE', "%{$search}%")
                        ->orWhere('patients.email', 'LIKE', "%{$search}%");
                });
            })
            ->distinct()
            ->orderByDesc('appointments.date')
            ->with('patient')
            ->paginate(25)
            ->appends($request->only(['from_date', 'to_date', 'search']));

        return view('patients.reports.index', [
            'appointments' => $appointments,
        ]);
    }

    public function patientReportHistory(Request $request, $patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $reports = Report::where('patient_id', $patient_id)
            ->with('template')
            ->orderByDesc('updated_at')
            ->get();

        return view('patients.reports.patient-history', [
            'patient' => $patient,
            'reports' => $reports,
        ]);
    }

    public function getPrintReport(Request $request)
    {
        $patient_id = 21;
        $template_id = 15;

        $report = Report::where([
            'patient_id' => $patient_id,
            'template_id' => $template_id,
        ])->first();

        $root_html = '<img src="' . $report->sign_html . '" style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:2;">';
        $root_html .= $report->html;

        return view('empty', ['root_html' => $root_html]);
    }

    protected function generateReportPdf(Report $report, Template $template, ?Branch $branch)
    {
        $slug = Str::slug($template->name ?: 'report');
        $filename = 'report-' . $report->patient_id . '-' . $slug . '.pdf';

        $report_path = 'patient_reports/{patient_id}/{filename}';
        $report_path = str_replace('{patient_id}', $report->patient_id, $report_path);
        $report_path = str_replace('{filename}', $filename, $report_path);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('settings.templates.preview', [
            'html' => $report->html,
            'has_footer' => $template->has_footer ?? false,
            'address' => $branch ? $branch->address : '',
            'tel' => $branch ? $branch->tel : '',
        ])->render());

        $localFilePath = public_path($report_path);
        $localDirectory = dirname($localFilePath);

        if (! is_dir($localDirectory)) {
            mkdir($localDirectory, 0755, true);
        }

        file_put_contents($localFilePath, $pdf->output());

        $sharePointBackupUrl = null;
        $sharepointHtmlUrl = null;
        $sharePointService = app(SharePointBackupService::class);

        if ($sharePointService->isEnabled()) {
            $sharePointBackupUrl = $sharePointService->upload($localFilePath, $report_path);

            $htmlFilename = str_replace('.pdf', '.html', $filename);
            $htmlRemotePath = "patient_reports/{$report->patient_id}/HTML/{$htmlFilename}";
            $sharepointHtmlUrl = $sharePointService->uploadContent($report->html, $htmlRemotePath, 'text/html');
        }

        return [
            'filename' => $filename,
            'file_url' => url('public/'.$report_path),
            'sharepoint_url' => $sharePointBackupUrl,
            'sharepoint_html_url' => $sharepointHtmlUrl,
        ];
    }

    public function printReport(Request $request)
    {
        $patient_id = $request->patient_id;
        $template_id = $request->template_id;

        $template = Template::findOrFail($template_id);

        $html = $request->html_content ?? '';
        $html = rawurldecode($html);

        $report = Report::updateOrCreate([
            'patient_id' => $patient_id,
            'template_id' => $template_id,
        ], [
            'html' => $html,
        ]);

        $patient = Patient::findOrFail($patient_id);
        $branch = Branch::find($patient->branch_id ?? null);

        $slug = Str::slug($template->name ?: 'report');
        $filename = 'report-' . $report->patient_id . '-' . $slug . '.pdf';
        $reportPath = 'patient_reports/' . $report->patient_id . '/' . $filename;

        try {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML(view('settings.templates.preview', [
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

            $report->update([
                'filename' => $filename,
                'file_url' => url('public/' . $reportPath),
                'html' => $html,
            ]);
        } catch (\Throwable $e) {
            Log::error("printReport: PDF generation failed for report {$report->id}", [
                'exception' => $e->getMessage(),
            ]);

            $report->update([
                'html' => $html,
            ]);
        }

        if (app(SharePointBackupService::class)->isEnabled()) {
            UploadReportToSharePointJob::dispatch($report->id, $filename, $slug);
        }

        return response()->json([
            'status' => 'success',
            'print_url' => route('report-preview', ['report_id' => $report->id]),
        ]);
    }

    public function preview(Request $request)
    {
        if (!$request->has('report_id')) {
            abort(404);
        }

        // Report
        $report_id = $request->report_id;
        $report = Report::find($report_id);

        if ($report == null) {
            abort(404);
        }

        // Template
        $template_id = $report->template_id;
        $template = Template::find($template_id);

        if ($template == null) {
            abort(404);
        }

        // Patient
        $patient_id = $report->patient_id;
        $patient = Patient::find($patient_id);

        if ($patient == null) {
            abort(404);
        }

        // Branch
        $branch_id = $patient->branch_id;
        $branch = Branch::find($branch_id);

        if ($branch == null) {
            abort(404);
        }

        // return view('settings.templates.preview', [
        //     'html' => $report->html,
        //     'has_footer' => $template->has_footer
        // ])->render();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('settings.templates.preview', [
            'html' => $report->html,
            'has_footer' => $template->has_footer,
            'address' => $branch->address ?? '',
            'tel' => $branch->tel ?? ''
        ])->render());

        return $pdf->stream();
    }

    public function downloadHtml(Request $request)
    {
        $reportId = $request->report_id;
        $report = Report::find($reportId);

        if (!$report) {
            return response()->json(['error' => 'Not found'], 404);
        }

        if (!$report->sharepoint_html_url && empty($report->getRawOriginal('html'))) {
            return response()->json(['error' => 'No content available'], 404);
        }

        $html = $report->html;

        if (empty($html)) {
            return response()->json(['error' => 'Empty content'], 404);
        }

        $html = \App\Helpers\Helper::fillReport($request->route('appointment_id'), $html);

        return response()->json(['html' => $html]);
    }

    public function getTabHtml(Request $request, $appointment_id)
    {
        $templateId = $request->template_id;
        $reportId = $request->report_id;

        $appointment = Appointment::findOrFail($appointment_id);
        $patient = $appointment->patient;

        if ($reportId) {
            $report = Report::find($reportId);
            if (!$report) return response()->json(['error' => 'Not found'], 404);
            if (!$report->sharepoint_html_url && empty($report->getRawOriginal('html'))) {
                return response()->json(['error' => 'No content available'], 404);
            }
            $source = $report;
            $sourceType = 'report';
        } else {
            $template = Template::find($templateId);
            if (!$template) return response()->json(['error' => 'Not found'], 404);
            $source = $template;
            $sourceType = 'template';
        }

        $cacheKey = 'tab_html_' . $appointment_id . '_' . $templateId
            . ($reportId ? '_' . $reportId : '')
            . '_a' . ($appointment->updated_at ? $appointment->updated_at->timestamp : '0')
            . '_p' . ($patient->updated_at ? $patient->updated_at->timestamp : '0')
            . '_s' . ($source->updated_at ? $source->updated_at->timestamp : '0');

        if (Cache::has($cacheKey)) {
            return response()->json(['html' => Cache::get($cacheKey)]);
        }

        $html = $source->html;

        if (empty($html)) return response()->json(['error' => 'Empty content'], 404);

        $html = \App\Helpers\Helper::fillReport($appointment_id, $html);

        Cache::put($cacheKey, $html, 86400);

        return response()->json(['html' => $html]);
    }

    public function bulkGenerateReportPdfs(Request $request)
    {
        $query = Report::query();

        if ($request->filled('start_patient_id')) {
            $query->where('patient_id', '>=', $request->input('start_patient_id'));
        }
        if ($request->filled('end_patient_id')) {
            $query->where('patient_id', '<=', $request->input('end_patient_id'));
        }

        if ($request->filled('patient_ids')) {
            $patientIds = array_filter(explode(',', $request->input('patient_ids')));
            if (!empty($patientIds)) {
                $query->whereIn('patient_id', $patientIds);
            }
        }

        if (!$request->filled('start_patient_id') && !$request->filled('end_patient_id') && !$request->filled('patient_ids')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please provide a patient_id range or patient_ids to run bulk generation.',
            ], 422);
        }

        $query->whereNotNull('html')
            ->where('html', '!=', '');

        $reports = $query->get();

        $processed = 0;
        $skipped = 0;
        $processedIds = [];

        foreach ($reports as $report) {
            if (empty($report->html)) {
                $skipped++;
                continue;
            }

            $template = Template::find($report->template_id);
            if ($template == null) {
                $skipped++;
                continue;
            }

            $patient = Patient::find($report->patient_id);
            $branch = $patient ? Branch::find($patient->branch_id) : null;

            $pdfData = $this->generateReportPdf($report, $template, $branch);
            $report->update([
                'filename' => $pdfData['filename'],
                'file_url' => $pdfData['file_url'],
                'sharepoint_url' => $pdfData['sharepoint_url'] ?? null,
            ]);

            $processed++;
            $processedIds[] = $report->id;
        }

        return response()->json([
            'status' => 'success',
            'total' => $reports->count(),
            'processed' => $processed,
            'skipped' => $skipped,
            'processed_ids' => $processedIds,
        ]);
    }

    public function unsaveReport(Request $request)
    {
        $patient_id = $request->patient_id;
        $template_id = $request->template_id;

        $report = Report::where([
            'patient_id' => $patient_id,
            'template_id' => $template_id
        ])->first();

        if ($report) {
            $service = app(SharePointBackupService::class);

            $template = Template::find($template_id);
            if ($template) {
                $slug = Str::slug($template->name ?: 'report');

                if ($report->sharepoint_url) {
                    $pdfRemotePath = "patient_reports/{$patient_id}/report-{$patient_id}-{$slug}.pdf";
                    $service->deleteByRemotePath($pdfRemotePath);
                }

                if ($report->sharepoint_html_url) {
                    $htmlRemotePath = "patient_reports/{$patient_id}/HTML/report-{$patient_id}-{$slug}.html";
                    $service->deleteByRemotePath($htmlRemotePath);
                }
            }

            $report->delete();
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success'
            ]);
        }

        return back();
    }

    public function saveReport(Request $request)
    {
        $patient_id = $request->patient_id;
        $template_id = $request->template_id;

        $patient = Patient::find($request->patient_id);

        $html = $request->html_content ?? '';
        $html = rawurldecode($html);

        $report = Report::updateOrCreate([
            'patient_id' => $patient_id,
            'template_id' => $template_id
        ], [
            'html' => $html,
        ]);

        $template = Template::findOrFail($template_id);
        $branch = Branch::find($patient->branch_id ?? null);

        $slug = Str::slug($template->name ?: 'report');
        $filename = 'report-' . $report->patient_id . '-' . $slug . '.pdf';
        $reportPath = 'patient_reports/' . $report->patient_id . '/' . $filename;

        try {
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML(view('settings.templates.preview', [
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

            $report->update([
                'filename' => $filename,
                'file_url' => url('public/' . $reportPath),
                'html' => $html,
            ]);
        } catch (\Throwable $e) {
            Log::error("saveReport: PDF generation failed for report {$report->id}", [
                'exception' => $e->getMessage(),
            ]);

            $report->update([
                'html' => $html,
            ]);
        }

        if (app(SharePointBackupService::class)->isEnabled()) {
            UploadReportToSharePointJob::dispatch($report->id, $filename, $slug);
        }

        if (in_array($template_id, [89, 92, 93, 94, 95, 91, 100, 101, 102, 103, 90, 96, 97, 98, 99])) {
            $patient->latest_appointment->update([
                'followup_status' => "attended",
            ]);

            Audit::updateOrCreate([
                "patient_id" => $patient->id,
                "appointment_id" => $patient->latest_appointment->id,
            ], [
                'followup' => 'Yes'
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
            ]);
        }

        return back();
    }

    public function addReport(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);

        if ($appointment == null && !$request->hasFile('file')) {
            abort(404);
        }

        $patient = $appointment->patient;

        $filename = Str::slug($request->name) . '-' . uniqid()
            . '.' . $request->file('file')->getClientOriginalExtension();

        $report_path = config('constants.storage_paths.reports', '');
        $report_path = str_replace('{patient_id}', $patient->id, $report_path);
        $report_path = str_replace('{filename}', $filename, $report_path);

        Storage::disk('reports')->putFileAs(str_replace('/' . $filename, '', $report_path), $request->file, $filename);

        AdditionalReport::create([
            'name' => $request->name,
            'filename' => $filename,
            'patient_id' => $patient->id,
            'appointment_id' => $request->id,
        ]);

        return redirect()->back();
    }

    public function delReport(Request $request)
    {
        $report = AdditionalReport::where([
            'id' => $request->report_id,
            'appointment_id' => $request->appointment_id
        ])
            ->first();

        if ($report == null) {
            abort(404);
        }

        $report_path = config('constants.storage_paths.reports', '');
        $report_path = str_replace('{patient_id}', $report->patient_id, $report_path);
        $report_path = str_replace('{filename}', $report->filename, $report_path);

        Storage::disk('reports')->delete($report_path);

        $report->delete();

        return redirect()->back();
    }
}
