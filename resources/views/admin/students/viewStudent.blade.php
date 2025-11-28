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

<div class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="m-0">Student Details</h1>
            <div>
                <a href="{{ route('students.index') }}" class="btn btn-sm btn-secondary">Back to Students</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $student->name ?? '—' }}</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width:180px">Admission No</th>
                                    <td>{{ $student->admission_no ?? $student->admission_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $student->name ?? ($student->first_name . ' ' . ($student->last_name ?? '')) }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $student->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $student->phone ?? $student->mobile ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Grade / Class</th>
                                    <td>{{ $student->grade ?? ($student->class ?? '-') }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $student->address ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if(!empty($student->active) && $student->active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Blocked</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Enrollment Date</th>
                                    <td>{{ optional($student->created_at)->format('M d, Y') ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Actions</h3>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-block mb-2">
                            <i class="fas fa-edit"></i> Edit Student
                        </a>

                        <form action="{{ route('students.toggleStatus', $student->id) }}" method="POST" class="mb-2">
                            @csrf
                            <button type="submit" class="btn {{ $student->active ? 'btn-danger' : 'btn-success' }} btn-block">
                                <i class="fas {{ $student->active ? 'fa-ban' : 'fa-check' }}"></i>
                                {{ $student->active ? 'Block Student' : 'Unblock Student' }}
                            </button>
                        </form>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-block mb-2" type="submit">
                                <i class="fas fa-trash"></i> Delete Student
                            </button>
                        </form>

                        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection