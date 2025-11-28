@extends('layouts.admin')
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Student</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('students.update', $student->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="card-body">

            <div class="form-group">
                <label for="grade">Grade</label>
                <select name="grade" id="grade" class="form-control @error('grade') is-invalid @enderror">
                    <option value="">Select Grade</option>
                    @for ($i = 6; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ (old('grade', $student->grade) == $i) ? 'selected' : '' }}>Grade {{ $i }}</option>
                    @endfor
                </select>
                @error('grade')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="full_name" placeholder="Enter full name" value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone number" value="{{ old('phone', $student->phone) }}">
                @error('phone')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email', $student->email) }}" readonly>
                <small class="form-text text-muted">Email cannot be changed</small>
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address">{{ old('address', $student->address) }}</textarea>
                @error('address')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="admission_no">Admission No</label>
                <input type="text" name="admission_no" class="form-control @error('admission_no') is-invalid @enderror" id="admission_no" placeholder="Enter admission number" value="{{ old('admission_no', $student->admission_no ?? $student->admission_number) }}" readonly>
                <small class="form-text text-muted">Admission number cannot be changed</small>
                @error('admission_no')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="active" id="status" class="form-control @error('active') is-invalid @enderror">
                    <option value="1" {{ old('active', $student->active) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('active', $student->active) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('active')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </div>
    </form>
</div>
<!-- /.card -->

@endsection
