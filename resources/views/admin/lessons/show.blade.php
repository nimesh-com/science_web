@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Lesson Details</h3>
        <a href="{{ route('lessons.index') }}" class="btn btn-secondary btn-sm">Back to Lessons</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th style="width: 150px">Lesson Name</th>
                    <td>{{ $lesson->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Google Drive Link</th>
                    <td>
                        @if($lesson->drive_link)
                        <a href="{{ $lesson->drive_link }}" target="_blank" class="btn btn-sm btn-info">
                            View File
                        </a>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Expiration Date</th>
                    <td>{{ $lesson->expiration_date ? $lesson->expiration_date->format('M d, Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if(!empty($lesson->status) && $lesson->status == 1)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
