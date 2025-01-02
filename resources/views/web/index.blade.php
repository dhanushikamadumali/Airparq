@extends('layouts.web.master')
@section('content')
<!-- Main -->
<main>
    <!-- Hero -->
    <section class="hero" data-aos="fade">
        <!-- Carousel -->
                     <div id="heroCarousel" class="hero-carousel carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Carousel item -->
                        <div class="hero-item carousel-item active">
                    <div class="hero-bg">
                        <img src="{{asset('account/img/hero/hero-bg4.jpg')}}"  alt="">
                    </div>
                    <div class="hero-caption text-sm-start">
                        <div class="container">
                            <div class="row">
                                  {{-- <div class="cloud1"> <img src="{{asset('account/img/hero/cloud1.png')}}"  alt=""></div> --}}
                                  {{-- <div class="cloud2"> <img src="{{asset('account/img/hero/cloud1.png')}}"  alt=""></div> --}}
                                <div class="col-12 col-md-6">
                                    <p  class="display-3 hero-title crouselheding1" style=" font-weight: 600;letter-spacing: -0.1px;" > Seamless <br/>Parking<br/>Stress-Free Travel</p>
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
                                {{-- <div class="col-12 col-xxl-6 col-xl-7 col-md-10"> --}}
                                <div class="col-12 col-md-6">
                                    <p  class="display-3 hero-title crouselheding1" style=" font-weight: 600;letter-spacing: -0.1px;" > Seamless <br/>Parking<br/>Stress-Free Travel</p>
                                </div>
                                {{-- </div> --}}
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
                                <div class="col-12 col-md-6">
                                    <p  class="display-3 hero-title crouselheding1" style="font-weight: 600;letter-spacing: -0.1px;" > Seamless <br/>Parking<br/>Stress-Free Travel</p>
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
            <div class="row justify-content-end ">
                <div class="col-12 col-xl-6">
                    <div class="search-tours search-hero search-hero-half" >
                            <form id="bookingForm"  class="search-tour-form " action="{{route('bookingdetailstep2')}}" method="post">
                                @csrf

                            <div class="search-tour-input">
                                <div class="row g-3 g-xl-2">
                                     <div class="col-12">
                                        <div class="alert alert-danger dangeralert" style="display:none"></div>
                                         @if(session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                       <label style="font-size:15px">Select Airport</label>
                                         <div class="input-icon-group">
                                            <label for="txtKeyword" class="input-icon hicon hicon-flights-pin"></label>
                                             <select class="form-select dropdown-select shadow-sm" id="airport" name="airport">
                                                <option value="London Heathrow" {{ $airport == 'London Heathrow' ? 'selected' : '' }}>London Heathrow</option>
                                                {{-- <option value="London Gatwick" {{ $airport == 'London Gatwick' ? 'selected' : '' }} >London Gatwick</option> --}}
                                                {{-- <option value="Stansted Airport" {{ $airport == 'Stansted Airport' ? 'selected' : '' }}>Stansted Airport</option> --}}
                                                {{-- <option value="Luton Airport" {{ $airport == 'Luton Airport' ? 'selected' : '' }}>Luton Airport</option> --}}
                                                {{-- <option value="Manchester Airport" {{ $airport == 'Manchester Airport' ? 'selected' : '' }}>Manchester Airport</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 g-xl-2 mb-20">
                                    <div class="col-12 col-md-8">
                                         <label style="font-size:15px">Start Date</label>
                                        <div class="mb-0">
                                            <input
                                                id="parking_from_date"
                                                name="parking_from_date"
                                                type="date"
                                                class="form-select shadow-sm"
                                                placeholder="Parking From"
                                                onchange="updateTillDateMin()"
                                                value="{{$fDate ?? ''}}"
                                                data-placeholder="Parking From">
                                            @error('parking_from_date')
                                                <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-0">
                                            @php
                                                // Generate hours (00 to 23)
                                                $hourOptions = [];
                                                for ($hour = 0; $hour < 24; $hour++) {
                                                    $hourOptions[] = str_pad($hour, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial hour for the dropdown
                                                $initialHour = $fHour ?? 00;
                                            @endphp
                                            <label style="font-size:15px">Start Hour</label>
                                            <select id="parking_from_hour" name="parking_from_hour" class="form-control">
                                                @foreach ($hourOptions as $hour)
                                                    <option value="{{ $hour }}" {{ $hour == $initialHour ? 'selected' : '' }}>{{ $hour }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_from_hour')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                            {{-- <input type="hidden" name="parking_from_time" id="parking_from_time"> --}}
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-2">
                                        <div class="mb-0">
                                            @php
                                                // Generate minutes (00 to 55 in increments of 5)
                                                $minuteOptions = [];
                                                for ($minute = 0; $minute < 60; $minute += 5) {
                                                    $minuteOptions[] = str_pad($minute, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial minute for the dropdown
                                                $initialMinute = $fMin ?? 00;
                                            @endphp
                                            <label style="font-size:15px">Minute</label>
                                            <select id="parking_from_min" name="parking_from_min" class="form-control">
                                                @foreach ($minuteOptions as $minute)
                                                    <option value="{{ $minute }}" {{ $minute == $initialMinute ? 'selected' : '' }}>{{ $minute }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_from_min')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 g-xl-2 mb-20">
                                     <div class="col-12 col-md-8">
                                         <label style="font-size:15px">End Date</label>
                                         <div class="mb-0">
                                            <input id="parking_till_date" name="parking_till_date" type="date" class="form-select " placeholder="Parking Till" value="{{$tDate ?? ''}}">
                                             @error('parking_till_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-0">
                                            @php
                                                // Generate hours (00 to 23)
                                                $hourOptions = [];
                                                for ($hour = 0; $hour < 24; $hour++) {
                                                    $hourOptions[] = str_pad($hour, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial hour for the dropdown
                                                $initialHour = $tHour ?? 00;
                                            @endphp
                                            <label style="font-size:15px">End Hour</label>
                                            <select id="parking_till_hour" name="parking_till_hour" class="form-control">
                                                @foreach ($hourOptions as $hour)
                                                    <option value="{{ $hour }}" {{ $hour == $initialHour ? 'selected' : '' }}>{{ $hour }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_till_hour')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="mb-0">
                                            @php
                                                // Generate minutes (00 to 55 in increments of 5)
                                                $minuteOptions = [];
                                                for ($minute = 0; $minute < 60; $minute += 5) {
                                                    $minuteOptions[] = str_pad($minute, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial minute for the dropdown
                                                $initialMinute = $tMin ?? 00;
                                            @endphp
                                            <label style="font-size:15px">Minute</label>
                                            <select id="parking_till_min" name="parking_till_min" class="form-control">
                                                @foreach ($minuteOptions as $minute)
                                                    <option value="{{ $minute }}" {{ $minute == $initialMinute ? 'selected' : '' }}>{{ $minute }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_till_min')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                             {{-- <input type="hidden" name="parking_end_time" id="parking_end_time"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 g-xl-2 mb-20" style="margin-bottom:20px">
                                     <div class="col-12">
                                         <label style="font-size:15px"> Promo Code</label>
                                         <div class="mb-0">
                                            <div class="input-icon-group">
                                                 <label class="input-icon hicon hicon-adults-line hicon-bold" for="txtCheckDate2"></label>
                                                <input id="promocode" name="promocode" type="Text" class="form-control shadow-sm" placeholder="Promo code"  value="{{ $pCode ?? '' }}">
                                                  @error('promocode')
                                                <div style="color:red">{{$message}}</div>
                                                @enderror
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
                        <small class="sub-title" >Why AIRPARQ</small>
                        <div class="headingtitle undelinetitle">Meet & Greet Airport Parking?</div>
                        {{-- <div class="a">This is some text with an underline.</div> --}}
                    </div>
                </div>
                <!-- /Title -->
                <!-- Category list -->
                <div class="row g-3">

                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/expertist.png')}}" style="width:100px;height:50px" alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="card-title">Expertise You Can Trust</h3>
                                <small class="card-desc">Benefit from our expertise in airport parking. Your vehicle is in safe hands with AIRPARQ.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a  class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/unpararel.png')}}" style="width:100px;height:50px" alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="card-title">Unparalleled Convenience</h3>
                                <small class="card-desc">Say goodbye to the stress of airport parking and hello to seamless travel with AIRPARQ.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a class="mini-card card-hover hover-effect shadow-sm rounded">
                            <span class="card-icon">
                                <img src="{{asset('account/img/satisfaction-guaranteed.png')}}" style="width:100px;height:50px" alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="card-title">Satisfaction Guaranteed</h3>
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
    <section class="p-top-50 p-bottom-50 bg-gray-gradient" data-aos="fade">
        <div class="container">
            <!-- Title -->
            <div class="d-xl-flex align-items-xl-center pb-4">
                <div class="block-title me-auto">
                    <h2 class="headingtitle undelinetitle">How does it work?</h2>
                </div>
            </div>
            <!-- /Title -->
            <!-- Types -->
            <div class="row g-3 g-xl-4">
                <div class="col-12 col-xl-4 col-md-6 howitwork">
                    <a class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="card-icon">
                            <i class="hicon hicon-family-with-teens"></i>
                        </div>
                        <h3 class="cardtitle" >Book Online</h3>
                        <small class="card-desc" style="text-align:justify">Conveniently reserve your parking spot through our user-friendly online booking system.</small>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6 howitwork">
                    <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="card-icon">
                            <i class="hicon hicon-regular-travel-protection"></i>
                        </div>
                        <h3 class="cardtitle">Drop-off at Terminal</h3>
                        <small class="card-desc" style="text-align:justify">Arrive at the airport and drive directly to the terminal, where our valet will be waiting to collect your vehicle.</small>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6 howitwork">
                    <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="card-icon">
                            <i class="hicon hicon-tours"></i>
                        </div>
                        <h3 class="cardtitle">Pick-up at Arrival</h3>
                        <small class="card-desc" style="text-align:justify">Upon your return, your car will be brought to the terminal for a seamless departure.</small>
                    </a>
                </div>
            </div>
            <!-- /Types -->
        </div>
    </section>
    <!-- /Tour types -->
     <div class="p-top-50 p-bottom-50 bg-gray-gradient" data-aos="fade">
         <!-- Title -->
        <div class="text-center mb-4">
            <div class="block-title">
                <h2 class="h1 title"></h2>
            </div>
        </div>
        <!-- /Title -->
        <!-- Shopping cart -->
        <section class="container" id="step1">
            <div class="row g-0 g-xl-8">                <!-- Form View Button (only visible on mobile) -->
                    <div class="pe-xl-4 me-xl-2" >                          <!-- Terminal View (Card) -->
                                <div class="row g-10 g-xl-8">
                                    <div class="tour-grid">
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
        </section>
        <!-- /Shopping cart -->
    </div>
    <!-- Why -->
    <section class="p-top-50 p-bottom-20 " data-aos="fade">
        <div class="container">
            <div class="row g-0">
                <div class="col-12 col-xl-1 order-0 order-xl-1"></div>
                  <div class="col-12 col-xl-5 order-0 order-xl-1">
                      <!-- Contact Form -->
                    <div class="form-contact rounded shadow-sm" style="margin-top:20px;margin-bottom:50px">
                        <form class="search-tour-form" action="{{route('storecontactus')}}" method="post">
                            @csrf
                            <div class="border-bottom pb-4 mb-4">
                                <h1 class="headingtitle">Still have question?</h3>
                            </div>
                            <div class="alert d-none" role="alert" id="msg_alert"></div>
                            <div class="form-floating mb-4">
                                <input id="txtYourName" type="text" name="name" class="form-control shadow-sm" placeholder="Your Name" required="">
                                <label for="txtYourName">Your Name *</label>
                                  @error('name')
                                    <div style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <input id="txtEmail" type="email" name="email" class="form-control shadow-sm" placeholder="Email" required="">
                                <label for="txtEmail">Your Email *</label>
                                  @error('email')
                                    <div style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-floating mb-4">
                                <textarea id="txtMessage" name="comment" class="form-control shadow-sm" placeholder="Message" style="height: 150px" required=""></textarea>
                                <label for="txtMessage">Message *</label>
                                  @error('comment')
                                    <div style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                             <div class="col-12" >
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary btn-uppercase w-100" id="booking" style="font-size:10px">
                                        <i class="hicon hicon-email-envelope hicon-md mr-1"></i>
                                        <span>Send message</span>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /Contact Form -->
                </div>
                <br/>
                <div class="col-12 col-xl-6 order-1 order-xl-0">
                      <!-- Content -->
                    <div class="mb-5">
                        <div class="block-title">
                             <h2 class="headingtitle ">Frequently Asked Questions</h2>
                        </div>
                        <div class="accordion accordion-flush accordion-why mb-4" id="acdWhy">
                            <div class="accordion-item " style="background-color:#0E233E;color:#fff">
                                <h2 class="accordion-header" style="color:#fff;padding:8px" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent1" aria-expanded="false" aria-controls="acdContent1" >
                                        <i class="fa fa-square" style="color:#fff"></i>
                                        <span style="font-size:18px;font-weight:600;color:#fff">How does AIRPARQ's meet and greet parking service work?</span>
                                    </button>
                                </h2>
                                <div id="acdContent1" class="accordion-collapse collapse" data-bs-parent="#acdWhy" style="padding:10px">
                                    <small class="accordion-body" style="text-align:justify">
                                         Simply book your parking spot online, drive to the airport terminal on your departure day, and our valet will meet you there to collect your vehicle. Upon your return, contact us, and your car will be waiting for you at the terminal.
                                    </small>
                                </div>
                            </div>
                            <div class="accordion-item " style="background-color:#0E233E;color:#fff">
                                <h2 class="accordion-header" style="color:#fff;padding:8px" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent2" aria-expanded="false" aria-controls="acdContent2" >
                                        <i class="fa fa-square" style="color:#fff"></i>
                                        <span style="font-size:18px;font-weight:600;color:#fff">Is my vehicle safe with AIRPARQ?</span>
                                    </button>
                                </h2>
                                <div id="acdContent2" class="accordion-collapse collapse" data-bs-parent="#acdWhy" style="padding:10px">
                                    <small class="accordion-body" style="text-align:justify">
                                        Absolutely. While your vehicle is parked at our facilities, it is under surveillance and safeguarded. However, it's important to note that any theft or damages that occur while parked are the owner's responsibility. Nevertheless, rest assured that during the transit to and from the airport, your vehicle is fully protected by our insurance, providing added peace of mind for your journey.
                                    </small>
                                </div>
                            </div>

                            <div class="accordion-item " style="background-color:#0E233E;color:#fff">
                                <h2 class="accordion-header" style="color:#fff;padding:8px" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent3" aria-expanded="false" aria-controls="acdContent3" >
                                        <i class="fa fa-square" style="color:#fff"></i>
                                        <span style="font-size:18px;font-weight:600;color:#fff">Can I make changes to my booking?</span>
                                    </button>
                                </h2>
                                <div id="acdContent3" class="accordion-collapse collapse" data-bs-parent="#acdWhy" style="padding:10px">
                                    <small class="accordion-body" style="text-align:justify">
                                        Yes, you can modify or cancel your booking up to a certain time before your scheduled arrival. Check our booking policy for details or contact our customer support team for assistance.
                                    </small>
                                </div>
                            </div>

                              <div class="accordion-item " style="background-color:#0E233E;color:#fff">
                                <h2 class="accordion-header" style="color:#fff;padding:8px" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent4" aria-expanded="false" aria-controls="acdContent4" >
                                        <i class="fa fa-square" style="color:#fff"></i>
                                        <span style="font-size:18px;font-weight:600;color:#fff">What if my flight is delayed?</span>
                                    </button>
                                </h2>
                                <div id="acdContent4" class="accordion-collapse collapse" data-bs-parent="#acdWhy" style="padding:10px">
                                    <small class="accordion-body" style="text-align:justify">
                                        Don't worry. We track flight arrivals in real-time, so our team will be aware of any delays. Your car will be ready for you whenever you arrive.
                                    </small>
                                </div>
                            </div>

                            <div class="accordion-item " style="background-color:#0E233E;color:#fff">
                                <h2 class="accordion-header" style="color:#fff;padding:8px" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent5" aria-expanded="false" aria-controls="acdContent5" >
                                        <i class="fa fa-square" style="color:#fff"></i>
                                        <span style="font-size:18px;font-weight:600;color:#fff">How far in advance should I book my parking spot?</span>
                                    </button>
                                </h2>
                                <div id="acdContent5" class="accordion-collapse collapse" data-bs-parent="#acdWhy" style="padding:10px">
                                    <small class="accordion-body" style="text-align:justify">
                                         It's best to book as early as possible to ensure availability, especially during peak travel times. However, we also accept last-minute bookings, subject to availability.
                                    </small>
                                </div>
                            </div>

                              <div class="accordion-item " style="background-color:#0E233E;color:#fff">
                                <h2 class="accordion-header" style="color:#fff;padding:8px" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent6" aria-expanded="false" aria-controls="acdContent6" >
                                        <i class="fa fa-square" style="color:#fff"></i>
                                        <span style="font-size:18px;font-weight:600;color:#fff">Do you offer discounts for frequent travellers or long-term parking?</span>
                                    </button>
                                </h2>
                                <div id="acdContent6" class="accordion-collapse collapse" data-bs-parent="#acdWhy" style="padding:10px">
                                    <small class="accordion-body" style="text-align:justify">
                                        Yes, we offer discounts for frequent travellers and long-term parking. Contact us for more information on our loyalty programs and special offers.
                                    </small>
                                </div>
                            </div>

                            <div class="accordion-item " style="background-color:#0E233E;color:#fff">
                                <h2 class="accordion-header" style="color:#fff;padding:8px" >
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acdContent7" aria-expanded="false" aria-controls="acdContent7" >
                                        <i class="fa fa-square" style="color:#fff"></i>
                                        <span style="font-size:18px;font-weight:600;color:#fff">Do prices exclude airport access fees?</span>
                                    </button>
                                </h2>
                                <div id="acdContent7" class="accordion-collapse collapse" data-bs-parent="#acdWhy" style="padding:10px">
                                    <small class="accordion-body" style="text-align:justify">
                                        Yes, the prices exclude airport access fees. Also, the customer/owner has to bear the cost of paying the ULEZ if the vehicle does not meet the ULEZ standards. The customer has to pay ULEZ for both days (the day of dropoff and the day of collection)
                                    </small>
                                </div>
                            </div>


                            <div style="margin-top:10px">Any questions? Just visit our <a href={{route('contactus')}} style="color:#FFD31C">Contact Us</a></div>
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
@endsection
    <script>
        // Set minimum date for both inputs
        document.addEventListener('DOMContentLoaded', () => {
            const currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
            const fromDateInput = document.getElementById('parking_from_date');
            const tillDateInput = document.getElementById('parking_till_date');
            if (fromDateInput && tillDateInput) {
                // Set the min attribute to current date
                fromDateInput.min = currentDate;
                tillDateInput.min = currentDate;
            }
        });

        function updateTillDateMin() {
            const fromDateInput = document.getElementById('parking_from_date');
            const tillDateInput = document.getElementById('parking_till_date');

            if (fromDateInput && tillDateInput) {
                // Get selected "From Date"
                const selectedFromDate = fromDateInput.value;

                // Update the min attribute of "Till Date"
                tillDateInput.min = selectedFromDate;

                // Clear "Till Date" if it's earlier than the selected "From Date"
                if (tillDateInput.value && tillDateInput.value < selectedFromDate) {
                    tillDateInput.value = '';
                }
            }
        }

    </script>



