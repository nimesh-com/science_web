@extends('layouts.admin')

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
</div>
@endif

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Courses</h3>
                <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">Add Course</a>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:50px">#</th>
                            <th>Name</th>
                            <th style="width:140px">Grade</th>
                            <th style="width:180px">Instructor</th>
                            <th style="width:120px">Status</th>
                            <th style="width:250px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration + ($courses->firstItem() ? $courses->firstItem() - 1 : 0) }}</td>
                            <td>{{ $course->name ?? '-' }}</td>
                            <td>{{ $course->grade ?? '-' }}</td>
                            <td>{{ $course->instructor ?? '-' }}</td>
                           <td>
    @if(isset($course->status) && ($course->status === 1 || strtolower($course->status) === 'active'))
        <span class="badge badge-success">Active</span>
    @else
        <span class="badge badge-secondary">Inactive</span>
    @endif
</td>

                            <td>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No courses found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                @if(method_exists($courses, 'links'))
                    {{ $courses->links() }}
                @else
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                    </ul>
                @endif
            </div>
        </div>

    </div>

</section>

@endsection