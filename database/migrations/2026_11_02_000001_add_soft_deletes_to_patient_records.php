<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToPatientRecords extends Migration
{
    private $tables = [
        'patients',
        'appointments',
        'slots',
        'reports',
        'additional_reports',
        'patient_inquiries',
        'audits',
        'feedback',
        'cosmetic_patient_forms',
        'remote_parent_signatures',
    ];

    public function up()
    {
        foreach ($this->tables as $tableName) {
            if (! Schema::hasTable($tableName)) {
                continue;
            }

            $hasDeletedAt = Schema::hasColumn($tableName, 'deleted_at');
            $hasIsDeleted = Schema::hasColumn($tableName, 'is_deleted');
            $hasDeletedById = Schema::hasColumn($tableName, 'deleted_by_id');

            if (! $hasDeletedAt || ! $hasIsDeleted || ! $hasDeletedById) {
                Schema::table($tableName, function (Blueprint $table) use ($hasDeletedAt, $hasIsDeleted, $hasDeletedById) {
                    if (! $hasDeletedAt) {
                        $table->softDeletes();
                    }
                    if (! $hasIsDeleted) {
                        $table->boolean('is_deleted')->default(false)->index();
                    }
                    if (! $hasDeletedById) {
                        $table->unsignedBigInteger('deleted_by_id')->nullable()->index();
                    }
                });
            }

            if (Schema::hasColumn($tableName, 'deleted_at')) {
                DB::table($tableName)->whereNotNull('deleted_at')->update(['is_deleted' => true]);
            }
        }
    }

    public function down()
    {
        foreach ($this->tables as $tableName) {
            if (! Schema::hasTable($tableName)) {
                continue;
            }

            $hasDeletedAt = Schema::hasColumn($tableName, 'deleted_at');
            $hasIsDeleted = Schema::hasColumn($tableName, 'is_deleted');
            $hasDeletedById = Schema::hasColumn($tableName, 'deleted_by_id');

            if ($hasDeletedAt || $hasIsDeleted || $hasDeletedById) {
                Schema::table($tableName, function (Blueprint $table) use ($hasDeletedAt, $hasIsDeleted, $hasDeletedById) {
                    if ($hasDeletedById) {
                        $table->dropColumn('deleted_by_id');
                    }
                    if ($hasIsDeleted) {
                        $table->dropColumn('is_deleted');
                    }
                    if ($hasDeletedAt) {
                        $table->dropSoftDeletes();
                    }
                });
            }
        }
    }
}