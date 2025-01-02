<!-- Header -->
<header id="header">
    <!-- Header Topbar -->
    @if($promoList !== null && count($promoList) > 0)
       <div class="header-topbar" style="text-align:center">
          <div class="container-fluid">
            <div class="row g-0 justify-content-center">
                <span style="color:white; font-size:14px;font-weight:600">
                    15% OFF on all bookings (Promo Code "{{$promoList[0]->promo_code}}")
                </span>
            </div>
          </div>
       </div>
    @elseif($promoList === null)
       <div class="header-topbar" style="display:none;"></div>
    @endif
    <!-- /Header Topbar -->
    <!-- Header Navbar -->
    <div class="header-navbar" style="background-color:#FFD31C">
        <div class="container-fluid">
        <nav class="navbar navbar-expand-xl">
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" >
                <i class="hicon hicon-bold hicon-hamburger-menu"></i>
            </button>
                <a class="navbar-brand" href="{{route('/')}}" >
                      @if(empty($csetting) || empty($csetting['image']))
                        <img
                            src="{{ asset('assets/img/logo.png') }}"
                            alt="navbar brand"
                            class="navbar-brand navbar-brand-logo"
                        />
                    @else
                        <img
                            src="{{ asset('assets/img/' . $csetting['image']) }}"
                            alt="navbar brand"
                            class="navbar-brand navbar-brand-logo"
                        />
                    @endif
                </a>
                <div class="offcanvas offcanvas-navbar offcanvas-start border-end-0" tabindex="-1" id="offcanvasNavbar">
                    <div class="offcanvas-header border-bottom p-xl-0">
                        <a class="d-inline-block" href="{{route('/')}}" >
                              @if(empty($csetting) || empty($csetting['image']))
                                <img
                                    src="{{ asset('assets/img/logo.png') }}"
                                    alt="navbar brand"
                                    class="navbar-brand navbar-brand-logo"
                                />
                            @else
                                <img
                                    src="{{ asset('assets/img/' . $csetting['image']) }}"
                                    alt="navbar brand"
                                    class="navbar-brand navbar-brand-logo"
                                />
                            @endif
                        </a>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body navbarlink">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('/') ? 'active' : '' }}" href="{{ route('/') }}" data-bs-display="static">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('aboutus') ? 'active' : '' }}" href="{{ route('aboutus') }}" data-bs-display="static">
                                    <span>About Us</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('howitworks') ? 'active' : '' }}" href="{{ route('howitworks') }}" data-bs-display="static">
                                    <span>How It Works</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('contactus') ? 'active' : '' }}" href="{{ route('contactus') }}" data-bs-display="static">
                                    <span>Contact Us</span>
                                </a>
                            </li>
                             <li class="nav-item">
                                <div class="hero-action" style="margin-top:20px"  >
                                <a href="{{route('showbookingone')}}" class="btn btn-primary bookingbtn" >
                                    <span>BOOK NOW</span>
                                </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown user-menu ms-xl-auto">
                    <button class="circle-icon circle-icon-link circle-icon-link-hover" data-bs-toggle="dropdown" data-bs-display="static" >
                        <i class="hicon hicon-mmb-account"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end animate slideIn" data-bs-popper="static">
                        <li>
                            <a class="dropdown-item" href="{{route('showregister')}}">
                                <i class="hicon hicon-edit me-1"></i>
                                <span>Register</span>
                            </a>
                        </li>
                        @if(auth()->guard('account')->check())
                         <li>
                            </form>
                            <div class="dropdown-user-scroll scrollbar-outer">
                             <a class="dropdown-item" href="{{ route('account.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="hicon hicon-aps-lock me-1"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('account.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </div>
                        </li>
                        @else
                          <li>
                            <a class="dropdown-item" href="{{route('showlogin')}}">
                                <i class="hicon hicon-aps-lock me-1"></i>
                                <span>Login</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
        </nav>
        </div>
    </div>
    <!-- /Header Navbar -->
</header>
<!-- /Header -->
