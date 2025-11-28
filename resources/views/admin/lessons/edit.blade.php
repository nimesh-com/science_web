@extends('layouts.admin')

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Lesson</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label for="name">Lesson Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter lesson name" value="{{ old('name', $lesson->name) }}" required>
                @error('name')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="drive_link">Google Drive Link</label>
                <input type="url" name="drive_link" class="form-control @error('drive_link') is-invalid @enderror" id="drive_link" placeholder="Enter Google Drive shareable link" value="{{ old('drive_link', $lesson->drive_link) }}">
                <small class="form-text text-muted">Paste the shareable link from Google Drive.</small>
                @error('drive_link')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="expiration_date">Expiration Date</label>
                <input type="date" name="expiration_date" class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date" value="{{ old('expiration_date', $lesson->expiration_date ? $lesson->expiration_date->format('Y-m-d') : '') }}">
                @error('expiration_date')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="1" {{ old('status', $lesson->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $lesson->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Lesson</button>
        </div>
    </form>
</div>
<!-- /.card -->

@endsection
