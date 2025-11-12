@extends('layouts.admin')
@section('content')
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Register Student</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('students.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">

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
                <label for="full_name">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="full_name" placeholder="Enter full name" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}">
                @error('phone')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') }}">
                @error('email')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">{{ old('address') }}</textarea>
                @error('address')
                <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="active" class="custom-control-input" id="active" value="1" {{ old('active') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="active">Active Status</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>
<!-- /.card -->
@endsection