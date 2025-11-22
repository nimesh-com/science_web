@extends('layouts.admin')
@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Class Details</h3>
        <a href="{{ route('classes.index') }}" class="btn btn-secondary btn-sm float-right">Back</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Class Name</th>
                <td>{{ $class->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Grade</th>
                <td>{{ $class->grade ?? '-' }}</td>
            </tr>
            <tr>
                <th>Class Link</th>
                <td><a href="{{ $class->link }}" target="_blank">{{ $class->link ?? '-' }}</a></td>
            </tr>
            <tr>
                <th>Instructor</th>
                <td>{{ $class->instructor ?? '-' }}</td>
            </tr>
            <tr>
                <th>Mode</th>
                <td>{{ ucfirst($class->mode) ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($class->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td>{{ $class->start_date ?? '-' }}</td>
            </tr>
            <tr>
                <th>Start Time</th>
                <td>{{ date('h:i A', strtotime($class->start_time)) ?? '-' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
