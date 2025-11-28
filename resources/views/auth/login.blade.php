@extends('layouts.front')

@section('content')

<div class="row w-100 justify-content-center mt-4 mb-4">
    <div class="col-md-10 col-lg-8">

        <!-- MAIN CARD WRAPPER -->
        <div class="card shadow-lg border-0" style="border-top: 4px solid #3B82F6; border-radius: 14px;">
            <div class="card-body p-0">

                <div class="overflow-hidden" style="border-radius: 12px;">
                    <div class="row g-0">

                        <!-- Left illustration / welcome -->
                        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center"
                            style="background: linear-gradient(180deg, #ffffff, #f7fbff); border-radius: 12px 0 0 12px;">
                            <div class="p-4 text-center">
                                <img src="{{asset('public/assets-frontend/img/login.jpg') }}" alt="Logo" style="max-width: 200px;" class="mb-3">
                                <h4 class="mb-1">Welcome Back</h4>
                                <p class="text-muted mb-3">Sign in to access your courses, notes and live classes.</p>
                            </div>
                        </div>

                        <!-- Right: login form -->
                        <div class="col-12 col-md-6">
                            <div class="p-5">
                                <h3 class="mb-1">Student Login</h3>
                                <p class="text-muted mb-4">Use your student account to continue.</p>

                                @if(session('status'))
                                <div class="alert alert-success small">{{ session('status') }}</div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label small">Email</label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                            class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="you@school.edu">
                                        @error('email')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label small">Password</label>
                                        <input id="password" type="password" name="password" required
                                            class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="••••••••">
                                        @error('password')
                                        <div class="invalid-feedback small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label small" for="remember">Remember me</label>
                                        </div>
                                        <div>
                                            <a href="{{ route('password.request') }}" class="small">Forgot password?</a>
                                        </div>
                                    </div>

                                    <div class="d-grid mb-3">
                                        <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 8px;">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    (function() {
        const e = document.getElementById('email');
        if (e) e.focus();
    })();
</script>

@endsection