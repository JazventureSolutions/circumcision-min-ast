<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaceMapPoint extends Model
{
    use HasFactory;

    protected $table = 'face_map_points';

    protected $fillable = [
        'patient_id',
        'patient_type_id',
        'point_no',
        'code',
        'title',
        'description',
    ];

    /**
     * Get the patient that owns the face map point.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Get the patient type.
     */
    public function patientType()
    {
        return $this->belongsTo(PatientType::class);
    }
}
