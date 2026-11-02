<?php

namespace App\Traits;

use App\Models\User;

trait TracksDeletedMetadata
{
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by_id');
    }

    protected static function bootTracksDeletedMetadata()
    {
        static::deleting(function ($model) {
            if (! method_exists($model, 'isForceDeleting') || ! $model->isForceDeleting()) {
                $model->is_deleted = true;
                $model->deleted_by_id = auth()->id();
                $model->save();
            }
        });

        static::restored(function ($model) {
            $model->is_deleted = false;
            $model->deleted_by_id = null;
            $model->save();
        });
    }
}