<?php

namespace App\Models;

use App\Helpers\PublicLink;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\TracksDeletedMetadata;

class RemoteParentSignature extends Model
{
    use HasFactory, SoftDeletes, TracksDeletedMetadata;
    public function getLinkAttribute()
    {
        try {
            return PublicLink::make(
                'remote-parent-signature.link',
                ['unique_key' => $this->unique_key],
                $this->linkRoleId()
            );
        } catch (\Exception $e) {
            return '#';
        }
    }

    /**
     * Role that owns this signature request, so the link uses that workspace.
     * The patient may already be soft deleted, hence the trashed fallback.
     *
     * @return int|string|null
     */
    protected function linkRoleId()
    {
        $patient = $this->patient;

        if ($patient === null) {
            $patient = $this->patient()->withTrashed()->first();
        }

        return $patient ? $patient->role_id : null;
    }

    public function publicSubmitUrl(): string
    {
        return PublicLink::make('remote-parent-signature.postsignature', [], $this->linkRoleId());
    }

    public function getEditRouteAttribute()
    {
        try {
            return route('remote-parent-signature.edit', ['id' => $this->id]);
        } catch (\Exception $e) {
            return '#';
        }
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
