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
        <section class="pt-2 pb-4" data-aos="fade">
            <div class="container">
                 <div class="block-title" style="text-align:center">
                    <h2 class="h1 title">Why AIRPARQ</h2>
                    <small class="sub-title">Meet & Greet Airport Parking?</small>

                </div>
                <br/>
                <ul class="stats-list row g-0">
                    <li class="col-6 col-xl-3">
                        <div class="stats-item">

                            <p class="stats-desc">
                                Expertise You Can Trust
                                Benefit from our expertise in airport parking. Your vehicle is in safe hands with AIRPARQ.
                            </p>

                        </div>
                    </li>
                    <li class="col-6 col-xl-3">
                        <div class="stats-item">

                            <p class="stats-desc">
                                Unparalleled Convenience
                                Say goodbye to the stress of airport parking and hello to seamless travel with AIRPARQ.
                            </p>
                        </div>
                    </li>
                    <li class="col-6 col-xl-3">
                        <div class="stats-item">


                            <p class="stats-desc">
                                Satisfaction Guaranteed
                                Experience exceptional service and reliability every time you park with AIRPARQ.
                            </p>
                        </div>
                    </li>

                </ul>
            </div>
        </section>
        <!-- /Featured -->

        <!-- About -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12 col-xl-6 order-1 order-xl-0">
                        <!-- Image -->
                        <div class="pe-xl-5">
                            <div class="image-info image-info-right image-info-vertical">
                                <div class="vertical-title">
                                    <small class="ls-2">
                                        <strong class="text-primary fw-semibold">Sine 1993</strong> - <strong class="text-body fw-semibold">31 years</strong> of experience
                                    </small>
                                </div>
                                <div class="image-center">
                                    <img src="{{asset('account/img/about/a2.jpg')}}" srcset="{{asset('account/img/about/a2%402x.jpg')}} 2x" class="rounded w-100" alt="">
                                </div>
                                <div class="info-top-right">
                                    <div class="vertical-award rounded shadow-sm">
                                        <div class="award-content">
                                            <img src="{{asset('account/img/logos/trip-best.png')}}" srcset="{{asset('account/img/logos/trip-best%402x.png')}} 2x" class="w-100" alt="">
                                        </div>
                                        <div class="award-footer">
                                            <small>Tripadvisor</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Image -->
                    </div>
                    <div class="col-12 col-xl-6 order-0 order-xl-1">
                        <!-- Content -->
                        <div class="mb-5 mb-xl-0">
                            <div class="block-title">
                                <small class="sub-title">About us</small>
                                <h2 class="h1 title">Moliva Travel Agency</h2>
                            </div>
                            <p>
                                Moliva Travel Agency offers unique and memorable tours, providing rich experiences
                                in the beautiful country of Moliva. With a professional and dedicated team,
                                we are committed to bringing you wonderful, safe, and exciting journeys,
                                helping you explore the beauty of the world.
                            </p>
                            <ul class="strength-list row g-0 pt-2">
                                <li class="col-12 col-md-6">
                                    <div class="strength-item">
                                        <span class="strength-icon">
                                            <i class="hicon hicon-150 hicon-confirmation-instant"></i>
                                        </span>
                                        <strong class="strength-title">Great travel experiences</strong>
                                    </div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="strength-item">
                                        <span class="strength-icon">
                                            <i class="hicon hicon-150 hicon-menu-price-display"></i>
                                        </span>
                                        <strong class="strength-title">Competitive pricing offers</strong>
                                    </div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="strength-item">
                                        <span class="strength-icon">
                                            <i class="hicon hicon-150 hicon-pay-on-checkin"></i>
                                        </span>
                                        <strong class="strength-title">Flexible itinerary options</strong>
                                    </div>
                                </li>
                                <li class="col-12 col-md-6">
                                    <div class="strength-item">
                                        <span class="strength-icon">
                                            <i class="hicon hicon-150 hicon-agoda-price-guarante"></i>
                                        </span>
                                        <strong class="strength-title">Leading industry reputation</strong>
                                    </div>
                                </li>
                            </ul>
                            <div class="pt-3">
                                <a href="about.html" class="btn btn-primary btn-uppercase mnw-180">
                                    <span>Read more</span>
                                    <i class="hicon hicon-flights-one-ways"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /Content -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /About -->

        <!-- Destintions -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="destination-slider splide__pagination__start splide">
                    <!-- Title -->
                    <div class="d-xl-flex align-items-xl-center mb-3">
                        <div class="block-title me-auto">
                            <small class="sub-title">Many tourists visit</small>
                            <h2 class="h1 title">Top destinations</h2>
                        </div>
                        <div class="d-lg-flex align-items-lg mt-3">
                            <div class="extra-info me-5">
                                <strong>+50</strong>
                                <span>Attractive destinations</span>
                            </div>
                            <div class="splide__arrows splide__arrows__right">
                                <button class="splide__arrow splide__arrow--prev me-2">
                                    <i class="hicon hicon-edge-arrow-left"></i>
                                </button>
                                <button class="splide__arrow splide__arrow--next">
                                    <i class="hicon hicon-edge-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- T/itle -->
                    <!-- Destinations -->
                    <div class="splide__track pt-2">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <a href="tour-packages-1.html" class="destination bottom-overlay hover-effect rounded">
                                    <figure class="image-hover image-hover-overlay">
                                        <img src="{{asset('account/img/destinations/d6.jpg')}}" srcset="{{asset('account/img/destinations/d6%402x.jpg')}} 2x" alt="">
                                        <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                    </figure>
                                    <div class="bottom-overlay-content">
                                        <div class="destination-content">
                                            <div class="destination-info">
                                                <h3 class="destination-title">Noriva</h3>
                                                <span>176 tours</span>
                                            </div>
                                            <span class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-pin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a href="tour-packages-1.html" class="destination bottom-overlay hover-effect rounded">
                                    <figure class="image-hover image-hover-overlay">
                                        <img src="{{asset('account/img/destinations/d2.jpg')}}" srcset="{{asset('account/img/destinations/d2%402x.jpg')}} 2x" alt="">
                                        <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                    </figure>
                                    <div class="bottom-overlay-content">
                                        <div class="destination-content">
                                            <div class="destination-info">
                                                <h3 class="destination-title">Kardal</h3>
                                                <span>127 tours</span>
                                            </div>
                                            <span class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-pin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a href="tour-packages-1.html" class="destination bottom-overlay hover-effect rounded">
                                    <figure class="image-hover image-hover-overlay">
                                        <img src="{{asset('account/img/destinations/d4.jpg')}}" srcset="{{asset('account/img/destinations/d4%402x.jpg')}} 2x" alt="">
                                        <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                    </figure>
                                    <div class="bottom-overlay-content">
                                        <div class="destination-content">
                                            <div class="destination-info">
                                                <h3 class="destination-title">Leront</h3>
                                                <span>210 tours</span>
                                            </div>
                                            <span class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-pin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a href="tour-packages-1.html" class="destination bottom-overlay hover-effect rounded">
                                    <figure class="image-hover image-hover-overlay">
                                        <img src="{{asset('account/img/destinations/d3.jpg')}}" srcset="{{asset('account/img/destinations/d3%402x.jpg')}} 2x" alt="">
                                        <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                    </figure>
                                    <div class="bottom-overlay-content">
                                        <div class="destination-content">
                                            <div class="destination-info">
                                                <h3 class="destination-title">Fruska</h3>
                                                <span>155 tours</span>
                                            </div>
                                            <span class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-pin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a href="tour-packages-1.html" class="destination bottom-overlay hover-effect rounded">
                                    <figure class="image-hover image-hover-overlay">
                                        <img src="{{asset('account/img/destinations/d1.jpg')}}" srcset="{{asset('account/img/destinations/d1%402x.jpg')}} 2x" alt="">
                                        <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                    </figure>
                                    <div class="bottom-overlay-content">
                                        <div class="destination-content">
                                            <div class="destination-info">
                                                <h3 class="destination-title">Zolmir</h3>
                                                <span>162 tours</span>
                                            </div>
                                            <span class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-pin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="splide__slide">
                                <a href="tour-packages-1.html" class="destination bottom-overlay hover-effect rounded">
                                    <figure class="image-hover image-hover-overlay">
                                        <img src="{{asset('account/img/destinations/d5.jpg')}}" srcset="{{asset('account/img/destinations/d5%402x.jpg')}} 2x" alt="">
                                        <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                    </figure>
                                    <div class="bottom-overlay-content">
                                        <div class="destination-content">
                                            <div class="destination-info">
                                                <h3 class="destination-title">Sitafo</h3>
                                                <span>217 tours</span>
                                            </div>
                                            <span class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-pin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /Destinations -->
                </div>
                <p class="fw-normal text-secondary text-md-end mb-0 pt-4 mt-5 mt-md-0" data-aos="fade">
                    <a href="destinations-1.html" class="fw-medium">
                        <span>View all destinations</span>
                        <i class="hicon hicon-flights-one-ways"></i>
                    </a>
                </p>
            </div>
        </section>
        <!-- /Destintions -->

        <!-- Tour types -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <!-- Types -->
                <div class="row g-3 g-xl-4">
                    <div class="col-12 col-xl-3 col-md-6">
                        <!-- Title -->
                        <div class="info-card shadow-sm rounded h-100 active">
                            <div class="block-title">
                                <small class="sub-title card-title">Flexible tours</small>
                                <h2 class="h1 title card-title lh-xs">Explore your way</h2>
                            </div>
                            <p class="card-desc">Explore Moliva your way with incredible trips and captivating experiences.</p>
                            <div class="card-desc mt-3">
                                You need <a href="contact.html" class="link-light"><abbr title="Go to contact page" class="fw-semibold">advice</abbr></a>?
                            </div>
                        </div>
                        <!-- /Title -->
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <a href="tour-packages-1.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="card-icon">
                                <i class="hicon hicon-family-with-teens"></i>
                            </div>
                            <h3 class="h4 card-title">Group tours</h3>
                            <p class="card-desc">Join our group tours to explore stunning destinations with like-minded travelers. Fun and camaraderie guaranteed.</p>
                            <span class="card-link">
                                <span>View tours</span>
                                <i class="hicon hicon-flights-one-ways"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <a href="tour-packages-1.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="card-icon">
                                <i class="hicon hicon-regular-travel-protection"></i>
                            </div>
                            <h3 class="h4 card-title">Private tours</h3>
                            <p class="card-desc">Enjoy personalized experiences with our private tours. Perfect for families, couples, or friends seeking exclusivity.</p>
                            <span class="card-link">
                                <span>View tours</span>
                                <i class="hicon hicon-flights-one-ways"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-12 col-xl-3 col-md-6">
                        <a href="contact.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="card-icon">
                                <i class="hicon hicon-tours"></i>
                            </div>
                            <h3 class="h4 card-title">Tailor-Made tours</h3>
                            <p class="card-desc">Customize your dream vacation with our tailor-made tours. Create unique itineraries that suit your interests and schedule.</p>
                            <span class="card-link">
                                <span>Contact us</span>
                                <i class="hicon hicon-flights-one-ways"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- /Types -->
            </div>
        </section>
        <!-- /Tour types -->

        <!-- Why -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12 col-xl-6 order-1 order-xl-0">
                        <!-- Image -->
                        <div class="pe-xl-5">
                            <div class="image-info image-info-left image-info-right">
                                <div class="image-center">
                                    <img src="{{asset('account/img/about/a1.jpg')}}" srcset="{{asset('account/img/about/a1%402x.jpg')}} 2x" class="rounded w-100" alt="">
                                </div>
                                <div class="info-top-right">
                                    <div class="vertical-review rounded shadow-sm">
                                        <div class="review-content">
                                            <h3 class="review-score">4.9</h3>
                                            <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-50"></span></span>
                                            <small class="review-total"><strong>2394</strong> reviews</small>
                                            <small class="review-label ">Excellent</small>
                                        </div>
                                        <div class="review-footer">
                                            <small>Tripadvisor</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-bottom-left">
                                    <div class="vertical-experience rounded shadow-sm">
                                        <h3 class="experience-year">+30</h3>
                                        <small class="experience-title">Years of experience</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Image -->
                    </div>
                    <div class="col-12 col-xl-6 order-0 order-xl-1">
                        <!-- Content -->
                        <div class="mb-5">
                            <div class="block-title">
                                <small class="sub-title">Great experience</small>
                                <h2 class="h1 title">Why choose us</h2>
                            </div>
                            <p>
                                We are a leading travel agency in Moliva with many years of experience, highly rated and appreciated by tourists.
                            </p>
                            <div class="accordion accordion-flush accordion-why mb-4" id="acdWhy">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent1" aria-expanded="false" aria-controls="acdContent1">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Leading travel agency in Moliva</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent1" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                            Top-rated agency in Moliva is renowned for exceptional service and unforgettable travel experiences.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent2" aria-expanded="false" aria-controls="acdContent2">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Years of experience in tour operations</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent2" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                            With years of expertise, we excel at organizing seamless, enjoyable, and memorable tours for every traveler.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent3" aria-expanded="false" aria-controls="acdContent3">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Flexible tour packages and bookings</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent3" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                            We offer customizable trips with flexible packages and convenient booking options tailored to your needs.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent4" aria-expanded="false" aria-controls="acdContent4">
                                            <i class="hicon hicon-bold hicon-positive"></i>
                                            <span>Best prices with attractive Offers</span>
                                        </button>
                                    </h2>
                                    <div id="acdContent4" class="accordion-collapse collapse" data-bs-parent="#acdWhy">
                                        <div class="accordion-body">
                                            Enjoy unbeatable prices and exclusive offers, ensuring you receive great value and memorable vacation experiences.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="tour-packages-1.html" class="btn btn-primary btn-uppercase mnw-180">
                                <span>View tours</span>
                                <i class="hicon hicon-flights-one-ways"></i>
                            </a>
                        </div>
                        <!-- /Content -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /Why -->

        <!-- Tours -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="tour-slider-1 splide splide__pagination__start w-100">
                    <!-- Title -->
                    <div class="d-xl-flex align-items-xl-center mb-3">
                        <div class="block-title me-auto">
                            <small class="sub-title">Many tourists choose</small>
                            <h2 class="h1 title">Top Moliva Tours</h2>
                        </div>
                        <div class="d-lg-flex align-items-lg mt-3">
                            <div class="extra-info me-md-5">
                                <strong>+80K</strong>
                                <span>Tourists have chosen these tours</span>
                            </div>
                            <div class="splide__arrows splide__arrows__right">
                                <button class="splide__arrow splide__arrow--prev me-2">
                                    <i class="hicon hicon-edge-arrow-left"></i>
                                </button>
                                <button class="splide__arrow splide__arrow--next">
                                    <i class="hicon hicon-edge-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /Title -->
                    <!-- Tours list -->
                    <div class="splide__track pt-2 pb-2">
                        <ul class="splide__list tour-grid">
                            <li class="splide__slide">
                                <!-- Tour -->
                                <div class="tour-item rounded shadow-sm hover-effect">
                                    <div class="tour-img">
                                        <a href="single-tour-1.html">
                                            <figure class="image-hover image-hover-overlay ">
                                                <img src="{{asset('account/img/tours/t1.jpg')}}" srcset="{{asset('account/img/tours/t1%402x.jpg')}} 2x" alt="">
                                                <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                            </figure>
                                        </a>
                                        <div class="tour-like">
                                            <button type="button" class="circle-icon like-icon liked">
                                                <i class="hicon hicon-favorite-filled"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tour-content">
                                        <h3 class="tour-title">
                                            <a href="single-tour-1.html" class="link-dark link-hover">Explore the castle and ancient village in Karda</a>
                                        </h3>
                                        <div class="tour-itinerary">
                                            <span><i class="hicon hicon-menu-calendar"></i> 3 days</span>
                                            <span><i class="hicon hicon-flights-pin"></i> 3 Destinations</span>
                                        </div>
                                        <div class="inline-review">
                                            <span class="review-score">4.9</span>
                                            <span class="star-rate-view star-rate-size-sm me-2"><span class="star-value rate-50"></span></span>
                                            <small class="review-total"><span>(231 reviews)</span></small>
                                        </div>
                                        <div class="tour-booking">
                                            <div class="tour-price">
                                                <strong><sup>$</sup>195.80</strong>
                                                <span><sup>$</sup><del class="">230.00</del></span>
                                            </div>
                                            <a href="single-tour-1.html" class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-one-ways"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Tour -->
                            </li>
                            <li class="splide__slide">
                                <!-- Tour -->
                                <div class="tour-item rounded shadow-sm hover-effect">
                                    <div class="tour-img">
                                        <a href="single-tour-1.html">
                                            <figure class="image-hover image-hover-overlay ">
                                                <img src="{{asset('account/img/tours/t3.jpg')}}" srcset="{{asset('account/img/tours/t3%402x.jpg')}} 2x" alt="">
                                                <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                            </figure>
                                        </a>
                                        <div class="tour-like">
                                            <button type="button" class="circle-icon like-icon">
                                                <i class="hicon hicon-favorite-filled"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tour-content">
                                        <h3 class="tour-title">
                                            <a href="single-tour-1.html" class="link-dark link-hover">Bathing and Kayaking at Noriva Beach</a>
                                        </h3>
                                        <div class="tour-itinerary">
                                            <span><i class="hicon hicon-menu-calendar"></i> 3 days</span>
                                            <span><i class="hicon hicon-flights-pin"></i> 3 Destinations</span>
                                        </div>
                                        <div class="inline-review">
                                            <span class="review-score">4.9</span>
                                            <span class="star-rate-view star-rate-size-sm me-2"><span class="star-value rate-50"></span></span>
                                            <small class="review-total"><span>(231 reviews)</span></small>
                                        </div>
                                        <div class="tour-booking">
                                            <div class="tour-price">
                                                <strong><sup>$</sup>195.80</strong>
                                                <span><sup>$</sup><del class="">230.00</del></span>
                                            </div>
                                            <a href="single-tour-1.html" class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-one-ways"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Tour -->
                            </li>
                            <li class="splide__slide">
                                <!-- Tour -->
                                <div class="tour-item rounded shadow-sm hover-effect">
                                    <div class="tour-img">
                                        <a href="single-tour-1.html">
                                            <figure class="image-hover image-hover-overlay ">
                                                <img src="{{asset('account/img/tours/t4.jpg')}}" srcset="{{asset('account/img/tours/t4%402x.jpg')}} 2x" alt="">
                                                <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                            </figure>
                                        </a>
                                        <div class="tour-like">
                                            <button type="button" class="circle-icon like-icon">
                                                <i class="hicon hicon-favorite-filled"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tour-content">
                                        <h3 class="tour-title">
                                            <a href="single-tour-1.html" class="link-dark link-hover">Visit Valiba swamp and primeval forest</a>
                                        </h3>
                                        <div class="tour-itinerary">
                                            <span><i class="hicon hicon-menu-calendar"></i> 3 days</span>
                                            <span><i class="hicon hicon-flights-pin"></i> 3 Destinations</span>
                                        </div>
                                        <div class="inline-review">
                                            <span class="review-score">4.9</span>
                                            <span class="star-rate-view star-rate-size-sm me-2"><span class="star-value rate-50"></span></span>
                                            <small class="review-total"><span>(231 reviews)</span></small>
                                        </div>
                                        <div class="tour-booking">
                                            <div class="tour-price">
                                                <strong><sup>$</sup>195.80</strong>
                                                <span><sup>$</sup><del class="">230.00</del></span>
                                            </div>
                                            <a href="single-tour-1.html" class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-one-ways"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Tour -->
                            </li>
                            <li class="splide__slide">
                                <!-- Tour -->
                                <div class="tour-item rounded shadow-sm hover-effect">
                                    <div class="tour-img">
                                        <a href="single-tour-1.html">
                                            <figure class="image-hover image-hover-overlay ">
                                                <img src="{{asset('account/img/tours/t5.jpg')}}" srcset="{{asset('account/img/tours/t5%402x.jpg')}} 2x" alt="">
                                                <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                            </figure>
                                        </a>
                                        <div class="tour-like">
                                            <button type="button" class="circle-icon like-icon liked">
                                                <i class="hicon hicon-favorite-filled"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tour-content">
                                        <h3 class="tour-title">
                                            <a href="single-tour-1.html">Visit and boat ride on the beach in Satifo</a>
                                        </h3>
                                        <div class="tour-itinerary">
                                            <span><i class="hicon hicon-menu-calendar"></i> 3 days</span>
                                            <span><i class="hicon hicon-flights-pin"></i> 3 Destinations</span>
                                        </div>
                                        <div class="inline-review">
                                            <span class="review-score">4.9</span>
                                            <span class="star-rate-view star-rate-size-sm me-2"><span class="star-value rate-50"></span></span>
                                            <small class="review-total"><span>(231 reviews)</span></small>
                                        </div>
                                        <div class="tour-booking">
                                            <div class="tour-price">
                                                <strong><sup>$</sup>195.80</strong>
                                                <span><sup>$</sup><del class="">230.00</del></span>
                                            </div>
                                            <a href="single-tour-1.html" class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-one-ways"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Tour -->
                            </li>
                            <li class="splide__slide">
                                <!-- Tour -->
                                <div class="tour-item rounded shadow-sm hover-effect">
                                    <div class="tour-img">
                                        <a href="single-tour-1.html">
                                            <figure class="image-hover image-hover-overlay ">
                                                <img src="{{asset('account/img/tours/t6.jpg')}}" srcset="{{asset('account/img/tours/t6%402x.jpg')}} 2x" alt="">
                                                <i class="hicon hicon-plus-thin image-hover-icon"></i>
                                            </figure>
                                        </a>
                                        <div class="tour-like">
                                            <button type="button" class="circle-icon like-icon liked">
                                                <i class="hicon hicon-favorite-filled"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="tour-content">
                                        <h3 class="tour-title">
                                            <a href="single-tour-1.html">Climbing and experiencing life in Fruska</a>
                                        </h3>
                                        <div class="tour-itinerary">
                                            <span><i class="hicon hicon-menu-calendar"></i> 3 days</span>
                                            <span><i class="hicon hicon-flights-pin"></i> 3 Destinations</span>
                                        </div>
                                        <div class="inline-review">
                                            <span class="review-score">4.9</span>
                                            <span class="star-rate-view star-rate-size-sm me-2"><span class="star-value rate-50"></span></span>
                                            <small class="review-total"><span>(231 reviews)</span></small>
                                        </div>
                                        <div class="tour-booking">
                                            <div class="tour-price">
                                                <strong><sup>$</sup>195.80</strong>
                                                <span><sup>$</sup><del class="">230.00</del></span>
                                            </div>
                                            <a href="single-tour-1.html" class="circle-icon circle-icon-link">
                                                <i class="hicon hicon-flights-one-ways"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Tour -->
                            </li>
                        </ul>
                    </div>
                    <!-- /Tour List -->
                </div>
                <p class="fw-normal text-secondary text-md-end mb-0 pt-4 mt-5 mt-md-0">
                    <a href="tour-packages-1.html" class="fw-medium">
                        <span>View all tours</span>
                        <i class="hicon hicon-flights-one-ways"></i>
                    </a>
                </p>
            </div>
        </section>
        <!-- /Tours -->

        <!-- Videos-->
        <section class="hero" data-aos="fade">
            <div class="hero-bg">
                <img src="{{asset('account/img/background/b1.jpg')}}" srcset="{{asset('account/img/background/b1%402x.jpg')}} 2x" alt="">
            </div>
            <div class="bg-content container">
                <div class="p-top-150 p-bottom-150">
                    <div class="block-title text-center me-auto">
                        <small class="sub-title text-light">Moliva video</small>
                        <h2 class="h1 title text-white">Beautiful & Romantic</h2>
                    </div>
                    <div class="text-center">
                        <a class="btn-video-play media-glightbox" href="{{asset('account/media/v1.mp4')}}"><span></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Videos -->

        <!-- Categories -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <!-- Title -->
                <div class="d-xl-flex align-items-xl-center pb-4">
                    <div class="block-title me-auto">
                        <small class="sub-title">Tour categories</small>
                        <h2 class="h1 title">Adventure types</h2>
                    </div>
                    <div class="fw-normal text-secondary mt-3">
                        You need <a href="contact.html"><abbr title="Go to contact page" class="fw-semibold">advice</abbr></a>?
                    </div>
                </div>
                <!-- /Title -->
                <!-- Category list -->
                <div class="row g-3">
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <i class="hicon hicon-regular-valley"></i>
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Ecotourism & Resort</h3>
                                <small class="card-desc">124 tours</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-regular-meal"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Food & Culinary</h3>
                                    <small class="card-desc">231 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-culture"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">In-depth Cultural</h3>
                                    <small class="card-desc">271 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-mountain-view"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Explorer & Adventure</h3>
                                    <small class="card-desc">311 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-china-only"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Festival & Events</h3>
                                    <small class="card-desc">219 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-regular-mountain-view"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Museums & Exhibitions</h3>
                                    <small class="card-desc">189 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-regular-hiking"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Hiking & Trekking</h3>
                                    <small class="card-desc">167 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-bicycle-rental"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Motor & Bicycles</h3>
                                    <small class="card-desc">112 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-regular-yachting"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Ships & boats</h3>
                                    <small class="card-desc">301 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-family-with-teens"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Family Activities</h3>
                                    <small class="card-desc">211 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-massage"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Health & Spa</h3>
                                    <small class="card-desc">189 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a href="tour-packages-1.html" class="mini-card card-hover hover-effect shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <span class="card-icon">
                                    <i class="hicon hicon-library"></i>
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Educational</h3>
                                    <small class="card-desc">129 tours</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /Category list -->
            </div>
        </section>
        <!-- /Categories -->

        <!-- Booking -->
        <section class="p-top-110 p-bottom-110 bg-dark-blue" data-aos="fade">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-xl-8">
                        <div class="text-center">
                            <div class="block-title">
                                <small class="sub-title text-light">Start Exploring</small>
                                <h2 class="h1 title text-white">Are you ready for adventures to Moliva?</h2>
                            </div>
                            <div class="d-md-inline-flex align-items-md-center">
                                <a href="tour-packages-1.html" class="btn btn-primary btn-uppercase mnw-180 me-2 ms-2 mt-4">
                                    <i class="hicon hicon hicon-bold hicon-menu-calendar"></i>
                                    <span>Book tours</span>
                                </a>
                                <a href="contact.html" class="btn btn-outline-light btn-uppercase mnw-180 me-2 ms-2 mt-4">
                                    <i class="hicon hicon hicon-email-envelope"></i>
                                    <span>Contact Us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Booking -->

        <!-- Testimonials -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="testimonials-slider-1 splide mb-5">
                    <!-- Title -->
                    <div class="d-xl-flex align-items-xl-center mb-3">
                        <div class="block-title me-auto">
                            <small class="sub-title">Genuine Reviews</small>
                            <h2 class="h1 title">Tourists talk about us</h2>
                        </div>
                        <div class="d-lg-flex align-items-lg mt-3">
                            <div class="d-md-flex align-items-md-center me-md-4">
                                <div class="extra-info me-4">
                                    <strong>+95K</strong>
                                    <span>Tour bookings</span>
                                </div>
                                <div class="extra-info me-4">
                                    <strong>4.9</strong>
                                    <span class="fw-medium text-secondary">
                                        <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-50"></span></span>
                                        <span>(+85K reviews)</span>
                                    </span>
                                </div>
                            </div>
                            <div class="splide__arrows splide__arrows__right">
                                <button class="splide__arrow splide__arrow--prev me-2">
                                    <i class="hicon hicon-edge-arrow-left"></i>
                                </button>
                                <button class="splide__arrow splide__arrow--next">
                                    <i class="hicon hicon-edge-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /Title -->
                    <!-- Reviews -->
                    <div class="splide__track pt-2 pb-2">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="testimonial-box shadow-sm rounded mb-1 hover-effect">
                                    <span class="testimonial-icon">
                                        <i class="hicon hicon-message-right"></i>
                                    </span>
                                    <div class="testimonial-client">
                                        <img src="{{asset('account/img/avatars/a1.jpg')}}" srcset="{{asset('account/img/avatars/a1%402x.jpg')}} 2x" alt="">
                                        <div class="name">
                                            <h3 class="h5 mb-0">John Doe</h3>
                                            <span>Venice, Italy</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote class="testimonial-review">
                                            Our trip to Moliva was amazing! Moliva Travel Agency organized everything perfectly,
                                            from the hotels to the sightseeing spots. I was very impressed and will definitely return!
                                        </blockquote>
                                        <div class="testimonial-star">
                                            <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-45"></span></span>
                                            <span class="testimonial-date rounded-1">Jun 25 24</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="testimonial-box shadow-sm rounded mb-1 hover-effect">
                                    <span class="testimonial-icon">
                                        <i class="hicon hicon-message-right"></i>
                                    </span>
                                    <div class="testimonial-client">
                                        <img src="{{asset('account/img/avatars/a2.jpg')}}" srcset="{{asset('account/img/avatars/a2%402x.jpg')}} 2x" alt="">
                                        <div>
                                            <h3 class="h5 mb-0">Emily Smith</h3>
                                            <span>Chicago, USA</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote class="testimonial-review">
                                            We had an unforgettable vacation in Moliva thanks to the excellent service of Moliva Travel Agency.
                                            The itinerary was well-arranged, and the support team was very helpful. Best trip ever!
                                        </blockquote>
                                        <div class="testimonial-star">
                                            <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-45"></span></span>
                                            <span class="testimonial-date rounded-1">Jun 28 24</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="testimonial-box shadow-sm rounded mb-1 hover-effect">
                                    <span class="testimonial-icon">
                                        <i class="hicon hicon-message-right"></i>
                                    </span>
                                    <div class="testimonial-client">
                                        <img src="{{asset('account/img/avatars/a3.jpg')}}" srcset="{{asset('account/img/avatars/a3%402x.jpg')}} 2x" alt="">
                                        <div>
                                            <h3 class="h5 mb-0">Alex Mark</h3>
                                            <span>Texas, USA</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote class="testimonial-review">
                                            Moliva is a perfect destination, and Moliva Travel Agency made our trip flawless.
                                            From booking to sightseeing activities, everything was wonderful. I am very satisfied!
                                        </blockquote>
                                        <div class="testimonial-star">
                                            <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-45"></span></span>
                                            <span class="testimonial-date rounded-1">Jun 28 24</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="testimonial-box shadow-sm rounded mb-1 hover-effect">
                                    <span class="testimonial-icon">
                                        <i class="hicon hicon-message-right"></i>
                                    </span>
                                    <div class="testimonial-client">
                                        <img src="{{asset('account/img/avatars/a4.jpg')}}" srcset="{{asset('account/img/avatars/a4%402x.jpg')}} 2x" alt="">
                                        <div>
                                            <h3 class="h5 mb-0">Ariol Deep</h3>
                                            <span>Lisbon, Portugal</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote class="testimonial-review">
                                            Moliva Travel Agency provided an excellent vacation in Moliva. Tours were well-organized,
                                            the schedule was great, and customer service was top-notch. Highly recommended!
                                        </blockquote>
                                        <div class="testimonial-star">
                                            <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-45"></span></span>
                                            <span class="testimonial-date rounded-1">Jun 28 24</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="testimonial-box shadow-sm rounded mb-1 hover-effect">
                                    <span class="testimonial-icon">
                                        <i class="hicon hicon-message-right"></i>
                                    </span>
                                    <div class="testimonial-client">
                                        <img src="{{asset('account/img/avatars/a3.jpg')}}" srcset="{{asset('account/img/avatars/a3%402x.jpg')}} 2x" alt="">
                                        <div>
                                            <h3 class="h5 mb-0">Alex Mark</h3>
                                            <span>Texas, USA</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote class="testimonial-review">
                                            Rationi bus incor rupte vim te. Choro nominati cum choro epicuri deleniti eu asse ntior te sit,
                                            mea tale movet docendi quae stio vis ut. An vitae altera fierent nam vis.
                                        </blockquote>
                                        <div class="testimonial-star">
                                            <span class="star-rate-view star-rate-size-sm"><span class="star-value rate-45"></span></span>
                                            <span class="testimonial-date rounded-1">Jun 28 24</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /Reviews -->
                </div>
            </div>
        </section>
        <!-- /testimonials -->

        <!-- Travel insight -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <!-- Title -->
                <div class="d-xl-flex align-items-xl-center mb-4">
                    <div class="block-title me-auto">
                        <small class="sub-title">Useful information</small>
                        <h2 class="h1 title">Moliva Travel Insight</h2>
                    </div>
                    <div class="extra-info mt-xl-3">
                        <strong>+500</strong>
                        <span>Useful articles about Moliva</span>
                    </div>
                </div>
                <!-- /Title -->
                <!-- Post list -->
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="{{asset('account/img/blog/b1.jpg')}}" srcset="{{asset('account/img/blog/b1%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">Top 10 Must-Visit Tourist Spots in Moliva</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="./{{asset('account/img/blog/b2.jpg')}}" srcset="{{asset('account/img/blog/b2%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html"> 5 Best Tips for an Amazing Moliva Trip</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="./{{asset('account/img/blog/b3.jpg')}}" srcset="{{asset('account/img/blog/b3%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">8 Key Essentials for Traveling to Moliva</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="./{{asset('account/img/blog/b4.jpg')}}" srcset="{{asset('account/img/blog/b4%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">Discover Beautiful Moliva: Nature's Paradise</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="./{{asset('account/img/blog/b6.jpg')}}" srcset="{{asset('account/img/blog/b6%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">Best Time Ever to Explore Moliva's Nature</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="./{{asset('account/img/blog/b5.jpg')}}" srcset="{{asset('account/img/blog/b5%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">10 Awesome Can't-Miss Check-in Spots in Moliva</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="{{asset('account/img/blog/b10.jpg')}}" srcset="{{asset('account/img/blog/b10%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">6 Tips for Booking a Beach Resort in Moliva</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="{{asset('account/img/blog/b11.jpg')}}" srcset="{{asset('account/img/blog/b11%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">5 reasons you should visit Fruska Swamp</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <!-- Post -->
                        <div class="post-mini mb-4 pb-lg-2">
                            <a href="single-post.html" class="post-img rounded">
                                <figure class="image-hover image-hover-overlay image-hover-scale">
                                    <img src="{{asset('account/img/blog/b12.jpg')}}" srcset="{{asset('account/img/blog/b12%402x.jpg')}} 2x" alt="">
                                </figure>
                            </a>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="single-post.html">4 ancient castles you should visit in Moliva</a>
                                </h3>
                                <div class="post-ext">
                                    <div class="post-date">
                                        <i class="hicon hicon-menu-calendar"></i>
                                        <span>Jun 30 2024</span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="hicon hicon-chat"></i>
                                        <span>36</span>
                                    </div>
                                    <div class="post-view">
                                        <i class="hicon hicon-installment-graph"></i>
                                        <span>754</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Post -->
                    </div>
                </div>
                <!-- /Post list -->
                <div class="text-center fw-normal text-secondary mt-2" data-aos="fade">
                    <a href="post-list.html" class="fw-medium">
                        <span>View all posts</span>
                        <i class="hicon hicon-flights-one-ways"></i>
                    </a>
                </div>
            </div>
        </section>
        <!-- /Travel insight -->

        <!-- Popular Topics -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <!-- Title -->
                <div class="d-xl-flex align-items-xl-center mb-4">
                    <div class="block-title me-auto">
                        <small class="sub-title">Most searched</small>
                        <h2 class="h1 title">Popular Topics</h2>
                    </div>
                    <div class="extra-info mt-xl-3">
                        <strong>+1.6K</strong>
                        <span>Topics of interest in Moliva</span>
                    </div>
                </div>
                <!-- /Title -->
                <!-- Tags -->
                <ul class="tag-list tag-lg mb-0">
                    <li><a href="#">Travel guide</a></li>
                    <li><a href="#">Tours</a></li>
                    <li><a href="#">Travel tips</a></li>
                    <li><a href="#">Travel</a></li>
                    <li><a href="#">Activities</a></li>
                    <li><a href="#">Noriva city</a></li>
                    <li><a href="#">Cuisine</a></li>
                    <li><a href="#">Explore</a></li>
                    <li><a href="#">Noriva tours</a></li>
                    <li><a href="#">Destinations</a></li>
                    <li><a href="#">Moliva tours</a></li>
                    <li><a href="#">Fruska Swamp</a></li>
                    <li><a href="#">Resort in Moliva</a></li>
                    <li><a href="#">Moliva's Nature</a></li>
                    <li><a href="#">Nature's Paradise</a></li>
                    <li><a href="#">Spots in Moliva</a></li>
                    <li><a href="#">Moliva Trip</a></li>
                    <li><a href="#">Ancient castles</a></li>
                    <li><a href="#">Travel Insight</a></li>
                    <li><a href="#">Kardal city</a></li>
                    <li><a href="#">Noriva Bay</a></li>
                    <li><a href="#">Leront lake</a></li>
                    <li><a href="#">Malota beach</a></li>
                    <li><a href="#">Panoda mountain</a></li>
                    <li><a href="#">Zolmir hill</a></li>
                    <li><a href="#">Sitafo bay</a></li>
                    <li><a href="#">Noriva castles</a></li>
                    <li><a href="#">Sitafo city</a></li>
                </ul>
                <!-- /Tags -->
            </div>
        </section>
        <!-- /Popular Topics -->

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

</body>

</html>
