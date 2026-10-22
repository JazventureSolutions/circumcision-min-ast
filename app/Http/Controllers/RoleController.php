<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class RoleController extends Controller
{
    public function switchActiveRole(Request $request)
    {
        $validated = $request->validate([
            'role_id' => ['required', 'integer'],
        ]);

        $role = $request->user()->roles()
            ->where('roles.id', $validated['role_id'])
            ->first();

        if (! $role) {
            abort(403, 'You are not assigned to this role.');
        }

        $request->session()->put('active_role_id', $role->id);

        return redirect()->route('dashboard')->with('status', 'Active role changed.');
    }

    public function assignRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => ['required', 'string', 'exists:roles,name'],
        ]);

        $role = Role::where('name', $validated['role'])->firstOrFail();
        $user->roles()->syncWithoutDetaching([$role->id]);

        return redirect()->back()->with('success', 'Role assigned successfully!');
    }
}