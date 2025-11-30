
@extends('layouts.front')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Live Classes</h3>
        <a href="{{ route('LMS') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>

    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if(isset($classes) && $classes->count())
        <div class="row">
            @foreach($classes as $class)
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1">{{ $class->name ?? 'Class' }}</h5>
                            <p class="mb-1 text-muted small">
                                Grade - {{ $class->grade ?? ($class->course ?? '-') }}
                            </p>
                            <p class="mb-2">
                                <strong>Teacher:</strong> {{ $class->instructor ?? $class->teacher->name ?? '-' }}
                            </p>
                            <p class="mb-2">
                                <strong>Schedule:</strong>
                                {{ optional($class->start_date)->format('M d, Y H:i') ?? ($class->start_date ?? '-') }}
                            </p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                @if(!empty($class->is_live) || (!empty($class->starts_at) && \Carbon\Carbon::now()->between($class->starts_time, optional($class->ends_at))) )
                                    <span class="badge badge-success">Live</span>
                                @elseif(!empty($class->starts_time) && \Carbon\Carbon::now()->lt($class->starts_time))
                                    <span class="badge badge-warning">Upcoming</span>
                                @else
                                    <span class="badge badge-secondary">Recorded</span>
                                @endif

                                @php
                                    $joinUrl = $class->link ?? $class->link ?? route('student.live.join', $class->id ?? 0);
                                @endphp

                                <div>
                                    <a href="{{ $joinUrl }}" target="_blank" class="btn btn-sm btn-primary">
                                        Join Class
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(method_exists($classes, 'links'))
            <div class="mt-3">{{ $classes->links() }}</div>
        @endif

    @else
        <div class="alert alert-info">No live classes available right now.</div>
    @endif
</div>

@endsection