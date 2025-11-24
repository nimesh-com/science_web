@extends('layouts.admin')
@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Student Details</h3>
        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm float-right">Back to List</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Admission No</th>
                <td>{{ $student->admission_no ?? $student->admission_number }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $student->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $student->phone }}</td>
            </tr>
            <tr>
                <th>Grade</th>
                <td>{{ $student->grade }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    @if($student->active)
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Blocked</span>
                    @endif
                </td>
            </tr>
        </table>

        {{-- Block/Unblock button --}}
        {{-- Block/Unblock and Edit buttons --}}
        <div class="mt-3">
            <form action="{{ route('students.toggleStatus', $student->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn {{ $student->active ? 'btn-danger' : 'btn-success' }}">
                    {{ $student->active ? 'Block Student' : 'Unblock Student' }}
                </button>
            </form>

            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning ms-2">
                Edit Student
            </a>
        </div>

    </div>
</div>

@endsection