@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="m-0">Course Details</h1>
            <div>
                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-secondary">Back to Courses</a>
                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
                        <h3 class="card-title">{{ $course->name ?? '—' }}</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width:180px">Course Name</th>
                                    <td>{{ $course->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Grade</th>
                                    <td>{{ $course->grade ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Instructor</th>
                                    <td>{{ $course->instructor ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Study Mode</th>
                                    <td>{{ $course->study_mode ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if(isset($course->status) && ($course->status === 1 || strtolower($course->status) === 'active'))
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created Date</th>
                                    <td>{{ optional($course->created_at)->format('M d, Y H:i') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ optional($course->updated_at)->format('M d, Y H:i') ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Course Image</h3>
                    </div>

                    <div class="card-body text-center">
                        @if(!empty($course->image))
                        <img src="{{ asset('public/uploads/courses/' . $course->image) }}"
                            title="{{ $course->image }}"
                            alt="{{ $course->name }}"
                            class="img-fluid img-thumbnail mb-2"
                            style="max-height:250px;">
                        @else
                        <div class="border rounded py-5">
                            <i class="fas fa-book fa-3x text-muted"></i>
                            <div class="text-muted mt-2 small">No image available</div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Actions</h3>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-block mb-2">
                            <i class="fas fa-edit"></i> Edit Course
                        </a>

                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-block" type="submit">
                                <i class="fas fa-trash"></i> Delete Course
                            </button>
                        </form>

                        <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-block mt-2">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection