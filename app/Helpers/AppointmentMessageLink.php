<?php

namespace App\Helpers;

use App\Models\Appointment;
use Illuminate\Support\Facades\URL;

class AppointmentMessageLink
{
    public static function temporary(string $routeName, Appointment $appointment): string
    {
        return URL::temporarySignedRoute(
            $routeName,
            now()->addDays(30),
            ['id' => $appointment->id]
        );
    }
}