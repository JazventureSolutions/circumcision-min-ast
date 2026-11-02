<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Slot;
use Illuminate\Support\Facades\DB;

class PatientDeletionService
{
    public function softDelete(Patient $patient): void
    {
        DB::transaction(function () use ($patient) {
            $appointments = $patient->appointments()->get();
            $slotIds = $appointments->pluck('slot_id')->filter()->unique();

            foreach ($appointments as $appointment) {
                $appointment->additional_reports()->get()->each->delete();
                optional($appointment->audit)->delete();
                optional($appointment->feedback)->delete();
                $appointment->delete();
            }

            $patient->additional_reports()->get()->each->delete();
            $patient->reports()->get()->each->delete();
            optional($patient->inquiry)->delete();
            optional($patient->audit)->delete();
            $patient->cosmeticPatientForm()->get()->each->delete();
            $patient->remoteParentSignatures()->get()->each->delete();
            $patient->delete();

            foreach ($slotIds as $slotId) {
                $slot = Slot::find($slotId);
                $stillBooked = Appointment::where('slot_id', $slotId)
                    ->whereHas('patient')
                    ->exists();

                if ($slot && ! $stillBooked) {
                    $slot->status = 'available';
                    $slot->save();
                }
            }
        });
    }
}