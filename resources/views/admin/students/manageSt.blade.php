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

<div class="row mb-3">
    <div class="col-md-8">
        <form action="{{ route('students.index') }}" method="GET" class="d-flex">
            {{-- Admission Number Search --}}
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search " value="{{ request('search') }}">

            {{-- Status Filter --}}
            <select name="status" class="form-control form-control-sm ms-2">
                <option value="">All Status</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
            </select>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-sm btn-primary ms-2">Filter</button>
        </form>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Students</h3>
                <a href="{{route('students.create')}}" class="btn btn-primary btn-sm float-right">Register New Student</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
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

                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete this student?');">
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
            <!-- /.card-body -->
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
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection