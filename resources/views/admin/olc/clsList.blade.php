@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Classes</h3>
        <a href="{{ route('classes.create') }}" class="btn btn-primary btn-sm float-right">Create New Class</a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="width: 40px">#</th>
                    <th>Class Name</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classes as $class)
                <tr>
                    {{-- Pagination numbering --}}
                    <td>{{ $classes->firstItem() + $loop->index }}</td>

                    <td>{{ $class->name ?? '-' }}</td>
                    <td>{{ $class->grade ?? '-' }}</td>

                    <td>
                        @if(!empty($class->status) && $class->status == 1)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>

                    <td>{{ $class->start_time ? date('h:i A', strtotime($class->start_time)) : '-' }}</td>

                    <td>{{ $class->start_date ?? '-' }}</td>

                    <td>
                        <a href="{{ route('classes.show', $class->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Delete this class?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No classes found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Attractive Pagination --}}
    <div class="mt-3 d-flex justify-content-center">
        <ul class="pagination pagination-sm">

            {{-- Previous --}}
            @if ($classes->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $classes->previousPageUrl() }}">Previous</a>
            </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($classes->getUrlRange(1, $classes->lastPage()) as $page => $url)
            @if ($page == $classes->currentPage())
            <li class="page-item active">
                <span class="page-link">{{ $page }}</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
            @endif
            @endforeach

            {{-- Next --}}
            @if ($classes->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $classes->nextPageUrl() }}">Next</a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
            @endif

        </ul>
    </div>

</div>
@endsection