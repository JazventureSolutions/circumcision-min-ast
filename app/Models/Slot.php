<?php

namespace App\Models;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TracksDeletedMetadata;

class Slot extends Model
{
    use SoftDeletes, TracksDeletedMetadata;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function branch() {
        return $this->belongsTo(Branch::class);
    }
}
