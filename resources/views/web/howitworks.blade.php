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
        <!-- Header Navbar -->
        <div class="header-navbar" style="background-color:#FFD31C">
            <nav class="navbar navbar-expand-xl">
                <div class="container">
                    <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="hicon hicon-bold hicon-hamburger-menu"></i>
                    </button>
                    <a class="navbar-brand" href="{{route('/')}}" >
                          @if(empty($csetting) || empty($csetting[0]['image']))
                            <img
                                src="{{ asset('assets/img/logo.png') }}"
                                alt="navbar brand"
                                class="navbar-brand"
                            style="width:200px;height:60px"
                            />
                        @else
                            <img
                                src="{{ asset('assets/img/' . $csetting[0]['image']) }}"
                                alt="navbar brand"
                                class="navbar-brand"
                            style="width:200px;height:60px"
                            />
                        @endif

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
                                <a class="dropdown-item" href="{{route('showregister')}}">
                                    <i class="hicon hicon-edit me-1"></i>
                                    <span>Register</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('showlogin')}}">
                                    <i class="hicon hicon-aps-lock me-1"></i>
                                    <span>Login</span>
                                </a>
                            </li>


                            @if(auth()->guard('account')->check())
                                <?php $customer = auth()->guard('account')->user(); ?>
                                <p>Welcome, {{ $customer->first_name }}</p>
                             <li>

                                </form>
                                <div class="dropdown-user-scroll scrollbar-outer">
                                 <a class="dropdown-item" href="{{ route('account.logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('account.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                </div>
                            </li>
                            @endif

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
                    <span class="hero-sub-title">How It Works</span>
                    <h1 class="display-3 hero-title">
                        AIRPARQ'S Meet & Greet Process
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
                                <img src="{{asset('account/img/img41.jpg')}}" class="w-100" alt="">
                            </div>
                        </div>
                        <!-- /Image -->
                    </div>
                    <div class="col-12 col-xl-6 order-0 order-xl-1">
                        <!-- Content -->
                        <div class="pt-xl-4 mb-xl-0 mb-5">
                            <div class="block-title">
                                <h2 class="h1 title lh-sm">Celebrate Effortless Travel</h2>
                            </div>
                            <p>
                                Experience unparalleled convenience with AIRPARQ'S Meet & Greet parking service, where every detail is meticulously crafted to elevate your travel experience. Whether you're commencing your journey from or returning to Heathrow Airport's Terminals 2, 3, 4, or 5, our streamlined parking process ensures a seamless transition from curb to terminal..
                            </p>
                            <p>
                                With our dedicated team of professionals at your service, rest assured that your vehicle will be securely parked while you embark on your travels. Say goodbye to the hassle of searching for parking spaces and navigating crowded airport lots—trust AIRPARQ to start your journey with ease and efficiency.</p>
                            </p>
                        </div>
                        <!-- /Content -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /About -->


        <!-- Categories -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <!-- Title -->
                <div class="d-xl-flex align-items-xl-center pb-4">
                    <div class="block-title me-auto">
                        <small class="sub-title">How It Works</small>
                        <h2 class="h1 title">Arrival</h2>
                    </div>
                </div>
                <!-- /Title -->
                <!-- Category list -->
                <div class="row g-3">
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/update.png')}}" alt="" style="width:50px;height:50px">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Drive to the Terminal</h3>
                                <small class="card-desc">Make your way directly to the designated terminal at Heathrow Airport.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/layout.png')}}" style="width:50px;height:50px" alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Meet Our Professional Teaml</h3>
                                <small class="card-desc">Our courteous valet team awaits at the terminal, ready to assist with your parking needs.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/support.png')}}" style="width:50px;height:50px"alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Quick Inspection and Photos</h3>
                                <small class="card-desc">For safety, we conduct a thorough inspection and capture photos efficiently.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/valid.png')}}" style="width:50px;height:50px" alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Proceed to Terminal</h3>
                                <small class="card-desc">With swift check-in, proceed directly to the terminal entrance, saving time and energy.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/document.png')}}" style="width:50px;height:50px"alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Secure Parking</h3>
                                <small class="card-desc">Your vehicle is safe with us. Our valet drivers park it in secure facilities, monitored 24/7.</small>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /Category list -->
                 <br/>
                 <!-- Title -->
                   <div class="d-xl-flex align-items-xl-center pb-4">
                        <div class="block-title me-auto">
                            <small class="sub-title">How It Works</small>
                            <h2 class="h1 title">Return</h2>
                        </div>
                    </div>
                    <!-- /Title -->

                    <!-- Category list -->
                    <div class="row g-3">
                        <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                            <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                                <span class="card-icon">
                                    <img src="{{asset('account/img/update.png')}}" style="width:50px;height:50px" alt="">
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Car Delivery</h3>
                                    <small class="card-desc">Upon return, head to the terminal's meeting point for prompt vehicle delivery.</small>
                                </div>
                            </a>
                        </div>
                         <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                            <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                                <span class="card-icon">
                                    <img src="{{asset('account/img/layout.png')}}" style="width:50px;height:50px" alt="">
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Departure</h3>
                                    <small class="card-desc">With your vehicle prepared, swiftly retrieve your keys and continue your journey without delay.</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /Category list -->
            </div>
        </section>
        <!-- /Categories -->

         <!-- Tour types -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                 <!-- Title -->
                   <div class="d-xl-flex align-itemscenter pb-4">
                        <div class="block-title me-auto">
                            <small class="sub-title">Why Coose Us</small>
                            <h2 class="h1 title">Why AIRPARQ Stands Out</h2>
                        </div>
                    </div>
                    <!-- /Title -->
                <!-- Types -->
                <div class="row ">
                    <div class="col-12 col-xl-4 col-md-6">
                        <a class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="h4 card-title">Convenience</h3>
                            <p class="card-desc">Enjoy the ultimate convenience of door-to-door service, eliminating the need for time-consuming shuttle transfers.</p>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6">
                        <a  class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="h4 card-title">Efficiency</h3>
                            <p class="card-desc">With no airport transfers required, you'll save valuable time, ensuring a prompt and stress-free departure. </p>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6">
                        <a class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="h4 card-title">Comfort</h3>
                            <p class="card-desc">Bid farewell to lengthy walks in congested airport lots, especially in bad weather or with heavy luggage..</p>
                        </a>
                    </div>

                </div>
                <br/>
                <div class="row ">
                    <div class="col-12 col-xl-4 col-md-6">
                        <a  class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="h4 card-title">Accessibility</h3>
                            <p class="card-desc">Our service exclusively serves travellers departing from Heathrow Airport's Terminals 2, 3, 4, and 5, ensuring a hassle-free experience.</p>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6">
                        <a  class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="h4 card-title">Security</h3>
                            <p class="card-desc">Your vehicle's safety is paramount. Our parking facilities feature advanced surveillance and security patrols for protection. </p>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6">
                        <a href="contact.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="h4 card-title">Affordability</h3>
                            <p class="card-desc">Despite premium service, AIRPARQ's Meet and Greet parking offers exceptional value for seamless parking.</p>
                        </a>
                    </div>

                </div>
                <!-- /Types -->
            </div>
        </section>
        <!-- /Tour types -->


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
                                  @if(empty($csetting) || empty($csetting[0]['image']))
                                    <img
                                        src="{{ asset('assets/img/logo.png') }}"
                                        alt="navbar brand"
                                        class="navbar-brand"
                                    style="width:200px;height:60px"
                                    />
                                @else
                                    <img
                                        src="{{ asset('assets/img/' . $csetting[0]['image']) }}"
                                        alt="navbar brand"
                                        class="navbar-brand"
                                    style="width:200px;height:60px"
                                    />
                                @endif
                            </a>
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
                                    @if(!empty($csetting) || !empty($csetting[0]['address']))
                                        <span>{{$csetting[0]['address']}}</span>
                                    @else
                                        <span>Defult address</span>
                                    @endif
                                </p>
                                <p>
                                    @if(!empty($csetting) || !empty($csetting[0]['phone1']))
                                        <span>{{$csetting[0]['phone1']}}</span>
                                    @else
                                        <span>Defult no1</span>
                                    @endif
                                </p>
                                <p>
                                    @if(!empty($csetting) || !empty($csetting[0]['phone2']))
                                        <span>{{$csetting[0]['phone2']}}</span>
                                    @else
                                        <span>Defult no2</span>
                                    @endif
                                </p>
                                <p>
                                      @if(!empty($csetting) || !empty($csetting[0]['email']))
                                        <a href="#">{{$csetting[0]['email']}}</a>
                                    @else
                                        <a href="#">Defult email</a>
                                    @endif

                                </p>
                            </div>
                        </div>
                        <!-- /Contact Info -->
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <!-- Quick Links -->
                        <div class="footer-widget">
                            <h2 class="h4 pb-3">Company</h2>
                            <ul class="footer-link">
                                <li class="link-item">
                                    <a href="{{route('aboutus')}}" >About us</a>
                                </li>
                                <li class="link-item">
                                    <a href="{{route('howitworks')}}" >How It Works</a>
                                </li>
                                <li class="link-item">
                                    <a href="{{route('contactus')}}">Contact Us</a>
                                </li>

                            </ul>
                        </div>
                        <!-- /Quick Links -->
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <div class="footer-widget">
                            <h2 class="h4 pb-3">Polices</h2>
                              <ul class="footer-link">
                                <li class="link-item">
                                    <a href="{{route('termsandcondition')}}" >Terms & Conditions</a>
                                </li>
                                <li class="link-item">
                                    <a href="{{route('privacypolicy')}}" >Privacy Policy</a>
                                </li>
                            </ul>
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
                        <p class="mb-lg-0">© All rights reserved.| airparq.co.uk | Developed by Lithic Labs Ltd </p>
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
