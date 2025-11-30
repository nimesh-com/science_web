@extends('layouts.front')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-0">Contact Us</h2>
                    <p class="text-muted small mb-0">We're here to help — send us a message and we'll get back to you soon.</p>
                </div>
                <a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}" class="btn btn-outline-primary btn-sm">Email Support</a>
            </div>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <!-- Contact Form -->
                        <div class="col-md-7">
                            <h5 class="mb-3">Send a message</h5>
                            <form action="{{ route('contact.send') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="small font-weight-bold">Full name</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                        @error('name') <div class="invalid-feedback small">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email" class="small font-weight-bold">Email</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                        @error('email') <div class="invalid-feedback small">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class="small font-weight-bold">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required>
                                    @error('subject') <div class="invalid-feedback small">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="message" class="small font-weight-bold">Message</label>
                                    <textarea name="message" id="message" rows="6" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                                    @error('message') <div class="invalid-feedback small">{{ $message }}</div> @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">We aim to reply within 48 hours.</small>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>

                        <!-- Contact Info -->
                        <div class="col-md-5">
                            <h5 class="mb-3">Contact Information</h5>

                            <div class="mb-3">
                                <h6 class="mb-1">Office</h6>
                                <p class="small text-muted mb-0">{{ config('app.name') ?? 'School' }}<br>
                                    123 Main Street, City, Country</p>
                            </div>

                            <div class="mb-3">
                                <h6 class="mb-1">Phone</h6>
                                <p class="small text-muted mb-0"><a href="tel:+1234567890">+1 234 567 890</a></p>
                            </div>

                            <div class="mb-3">
                                <h6 class="mb-1">Email</h6>
                                <p class="small text-muted mb-0"><a href="mailto:{{ config('mail.from.address') ?? 'support@example.com' }}">{{ config('mail.from.address') ?? 'support@example.com' }}</a></p>
                            </div>

                            <div class="mb-3">
                                <h6 class="mb-1">Office Hours</h6>
                                <p class="small text-muted mb-0">Mon - Fri: 09:00 — 17:00<br>Sat: 10:00 — 14:00</p>
                            </div>

                            <div class="mt-4">
                                <h6 class="mb-2">Find us</h6>
                                <div class="border rounded overflow-hidden" style="height:180px;">
                                    <!-- optional: replace src with real embed -->
                                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126739.68345824206!2d79.84508000635016!3d6.936519925201383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1764356654405!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>

                        </div>
                    </div> <!-- row -->
                </div> <!-- card-body -->
            </div> <!-- card -->

        </div>
    </div>
</div>

@endsection