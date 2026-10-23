<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helpers\ReminderHelper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientRegisterLinkController;
use App\Http\Controllers\RemoteParentSignatureController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CosmeticMedicalController;
use App\Http\Controllers\CosmeticMedicalPatientRegisterLinkController;
use App\Http\Controllers\FaceMapPointController;
use App\Http\Controllers\BotoxFaceMapPointController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/assign-role/{user}', [RoleController::class, 'assignRole'])->name('assign-role');
    Route::post('/sync-templates', [AdminController::class, 'sync'])->name('admin.sync-templates');
});

Route::post('/active-role', [RoleController::class, 'switchActiveRole'])
    ->middleware('auth')
    ->name('role.switch');

Route::get('/r/{unique_key}', [PatientRegisterLinkController::class, 'register'])->name('patient-register.link');
Route::post('/r/{unique_key}', [PatientRegisterLinkController::class, 'postRegister'])->name('patient-register.register');
Route::get('/rp/{unique_key}', [RemoteParentSignatureController::class, 'signature'])->name('remote-parent-signature.link');
Route::post('/postsignature', [RemoteParentSignatureController::class, 'postsignature'])->name('remote-parent-signature.postsignature');
Route::get('/cm/{unique_key}', [CosmeticMedicalPatientRegisterLinkController::class, 'register'])->name('cosmetic-medical.link');
Route::post('/cm/{unique_key}', [CosmeticMedicalPatientRegisterLinkController::class, 'postRegister'])->name('cosmetic-medical.register');
Route::get('/messages/appointment-deposit', [MessageController::class, 'appointmentDeposit'])
    ->name('messages.appointment-deposit');
Route::get('/messages/appointment-depoist', [MessageController::class, 'appointmentDeposit']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('messages')->group(function () {
        Route::get('/patient-register', [MessageController::class, 'patientRegister'])->name('messages.patient-register');
        Route::get('/appointment-reminder', [MessageController::class, 'appointmentReminder'])->name('messages.appointment-reminder');
        Route::get('/appointment-arranged', [MessageController::class, 'appointmentArranged'])->name('messages.appointment-arranged');
        Route::get('/appointment-canceled', [MessageController::class, 'appointmentCanceled'])->name('messages.appointment-canceled');
        Route::get('/appointment-completed', [MessageController::class, 'appointmentCompleted'])->name('messages.appointment-completed');
    });

    Route::get('/report-preview', [ReportController::class, 'preview'])->name('report-preview');
    Route::post('/send-reminder', function (Request $request) {
        return ReminderHelper::sendReminder($request['reminder_date']);
    })->name('send-reminder');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/whatsapp', [WhatsAppController::class, 'sendWhatsAppMessage'])->name('whatsapp');
    Route::prefix('unapproved-patients')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('unapproved-patients');
        Route::post('/approve', [PatientController::class, 'approve'])->name('unapproved-patients.approve');
        Route::post('/approve-cosmetic', [PatientController::class, 'approveCosmetic'])->name('unapproved-patients-cosmetic.approve');
    });

    Route::prefix('unapproved-aesthetic')->group(function () {
        Route::get('/unapproved-aesthetic', [PatientController::class, 'unapprovedAestheticIndex'])->name('unapproved-aesthetic');
        Route::post('/unapproved-aesthetic-approve', [PatientController::class, 'unapprovedAestheticApprove'])->name('unapproved-aesthetic.approve');
    });

    Route::prefix('unappointed-patients')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('unappointed-patients');
    });

    Route::prefix('followup-patients')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('followup-patients');
    });

    Route::prefix('slots')->group(function () {
        Route::get('/', [SlotController::class, 'index'])->name('slots');
        Route::get('/add', [SlotController::class, 'create'])->name('slots.add');
        Route::post('/add', [SlotController::class, 'store'])->name('slots.store');
        Route::get('/available-slots', [SlotController::class, 'availableSlots'])->name('slots.available-slots');
        Route::get('/all-available-slots/{slot_id}', [SlotController::class, 'allAvailableSlots'])->name('slots.all-available-slots');
        Route::get('/available-slot-lists', [SlotController::class, 'availableSlotLists'])->name('slots.available-slot-lists');
        Route::get('/all-slot-lists', [SlotController::class, 'allSlotLists'])->name('slots.all-slot-lists');
        Route::get('/{id}/edit', [SlotController::class, 'edit'])->name('slots.edit');
        Route::post('/delete', [SlotController::class, 'delete'])->name('slots.delete');
        Route::get('/select2', [SlotController::class, 'select2'])->name('slots.select2');
        Route::get('/insert', [AppointmentController::class, 'insertSlots'])->name('insertSlots');
        Route::patch('/{id}/edit', [SlotController::class, 'update'])->name('slots.update');
        Route::any('/import', [SlotController::class, 'importexcel'])->name('slots.import');
    });

    Route::prefix('branches')->group(function () {
        Route::get('/select2', [BranchController::class, 'select2'])->name('branches.select2');
    });

    Route::prefix('patients')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('patients');
        Route::get('/search', [PatientController::class, 'search'])->name('patients.search');
        Route::get('/add', [PatientController::class, 'edit'])->name('patients.add');
        Route::get('/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
        Route::get('/{id}/edit-cosmetic', [PatientController::class, 'editCosmetic'])->name('patients.edit-cosmetic');
        Route::post('/store', [PatientController::class, 'store'])->name('patients.store');
        Route::post('/delete', [PatientController::class, 'delete'])->name('patients.delete');
        Route::post('/store-cosmetic', [PatientController::class, 'storeCosmetic'])->name('patients.store-cosmetic');
        Route::get('/select2', [PatientController::class, 'select2'])->name('patients.select2');
        Route::post('/send-payment-message', [PatientController::class, 'sendPaymentMessage'])->name('patients.send-payment-message');
        Route::get('/reports/history', [ReportController::class, 'reportsIndex'])->name('patients.reports.history');
        Route::get('/reports/history/{patient_id}', [ReportController::class, 'patientReportHistory'])->name('patients.reports.history.patient');

        Route::get('/similar', [PatientController::class, 'similar'])->name('patients.similar');

        Route::prefix('appointments')->group(function () {
            Route::get('/', [AppointmentController::class, 'index'])->name('patients.appointments');
            Route::get('/add', [AppointmentController::class, 'edit'])->name('patients.appointments.add');
            Route::get('/{appointment_id}/edit', [AppointmentController::class, 'edit'])->name('patients.appointments.edit');
            Route::post('/store', [AppointmentController::class, 'store'])->name('patients.appointments.store');
            Route::post('/delete', [AppointmentController::class, 'delete'])->name('patients.appointments.delete');

            Route::get('/available-times', [AppointmentController::class, 'availableTimes'])->name('patients.appointments.available-times');
            // Route::get('/send-email-reports', [AppointmentController::class, 'sendAppointmentEmailWithAttachments'])->name('patients.appointments.send-email-reports');
            Route::post('/send-email-reports', [AppointmentController::class, 'sendAppointmentEmailWithAttachments'])->name('patients.appointments.send-email-reports');

            Route::get('/{appointment_id}/reports', [ReportController::class, 'reports'])->name('patients.appointments.reports');
            // Route::get('/{appointment_id}/reports/print-new', [ReportController::class, 'printReportNew'])->name('patients.appointments.reports.print-new');
            Route::post('/{appointment_id}/reports/print', [ReportController::class, 'printReport'])->name('patients.appointments.reports.print');
            Route::get('/{appointment_id}/reports/print', [ReportController::class, 'getPrintReport'])->name('patients.appointments.reports.print');
            Route::post('/{appointment_id}/reports/save', [ReportController::class, 'saveReport'])->name('patients.appointments.reports.save');
            Route::post('/{appointment_id}/reports/unsave', [ReportController::class, 'unsaveReport'])->name('patients.appointments.reports.unsave');

            Route::post('/{appointment_id}/reports/download-html', [ReportController::class, 'downloadHtml'])->name('patients.appointments.reports.download-html');
            Route::post('/{appointment_id}/reports/tab-html', [ReportController::class, 'getTabHtml'])->name('patients.appointments.reports.tab-html');

            Route::post('/{appointment_id}/reports/add', [ReportController::class, 'addReport'])->name('patients.appointments.reports.add');
            Route::post('/{appointment_id}/reports/del', [ReportController::class, 'delReport'])->name('patients.appointments.reports.delete');

            Route::get('/reports/bulk-generate', [ReportController::class, 'bulkGenerateReportPdfs'])->name('patients.reports.bulk-generate');

            Route::get('/{appointment_id}/audit', [AuditController::class, 'audit'])->name('patients.appointments.audit');
            Route::post('/{appointment_id}/audit/save', [AuditController::class, 'auditSave'])->name('patients.appointments.audit.save');

            Route::get('/feedback', [FeedbackController::class, 'index'])->name('patients.appointments.feedback.list');
            Route::get('/{appointment_id}/feedback', [FeedbackController::class, 'feedback'])->name('patients.appointments.feedback');
            Route::post('/{appointment_id}/feedback/save', [FeedbackController::class, 'feedbackSave'])->name('patients.appointments.feedback.store');
            Route::get('/feedback/summary', [FeedbackController::class, 'feedbackSummary'])->name('patients.appointments.feedback.summary');

            Route::post('/followup-status-change', [AppointmentController::class, 'followupStatusChange'])->name('patients.appointments.followupStatusChange');
        });

        Route::get('/audit', [AuditController::class, 'index'])->name('patients.appointments.audits');
        Route::get('/get-audit-data', [AuditController::class, 'getAuditData'])->name('patients.appointments.audits.audit-data');
        Route::post('/audit', [AuditController::class, 'index'])->name('patients.appointments.audits.ajax');
    });

    Route::prefix('patient-register')->group(function () {
        Route::get('/', [PatientRegisterLinkController::class, 'index'])->name('patient-register');
        Route::get('/add', [PatientRegisterLinkController::class, 'edit'])->name('patient-register.add');
        Route::get('/{id}/edit', [PatientRegisterLinkController::class, 'edit'])->name('patient-register.edit');
        Route::post('/store', [PatientRegisterLinkController::class, 'store'])->name('patient-register.store');
    });

    Route::get('/profile', [TeamController::class, 'profile'])->name('settings.team.profile');

    Route::get('/summary', [SummaryController::class, 'index'])->name('summary');

    Route::prefix('settings')->group(function () {

        Route::get('/general', [SettingsController::class, 'general'])->name('settings.general');
        Route::prefix('team')->group(function () {
            Route::get('/', [TeamController::class, 'index'])->name('settings.team');
            Route::get('/add', [TeamController::class, 'edit'])->name('settings.team.add');
            Route::get('/{id}/edit', [TeamController::class, 'edit'])->name('settings.team.edit');
            Route::post('/store', [TeamController::class, 'store'])->name('settings.team.store');
        });

        Route::prefix('medicines')->group(function () {
            Route::get('/', [MedicineController::class, 'index'])->name('settings.medicines');
            Route::get('/add', [MedicineController::class, 'edit'])->name('settings.medicines.add');
            Route::get('/{id}/edit', [MedicineController::class, 'edit'])->name('settings.medicines.edit');
            Route::post('/store', [MedicineController::class, 'store'])->name('settings.medicines.store');
        });

        Route::prefix('doctors')->group(function () {
            Route::get('/', [DoctorController::class, 'index'])->name('settings.doctors');
            Route::get('/add', [DoctorController::class, 'edit'])->name('settings.doctors.add');
            Route::get('/{id}/edit', [DoctorController::class, 'edit'])->name('settings.doctors.edit');
            Route::post('/store', [DoctorController::class, 'store'])->name('settings.doctors.store');
            Route::get('/select2', [DoctorController::class, 'select2'])->name('doctors.select2');
        });

        Route::prefix('templates')->group(function () {
            Route::get('/sample', function () {
                return view('settings.templates.sample')->render();
                // $pdf = App::make('dompdf.wrapper');
                // $pdf->loadHTML(view('settings.templates.sample')->render());
                // return $pdf->stream();
            });
            Route::get('/sample-pdf', [TemplateController::class, 'samplePdf'])->name('settings.templates.sample-pdf');

            Route::get('/', [TemplateController::class, 'index'])->name('settings.templates');
            Route::get('/{id}/edit', [TemplateController::class, 'edit'])->name('settings.templates.edit');
            Route::post('/store', [TemplateController::class, 'store'])->name('settings.templates.store');
            Route::get('/{id}/preview', [TemplateController::class, 'preview'])->name('settings.templates.preview');
        });

        Route::prefix('setups')->group(function () {

            Route::prefix('states')->group(function () {
                Route::get('/', [StateController::class, 'index'])->name('settings.setups.states');
                Route::get('/add', [StateController::class, 'edit'])->name('settings.setups.states.add');
                Route::get('/{id}/edit', [StateController::class, 'edit'])->name('settings.setups.states.edit');
                Route::post('/store', [StateController::class, 'store'])->name('settings.setups.states.store');
            });

            Route::prefix('cities')->group(function () {
                Route::get('/', [CityController::class, 'index'])->name('settings.setups.cities');
                Route::get('/add', [CityController::class, 'edit'])->name('settings.setups.cities.add');
                Route::get('/{id}/edit', [CityController::class, 'edit'])->name('settings.setups.cities.edit');
                Route::post('/store', [CityController::class, 'store'])->name('settings.setups.cities.store');
            });
        });
    });
    // reports
    Route::prefix('remote-parent-signature')->group(function () {
        Route::get('/', [RemoteParentSignatureController::class, 'index'])->name('remote-parent-signature.index');
        Route::get('/add', [RemoteParentSignatureController::class, 'show'])->name('remote-parent-signature.add');
        Route::get('/{id}/edit', [RemoteParentSignatureController::class, 'show'])->name('remote-parent-signature.edit');
        Route::post('/store', [RemoteParentSignatureController::class, 'store'])->name('remote-parent-signature.store');
    });
    Route::prefix('face-map-points')->group(function () {
        Route::get('/', [FaceMapPointController::class, 'index'])->name('face-map-points.index');
        Route::get('/add', [FaceMapPointController::class, 'create'])->name('face-map-points.add');
        Route::get('/{patient_id}/edit', [FaceMapPointController::class, 'edit'])->name('face-map-points.edit');
        Route::post('/store', [FaceMapPointController::class, 'store'])->name('face-map-points.store');
        Route::get('/get-points', [FaceMapPointController::class, 'getPoints'])->name('face-map-points.get-points');
    });

    Route::prefix('botox-face-map-points')->group(function () {
        Route::get('/', [BotoxFaceMapPointController::class, 'index'])->name('botox-face-map-points.index');
        Route::get('/add', [BotoxFaceMapPointController::class, 'create'])->name('botox-face-map-points.add');
        Route::get('/{patient_id}/edit', [BotoxFaceMapPointController::class, 'edit'])->name('botox-face-map-points.edit');
        Route::post('/store', [BotoxFaceMapPointController::class, 'store'])->name('botox-face-map-points.store');
        Route::get('/get-points', [BotoxFaceMapPointController::class, 'getPoints'])->name('botox-face-map-points.get-points');
    });

    Route::prefix('cosmetic-medical')->group(function () {
        Route::get('/', [CosmeticMedicalController::class, 'index'])->name('cosmetic-medical.index');
        Route::get('/add', [CosmeticMedicalController::class, 'edit'])->name('cosmetic-medical.add');
        Route::get('/{id}/edit', [CosmeticMedicalController::class, 'edit'])->name('cosmetic-medical.edit');
        Route::post('/store', [CosmeticMedicalController::class, 'store'])->name('cosmetic-medical.store');
    });
});

require __DIR__ . '/auth.php';
