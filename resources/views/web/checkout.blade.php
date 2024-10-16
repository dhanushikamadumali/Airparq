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
                            <a class="d-inline-block" href="{{route('/')}}" >
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

        <div class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
                <section class="container" id="step2"  >
                <div class="row g-0">
                      <div class="col-12 col-xl-8">
                         <form class="search-tour-form" action="{{route('storebooking')}}" method="post">
                        @csrf
                        <div class="pe-xl-4 me-xl-2">
                             <!-- Booking & Payment -->
                            <div class="card border-0 shadow-sm z-0" data-aos="fade">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h2 class="h3 ff-primary mb-0 text-body-emphasis">Your Information</h2>
                                    </div>
                                        <div class="border-bottom pb-4 mb-4">
                                            <div class="row g-3">
                                            <input type="hidden" id="customer_id" name="customer_id" value="{{$cusid}}">
                                            <input type="hidden" id="promocode" name="promocode" value="{{$pCode}}">
                                            <input type="hidden" id="airport" name="airport" value="{{$airport}}">
                                            <input type="hidden" class="form-control shadow-sm" id="parking_from_date" name="parking_from_date"  value={{$fDate}}>
                                            <input type="hidden" class="form-control shadow-sm" id="parking_from_time" name="parking_from_time" value={{$fTime}}>
                                            <input type="hidden" class="form-control shadow-sm" id="parking_till_time" name="parking_till_time" value={{$tTime}}>
                                            <input type="hidden" class="form-control shadow-sm" id="parking_till_date" name="parking_till_date"  value={{$tDate}}>
                                            <input type="hidden" class="form-control shadow-sm" id="bookingprice" name="bookingprice"  value={{$price}}>
                                            <input type="hidden" class="form-control shadow-sm" id="bookingdiscount" name="bookingdiscount"value={{$discount}}>
                                            <input type="hidden" class="form-control shadow-sm" id="price" name="price"  value={{ $tPrice}}>
                                            <input type="hidden" class="form-control shadow-sm" id="inbound_terminal" name="inbound_terminal"  value={{$terminalid}}>

                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="first_name">Firt Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="first_name" name="first_name"  value="{{$cusfname}}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="last_name">Last Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="last_name" name="last_name"  value="{{$cuslname}}" >
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control shadow-sm" id="email" name="email" value="{{$cusemail}}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="phone_no">Phone<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="phone_no" name="phone_no"  value="{{$cusphoneno}}" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-bottom pb-4 mb-4">
                                            <h3 class="h4 mb-4">Flight Information</h3>
                                             <div class="row g-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="inbound_terminal">Inbound Terminal<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm"  value="{{$terminalname}}"  >
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="inbound_flightno">Outbound  Terminal <span class="text-danger">*</span></label>
                                                        <select class="form-select dropdown-select shadow-sm" id="outbound_terminal" name="outbound_terminal">
                                                          @foreach ($allterminallists as $allterminallist )
                                                         {{ (old('outbound_terminal') == $allterminallist->id || isset($selectedTerminal) && $selectedTerminal == $allterminallist->id) ? 'selected' : '' }}>
                                                         <option value="{{$allterminallist->id}}" selected="">{{$allterminallist->name}}</option>
                                                          @endforeach
                                                         </select>

                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="outbound_terminal">Inbound Flight No<span class="text-danger">*</span></label>
                                                         <div class="input-icon-group">
                                                            <input type="text" class="form-control shadow-sm" id="inbound_flight_number " name="inbound_flight_number"  >
                                                              @error('inbound_flight_number')
                                                            <div style="color:red">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="outbound_flightno">Outbound Flight No<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="outbound_flight_number" name="outbound_flight_number">
                                                         @error('outbound_flight_number')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_arrival_date">Flight Arrival Date<span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control shadow-sm" id="flight_arrival_date" name="flight_arrival_date">
                                                         @error('flight_arrival_date')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_arrival_time">Flight Arrival Time<span class="text-danger">*</span></label>
                                                        <input type="time" class="form-control" id="flight_arrival_time" name="flight_arrival_time" >
                                                          @error('flight_arrival_time')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_departure_date">Flight Departure Date<span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control shadow-sm" id="flight_departure_date" name="flight_departure_date" >
                                                         @error('flight_departure_date')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_departure_time">Flight Departure Time<span class="text-danger">*</span></label>
                                                        <input type="time" class="form-control " id="flight_departure_time" name="flight_departure_time" >
                                                          @error('flight_departure_time')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-bottom pb-4 mb-4">
                                            <h3 class="h4 mb-4">Vehicle Information</h3>
                                            <div class="row g-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="vehicle_reg">Vehicle Registration<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_reg" name="vehicle_reg" >
                                                          @error('vehicle_reg')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="vehicle_manufacturer">Vehicle Manufaturer<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_manufacturer" name="vehicle_manufacturer"  >
                                                          @error('vehicle_manufacturer')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="vehicle_model">Vehicle Model<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_model"  name="vehicle_model" >
                                                         @error('vehicle_model')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="vehicle_color">Vehicle Color<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_color" name="vehicle_color" >
                                                           @error('vehicle_color')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                </div>
                            </div>
                            <!-- /Booking & Payment -->
                        </div>

                    </div>



                     <div class="col-12 col-xl-4">
                        <!-- Selected tours -->
                        <div class="pe-xl-4 me-xl-2">
                            <div class="card border-0 shadow-sm mb-4" data-aos="fade">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h2 class="h3 ff-primary mb-0 text-body-emphasis">Booking Summary</h2>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="h5 mb-2">
                                            <a href="single-tour-1.html" class="link-dark link-hover">Parking Start From</a>
                                        </h3>
                                        <div class="mb-2">
                                            <small class="me-2"><i class="hicon hicon-menu-calendar"></i>:<span id="fromDate">{{$fDate}}</span></small>
                                        </div>
                                         <div class="d-flex flex-column">
                                            <small class="mb-2">Time: <span id="fromTime">{{$fTime}}</span></small>
                                        </div>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="h5 mb-2">
                                            <a href="single-tour-1.html" class="link-dark link-hover">Parking Till</a>
                                        </h3>
                                        <div class="mb-2">
                                            <small class="me-2"><i class="hicon hicon-menu-calendar"></i>:<span id="tillDate">{{$tDate}}</span></small>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small class="mb-2">Time: <span id="tillTime">{{$tTime}}</span></small>
                                        </div>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="h5 mb-2">
                                            <a href="single-tour-1.html" class="link-dark link-hover">Package Details</a>
                                        </h3>
                                        <div class="mt-1">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <strong class="fs-5">Price:</strong>
                                                <span class="fs-2 fw-semibold text-body-emphasis"><sup>£</sup><span id="price">{{$price}}</span></span>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <strong class="fs-5">Discount:</strong>
                                                <span class="fs-2 fw-semibold text-body-emphasis"><sup>£</sup><span id="discount">{{$discount}}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pb-2 mb-4">
                                        <h3 class="h4 mb-4">Payment method</h3>
                                        <div class="d-inline-flex align-items-center mb-3">
                                            <strong class="fs-5 me-2">Total:</strong>
                                            <span class="fs-2 fw-semibold text-body-emphasis"><sup>£</sup><span id="totalprice">{{ $tPrice}}</span></span>
                                        </div>
                                    </div>
                                      <button type="submit" class="btn btn-primary btn-uppercase w-100" id="booking">
                                        <i class="hicon hicon-mmb-my-booking hicon-md mr-1"></i>
                                        <span>Book and pay</span>
                                    </button>
                                </div>
                            </div>

                            </form>
                        </div>
                        <!-- /Selected tours -->
                    </div>
                </div>
               </section>


        </div>

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
