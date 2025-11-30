@extends('layouts.front')
@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Lecture Videos</h3>
        <a href="{{ route('LMS') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>

    @if(session('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
    @endif

    @if(isset($videos) && $videos->count())
    <div class="row">
        @foreach($videos as $video)
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card h-100">
                @if(!empty($video->thumbnail_url) || !empty($video->thumbnail_path))
                <img src="{{ $video->thumbnail_url ?? asset('storage/' . $video->thumbnail_path) }}" class="card-img-top" alt="{{ $video->title ?? 'Video' }}">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-1">{{ $video->name ?? 'Untitled Video' }}</h5>
                    <p class="mb-2 text-muted small">
                        {{ \Illuminate\Support\Str::limit($video->description ?? '', 120) }}
                    </p>

                    <ul class="list-inline text-muted small mb-3">
                        <li class="list-inline-item">
                            <strong>Uploaded:</strong>
                            {{ optional($video->created_at)->format('M d, Y') ?? '-' }}
                        </li>
                        @if(!empty($video->duration))
                        <li class="list-inline-item">• {{ $video->duration }}</li>
                        @endif
                        @if(!empty($video->name))
                        <li class="list-inline-item">• {{ $video->name }}</li>
                        @endif
                    </ul>

                    <div class="mt-auto d-flex justify-content-between">
                        @php
                        $videoUrl = $video->slug ?? ($video->video_path ? asset('storage/' . $video->video_path) : null);
                        @endphp

                        @if($video->status == 1 && $videoUrl)
                        <a href="{{ $videoUrl }}" target="_blank" class="btn btn-sm btn-primary">Watch</a>

                        @elseif($video->status == 0)
                        <button class="btn btn-sm btn-warning" disabled>Currently Unavailable</button>

                        @else
                        <button class="btn btn-sm btn-secondary" disabled>No Video</button>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(method_exists($videos, 'links'))
    <div class="mt-3">{{ $videos->links() }}</div>
    @endif

    @else
    <div class="alert alert-info">No lecture videos available right now.</div>
    @endif
</div>

@endsection