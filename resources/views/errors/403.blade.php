@extends('layouts.front')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center" style="min-height:64vh;">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5 d-flex bg-warning align-items-center justify-content-center" style="background: linear-gradient(135deg,#f59e0b 0%,#f97316 100%); color:#fff;">
                        <div class="text-center p-4">
                            <h1 class="display-1 fw-bold mb-0">403</h1>
                            <p class="lead mb-0">Access Denied</p>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card-body p-4">
                            <h3 class="mb-2">You don't have permission to access this page</h3>
                            <p class="text-muted">This action is restricted. If you believe you should have access, contact your administrator or request the necessary permissions.</p>

                            <div class="mt-4 d-flex flex-wrap gap-2">
                                <a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Go Back</a>
                                <a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}" class="btn btn-outline-info">Contact Support</a>
                            </div>

                            <hr class="my-3">

                            <div class="small text-muted">
                                If you think this is an error, please include the page URL and time when contacting support.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center small text-muted mt-3">Need help? Email <a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}">{{ config('mail.from.address') ?? 'support@example.com' }}</a></p>
        </div>
    </div>
</div>
@endsection