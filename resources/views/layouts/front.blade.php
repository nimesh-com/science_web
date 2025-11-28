<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/assets-frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets-frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('public/assets-frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('public/assets-frontend/css/style.css')}}" rel="stylesheet">
</head>

<body>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>SmartScience</h2>
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- LEFT MENU ITEMS -->
            <div class="navbar-nav ms-auto me-3 p-4 p-lg-0 d-flex align-items-center">
                <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>

                <a href="{{ url('about') }}" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>

                <a href="{{ url('courses') }}" class="nav-item nav-link {{ request()->is('courses') ? 'active' : '' }}">Courses</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle 
                    {{ request()->is('team') || request()->is('testimonial') || request()->is('404') ? 'active' : '' }}"
                        data-bs-toggle="dropdown">
                        Pages
                    </a>

                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ url('team') }}" class="dropdown-item {{ request()->is('team') ? 'active' : '' }}">Our Team</a>

                        <a href="{{ url('testimonial') }}" class="dropdown-item {{ request()->is('testimonial') ? 'active' : '' }}">Testimonial</a>

                        <a href="{{ url('404') }}" class="dropdown-item {{ request()->is('404') ? 'active' : '' }}">404 Page</a>
                    </div>
                </div>

                <a href="{{ url('contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>

                @auth
                <a href="{{ url('/student/LMS') }}" class="nav-item nav-link {{ request()->is('student/LMS') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="nav-item nav-link {{ request()->is('login') ? 'active' : '' }}">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </a>
                @endauth
            </div>

            <!-- RIGHT SIDE LINK -->
            <div class="d-flex align-items-center px-4 pb-3 pb-lg-0">
                @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline ms-auto">
                    @csrf
                    <button type="submit" class="btn btn-primary py-2 px-4">
                        Logout <i class="fas fa-sign-out-alt ms-2"></i>
                    </button>
                </form>
                @else
                <a href="https://wa.me/713134617?text=Hello%20Sir,%20I%20want%20to%20join%20your%20Science%20Class"
                    target="_blank"
                    class="text-decoration-none d-flex align-items-center gap-1 ms-lg-2"
                    style="font-weight: 600; font-size: 16px; color: #25D366;">
                    Join Now <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                </a>
                @endauth
            </div>


        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Content -->

    @yield('content')

    <!-- End Content -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>--</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+94 71 313 4617</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@sciencelms.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://wa.me/713134617?text=Hello%20Sir,%20I%20want%20to%20join%20your%20Science%20Class"><i class="fab fa-whatsapp"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('public/assets-frontend/img/course-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('public/assets-frontend/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('public/assets-frontend/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('public/assets-frontend/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('public/assets-frontend/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('public/assets-frontend/img/course-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{url('/')}}">SmartScience</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="#">Nimesh Jayawickrama</a><br><br>

                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/assets-frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('public/assets-frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/assets-frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('public/assets-frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('public/assets-frontend/js/main.js')}}"></script>
</body>

</html>