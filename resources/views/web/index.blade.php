@extends('layouts.web.master')
@section('content')
<!-- Main -->
<main>
    <!-- Hero -->
    <section class="hero" data-aos="fade">
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
                                                   <option value="London Heathrow" {{ $airport == 'London Heathrow' ? 'selected' : '' }}>London Heathrow</option>
                                                <option value="New York JFK" {{ $airport == 'New York JFK' ? 'selected' : '' }}>New York JFK</option>
                                                <option value="Tokyo Narita" {{ $airport == 'Tokyo Narita' ? 'selected' : '' }}>Tokyo Narita</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 g-xl-2 mb-20" style="margin-bottom:20px">
                                     <div class="col-12 col-md-8">
                                         <div class="mb-0">
                                            <div class="input-icon-group tour-date">
                                                <label class="input-icon hicon hicon-menu-calendar hicon-bold"></label>
                                                <input id="parking_from_date" name="parking_from_date" type="date" class="form-select shadow-sm" placeholder="Parking From" value="{{$fDate ?? ''}}" data-input="">
                                            </div>
                                            @error('parking_from_date')
                                                <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-12 col-md-4">
                                         <div class="mb-0">
                                            <div class="input-icon-group">
                                            <?php
                                             date_default_timezone_set('Asia/Colombo'); //e timeze to Sri Lanka
                                            ?>
                                                <input id="parking_from_time" name="parking_from_time" type="time" class="form-control" placeholder="Time" value="{{ $fTime ?? date('H:i', strtotime('+2 hours')) }}" min="{{ $fTime ?? date('H:i', strtotime('+2 hours')) }}" >
                                                 @error('parking_from_date')
                                                <div style="color:red">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 g-xl-2 mb-20" style="margin-bottom:20px">
                                     <div class="col-12 col-md-8">
                                         <div class="mb-0">
                                            <div class="input-icon-group tour-date">
                                                <label class="input-icon hicon hicon-menu-calendar hicon-bold"></label>
                                                <input id="parking_till_date" name="parking_till_date" type="date" class="form-select shadow-sm" placeholder="Parking Till" value="{{$tDate ?? ''}}" data-input="">
                                            </div>
                                             @error(' parking_till_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-12 col-md-4">
                                         <div class="mb-0">
                                            <div class="input-icon-group tour-date">
                                                <input id="parking_till_time" name="parking_till_time" type="time" class="form-control" placeholder="Time" value="{{$tTime ?? ''}}">
                                              @error(' parking_till_time')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 g-xl-2 mb-20" style="margin-bottom:20px">
                                     <div class="col-12">
                                         <div class="mb-0">
                                            <div class="input-icon-group">
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
                                <img src="{{asset('account/img/update.png')}}" style="width:50px;height:30px" alt="">
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
                                <img src="{{asset('account/img/layout.png')}}" style="width:50px;height:30px" alt="">
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
                                <img src="{{asset('account/img/support.png')}}" style="width:50px;height:30px" alt="">
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
                    <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="card-icon">
                            <i class="hicon hicon-family-with-teens"></i>
                        </div>
                        <h3 class="h4 card-title">Book Online</h3>
                        <p class="card-desc">Conveniently reserve your parking spot through our user-friendly online booking system.</p>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6">
                    <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="card-icon">
                            <i class="hicon hicon-regular-travel-protection"></i>
                        </div>
                        <h3 class="h4 card-title">Drop-off at Terminal</h3>
                        <p class="card-desc">Arrive at the airport and drive directly to the terminal, where our valet will be waiting to collect your vehicle.</p>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6">
                    <a href="" class="info-card hover-effect shadow-sm rounded h-100">
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
     <div class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade" id="terminalview">
         <!-- Title -->
        <div class="text-center mb-4">
            <div class="block-title">
                <h2 class="h1 title">Promo Code</h2>
            </div>
        </div>
        <!-- /Title -->
        <!-- Shopping cart -->
        <section class="container" id="step1">
            <div class="row g-0 g-xl-8">
                <!-- Form View Button (only visible on mobile) -->
                    <div class="pe-xl-4 me-xl-2" >
                          <!-- Terminal View (Card) -->
                                <div class="row g-10 g-xl-8">
                                    <div class="tour-grid">
                                        <div class="row">
                                              @foreach ($allpromocodelists as $allpromocodelist )
                                            <div class="col-12 col-xxl-3 col-xl-3 col-md-6" data-aos="fade">
                                                <!-- Tour -->
                                                <div class="tour-item rounded shadow-sm hover-effect mb-4">

                                                    <div class="tour-content">

                                                        <div class="">
                                                            <div>{{$allpromocodelist->promo_code}}</div>
                                                        </div>
                                                        <div class="tour-booking">
                                                            <div class="tour-price">
                                                                <strong>{{$allpromocodelist->discount_amount}} {{ $allpromocodelist->discount_type == 'precent' ? '%' : '' }}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Tour -->
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                    </div>
                    </div>
            </div>
        </section>
        <!-- /Shopping cart -->
    </div>
    <!-- Why -->
    <section class="p-top-90 p-bottom-90 " data-aos="fade">
        <div class="container">
            <div class="row g-0">
                <div class="col-12 col-xl-1 order-0 order-xl-1"></div>
                  <div class="col-12 col-xl-5 order-0 order-xl-1">
                      <!-- Contact Form -->
                    <div class="form-contact rounded shadow-sm" style="margin-top:20px;margin-bottom:50px">
                        <form class="search-tour-form" action="{{route('storecontactus')}}" method="post">
                            @csrf
                            <div class="border-bottom pb-4 mb-4">
                                <h3 class="mb-0">Still have question?</h3>
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
                            <button type="submit" class="btn btn-light mnw-180">
                                <i class="hicon hicon-email-envelope"></i>
                                <span> Send message</span>
                            </button>
                        </form>
                    </div>
                    <!-- /Contact Form -->
                </div>
                <br/>
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
@endsection


