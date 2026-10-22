<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        $roles = $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
        $activeRoleId = session('active_role_id');

        if ($activeRoleId) {
            $roles->orderByRaw('CASE WHEN roles.id = ? THEN 0 ELSE 1 END', [$activeRoleId]);
        }

        return $roles->orderBy('roles.id');
    }

    public function currentRole()
    {
        $roles = $this->roles();
        $activeRoleId = session('active_role_id');

        if ($activeRoleId) {
            $activeRole = (clone $roles)->where('roles.id', $activeRoleId)->first();
            if ($activeRole) {
                return $activeRole;
            }
        }

        return $roles->orderBy('roles.id')->first();
    }

    public function currentRoleId()
    {
        $role = $this->currentRole();

        return $role ? $role->id : 1;
    }

    public function hasRole($role)
    {
        $activeRole = $this->currentRole();

        return $activeRole && $activeRole->name === $role;
    }
}
