@extends('layouts.front')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height:64vh;">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5 d-flex bg-danger text-white align-items-center justify-content-center" style="background: linear-gradient(135deg,#b91c1c 0%,#ef4444 100%);">
                        <div class="text-center p-4">
                            <h1 class="display-1 fw-bold mb-0">500</h1>
                            <p class="lead mb-0">Server Error</p>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card-body p-4">
                            <h3 class="mb-2">Something went wrong</h3>
                            <p class="text-muted">We encountered an unexpected condition that prevented us from fulfilling your request. Our team has been notified — please try again later.</p>

                            <div class="mt-4 d-flex flex-wrap gap-2">
                                <a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Go Back</a>
                                <a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}" class="btn btn-outline-info">Contact Support</a>
                                <a href="{{ url()->current() }}" class="btn btn-light">Retry</a>
                            </div>

                            <hr class="my-3">

                            <form action="{{ url('/') }}" method="GET" class="mt-2">
                                <div class="input-group">
                                    <input type="search" name="q" class="form-control" placeholder="Search the site" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                </div>
                            </form>

                            <p class="small text-muted mt-3 mb-0">If the problem persists, please contact support at <a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}">{{ config('mail.from.address') ?? 'support@example.com' }}</a> and provide the URL and time of the error.</p>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center small text-muted mt-3">Error reference: <span class="text-monospace">{{ uniqid('err_') }}</span></p>
        </div>
    </div>
</div>
@endsection