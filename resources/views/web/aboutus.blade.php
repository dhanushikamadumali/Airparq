
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
                <h1 class="display-3 hero-title">
                    Discover the AIRPARQ Difference
                </h1>
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
                    <div class="image-info image-info-vertical me-xl-5">
                        <div class="image-center rounded">
                            <img src="{{asset('account/img/img24.jpg')}}" class="w-100" alt="">
                        </div>
                    </div>
                    <!-- /Image -->
                </div>
                <div class="col-12 col-xl-6 order-0 order-xl-1">
                    <!-- Content -->
                    <div class="pt-xl-4 mb-xl-0 mb-5">
                        <div class="block-title">
                            <h2 class="h1 title lh-sm">About Us</h2>
                                <small class="sub-title">AIRPARQ originated from a vision to transform airport parking.</small>
                        </div>
                        <p style="text-align: justify">
                            Confronted with the challenges of conventional parking facilities, our founders identified an opportunity to develop a solution centred on convenience and customer contentment.
                        </p>
                        <p style="text-align: justify">
                        From our establishment, our objective has been to streamline travel for all, one parking space at a time.</p>
                        </p>
                        <p style="text-align: justify">
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
    <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
        <div class="container">

            <!-- Title -->
            <div class="d-xl-flex align-items-xl-center pb-4">
                <div class="block-title me-auto">
                        <small class="sub-title">Great experience</small>
                    <h2 class="h1 title text-black">Why choose us</h2>
                </div>
            </div>
            <!-- /Title -->
            <!-- Types -->
            <div class="row g-3 g-xl-4">
                <div class="col-12 col-xl-4 col-md-6">
                    <a href="tour-packages-1.html" class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="image-center rounded">
                            <img src="{{asset('account/img/img21.jpg')}}" class="w-100" alt="">
                        </div>
                        <h3 class="h4 card-title">Who We Are?</h3>
                        <p class="card-desc" style="text-align: justify">AIRPARQ: Seamlessly Simplifying Airport Parking with Our Meet and Greet Service Experience.</p>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6">
                    <a href="tour-packages-1.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="image-center rounded">
                            <img src="{{asset('account/img/img22.jpg')}}" class="w-100" alt="">
                        </div>
                        <h3 class="h4 card-title">What We Do?</h3>
                        <p class="card-desc" style="text-align: justify">We Provide Secure Parking Solutions, Allowing Travellers To Drop Off Vehicles At The Terminal.</p>
                    </a>
                </div>
                <div class="col-12 col-xl-4 col-md-6">
                    <a href="contact.html" class="info-card hover-effect shadow-sm rounded h-100">
                            <div class="image-center rounded">
                            <img src="{{asset('account/img/img23.jpg')}}" class="w-100" alt="">
                        </div>
                        <h3 class="h4 card-title">Our Mission</h3>
                        <p class="card-desc" style="text-align: justify"> Transforming Airport Parking for Hassle-Free Travel, Prioritising Convenience and Peace of Mind.</p>
                    </a>
                </div>
            </div>
            <!-- /Types -->
        </div>
    </section>
    <!-- /Tour types -->
        <!-- About -->
    <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
        <div class="container">
            <div class="row g-0">
                    <div class="col-12 col-xl-6 order-0 order-xl-1">
                        <!-- Image -->
                    <div class="image-info image-info-vertical me-xl-5">
                        <div class="image-center rounded">
                            <img src="{{asset('account/img/airparq-certificate.png')}}" class="w-100" alt="">
                        </div>
                    </div>
                    <!-- /Image -->

                </div>
                <div class="col-12 col-xl-6 order-1 order-xl-0">

                        <!-- Content -->
                    <div class="pt-xl-4 mb-xl-0 mb-5">
                        <div class="block-title">
                            <h2 class="h1 title lh-sm">The Safer Parking Award</h2>
                        </div>
                        <p style="text-align: justify">
                                Airparq Ltd is proud to announce that we have been awarded the prestigious Safer Parking Award issued by Park Mark. This accolade is a testament to our commitment to providing a secure and high-quality parking environment.
                        </p>
                        <p  style="text-align: justify">
                            By meeting the rigorous standards of the Safer Parking Scheme, Airparq Ltd ensures effective surveillance, quality management, appropriate lighting, and a clean environment, all contributing to a safer experience for our customers. This police-accredited recognition demonstrates our dedication to maintaining a top-tier facility that prioritises the safety and well-being of everyone who parks with us.
                        </p>

                    </div>
                    <!-- /Content -->
                </div>

            </div>
        </div>
    </section>
    <!-- /About -->
</main>
<!-- /Main -->
@endsection

