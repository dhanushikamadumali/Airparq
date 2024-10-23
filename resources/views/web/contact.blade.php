@extends('layouts.web.master')
@section('content')
<!-- Main -->
<main>
        <!-- Title -->
    <section class="hero" data-aos="fade">
        <div class="hero-bg">
            <img src="{{asset('account/img/hero/bread-bg8.jpg')}}" alt="">
        </div>
        <div class="bg-content container">
            <div class="hero-page-title">
                <span class="hero-sub-title">Contact Us</span>
                <h1 class="display-3 hero-title">
                    Connect with AIRPARQ Today!
                </h1>
            </div>
        </div>
    </section>
    <!-- /Title -->
    <!-- About -->
    <section class="bg-gray-gradient p-bottom-90" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <!-- Contac Information -->
                    <div class="p-top-90 mb-4">
                        <div class="border-bottom pb-4 mb-4">
                            <h2 class="me-auto mb-0">Ready to help you!</h2>
                        </div>
                        <p class="mb-4">We're here to help and answer any question you might have.</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="fw-medium mb-3">
                                    <i class="hicon hicon-flights-pin text-primary me-2"></i>

                                        @if(!empty($csetting) || !empty($csetting['address']))
                                            <span>{{$csetting['address']}}</span>
                                        @else
                                            <span>Defult address</span>
                                        @endif

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="fw-medium mb-3">
                                    <i class="hicon hicon-telephone text-primary me-2"></i>
                                    @if(!empty($csetting) || !empty($csetting['phone1']))
                                        <span>{{$csetting['phone1']}}</span>
                                    @else
                                        <span>Defult no1</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="fw-medium mb-3">
                                    <i class="hicon hicon-email-envelope text-primary me-2"></i>
                                    @if(!empty($csetting) || !empty($csetting['email']))
                                        <a href="#">{{$csetting['email']}}</a>
                                    @else
                                        <a href="#">Defult email</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Contac Information -->
                </div>
                <div class="col-12 col-xl-6">
                    <!-- Contact Form -->
                    <div class="form-contact rounded shadow-sm">
                            <form class="search-tour-form" action="{{route('storecontactus')}}" method="post">
                            @csrf
                            <div class="border-bottom pb-4 mb-4">
                                <h2 class="mb-0">Looking for any help?</h2>
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
                                <textarea id="txtMessage" name="comment" class="form-control shadow-sm" placeholder="Message" style="height: 150px"></textarea>
                                <label for="txtMessage">Message *</label>
                            </div>
                            <button type="submit" class="btn btn-light mnw-180">
                                <i class="hicon hicon-email-envelope"></i>
                                <span> Send message</span>
                            </button>
                        </form>
                    </div>
                    <!-- /Contact Form -->
                </div>
            </div>
        </div>
    </section>
    <!-- /About -->
</main>
<!-- /Main -->
@endsection

