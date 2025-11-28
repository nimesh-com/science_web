 @extends('layouts.front')

 @section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{asset('public/assets-frontend/img/about.jpg')}}" alt="Grade 10 Science" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About the Course</h6>
                <h1 class="mb-4">Grade 10 Science — Interactive Online Classes</h1>

                <p class="mb-3">
                    This Grade 10 Science course is designed to build a strong foundation in Biology, Chemistry and Physics while aligning with the national syllabus.
                    Students will gain clear conceptual understanding, practical skills and exam-ready problem solving through a mix of live lessons,
                    recorded lectures and virtual practicums.
                </p>

                <p class="mb-3">
                    The course focuses on making abstract ideas tangible: hands-on demonstrations (virtual and guided home experiments),
                    step-by-step worked examples, formative quizzes and regular revision sessions prepare learners for school tests and board exams.
                </p>

                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Aligned to Grade 10 curriculum</p>
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
 @endsection