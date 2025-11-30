@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Lessons</h3>
        <a href="{{ route('lessons.create') }}" class="btn btn-primary btn-sm">Create New Lesson</a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover text-nowrap">
            <thead class="table-light">
                <tr>
                    <th style="width: 40px">#</th>
                    <th>Lesson Name</th>
                    <th>Drive Link</th>
                    <th>Expiration Date</th>
                    <th>Status</th>
                    <th style="width: 200px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lessons as $lesson)
                <tr>
                    {{-- Pagination numbering --}}
                    <td>{{ $lessons->firstItem() + $loop->index }}</td>

                    <td>{{ $lesson->name ?? '-' }}</td>

                    <td>
                        @if($lesson->slug)
                        <a href="{{ $lesson->slug }}" target="_blank" class="btn btn-sm btn-info">
                            View File
                        </a>
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($lesson->formatted_expiration)
                        {{ $lesson->formatted_expiration }}
                        @if($lesson->is_expired)
                        <span class="badge bg-danger ms-2">Expired</span>
                        @endif
                        @else
                        -
                        @endif
                    </td>


                    <td>
                        @if(!empty($lesson->status) && $lesson->status == 1)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this lesson?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No lessons found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-3 d-flex justify-content-center">
        <ul class="pagination pagination-sm">

            {{-- Previous --}}
            @if ($lessons->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $lessons->previousPageUrl() }}">Previous</a></li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($lessons->getUrlRange(1, $lessons->lastPage()) as $page => $url)
            @if ($page == $lessons->currentPage())
            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach

            {{-- Next --}}
            @if ($lessons->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $lessons->nextPageUrl() }}">Next</a></li>
            @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
            @endif

        </ul>
    </div>
</div>
@endsection