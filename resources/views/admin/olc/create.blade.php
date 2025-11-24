@extends('layouts.admin')
@section('content')
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Create Class</h3>
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

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('classes.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">

            <div class="form-group">
                <label for="name">Class Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter class name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="grade">Grade</label>
                <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror">
                    <option value="">Select Grade</option>
                    @for ($i = 6; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ old('grade') == $i ? 'selected' : '' }}>Grade {{ $i }}</option>
                        @endfor
                </select>
                @error('grade')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Class Link</label>
                <input type="url" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Enter class link" value="{{ old('link') }}">
                @error('link')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="instructor">Instructor Name</label>
                <input type="text" name="instructor" class="form-control @error('instructor') is-invalid @enderror" id="instructor" placeholder="Enter instructor name" value="{{ old('instructor') }}">
                @error('instructor')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="mode">Mode</label>
                <select name="mode" id="mode" class="form-control @error('mode') is-invalid @enderror">
                    <option value="">Select Mode</option>
                    <option value="online" {{ old('mode') == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="offline" {{ old('mode') == 'offline' ? 'selected' : '' }}>Offline</option>
                </select>
                @error('mode')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="date">Start Date</label>
                <input type="date" name="start_date" class="form-control @error('date') is-invalid @enderror" id="date" value="{{ old('date') }}">
                @error('start_date')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="time">Start Time</label>
                <input type="time" name="start_time" class="form-control @error('time') is-invalid @enderror" id="time" value="{{ old('time') }}">
                @error('start_time')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Class</button>
        </div>
    </form>
</div>
<!-- /.card -->
@endsection