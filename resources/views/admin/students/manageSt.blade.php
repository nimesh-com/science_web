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

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<section class="content mb-3">
    <div class="container-fluid">

        <div class="card">

            <!-- Card Header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Students</h3>
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Register New Student</a>
            </div>

            <!-- Search Area -->
            <div class="card-body">

                <form action="{{ route('students.index') }}" method="GET">
                    <div class="row">

                        <!-- Status Filter -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status:</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option value="">All Status</option>
                                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Keyword Search -->
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Keyword Search:</label>
                                <div class="input-group">
                                    <input type="search"
                                        name="search"
                                        class="form-control"
                                        placeholder="Type your keywords here"
                                        value="{{ request('search') }}">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <!-- Students Table -->
                <div class="table-responsive p-0 mt-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 40px">#</th>
                                <th>Admission No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th style="width: 120px">Status</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($students as $student)
                            <tr>
                                <td>{{ $loop->iteration + ($students->firstItem() ? $students->firstItem() - 1 : 0) }}</td>
                                <td>{{ $student->admission_no ?? $student->admission_number ?? '-' }}</td>
                                <td>{{ $student->name ?? ($student->first_name . ' ' . ($student->last_name ?? '')) }}</td>
                                <td>{{ $student->phone ?? $student->mobile ?? '-' }}</td>

                                <td>
                                    @if(!empty($student->active) && $student->active)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('students.destroy', $student->id) }}"
                                        method="POST"
                                        style="display:inline-block"
                                        onsubmit="return confirm('Delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No students found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Pagination -->
            <div class="card-footer clearfix">
                @if(method_exists($students, 'links'))
                {{ $students->links() }}
                @else
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
                @endif
            </div>

        </div>

    </div>
</section>

@endsection