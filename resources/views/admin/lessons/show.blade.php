@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h1 class="m-0">Lesson Details</h1>
            <div>
                <a href="{{ route('lessons.index') }}" class="btn btn-sm btn-secondary">Back to Lessons</a>
                <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
                        <h3 class="card-title">{{ $lesson->name ?? '—' }}</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th style="width:180px">Lesson Name</th>
                                    <td>{{ $lesson->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Google Drive Link</th>
                                    <td>
                                        @if(!empty($lesson->slug))
                                        <a href="{{ $lesson->slug }}" target="_blank" class="btn btn-sm btn-info">
                                            <i class="fas fa-external-link-alt"></i> View File
                                        </a>
                                        @else
                                        <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Expiration Date</th>
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
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if(!empty($lesson->status) && $lesson->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created Date</th>
                                    <td>{{ optional($lesson->created_at)->format('M d, Y H:i') ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ optional($lesson->updated_at)->format('M d, Y H:i') ?? '-' }}</td>
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
                        @if(!empty($lesson->slug))
                        <a href="{{ $lesson->slug }}" target="_blank" class="btn btn-info btn-block mb-2">
                            <i class="fas fa-download"></i> Download from Drive
                        </a>
                        @endif

                        <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning btn-block mb-2">
                            <i class="fas fa-edit"></i> Edit Lesson
                        </a>

                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lesson?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-block mb-2" type="submit">
                                <i class="fas fa-trash"></i> Delete Lesson
                            </button>
                        </form>

                        <a href="{{ route('lessons.index') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection