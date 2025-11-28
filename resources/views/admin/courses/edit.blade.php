@extends('layouts.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Course</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter course name" value="{{ old('name', $course->name) }}" required>
                @error('name')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="grade">Grade</label>
                <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror">
                    <option value="">Select Grade</option>
                    @for ($i = 6; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ old('grade', $course->grade) == $i ? 'selected' : '' }}>Grade {{ $i }}</option>
                        @endfor
                </select>
                @error('grade')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="instructor">Instructor</label>
                <input type="text" name="instructor" class="form-control @error('instructor') is-invalid @enderror" id="instructor" placeholder="Enter instructor name" value="{{ old('instructor', $course->instructor) }}">
                @error('instructor')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="study_mode">Study Mode</label>
                <select name="study_mode" id="study_mode" class="form-control @error('study_mode') is-invalid @enderror">
                    <option value="">Select Study Mode</option>
                    <option value="Online" {{ old('study_mode', $course->study_mode) == 'Online' ? 'selected' : '' }}>Online</option>
                    <option value="Offline" {{ old('study_mode', $course->study_mode) == 'Offline' ? 'selected' : '' }}>Offline</option>
                    <option value="Hybrid" {{ old('study_mode', $course->study_mode) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                </select>
                @error('study_mode')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">LKR</span>
                    </div>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter course price" value="{{ old('price', $course->price) }}" step="0.01" min="0">
                </div>
                @error('price')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
                <small class="form-text text-muted">Enter price in decimal format (e.g., 99.99)</small>
            </div>

            <div class="form-group">
                <label for="image">Course Image</label>
                @if(!empty($course->image))
                <div class="mb-2">
                    <img src="{{ asset('public/uploads/courses/' . $course->image) }}" alt="{{ $course->name }}" class="img-thumbnail" style="max-height:100px;">
                </div>
                @endif
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" accept="image/*">
                    <label class="custom-file-label" for="image">{{ !empty($course->image) ? 'Change image' : 'Choose file' }}</label>
                </div>
                @error('image')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
                <small class="form-text text-muted">Supported: JPG, PNG, GIF (Max 2MB)</small>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="1" {{ old('status', $course->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $course->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Course</button>
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