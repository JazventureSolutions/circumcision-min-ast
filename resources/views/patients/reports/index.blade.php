@extends('layouts.default')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="card-title mb-4 mb-md-0">
            <h3 class="card-label">Patient Report History</h3>
        </div>
        <form action="{{ route('patients.reports.history') }}" method="GET" class="form-inline">
            <div class="form-group mr-2 mb-2">
                <label class="mr-2">From</label>
                <input type="date" name="from_date" class="form-control form-control-sm" value="{{ request('from_date') }}">
            </div>
            <div class="form-group mr-2 mb-2">
                <label class="mr-2">To</label>
                <input type="date" name="to_date" class="form-control form-control-sm" value="{{ request('to_date') }}">
            </div>
            <div class="form-group mr-2 mb-2">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search patient name, phone, email or ID" value="{{ request('search') }}">
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $loop->iteration + (($appointments->currentPage() - 1) * $appointments->perPage()) }}</td>
                        <td>{{ $appointment->patient_id }}</td>
                        <td>{{ optional($appointment->patient)->name ?: 'Unknown' }}</td>
                        <td>{{ $appointment->date_formatted }}</td>
                        <td>{{ $appointment->start_time_formatted }}</td>
                        <td>
                            <a href="{{ route('patients.reports.history.patient', ['patient_id' => $appointment->patient_id]) }}" class="btn btn-sm btn-primary">
                                View Reports
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No patient appointments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
            <div class="text-muted small mb-2 mb-md-0">
                Showing {{ $appointments->firstItem() ?? 0 }} to {{ $appointments->lastItem() ?? 0 }} of {{ $appointments->total() }} entries
            </div>
            <div>
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
