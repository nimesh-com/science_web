@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Lesson</h3>
        <a href="{{ route('lessons.index') }}" class="btn btn-secondary btn-sm float-right">Back to Lessons</a>
    </div>

    <div class="card-body">
        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Lesson Name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Lesson Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $lesson->name) }}" required>
            </div>

            {{-- Drive Link --}}
            <div class="mb-3">
                <label for="drive_link" class="form-label">Google Drive Link</label>
                <input type="url" name="drive_link" id="drive_link" class="form-control" value="{{ old('drive_link', $lesson->drive_link) }}">
                <small class="form-text text-muted">Paste the shareable link from Google Drive.</small>
            </div>

            {{-- Expiration Date --}}
            <div class="mb-3">
                <label for="expire_date" class="form-label">Expiration Date</label>
                <input type="date" name="expiration_date" id="expiration_date" class="form-control" value="{{ old('expiration_date', $lesson->expiration_date ? $lesson->expiration_date->format('Y-m-d') : '') }}">
            </div>

            {{-- Status --}}
       <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select form-select-sm">
        <option value="1" {{ $lesson->status == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ $lesson->status == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>


            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Update Lesson</button>
        </form>
    </div>
</div>
@endsection
