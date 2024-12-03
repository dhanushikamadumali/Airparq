
@extends('layouts.web.master')
@section('content')
<!-- Main -->
<main>
    <!-- Title -->
    <section class="hero" data-aos="fade">
        <div class="hero-bg">
            <img src="{{asset('account/img/hero/hero-bg4.jpg')}}" alt="">
        </div>
        <div class="bg-content container">
            <div class="hero-page-title">
                <span class="hero-sub-title">About Us</span>
                <p class="display-3 hero-title crouselheding1" style="font-weight: 600;letter-spacing: -0.1px;" >  Discover the AIRPARQ Difference</p>
            </div>
        </div>
    </section>
    <!-- /Title -->
    <!-- About -->
    <section class="p-top-50 p-bottom-50 bg-gray-gradient" data-aos="fade">
        <div class="container">
            <div class="row g-0">
                <div class="col-12 col-xl-6 order-1 order-xl-0">
                    <!-- Image -->
                    <div class="image-info aboutus">
                        <div class="image-center rounded">
                             <img src="{{asset('account/img/img24.jpg')}}" style="height:350px;width:500px" alt="">
                        </div>
                    </div>
                    <!-- /Image -->
                </div>
                <div class="col-12 col-xl-6 order-0 order-xl-1">
                    <!-- Content -->
                    <div class="pt-xl-4 mb-xl-0 mb-5">
                        <div class="d-xl-flex align-items-xl-center">
                            <div class="block-title me-auto">
                                <h1 class="headingtitle">AIRPARQ originated from a vision to transform airport parking.</h1>
                            </div>
                        </div>
                        <p class="descriptionpara"  style="font-size:15px">
                             Confronted with the challenges of conventional parking facilities, our founders identified an opportunity to develop a solution centred on convenience and customer contentment.
                             From our establishment, our objective has been to streamline travel for all, one parking space at a time.</small>
                        </p>
                        <p class="descriptionpara"  style="font-size:15px">
                             At AIRPARQ, our principles steer all our actions. Reliability, convenience, and customer satisfaction lie at the core of our operations. We are committed to surpassing your expectations, ensuring the peace of mind you rightly deserve when entrusting us with your vehicle.
                        </p>
                    </div>
                    <!-- /Content -->
                </div>
            </div>
        </div>
    </section>
    <!-- /About -->
    <!-- Tour types -->
    <section class="p-top-50 p-bottom-50 bg-gray-gradient" data-aos="fade">
        <div class="container">
            <!-- Title -->
            <div class="d-xl-flex align-items-xl-center pb-4">
                <div class="block-title me-auto">
                    <div class="block-title me-auto">
                        <small class="sub-title" >Great experience</small>
                        <h1 class="headingtitle undelinetitle">Why choose us</h1>
                    </div>
                </div>
            </div>
            <!-- /Title -->
            <!-- Types -->
            <div class="row g-3 g-xl-4">
                <div class="col-12 col-xl-4 col-md-6 aboutus">
                    <a class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="image-center rounded">
                            <img src="{{asset('account/img/img21.jpg')}}" class="w-100" alt="">
                        </div>
                        <h3 class="card-title mt-3 mb-3" style="font-size:20px;font-weight:600">Who We Are?</h3>
                        <small style="text-align: justify">AIRPARQ: Seamlessly Simplifying Airport Parking with Our Meet and Greet Service Experience.</small>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6 aboutus">
                    <a  class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="image-center rounded">
                            <img src="{{asset('account/img/img22.jpg')}}" class="w-100" alt="">
                        </div>
                        <h3 class="card-title mt-3 mb-3" style="font-size:20px;font-weight:600">What We Do?</h3>
                        <small style="text-align: justify">We Provide Secure Parking Solutions, Allowing Travellers To Drop Off Vehicles At The Terminal.</small>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6 aboutus">
                    <a class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="image-center rounded">
                            <img src="{{asset('account/img/img23.jpg')}}" class="w-100" alt="">
                        </div>
                        <h3 class="card-title mt-3 mb-3" style="font-size:20px;font-weight:600">Our Mission</h3>
                        <small style="text-align: justify"> Transforming Airport Parking for Hassle-Free Travel, Prioritising Convenience and Peace of Mind.</small>
                    </a>
                </div>
            </div>
            <!-- /Types -->
        </div>
    </section>
    <!-- /Tour types -->

         <!-- About -->
        <section class="p-top-50 p-bottom-50 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12 col-xl-6 order-0 order-xl-1">
                        <!-- Content -->
                        <div class="pt-xl-4 mb-xl-0 mb-5">
                            <div class="d-xl-flex align-items-xl-center">
                                <div class="block-title me-auto">
                                    <h1 class="headingtitle">The Safer Parking Award</h1>
                                </div>
                            </div>
                            <p class="descriptionpara"  style="font-size:15px">
                                 Airparq Ltd is proud to announce that we have been awarded the prestigious Safer Parking Award issued by Park Mark. This accolade is a testament to our commitment to providing a secure and high-quality parking environment.</small>
                            </p>
                            <p class="descriptionpara" style="font-size:15px">
                                 By meeting the rigorous standards of the Safer Parking Scheme, Airparq Ltd ensures effective surveillance, quality management, appropriate lighting, and a clean environment, all contributing to a safer experience for our customers. This police-accredited recognition demonstrates our dedication to maintaining a top-tier facility that prioritises the safety and well-being of everyone who parks with us.
                            </p>
                        </div>
                        <!-- /Content -->
                    </div>
                    <div class="col-12 col-xl-6 order-1 order-xl-0">
                        <!-- Image -->
                        <div class="image-info  me-xl-5 aboutus">
                            <div class="image-center rounded">
                                 <img src="{{asset('account/img/airparq-certificate.png')}}" style="height:350px;width:500px" alt="">
                            </div>
                        </div>
                        <!-- /Image -->
                    </div>

                </div>
            </div>
        </section>
        <!-- /About -->
</main>
<!-- /Main -->
@endsection

