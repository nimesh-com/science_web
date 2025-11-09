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
                    <td>{{ $loop->iteration + ($classes->firstItem() ? $classes->firstItem() - 1 : 0) }}</td>
                    <td>{{ $class->name ?? '-' }}</td>
                    <td>{{ $class->grade ?? '-' }}</td>
                    <td>
                        @if(!empty($class->active) && $class->active)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $class->time ?? '-' }}</td>
                    <td>{{ $class->date ?? '-' }}</td>
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
</div>
@endsection
