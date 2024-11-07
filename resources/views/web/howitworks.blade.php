@extends('layouts.web.master')
@section('content')
    <!-- Main -->
    <main>
        <!-- Title -->
        <section class="hero" data-aos="fade">
            <div class="hero-bg">
                <img src="{{asset('account/img/hero/hero-bg6.jpg')}}" alt="">
            </div>
            <div class="bg-content container">
                <div class="hero-page-title">
                    <span class="hero-sub-title">How It Works</span>
                    <h1 class="display-3 hero-title crouselheding1" style="font-weight:600">AIRPARQ'S Meet & Greet Process</h1>
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
                        <div class="image-info image-info-vertical me-xl-5 aboutus">
                            <div class="image-center rounded">
                                <img src="{{asset('account/img/img41.jpg')}}" style="height:350px;width:450px" alt="">
                            </div>
                        </div>
                        <!-- /Image -->
                    </div>
                    <div class="col-12 col-xl-6 order-0 order-xl-1">
                        <!-- Content -->
                        <div class="pt-xl-4 mb-xl-0 mb-5">
                            <div class="d-xl-flex align-items-xl-center">
                                <div class="block-title me-auto">
                                    <h1 class="headingtitle">Celebrate Effortless Travel</h1>
                                </div>
                            </div>
                            <p  class="descriptionpara" style="font-size:15px;text-align: justify">
                                Experience unparalleled convenience with AIRPARQ'S Meet & Greet parking service, where every detail is meticulously crafted to elevate your travel experience. Whether you're commencing your journey from or returning to Heathrow Airport's Terminals 2, 3, 4, or 5, our streamlined parking process ensures a seamless transition from curb to terminal..
                            </p>
                            <p class="descriptionpara" style="font-size:15px;text-align: justify">
                                With our dedicated team of professionals at your service, rest assured that your vehicle will be securely parked while you embark on your travels. Say goodbye to the hassle of searching for parking spaces and navigating crowded airport lots—trust AIRPARQ to start your journey with ease and efficiency.</small>
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
                        <small class="sub-title ">How It Works</small>
                          <h1 class="headingtitle">Arrival</h1>
                    </div>
                </div>
                <!-- /Title -->
                <!-- Category list -->
                <div class="row g-3">
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6" >
                        <a class="mini-card card-hover hover-effect shadow-sm rounded h-100">
                             <span class="card-icon">
                                <img src="{{asset('account/img/drive.png')}}" style="width:60px;height:50px"alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Drive to the Terminal</h3>
                                <small class="card-desc" style="text-align: justify">Make your way directly to the designated terminal at Heathrow Airport.</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a class="mini-card card-hover hover-effect shadow-sm rounded h-100">
                             <span class="card-icon">
                                <img src="{{asset('account/img/meet.png')}}" style="width:100px;height:50px"alt="">
                            </span>
                            <div class="card-content" style="padiing-right:2px">
                                <h3 class="h5 card-title">Meet Our Professional Team</h3>
                                <small class="card-desc"  style="text-align: justify">Our courteous valet team awaits at the terminal, ready to assist with your parking needs.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-xxl-3 col-xl-4 col-md-6">
                        <a  class="mini-card card-hover hover-effect shadow-sm rounded h-100">
                            <span class="card-icon">
                                <img src="{{asset('account/img/photos.png')}}" style="width:50px;height:50px"alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Quick Inspection and Photos</h3>
                                <small class="card-desc" style="text-align: justify">For safety, we conduct a thorough inspection and capture photos efficiently.</small>
                            </div>
                        </a>
                    </div>
                     <div class="col-12 col-md-2"></div>

                     <div class="col-12 col-md-4">
                        <a  class="mini-card card-hover hover-effect shadow-sm rounded h-100">
                            <span class="card-icon">
                                <img src="{{asset('account/img/proceedd.png')}}" style="width:60px;height:50px" alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Proceed to Terminal</h3>
                                <small class="card-desc" style="text-align: justify">With swift check-in, proceed directly to the terminal entrance, saving time and energy.</small>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4">
                        <a  class="mini-card card-hover hover-effect shadow-sm rounded h-100">
                            <span class="card-icon">
                                <img src="{{asset('account/img/parking.png')}}" style="width:100px;height:50px"alt="">
                            </span>
                            <div class="card-content">
                                <h3 class="h5 card-title">Secure Parking</h3>
                                <small class="card-desc" style="text-align: justify">Your vehicle is safe with us. Our valet drivers park it in secure facilities, monitored 24/7.</small>
                            </div>
                        </a>
                    </div>
                      <div class="col-12 col-md-2"></div>
                </div>
                <!-- /Category list -->
                 <br/>
                 <!-- Title -->
                   <div class="d-xl-flex align-items-xl-center pb-4">
                        <div class="block-title me-auto">
                            <small class="sub-title">How It Works</small>
                             <h1 class="headingtitle">Return</h2>
                        </div>
                    </div>
                    <!-- /Title -->
                    <!-- Category list -->
                    <div class="row g-3">
                          <div class="col-12 col-md-2"></div>
                        <div class="col-12 col-md-4">
                            <a  class="mini-card card-hover hover-effect shadow-sm rounded h-100">
                                <span class="card-icon">
                                    <img src="{{asset('account/img/cardrive.png')}}" style="width:100px;height:60px" alt="">
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Car Delivery</h3>
                                    <small class="card-desc" style="text-align: justify">Upon return, head to the terminal's meeting point for prompt vehicle delivery.</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a  class="mini-card card-hover hover-effect shadow-sm rounded h-100">
                                <span class="card-icon">
                                    <img src="{{asset('account/img/departure.png')}}" style="width:100px;height:50px" alt="">
                                </span>
                                <div class="card-content">
                                    <h3 class="h5 card-title">Departure</h3>
                                    <small class="card-desc" style="text-align: justify">With your vehicle prepared, swiftly retrieve your keys and continue your journey without delay.</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-2"></div>
                    </div>
                    <!-- /Category list -->
            </div>
        </section>
        <!-- /Categories -->
         <!-- Tour types -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <!-- Title -->
                <div class="d-xl-flex align-items-xl-center pb-4">
                    <div class="block-title me-auto">
                         <small class="sub-title">Why Coose Us</small>
                         <h1 class="headingtitle">Why AIRPARQ Stands Out</h2>
                    </div>
                </div>
                <!-- /Title -->
                <!-- Types -->
                <div class="row g-3 g-xl-4">
                    <div class="col-12 col-xl-4 col-md-6 aboutus">
                        <a class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="cardtitle" >Convenience</h3>
                            <small class="card-desc" style="text-align:justify">With no airport transfers required, you'll save valuable time, ensuring a prompt and stress-free departure.</small>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6 aboutus">
                        <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="cardtitle">Efficiency</h3>
                            <small class="card-desc" style="text-align:justify">Arrive at the airport and drive directly to the terminal, where our valet will be waiting to collect your vehicle.</small>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6 aboutus">
                        <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="cardtitle">Comfort</h3>
                            <small class="card-desc" style="text-align:justify">Bid farewell to lengthy walks in congested airport lots, especially in bad weather or with heavy luggage.</small>
                        </a>
                    </div>
                </div>
                <br/>
                 <div class="row g-3 g-xl-4">
                    <div class="col-12 col-xl-4 col-md-6 aboutus">
                        <a class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="cardtitle" >Accessibility</h3>
                            <small class="card-desc" style="text-align:justify">With no airport transfers required, you'll save valuable time, ensuring a prompt and stress-free departure.</small>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6 aboutus">
                        <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="cardtitle">Security</h3>
                            <small class="card-desc" style="text-align:justify">Your vehicle's safety is paramount. Our parking facilities feature advanced surveillance and security patrols for protection.</small>
                        </a>
                    </div>
                    <div class="col-12 col-xl-4 col-md-6 aboutus">
                        <a href="" class="info-card hover-effect shadow-sm rounded h-100">
                            <h3 class="cardtitle">Affordability</h3>
                            <small class="card-desc" style="text-align:justify">Despite premium service, AIRPARQ's Meet and Greet parking offers exceptional value for seamless parking.</small>
                        </a>
                    </div>
                </div>
                <!-- /Types -->
            </div>
        </section>
        <!-- /Tour types -->

    </main>
    <!-- /Main -->
@endsection

