 @extends('layouts.front')

 @section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @forelse($courses as $course)
            <div class="col-lg-4 col-md-6 wow fadeInUp d-flex" data-wow-delay="{{ 0.1 + ($loop->index * 0.2) }}s">
                <div class="course-item bg-light h-100 d-flex flex-column">
                    <div class="position-relative overflow-hidden" style="height:220px;">
                        <img class="img-fluid w-100 h-100" style="object-fit: cover;"
                            src="{{ $course->image ? asset('public/uploads/courses/' . $course->image) : asset('public/assets-frontend/img/course-1.jpg') }}"
                            alt="{{ $course->title ?? 'Course image' }}">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="{{ url('courses/'.$course->id) }}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="https://wa.me/713134617?text=Hello%20Sir,%20I%20want%20to%20join%20your%20Grade {{$course->grade}}%20Science%20Class" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Join Now</a>
                        </div>
                    </div>

                    <div class="text-center p-4 pb-0 flex-grow-1 d-flex flex-column">
                        <h3 class="mb-0">LKR {{ number_format($course->price ?? 0, 2, '.', ',') }}</h3>


                        <div class="mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <small class="fa fa-star {{ $i <= ($course->rating ?? 0) ? 'text-primary' : '' }}"></small>
                                @endfor
                                <small>({{ $course->reviews_count ?? 0 }})</small>
                        </div>

                        <h5 class="mt-auto mb-4">{{ $course->name ?? 'Untitled Course' }}</h5>
                    </div>

                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-user-tie text-primary me-2"></i>{{ $course->instructor ?? 'John Doe' }}
                        </small>
                        <small class="flex-fill text-center border-end py-2">
                            <i class="fa fa-clock text-primary me-2"></i>{{ $course->duration ?? '1.49 Hrs' }}
                        </small>
                        <small class="flex-fill text-center py-2">
                            <i class="fa fa-user text-primary me-2"></i>{{ $course->students_count ?? 0 }} Students
                        </small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">No courses found.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
  @endsection