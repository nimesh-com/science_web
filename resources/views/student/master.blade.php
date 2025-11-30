@extends('layouts.front')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('public/assets-frontend/img/carousel-1.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Science Courses</h5>
                            <h1 class="display-3 text-white animated slideInDown">The Best Online Learning Platform</h1>
                            <p class="fs-5 text-white mb-4 pb-2">
                                Interactive online science classes for Grades 6–11. Access past lessons, practicals, and cutting-edge learning both online and in-person.
                            </p>

                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="https://wa.me/713134617?text=Hello%20Sir,%20I%20want%20to%20join%20your%20Science%20Class" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{asset('public/assets-frontend/img/carousel-2.jpg')}}" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-sm-10 col-lg-8">
                            <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Science Courses</h5>
                            <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                            <p class="fs-5 text-white mb-4 pb-2">
                                Interactive online science classes for Grades 6–10. Access past lessons, practicals, and cutting-edge learning both online and in-person. </p>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            <a href="https://wa.me/713134617?text=Hello%20Sir,%20I%20want%20to%20join%20your%20Science%20Class" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-microscope text-primary mb-4"></i>
                        <h5 class="mb-3">Virtual Labs</h5>
                        <p>Interactive virtual experiments and practical demonstrations aligned with Grade 10 curriculum</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-video text-primary mb-4"></i>
                        <h5 class="mb-3">Live Classes</h5>
                        <p>Real-time interactive sessions with expert science instructors covering Biology, Chemistry & Physics</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-flask text-primary mb-4"></i>
                        <h5 class="mb-3">Hands-on Experiments</h5>
                        <p>Guided home experiments with step-by-step demonstrations for practical learning</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                        <h5 class="mb-3">Progress Tracking</h5>
                        <p>Regular quizzes, assessments and detailed progress reports to monitor student performance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{asset('public/assets-frontend/img/about.jpg')}}" alt="Grade 6-11 Science" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About the Course</h6>
                <h1 class="mb-4">Grade 06 - 11 Science — Interactive Online Classes</h1>

                <p class="mb-3">
                    This Grade 6-11 Science course is designed to build a strong foundation in Biology, Chemistry and Physics while aligning with the national syllabus.
                    Students will gain clear conceptual understanding, practical skills and exam-ready problem solving through a mix of live lessons,
                    recorded lectures and virtual practicums.
                </p>

                <p class="mb-3">
                    The course focuses on making abstract ideas tangible: hands-on demonstrations (virtual and guided home experiments),
                    step-by-step worked examples, formative quizzes and regular revision sessions prepare learners for school tests and board exams.
                </p>

                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Aligned to Grade 6-11 curriculum</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Live interactive classes & recorded lessons</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Virtual labs & practical demonstrations</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Step-by-step exam strategies</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Regular quizzes & progress reports</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Small-group doubt clearing</p>
                    </div>
                </div>

                <h5 class="mb-2">What students will learn</h5>
                <ul class="mb-3" style="padding-left: 1rem;">
                    <li>Core concepts in Cells & Life Processes, Matter & Chemical Reactions, Forces, Energy & Waves.</li>
                    <li>Apply scientific method: observe, hypothesise, experiment, record and conclude.</li>
                    <li>Solve numerical problems, interpret graphs and design basic experiments.</li>
                    <li>Develop critical thinking for higher secondary science and competitive exams.</li>
                </ul>

                <a class="btn btn-primary py-3 px-5 mt-2 me-2" href="">Read More</a>
                <a class="btn btn-light py-3 px-5 mt-2" href="https://wa.me/713134617?text=Hello%20Sir,%20I%20want%20to%20join%20Grade%2010%20Science%20Class">Join Now</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Categories Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
            <h1 class="mb-5">Courses Categories</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{asset('public/assets-frontend/img/cat-1.jpg')}}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Online Courses</h5>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{asset('public/assets-frontend/img/cat-2.jpg')}}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">physical Courses</h5>

                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{asset('public/assets-frontend/img/cat-3.jpg')}}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Online Courses</h5>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                <a class="position-relative d-block h-100 overflow-hidden" href="">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{asset('public/assets-frontend/img/cat-4.jpg')}}" alt="" style="object-fit: cover;">
                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                        <h5 class="m-0">Practical Courses</h5>

                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Categories Start -->


<!-- Courses Start -->
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
<!-- Courses End -->


<!-- Team Start -->
<div class="container-xxl  py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
            <h1 class="mb-5">Expert Instructors</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{asset('public/assets-frontend/img/instructor.jpg')}}" alt="">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        <div class="bg-light d-flex justify-content-center pt-2 px-1">
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Sumith Wijewardana</h5>
                        <small>Science Lecture</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Help</h6>
            <h1 class="mb-5">Frequently Asked Questions</h1>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">
                                How do I join a class?
                            </button>
                        </h2>
                        <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can join by clicking the "Join Now" button on any course card or by contacting us on WhatsApp. We'll guide you through enrollment and payment.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                                Are recordings available after live classes?
                            </button>
                        </h2>
                        <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes — recorded lessons are provided to enrolled students so you can review topics anytime. Access is available in your student dashboard.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeadingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                                What grades do you cover and how are practicals handled?
                            </button>
                        </h2>
                        <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We cover Grades 6–11 across Biology, Chemistry and Physics. Practicals are delivered via virtual labs, guided home experiments and demonstration videos.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="bg-light h-100 p-4 d-flex flex-column justify-content-center align-items-start">
                    <h5 class="mb-3">Still have questions?</h5>
                    <p class="mb-3">Contact us directly for personalized help or quick enrollment assistance.</p>

                    <a href="https://wa.me/713134617?text=Hello%20Sir,%20I%20have%20a%20question%20about%20the%20courses" class="btn btn-primary mb-2">
                        Ask on WhatsApp
                    </a>

                    <a href="mailto:info@example.com" class="btn btn-outline-primary mb-3">Email Us</a>

                    <small class="text-muted">Or call: +94 71 313 4617</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


@endsection