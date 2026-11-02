<?php

namespace App\Models;

use App\Helpers\PublicLink;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TracksDeletedMetadata;

class PatientInquiry extends Model
{
    use SoftDeletes, TracksDeletedMetadata;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getEditRouteAttribute()
    {
        try {
            return route('patient-register.edit', ['id' => $this->id]);
        } catch (\Exception $e) {
            return '#';
        }
    }

     public function getCMEditRouteAttribute()
    {
        try {
            return route('cosmetic-medical.edit', ['id' => $this->id]);
        } catch (\Exception $e) {
            return '#';
        }
    }

    public function getLinkAttribute()
    {
        try {
            return PublicLink::make(
                'patient-register.link',
                ['unique_key' => $this->unique_key],
                $this->role_id
            );
        } catch (\Exception $e) {
            return '#';
        }
    }
    public function getLinkCosmeticMedicalAttribute()
    {
        try {
            return PublicLink::make(
                'cosmetic-medical.link',
                ['unique_key' => $this->unique_key],
                $this->role_id
            );
        } catch (\Exception $e) {
            return '#';
        }
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
