<!DOCTYPE html>

<html lang="en">

<!-- Head -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIRPARQ</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Themenix.com">
    <link href="{{asset('account/img/logos/logo.png')}}" rel="shortcut icon" type="image/png">
    <link href="{{asset('account/css/theme-1.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-3.min.css')}}" rel="stylesheet">
</head>

<!-- /Head -->

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- /Preloader -->
    <!-- Header -->
        <header id="header" data-aos="fade">
        <!-- Header Topbar -->
        {{-- <div class="header-topbar">
            <div class="container">
                <div class="row g-0">
                    <div class="col-6 col-xl-7 col-md-8">
                        <div class="d-flex align-items-center">
                            <a href="tel:+84966704132">
                                <i class="hicon hicon-telephone me-1"></i>
                                <span>+33 321-654-987</span>
                            </a>
                            <span class="vr bg-white d-none d-md-inline ms-3 me-3"></span>
                            <a href="mailto:" class="d-none d-md-inline">
                                <i class="hicon hicon-email-envelope me-1"></i>
                                <span>Booking@example.com</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        <!-- /Header Topbar -->

        <!-- Header Navbar -->
        <div class="header-navbar" style="background-color:#FFD31C">
            <nav class="navbar navbar-expand-xl">
                <div class="container">
                    <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="hicon hicon-bold hicon-hamburger-menu"></i>
                    </button>
                    <a class="navbar-brand" href="index.html" >
                        <img src="{{asset('account/img/logos/logo.png')}}" alt="" style="width:200px;height:60px">
                    </a>
                    <div class="offcanvas offcanvas-navbar offcanvas-start border-end-0" tabindex="-1" id="offcanvasNavbar">
                        <div class="offcanvas-header border-bottom p-4 p-xl-0">
                            <a href="index.html" class="d-inline-block">
                                <img src="{{asset('account/img/logos/menu-logo.png')}}" srcset="{{asset('account/img/logos/menu-logo%402x.png')}} 2x" alt="">
                            </a>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-4 p-xl-0">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle-hover active" href="{{route('/')}}" data-bs-display="static">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle-hover" href="{{route('aboutus')}}" data-bs-display="static">
                                        <span>About Us</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle-hover" href="{{route('howitworks')}}" data-bs-display="static">
                                        <span>How It Works</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle-hover" href="{{route('contactus')}}" data-bs-display="static">
                                        <span>Contact Us</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                     <div class="hero-action">
                        <a href="{{route('showbooking')}}" class="btn btn-outline-light btn-uppercase mnw-180 me-4">
                            <span>BOOK NOW</span>
                        </a>
                    </div>
                    <div class="dropdown user-menu ms-xl-auto">
                        <button class="circle-icon circle-icon-link circle-icon-link-hover" data-bs-toggle="dropdown" data-bs-display="static">
                            <i class="hicon hicon-mmb-account"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end animate slideIn" data-bs-popper="static">
                            <li>
                                <a class="dropdown-item" href="register.html">
                                    <i class="hicon hicon-edit me-1"></i>
                                    <span>Register</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="login.html">
                                    <i class="hicon hicon-aps-lock me-1"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- /Header Navbar -->

    </header>
    <!-- /Header -->

    <!-- Main -->
    <main>

        <!-- Title -->
        <section class="hero" data-aos="fade">
            <div class="hero-bg">
                <img src="{{asset('account/img/hero/bread-bg8.jpg')}}" alt="">
            </div>
            <div class="bg-content container">
                <div class="hero-page-title">
                    <span class="hero-sub-title">About Us</span>
                    <h1 class="display-3 hero-title">
                        Discover the AIRPARQ Difference
                    </h1>
                </div>

            </div>
        </section>
        <!-- /Title -->


        <!-- About -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12 col-xl-6 order-1 order-xl-0">
                        <!-- Image -->
                        <div class="image-info image-info-vertical me-xl-5">
                            <div class="image-center rounded">
                                <img src="{{asset('account/img/img24.jpg')}}" class="w-100" alt="">
                            </div>
                        </div>
                        <!-- /Image -->
                    </div>
                    <div class="col-12 col-xl-6 order-0 order-xl-1">
                        <!-- Content -->
                        <div class="pt-xl-4 mb-xl-0 mb-5">
                            <div class="block-title">
                                <h2 class="h1 title lh-sm">About Us</h2>
                                 <small class="sub-title">AIRPARQ originated from a vision to transform airport parking.</small>
                            </div>
                            <p>
                                Confronted with the challenges of conventional parking facilities, our founders identified an opportunity to develop a solution centred on convenience and customer contentment.
                            </p>
                            <p>
                            From our establishment, our objective has been to streamline travel for all, one parking space at a time.</p>
                            </p>
                            <p>
                                At AIRPARQ, our principles steer all our actions. Reliability, convenience, and customer satisfaction lie at the core of our operations. We are committed to surpassing your expectations, ensuring the peace of mind you rightly deserve when entrusting us with your vehicle.
                            </p>

                        </div>
                        <!-- /Content -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /About -->

        <!-- Why -->
        <section class="hero" data-aos="fade">
            <div class="hero-bg">
                {{-- <img src="{{asset('account/img/background/b6.jpg')}}" srcset="{{asset('account/img/background/b6%402x.jpg')}} 2x" alt=""> --}}
            </div>
            <div class="bg-content container">
                <div class="p-top-90 p-bottom-50">
                    <div class="block-title text-center pb-4">
                        <small class="sub-title">Great experience</small>
                        <h2 class="h1 title text-white">Why choose us</h2>
                    </div>
                    <div class="why-slider splide splide__pagination__start w-100 mb-5 mb-xl-0">
                        <div class="splide__track pt-2 pb-2">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="transparent-card rounded hover-effect">
                                        <div class="card-icon">
                                            <i class="hicon hicon-family-with-teens"></i>
                                        </div>
                                        <h3 class="h5 card-title">Who We Are?</h3>
                                        <p class="card-desc">
                                            AIRPARQ: Seamlessly Simplifying Airport Parking with Our Meet and Greet Service Experience.
                                        </p>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="transparent-card rounded hover-effect">
                                        <div class="card-icon">
                                            <i class="hicon hicon-regular-travel-protection"></i>
                                        </div>
                                        <h3 class="h5 card-title">What We Do?</h3>
                                        <p class="card-desc">
                                            We Provide Secure Parking Solutions, Allowing Travellers To Drop Off Vehicles At The Terminal.
                                        </p>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="transparent-card rounded hover-effect">
                                        <div class="card-icon">
                                            <i class="hicon hicon-tours"></i>
                                        </div>
                                        <h3 class="h5 card-title">Our Mission</h3>
                                        <p class="card-desc">
                                            Transforming Airport Parking for Hassle-Free Travel, Prioritising Convenience and Peace of Mind.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Why -->

         <!-- About -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row g-0">
                      <div class="col-12 col-xl-6 order-0 order-xl-1">
                          <!-- Image -->
                        <div class="image-info image-info-vertical me-xl-5">
                            <div class="image-center rounded">
                                <img src="{{asset('account/img/airparq-certificate.png')}}" class="w-100" alt="">
                            </div>
                        </div>
                        <!-- /Image -->

                    </div>
                    <div class="col-12 col-xl-6 order-1 order-xl-0">

                         <!-- Content -->
                        <div class="pt-xl-4 mb-xl-0 mb-5">
                            <div class="block-title">
                                <h2 class="h1 title lh-sm">The Safer Parking Award</h2>
                            </div>
                            <p>
                                 Airparq Ltd is proud to announce that we have been awarded the prestigious Safer Parking Award issued by Park Mark. This accolade is a testament to our commitment to providing a secure and high-quality parking environment.
                            </p>
                            </p>
                                By meeting the rigorous standards of the Safer Parking Scheme, Airparq Ltd ensures effective surveillance, quality management, appropriate lighting, and a clean environment, all contributing to a safer experience for our customers. This police-accredited recognition demonstrates our dedication to maintaining a top-tier facility that prioritises the safety and well-being of everyone who parks with us.
                            </p>

                        </div>
                        <!-- /Content -->
                    </div>

                </div>
            </div>
        </section>
        <!-- /About -->
    </main>
    <!-- /Main -->

    <!-- Footer -->
    <footer class="footer p-top-90 p-bottom-90" data-aos="fade">

        <!-- Footer top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-3 col-md-6">
                        <!-- Brand -->
                        <div class="footer-widget">
                            <a href="index.html" class="brand-img">
                                <img class="me-4" src="{{asset('account/img/logos/logo.png')}}" style="width:200px;height:60px" alt="">
                            </a>
                            <p class="brand-desc">
                                <em>
                                    Moliva Travel Agency offers unique and memorable tours, providing rich experiences in the beautiful country of Moliva.
                                </em>
                                <a href="about.html">[+]</a>
                            </p>
                            <ul class="social-list">
                                <li class="social-item">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke-width="1.75" stroke="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="social-item">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="none" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path>
                                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="social-item">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" stroke-width="1.75" stroke="none" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M3 5m0 4a4 4 0 0 1 4 -4h10a4 4 0 0 1 4 4v6a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4z"></path>
                                            <path d="M10 9l5 3l-5 3z"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="social-item">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" stroke-width="1.75" stroke="none" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 20l4 -9"></path>
                                            <path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7"></path>
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li class="social-item">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" stroke-width="1.75" stroke="none" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M6.5 13.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                                            <path d="M17.5 13.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"></path>
                                            <path d="M17.5 9a4.5 4.5 0 1 0 3.5 1.671l1 -1.671h-4.5z"></path>
                                            <path d="M6.5 9a4.5 4.5 0 1 1 -3.5 1.671l-1 -1.671h4.5z"></path>
                                            <path d="M10.5 15.5l1.5 2l1.5 -2"></path>
                                            <path d="M9 6.75c2 -.667 4 -.667 6 0"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Brand -->
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <!-- Contact Info -->
                        <div class="footer-widget">
                            <h2 class="h4 pb-3">Contact Info</h2>
                            <div class="contact-info">
                                <p>
                                    <span>No 234, Placer Loquen Marsei Niriva, Moliva.</span>
                                </p>
                                <p>
                                    <span>+33 321-654-987 (Ext: 123).</span>
                                </p>
                                <p>
                                    <a href="#">Booking@example.com</a>
                                </p>
                                <p>
                                    <a href="#">www.example.com</a>
                                </p>
                            </div>
                        </div>
                        <!-- /Contact Info -->
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <!-- Quick Links -->
                        <div class="footer-widget">
                            <h2 class="h4 pb-3">Moliva Travel</h2>
                            <ul class="footer-link">
                                <li class="link-item">
                                    <a href="about.html">About us</a>
                                </li>
                                <li class="link-item">
                                    <a href="destinations-1.html">Destinations</a>
                                </li>
                                <li class="link-item">
                                    <a href="tour-packages-1.html">Moliva Tours</a>
                                </li>
                                <li class="link-item">
                                    <a href="post-list.html">Travel insight</a>
                                </li>
                                <li class="link-item">
                                    <a href="contact.html">Contact us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Quick Links -->
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <div class="footer-widget">
                            <h2 class="h4 pb-3">Get the app</h2>
                            <!-- Mobile App -->
                            <div class="mb-5 pt-3">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <a href="#">
                                            <img src="{{asset('account/img/icons/i1.svg')}}" class="w-100" alt="">
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#">
                                            <img src="{{asset('account/img/icons/i2.svg')}}" class="w-100" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Mobile App -->
                            <!-- Social -->
                            <div class="footer-local">
                                <a data-bs-toggle="modal" href="#mdlLanguage" class="me-4">
                                    <img src="{{asset('account/img/flags/en.svg')}}" height="14" alt="" class="me-2">
                                    <span class="me-1">English</span>
                                    <i class="hicon hicon-thin-arrow-down fsm-6"></i>
                                </a>
                                <a data-bs-toggle="modal" href="#mdlCurrency">
                                    <span class="me-1">USD (US Dollar)</span>
                                    <i class="hicon hicon-thin-arrow-down fsm-6"></i>
                                </a>
                            </div>
                            <!-- /Social -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="mb-lg-0">© 2024 Moliva Travel Agency. All rights reserved.</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="text-start text-md-end">
                            <ul class="list-inline mb-lg-0">
                                <li class="list-inline-item">
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Terms of Use</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Bottom -->

    </footer>
    <!-- /Footer -->
    <!-- Scroll top -->
    <a href="#" class="scroll-top">
        <i class="hicon hicon-thin-arrow-up"></i>
    </a>
    <!-- /Scroll top -->

    <script defer="" src="{{asset('account/js/theme-1.min.js')}}"></script>
    <script defer="" src="{{asset('account/js/theme-2.min.js')}}"></script>
    <script defer="" src="{{asset('account/js/theme-3.min.js')}}"></script>

</body>

</html>
