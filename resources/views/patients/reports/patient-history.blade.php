@extends('layouts.default')

@section('content')
<div class="card card-custom">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-title">
            <h3 class="card-label">{{ $patient->name }} - Report History</h3>
            <div class="text-muted">Patient ID: {{ $patient->id }}</div>
        </div>
        <div>
            <a href="{{ route('patients.reports.history') }}" class="btn btn-secondary">Back to Patients</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Report Name</th>
                        <th>Filename</th>
                        <th>Local URL</th>
                        <th>SharePoint URL</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ optional($report->template)->name ?? 'Report #' . $report->id }}</td>
                        <td>{{ $report->filename ?: '-' }}</td>
                        <td>
                            @if(!empty($report->file_url))
                                <a href="{{ $report->file_url }}" target="_blank" class="btn btn-sm btn-success">Open Local</a>
                            @else
                                <span class="text-muted">No local URL</span>
                            @endif
                        </td>
                        <td>
                            @if(!empty($report->sharepoint_url))
                                <a href="{{ $report->sharepoint_url }}" target="_blank" class="btn btn-sm btn-info">Open SharePoint</a>
                            @else
                                <span class="text-muted">Not uploaded</span>
                            @endif
                        </td>
                        <td>{{ $report->updated_at ? $report->updated_at->format('Y-m-d H:i') : '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No reports found for this patient.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
