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
    <link href="{{asset('account/img/logos/favicon.png')}}" rel="shortcut icon" type="image/png">
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
                                <a class="dropdown-item" href="">
                                    <i class="hicon hicon-edit me-1"></i>
                                    <span>Register</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
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

        <!-- Language -->
        {{-- <div class="modal fade" id="mdlLanguage" tabindex="-1" aria-labelledby="h3Language" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header">
                        <span class="fs-3 modal-title text-body-emphasis fw-medium" id="h3Language">Select language</span>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-unstyled row mb-0">
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/en.svg')}}" height="16" alt="">
                                        <span class="ms-2">English</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/fr.svg')}}" height="16" alt="">
                                        <span class="ms-2">Français</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/es.svg')}}" height="16" alt="">
                                        <span class="ms-2">Español</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/de.svg')}}" height="16" alt="">
                                        <span class="ms-2">Deutsch</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/it.svg')}}" height="16" alt="">
                                        <span class="ms-2">Italiano</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/nl.svg')}}" height="16" alt="">
                                        <span class="ms-2">Nederlands</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/pt.svg')}}" height="16" alt="">
                                        <span class="ms-2">Português</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/ru.svg')}}" height="16" alt="">
                                        <span class="ms-2">Русский</span>
                                    </span>
                                </a>
                            </li>
                            <li class="col-6 col-lg-4">
                                <a href="index-1.html?lang=en" class="link-dark link-hover">
                                    <span class="d-flex align-items-center pt-2 pb-2">
                                        <img src="{{asset('account/img/flags/cn.svg')}}" height="16" alt="">
                                        <span class="ms-2">日本語</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /Language -->

        {{-- <!-- Currency -->
        <div class="modal fade" id="mdlCurrency" tabindex="-1" aria-labelledby="h3Currency" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header">
                        <span class="fs-3 modal-title text-body-emphasis fw-medium" id="h3Currency">Select currency</span>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-unstyled row mb-0">
                            <li class="col-12 col-lg-6">
                                <a href="index-2.html?currency=usd" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>USD</strong> (United States Dollar)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-3.html?currency=eur" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>EUR</strong> (Euro)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-4.html?currency=gbp" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>GBP</strong> (Pound Sterling)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-5.html?currency=aud" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>AUD</strong> (Australian Dollar)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-6.html?currency=nzd" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>NZD</strong> (New Zealand Dollar)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-7.html?currency=cad" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>CAD</strong> (Canadian Dollar)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-8.html?currency=jpy" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>JPY</strong> (Japanese Yen)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-9.html?currency=cny" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>CNY</strong> (Chinese Yuan)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-10.html?currency=vnd" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>VND</strong> (Vietnam Dong)</span>
                                </a>
                            </li>
                            <li class="col-12 col-lg-6">
                                <a href="index-11.html?currency=sgd" class="link-dark link-hover">
                                    <span class="d-block pt-2 pb-2"><strong>SGD</strong> (Singapore Dollar)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Currency --> --}}

    </header>
    <!-- /Header -->

    <!-- Main -->
    <main>

        <!-- Register -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-5 col-lg-7 col-md-9">
                        <div class="card border-0 shadow-sm p-xl-2" data-aos="fade">
                            <div class="card-body">
                                <div class="border-bottom mb-4">
                                    <h1 class="h2 text-body-emphasis">Register</h1>
                                </div>
                                    <form method="POST" action="{{ route('storeregister') }}">
                                    @csrf
                                    <div class="border-bottom pb-4">
                                        <div class="mb-4">
                                            <label>First Name<span class="text-danger">*</span></label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror shadow-sm" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                             @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label>Last Name<span class="text-danger">*</span></label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror shadow-sm" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                             @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror shadow-sm" name="email" value="{{ old('email') }}" required autocomplete="email">
                                             @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label>Phone no<span class="text-danger">*</span></label>
                                            <input id="phone_no" type="text" class="form-control shadow-sm @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no">
                                            @error('phone_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow-sm" name="password" required autocomplete="new-password">
                                             @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                         <div class="mb-4">
                                            <label>Confirmation password<span class="text-danger">*</span></label>
                                            <input id="cpassword" type="password" class="form-control shadow-sm" name="password_confirmation" required autocomplete="new-password">

                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">
                                            <i class="hicon hicon-profiles"></i>
                                            <span>Register</span>
                                        </button>
                                    </div>
                                    </form>
                                    <div class="mt-4">
                                        <span>Already have an account? <a href="login.html">Login</a></span>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Register -->

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
