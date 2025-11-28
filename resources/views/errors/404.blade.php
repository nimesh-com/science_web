@extends('layouts.front')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height:60vh;">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="row g-0">
                    <div class="col-md-5 d-flex bg-light align-items-center justify-content-center">
                        <div class="text-center p-4">
                            <h1 class="display-1 text-primary mb-1">404</h1>
                            <p class="lead mb-0 text-muted">Page Not Found</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body p-4">
                            <h3 class="mb-2">Oops — we can't find that page</h3>
                            <p class="text-muted">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>

                            <div class="mt-4 d-flex flex-wrap gap-2">
                                <a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Go Back</a>
                                <a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}" class="btn btn-outline-info">Contact Support</a>
                            </div>

                            <hr>

                            <form action="{{ url('/') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="search" name="q" class="form-control" placeholder="Search the site" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center small text-muted mt-3">If you believe this is an error, please <a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}">report it</a>.</p>
        </div>
    </div>
</div>
@endsection