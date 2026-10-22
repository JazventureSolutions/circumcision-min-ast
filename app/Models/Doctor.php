<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Doctor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'doctor_role', 'doctor_id', 'role_id');
    }

    public function scopeVisibleInRole(Builder $query, $role): Builder
    {
        if (strtolower((string) data_get($role, 'name', '')) === 'admin') {
            return $query;
        }

        $roleId = data_get($role, 'id');

        return $query->where(function (Builder $doctorQuery) use ($roleId) {
            $doctorQuery->where('is_shared', true);

            if ($roleId) {
                $doctorQuery->orWhereHas('roles', function (Builder $roleQuery) use ($roleId) {
                    $roleQuery->where('roles.id', $roleId);
                });

            }
        });
    }

    public function getEditRouteAttribute()
    {
        try {
            return route('settings.doctors.edit', ['id' => $this->id]);
        } catch (\Exception $e) {
            return '#';
        }
    }

    public function getAddAppointmentRouteAttribute()
    {
        try {
            return route('patients.appointments.add', ['doctor_id' => $this->id]);
        } catch (\Exception $e) {
            return '#';
        }
    }

    public function getLatestAppointmentRouteAttribute()
    {
        try {
            $appoinment = $this->appointments()->latest()->first();
            if ($appoinment) {
                return route('patients.appointments.reports', ['id' => $this->id, 'appointment_id' => $appoinment->id]);
            }
            return '#';
        } catch (\Exception $e) {
            return '#';
        }
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
