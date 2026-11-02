@extends('layouts.default')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Patient deletion</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.patients.deletion') }}" class="form-inline mb-6">
                <label class="sr-only" for="patient-search">Patient ID or name</label>
                <input id="patient-search" name="q" value="{{ $search }}" class="form-control mr-2 mb-2"
                    type="search" placeholder="Patient ID or name" autocomplete="off">
                <button class="btn btn-primary mb-2" type="submit">Search</button>
                @if ($search !== '')
                    <a class="btn btn-light mb-2 ml-2" href="{{ route('admin.patients.deletion') }}">Clear</a>
                @endif
            </form>

            <div class="alert alert-warning" role="note">
                Deleting a patient hides the patient and related clinical records from normal pages. Records and uploaded reports are retained for recovery. Appointment slots become available only when no active appointment still uses them.
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Branch</th>
                            <th>Appointments</th>
                            <th>Reports</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->name }}</td>
                                <td>{{ optional($patient->role)->name ?? $patient->role_id }}</td>
                                <td>{{ optional($patient->branch)->name ?? '-' }}</td>
                                <td>{{ $patient->appointments_count }}</td>
                                <td>{{ $patient->reports_count }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.patients.delete', ['patientId' => $patient->id]) }}"
                                        onsubmit="return confirm('Soft-delete patient #{{ $patient->id }} and related clinical records?');">
                                        @csrf
                                        <input type="hidden" name="q" value="{{ $search }}">
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    {{ $search === '' ? 'Enter a patient ID or name to search.' : 'No matching active patients found.' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $patients->links() }}
        </div>
    </div>
@endsection
