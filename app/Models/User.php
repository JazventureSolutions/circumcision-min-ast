<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_enabled' => 'boolean',
    ];

    public function getEditRouteAttribute()
    {
        try {
            return route('settings.team.edit', ['id' => $this->id]);
        } catch (\Exception $e) {
            return '#';
        }
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
	public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function currentRoleId()
    {
        $roleId = DB::table('role_user')
            ->where('user_id', $this->id)
            ->orderBy('role_id')
            ->value('role_id');

        return $roleId ?: 1;
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }
}
