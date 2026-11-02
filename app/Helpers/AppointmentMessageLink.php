<?php

namespace App\Helpers;

use App\Models\Appointment;

class AppointmentMessageLink
{
    /**
     * Public URL of an appointment message page (reminder / arranged / ...).
     *
     * The URL is scoped to the workspace of the patient, for example
     * https://clinicalforms.net/minor-surgery/messages/appointment-reminder?id=123.
     *
     * These pages are opened by patients without signing in and without a
     * signature parameter, so this is a plain absolute URL.
     */
    public static function temporary(string $routeName, Appointment $appointment): string
    {
        return PublicLink::make(
            $routeName,
            ['id' => $appointment->id],
            static::patientRoleId($appointment)
        );
    }

    /**
     * Role of the patient the appointment belongs to (soft deleted included).
     *
     * @return int|string|null
     */
    protected static function patientRoleId(Appointment $appointment)
    {
        $patient = $appointment->patient;

        if ($patient === null) {
            try {
                $patient = $appointment->patient()->withTrashed()->first();
            } catch (\Throwable $e) {
                $patient = null;
            }
        }

        return $patient ? $patient->role_id : null;
    }
}
