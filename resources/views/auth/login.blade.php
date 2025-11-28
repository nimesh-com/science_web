@extends('layouts.front')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-sm overflow-hidden" style="border-radius:12px;">
                <div class="row g-0">
                    <!-- Illustration / promo -->
                    <div class="col-md-6 d-none d-md-flex align-items-center" style="background: linear-gradient(135deg,#4f46e5 0%,#06b6d4 100%); color:#fff;">
                        <div class="p-4 text-center w-100">
                            <img src="{{ asset('public/assets-frontend/img/login.png') }}" alt="Welcome" class="img-fluid mb-3" style="max-height:140px; opacity:0.95;">
                            <h3 class="mb-1 font-weight-bold">Welcome Back</h3>
                            <p class="small mb-3">Sign in to access your courses, live classes, notes and profile.</p>
                            <ul class="list-unstyled small text-left mx-auto" style="max-width:220px;">
                                <li class="mb-2"><i class="fas fa-check-circle mr-2"></i> Live classes</li>
                                <li class="mb-2"><i class="fas fa-check-circle mr-2"></i> Lecture videos</li>
                                <li class="mb-2"><i class="fas fa-check-circle mr-2"></i> Class notes</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Login form -->
                    <div class="col-12 col-md-6">
                        <div class="p-4 p-md-5">
                            <div class="mb-3 text-center">
                                <h4 class="mb-0">Student Login</h4>
                                <small class="text-muted">Use your student account to continue</small>
                            </div>

                            @if(session('status'))
                            <div class="alert alert-success small">{{ session('status') }}</div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label class="small font-weight-bold" for="email">Email</label>
                                    <input id="email" type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required autofocus
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="name@example.com">
                                    @error('email')
                                    <div class="invalid-feedback small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="small font-weight-bold" for="password">Password</label>
                                    <input id="password" type="password"
                                        name="password"
                                        required
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="Enter your password">
                                    @error('password')
                                    <div class="invalid-feedback d-block small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label small" for="remember">Remember me</label>
                                    </div>
                                    <div>
                                        <a href="{{ route('password.request') }}" class="small">Forgot password?</a>
                                    </div>
                                </div>

                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary btn-lg" style="border-radius:10px;">
                                        Sign in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- card -->
        </div>
    </div>
</div>
@endsection