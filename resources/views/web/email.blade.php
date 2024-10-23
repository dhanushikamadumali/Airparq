
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('account/img/logos/logo.png')}}" rel="shortcut icon" type="image/png">
    <link href="{{asset('account/css/theme-1.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-3.min.css')}}" rel="stylesheet">
</head>
<!-- /Head -->
<style>
    /* Media query for mobile view (up to 768px) */
    @media (max-width: 768px) {
        .nav-link.active span {
            color: #EBC51E; /* Set the color you want for mobile view */
        }
        .bookingbtn{
            background-color:#FFD31C;
        }
    }
</style>
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
                          @if(empty($csetting) || empty($csetting['image']))
                            <img
                                src="{{ asset('assets/img/logo.png') }}"
                                alt="navbar brand"
                                class="navbar-brand"
                            style="width:200px;height:60px"
                            />
                        @else
                            <img
                                src="{{ asset('assets/img/' . $csetting['image']) }}"
                                alt="navbar brand"
                                class="navbar-brand"
                            style="width:200px;height:60px"
                            />
                        @endif

                    </a>
                    <div class="offcanvas offcanvas-navbar offcanvas-start border-end-0" tabindex="-1" id="offcanvasNavbar">
                        <div class="offcanvas-header border-bottom p-4 p-xl-0">
                            <a class="d-inline-block" href="{{route('/')}}" >
                                  @if(empty($csetting) || empty($csetting['image']))
                                    <img
                                        src="{{ asset('assets/img/logo.png') }}"
                                        alt="navbar brand"
                                        class="navbar-brand"
                                    style="width:200px;height:60px"
                                    />
                                @else
                                    <img
                                        src="{{ asset('assets/img/' . $csetting['image']) }}"
                                        alt="navbar brand"
                                        class="navbar-brand"
                                    style="width:200px;height:60px"
                                    />
                                @endif
                            </a>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-4 p-xl-0">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('/')}}" data-bs-display="static">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('aboutus')}}" data-bs-display="static">
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
                                 <li class="nav-item">
                                    <div class="hero-action" style="margin-top:20px"  >
                                    <a href="{{route('showbookingone')}}" class="btn btn-outline-light btn-uppercase mnw-180 me-4 bookingbtn">
                                        <span>BOOK NOW</span>
                                    </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
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

        <!-- Login -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-5 col-lg-8 col-md-9">
                        <div class="card border-0 shadow-sm p-xl-2">
                            <div class="card-body">
                                <div class="border-bottom mb-4">
                                    <h1 class="h2 text-body-emphasis">Reset Password</h1>
                                </div>
                                     <form method="POST" action="">
                                    @csrf
                                    <!-- Login Email -->
                                    <div class="border-bottom pb-4">
                                        <div class="mb-4">
                                            <label for="txtEmail" class="form-label">Email<span class="text-danger">*</span></label>
                                             <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror shadow-sm" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="mb-4">
                                            <label for="txtPassword" class="form-label">Password<span class="text-danger">*</span></label>
                                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow-sm" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-6">
                                            <button class="btn btn-primary w-100" type="submit" id="btnSubmit">
                                                <i class="hicon hicon-aps-lock"></i>
                                                <span>Login</span>
                                            </button>
                                        </div>
                                         <div class="row">
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6">
                                                <div class="mb-4 text-end">
                                                    <a href="forgot-password.html">Forgot password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Login Email -->
                                    <div class="mt-4">
                                        <span>Don't have an account? <a href="register.html">Register</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Login -->

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
                                  @if(empty($csetting) || empty($csetting['image']))
                                    <img
                                        src="{{ asset('assets/img/logo.png') }}"
                                        alt="navbar brand"
                                        class="navbar-brand"
                                    style="width:200px;height:60px"
                                    />
                                @else
                                    <img
                                        src="{{ asset('assets/img/' . $csetting['image']) }}"
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
                                    @if(!empty($csetting) || !empty($csetting['address']))
                                        <span>{{$csetting['address']}}</span>
                                    @else
                                        <span>Defult address</span>
                                    @endif
                                </p>
                                <p>
                                    @if(!empty($csetting) || !empty($csetting['phone1']))
                                        <span>{{$csetting['phone1']}}</span>
                                    @else
                                        <span>Defult no1</span>
                                    @endif
                                </p>
                                <p>
                                    @if(!empty($csetting) || !empty($csetting['phone2']))
                                        <span>{{$csetting['phone2']}}</span>
                                    @else
                                        <span>Defult no2</span>
                                    @endif
                                </p>
                                <p>
                                      @if(!empty($csetting) || !empty($csetting['email']))
                                        <a href="#">{{$csetting['email']}}</a>
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

