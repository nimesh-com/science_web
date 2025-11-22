@extends('layouts.admin')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Class</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('classes.update', $class->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label for="name">Class Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter class name" value="{{ old('name', $class->name) }}">
                @error('name')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="grade">Grade</label>
                <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror">
                    <option value="">Select Grade</option>
                    @for ($i = 6; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ (old('grade', $class->grade) == $i) ? 'selected' : '' }}>Grade {{ $i }}</option>
                        @endfor
                </select>
                @error('grade')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Class Link</label>
                <input type="url" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Enter class link" value="{{ old('link', $class->link) }}">
                @error('link')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="instructor">Instructor Name</label>
                <input type="text" name="instructor" class="form-control @error('instructor') is-invalid @enderror" id="instructor" placeholder="Enter instructor name" value="{{ old('instructor', $class->instructor) }}">
                @error('instructor')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="mode">Mode</label>
                <select name="mode" id="mode" class="form-control @error('mode') is-invalid @enderror">
                    <option value="">Select Mode</option>
                    <option value="online" {{ (old('mode', $class->mode) == 'online') ? 'selected' : '' }}>Online</option>
                    <option value="offline" {{ (old('mode', $class->mode) == 'offline') ? 'selected' : '' }}>Offline</option>
                </select>
                @error('mode')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <input type="hidden" name="status" value="0">
            <div class="custom-control custom-switch">
                <input type="checkbox" name="status" class="custom-control-input" id="status" value="1" {{ (old('status', $class->status)) ? 'checked' : '' }}>
                <label class="custom-control-label" for="status">Active Status</label>
            </div>


            <div class="form-group">
                <label for="date">Start Date</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="date" value="{{ old('start_date', $class->start_date) }}">
                @error('start_date')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="time">Start Time</label>
                <input type="time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" id="time" value="{{ old('start_time', $class->start_time) }}">
                @error('start_time')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Class</button>
        </div>
    </form>
</div>
@endsection