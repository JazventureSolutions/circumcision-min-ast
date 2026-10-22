<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Role;
use Illuminate\Support\Facades\Route;

class DoctorController extends Controller
{
    public function select2(Request $request)
    {
        $activeRole = $request->user()->currentRole();
        $doctors = Doctor::visibleInRole($activeRole)
            ->select([
            'doctors.id AS id',
            'doctors.name AS text',
        ]);

        if ($request->has('q')) {
            $doctors->where(function ($query) use ($request) {
                $query->where('id', $request->q)
                    ->orWhere('name', 'LIKE', '%' . $request->q . '%');
            });
        }

        $doctors = $doctors
            ->limit(10)
            ->get();

        return response()->json([
            'results' => $doctors,
            'request' => $request->all()
        ]);
    }

    public function index(Request $request)
    {
        $title = 'Doctors';

        if ($request->ajax()) {

            $activeRole = $request->user()->currentRole();
            $doctors = Doctor::visibleInRole($activeRole)
                ->select(['doctors.id', 'doctors.name']);

            return app('datatables')->of($doctors)
                ->addColumn('actions', function ($doctor) {
                    $html = '
                        <a href="' . $doctor->edit_route . '" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Edit details">
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                        </a>';

                    return $html;
                })
                ->rawColumns(['actions'])
                ->make();
        }

        return view('doctors.list', [
            'title' => $title
        ]);
    }

    public function edit($id = 0)
    {
        $title = 'Doctor';
        $doctor = new Doctor();
        $doctor->id = 0;
        $activeRole = request()->user()->currentRole();

        if (Route::currentRouteName() == 'settings.doctors.edit') {
            $doctor = Doctor::visibleInRole($activeRole)->findOrFail($id);
        }

        return view('doctors.edit', [
            'title' => $title,
            'doctor' => $doctor,
            'roles' => Role::orderBy('name')->get(),
            'selectedRoleIds' => $doctor->exists
                ? ($doctor->is_shared ? Role::pluck('id')->all() : $doctor->roles()->pluck('roles.id')->all())
                : [$activeRole->id],
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'id' => ['required', 'numeric'],
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'role_ids' => ['nullable', 'array'],
            'role_ids.*' => ['integer', 'exists:roles,id'],
            'is_shared' => ['nullable', 'boolean'],
        ];

        $request->validate($rules);

        $selectedRoleIds = array_unique(array_map('intval', $request->input('role_ids', [])));
        $isAdmin = strtolower($request->user()->currentRole()->name ?? '') === 'admin';
        $assignedRoleIds = $request->user()->roles()->pluck('roles.id')->map(function ($id) {
            return (int) $id;
        })->all();

        if (! $isAdmin && array_diff($selectedRoleIds, $assignedRoleIds)) {
            abort(403, 'You can only assign this doctor to roles assigned to your account.');
        }

        if ($request->boolean('is_shared') && ! $isAdmin) {
            abort(403, 'Only an admin can make a doctor visible in every role.');
        }

        $isEdit = is_numeric($request->id) && $request->id > 0;
        $doctor = new Doctor();

        if ($isEdit) {
            $doctor = Doctor::visibleInRole($request->user()->currentRole())->findOrFail($request->id);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'cell_number' => $request->cell_number,
            'city' => $request->city,
            'sign' => $request->sign,
            'is_shared' => $request->boolean('is_shared'),
        ];

        if ($doctor->id > 0) {
            $doctor->update($data);
        } else {
            $data['role_id'] = null;
            $doctor = Doctor::create($data);
        }

        $doctor->roles()->sync($selectedRoleIds);

        return redirect()->route('settings.doctors');
    }
}
