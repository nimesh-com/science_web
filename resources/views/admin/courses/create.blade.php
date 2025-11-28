
@extends('layouts.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Course</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter course name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="grade">Grade</label>
                <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror">
                    <option value="">Select Grade</option>
                    @for ($i = 6; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ old('grade') == $i ? 'selected' : '' }}>Grade {{ $i }}</option>
                    @endfor
                </select>
                @error('grade')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="instructor">Instructor</label>
                <input type="text" name="instructor" class="form-control @error('instructor') is-invalid @enderror" id="instructor" placeholder="Enter instructor name" value="{{ old('instructor') }}">
                @error('instructor')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="study_mode">Study Mode</label>
                <select name="study_mode" id="study_mode" class="form-control @error('study_mode') is-invalid @enderror">
                    <option value="">Select Study Mode</option>
                    <option value="Online" {{ old('study_mode') == 'Online' ? 'selected' : '' }}>Online</option>
                    <option value="Offline" {{ old('study_mode') == 'Offline' ? 'selected' : '' }}>Offline</option>
                    <option value="Hybrid" {{ old('study_mode') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
                @error('study_mode')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Course Image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" accept="image/*">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @error('image')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                <small class="form-text text-muted">Supported: JPG, PNG, GIF (Max 2MB)</small>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Course</button>
        </div>
    </form>
</div>
<!-- /.card -->

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
        e.target.nextElementSibling.textContent = fileName;
    });
</script>

@endsection