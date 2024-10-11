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
      {{-- notify css --}}
    @notifyCss
    <link href="{{asset('account/img/logos/logo.png')}}" rel="shortcut icon" type="image/png">
    <link href="{{asset('account/css/theme-1.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-3.min.css')}}" rel="stylesheet">
</head>
<!-- /Head -->

<body>
    <x-notify::notify />

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

        <!-- Hero -->
        <section class="hero" data-aos="fade">
            <h1 class="d-none">Moliva</h1>
            <!-- Carousel -->
            <div id="heroCarousel" class="hero-carousel carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Carousel item -->
                    <div class="hero-item carousel-item active">
                        <div class="hero-bg">
                            <img src="{{asset('account/img/hero/hero-bg4.jpg')}}"  alt="">
                        </div>
                        <div class="hero-caption text-sm-start">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-xxl-6 col-xl-7 col-md-10">
                                        <h2 class="display-3 hero-title">
                                            Seamless Parking Stress-Free Travel
                                        </h2>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Carousel item -->
                    <!-- Carousel item -->
                    <div class="hero-item carousel-item">
                        <div class="hero-bg">
                            <img src="{{asset('account/img/hero/hero-bg6.jpg')}}" alt="">
                        </div>
                        <div class="hero-caption text-sm-start">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-xxl-6 col-xl-7 col-md-10">
                                         <h2 class="display-3 hero-title">
                                            Seamless Parking Stress-Free Travel
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Carousel item -->
                    <!-- Carousel item -->
                    <div class="hero-item carousel-item">
                        <div class="hero-bg">
                            <img src="{{asset('account/img/hero/bread-bg8.jpg')}}" alt="">
                        </div>
                        <div class="hero-caption text-sm-start">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-xxl-6 col-xl-7 col-md-10">
                                         <h2 class="display-3 hero-title">
                                            Seamless Parking Stress-Free Travel
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Carousel item -->
                </div>
                <div class="carousel-control">
                    <button class="carousel-control-next prev-custom" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-prev next-custom" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="carousel-indicators hero-indicators-right">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
            </div>
            <!-- Carousel -->

            <!-- Check tour -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-12 col-xl-6">
                        <div class="search-tours search-hero search-hero-half" style="padding-bottom:20px">
                              <form id="bookingForm"  class="search-tour-form" action="{{route('bookingdetailstep2')}}" method="post">
                                @csrf

                                <div class="search-tour-input">
                                    <div class="row g-3 g-xl-2" style="margin-bottom:20px">
                                         <div class="col-12">
                                             <div class="input-icon-group">
                                                <select class="form-select dropdown-select shadow-sm" id="airport" name="airport">
                                                    <option value="London Heathrow" selected="">London Heathrow</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 g-xl-2 mb-20" style="margin-bottom:20px">
                                         <div class="col-8">
                                             <div class="mb-0">
                                                    <input id="parking_from_date" name="parking_from_date" type="date" class="form-control shadow-sm" placeholder="Parking From">
                                            </div>
                                        </div>
                                         <div class="col-4">
                                             <div class="mb-0">
                                                <div class="input-icon-group">
                                                <?php
                                                 date_default_timezone_set('Asia/Colombo'); //e timeze to Sri Lanka
                                                ?>
                                                    <input id="parking_from_time" name="parking_from_time" type="time" class="form-control" placeholder="Time" value="<?php echo date('H:i', strtotime('+2 hours')) ?>" min="<?php echo date('H:i', strtotime('+2 hours')) ?>" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 g-xl-2 mb-20" style="margin-bottom:20px">
                                         <div class="col-8">
                                             <div class="mb-0">
                                                    <input type="date" name="parking_till_date" id="parking_till_date" class="form-control shadow-sm" placeholder="Parking Till">
                                            </div>
                                        </div>
                                         <div class="col-4">
                                             <div class="mb-0">
                                                <div class="input-icon-group tour-date">
                                                    <input id="parking_till_time" name="parking_till_time" type="time" class="form-control" placeholder="Time" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 g-xl-2 mb-20" style="margin-bottom:20px">
                                         <div class="col-12">
                                             <div class="mb-0">
                                                <div class="input-icon-group">
                                                    <input id="promocode" name="promocode" type="Text" class="form-control shadow-sm" placeholder="Promo code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" >
                                        <div class="mb-0">
                                            <button type="submit" class="btn btn-primary btn-uppercase w-100" id="booking">
                                                <i class="hicon hicon-mmb-my-booking hicon-md mr-1"></i>
                                                <span>Book now</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                             </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Check tour -->

             <br/>
             <br/>
        </section>
        <!-- /Hero -->
        <!-- Featured -->
        <section class="pt-2 pb-4" >
                <div class="container">
                    <!-- Title -->
                    <div class="d-xl-flex align-items-xl-center pb-4">
                        <div class="block-title me-auto">
                            <small class="sub-title">Why AIRPARQ</small>
                            <h2 class="h1 title">Meet & Greet Airport Parking?</h2>
                        </div>
                    </div>
                    <!-- /Title -->
                    <!-- Category list -->
                    <div class="row g-3">
                        <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                            <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                                <span class="card-icon">
                                    <img src="{{asset('account/img/update.png')}}" style="width:40px;height:30px" alt="">
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Expertise You Can Trust</h3>
                                    <small class="card-desc">Benefit from our expertise in airport parking. Your vehicle is in safe hands with AIRPARQ.</small>
                                </div>
                            </a>
                        </div>
                         <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                            <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                                <span class="card-icon">
                                    <img src="{{asset('account/img/layout.png')}}" style="width:40px;height:30px" alt="">
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Unparalleled Convenience</h3>
                                    <small class="card-desc">Say goodbye to the stress of airport parking and hello to seamless travel with AIRPARQ.</small>
                                </div>
                            </a>
                        </div>
                         <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                            <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                                <span class="card-icon">
                                    <img src="{{asset('account/img/support.png')}}" style="width:40px;height:40px" alt="">
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Satisfaction Guaranteed</h3>
                                    <small class="card-desc">Experience exceptional service and reliability every time you park with AIRPARQ.</small>
                                </div>
                            </a>
                        </div>


                    </div>
                    <!-- /Category list -->
                     <br/>



                </div>


        </section>
        <!-- /Featured -->

          <!-- Tour types -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">

                <!-- Title -->
                <div class="d-xl-flex align-items-xl-center pb-4">
                    <div class="block-title me-auto">
                        <h2 class="h1 title">How does it work?</h2>
                    </div>
                </div>
                <!-- /Title -->
                <!-- Types -->
                <div class="row g-3 g-xl-4">
                    <div class="col-12 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="card-icon">
                                <i class="hicon hicon-family-with-teens"></i>
                            </div>
                            <h3 class="h4 card-title">Book Online</h3>
                            <p class="card-desc">Conveniently reserve your parking spot through our user-friendly online booking system.</p>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="card-icon">
                                <i class="hicon hicon-regular-travel-protection"></i>
                            </div>
                            <h3 class="h4 card-title">Drop-off at Terminal</h3>
                            <p class="card-desc">Arrive at the airport and drive directly to the terminal, where our valet will be waiting to collect your vehicle.</p>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6">
                        <a href="contact.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="card-icon">
                                <i class="hicon hicon-tours"></i>
                            </div>
                            <h3 class="h4 card-title">Pick-up at Arrival</h3>
                            <p class="card-desc">Upon your return, your car will be brought to the terminal for a seamless departure.</p>
                        </a>
                    </div>
                </div>
                <!-- /Types -->
            </div>
        </section>
        <!-- /Tour types -->
        <!-- Why -->
        <section class="p-top-90 p-bottom-90 " data-aos="fade">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12 col-xl-1 order-0 order-xl-1"></div>
                      <div class="col-12 col-xl-5 order-0 order-xl-1">
                          <!-- Contact Form -->
                        <div class="form-contact rounded shadow-sm" style="margin-top:20px">
                            <form class="needs-validation" method="post" novalidate="">
                                <div class="border-bottom pb-4 mb-4">
                                    <h3 class="mb-0">Still have question?</h3>
                                </div>
                                <div class="alert d-none" role="alert" id="msg_alert"></div>
                                <div class="form-floating mb-4">
                                    <input id="txtYourName" type="text" name="yourname" class="form-control shadow-sm" placeholder="Your Name" required="">
                                    <label for="txtYourName">Your Name *</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input id="txtEmail" type="email" name="email" class="form-control shadow-sm" placeholder="Email" required="">
                                    <label for="txtEmail">Your Email *</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <textarea id="txtMessage" name="message" class="form-control shadow-sm" placeholder="Message" style="height: 150px" required=""></textarea>
                                    <label for="txtMessage">Message *</label>
                                </div>
                                <button type="submit" class="btn btn-light mnw-180">
                                    <i class="hicon hicon-email-envelope"></i>
                                    <span> Send message</span>
                                </button>
                                <div class="row">
                                    <div class="col-12">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /Contact Form -->
                    </div>
                    <div class="col-12 col-xl-6 order-1 order-xl-0">
                          <!-- Content -->
                        <div class="mb-5">
                            <div class="block-title">
                                <h2 class="h1 title">Frequently Asked Questions</h2>
                            </div>
                            <div class="accordion accordion-flush accordion-why mb-4" id="acdWhy">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent1" aria-expanded="false" aria-controls="acdContent1">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>How does AIRPARQ's meet and greet parking service work?</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent1" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                             Simply book your parking spot online, drive to the airport terminal on your departure day, and our valet will meet you there to collect your vehicle. Upon your return, contact us, and your car will be waiting for you at the terminal.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent2" aria-expanded="false" aria-controls="acdContent2">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Is my vehicle safe with AIRPARQ?</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent2" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                            Absolutely. While your vehicle is parked at our facilities, it is under surveillance and safeguarded. However, it's important to note that any theft or damages that occur while parked are the owner's responsibility. Nevertheless, rest assured that during the transit to and from the airport, your vehicle is fully protected by our insurance, providing added peace of mind for your journey.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent3" aria-expanded="false" aria-controls="acdContent3">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Can I make changes to my booking?</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent3" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                            Yes, you can modify or cancel your booking up to a certain time before your scheduled arrival. Check our booking policy for details or contact our customer support team for assistance.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent4" aria-expanded="false" aria-controls="acdContent4">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>What if my flight is delayed?</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent4" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                             Don't worry. We track flight arrivals in real-time, so our team will be aware of any delays. Your car will be ready for you whenever you arrive.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent5" aria-expanded="false" aria-controls="acdContent5">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>How far in advance should I book my parking spot?</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent5" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                             It's best to book as early as possible to ensure availability, especially during peak travel times. However, we also accept last-minute bookings, subject to availability.
                                        </div>
                                    </div>
                                </div>
                                 <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent6" aria-expanded="false" aria-controls="acdContent6">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Do you offer discounts for frequent travellers or long-term parking?</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent6" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                             Yes, we offer discounts for frequent travellers and long-term parking. Contact us for more information on our loyalty programs and special offers.
                                        </div>
                                    </div>
                                </div>
                                  <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent7" aria-expanded="false" aria-controls="acdContent7">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Do prices exclude airport access fees?</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent7" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                            Yes, the prices exclude airport access fees. Also, the customer/owner has to bear the cost of paying the ULEZ if the vehicle does not meet the ULEZ standards. The customer has to pay ULEZ for both days (the day of dropoff and the day of collection
                                        </div>
                                    </div>
                                </div>
                                <div>Any questions? Just visit our <a href={{route('contactus')}}>Contact Us</a></div>
                            </div>

                        </div>
                        <!-- /Content -->
                    </div>

                </div>
            </div>
        </section>
        <!-- /Why -->
      
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

    <script>

          document.addEventListener('DOMContentLoaded', function () {
            // Add event listener to the "Next" button
            document.getElementById('paybtn').addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission
                // Get form values
                //const terminalId = document.getElementById('selected_terminal_id').value;
                const parkingFromDate = document.getElementById('bookingfromDate').value;
                const parkingFromTime = document.getElementById('bookingfromTime').value;
                const parkingTillDate = document.getElementById('bookingtillDate').value;
                const parkingTillTime = document.getElementById('bookingtillTime').value;
                const inbound_terminal = document.getElementById('inbound_terminal').value;

                // Prepare data to send
                const formData = {
                    inbound_terminal: inbound_terminal,
                    from_date: parkingFromDate,
                    from_time: parkingFromTime,
                    till_date: parkingTillDate,
                    till_time: parkingTillTime,

                };
                 let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // Send the data using the fetch API
                fetch('ckoutbooking', {

                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN':token// Ensure CSRF token is set if needed
                    },
                    body: JSON.stringify(formData) // Send the form data
                })
                .then(response => {
                   //
                    return response.json();
                })
                .then(data => {

                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
     {{-- notify js --}}
    @notifyJs

</body>

</html>
