<!-- Footer -->
<footer class="footer p-top-90 p-bottom-90" data-aos="fade">
    <!-- Footer top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-3 col-md-6">
                    <!-- Brand -->
                    <div class="footer-widget ">
                        <a href="{{route('/')}}" class="brand-img aboutus">
                              @if(empty($csetting) || empty($csetting['image']))
                                <img
                                    src="{{ asset('assets/img/logo.png') }}"
                                    alt="navbar brand"
                                    class="navbar-brand"
                                style="width:200px;height:60px"
                                />
                            @else
                                <img
                                    src="{{ asset('assets/img/whitepng.png')}}"
                                    alt="navbar brand"
                                    class="navbar-brand"
                                style="width:250px;height:60px"
                                />
                            @endif
                        </a>
                        <div class="contact-info aboutus">
                            <p>
                                @if(!empty($csetting) || !empty($csetting['address']))
                                    <span style="font-size:15px">{{$csetting['address']}}</span>
                                @else
                                    <span style="font-size:15px">Defult address</span>
                                @endif
                            </p>
                            <p>
                                @if(!empty($csetting) || !empty($csetting['phone1']))
                                    <span style="font-size:15px">{{$csetting['phone1']}}</span>
                                @else
                                    <span style="font-size:15px">Defult no1</span>
                                @endif
                            </p>
                            <p>
                                @if(!empty($csetting) || !empty($csetting['phone2']))
                                    <span style="font-size:15px">{{$csetting['phone2']}}</span>
                                @else
                                    <span style="font-size:15px">Defult no2</span>
                                @endif
                            </p>
                            <p>
                                  @if(!empty($csetting) || !empty($csetting['email']))
                                    <a style="font-size:15px" href="#">{{$csetting['email']}}</a>
                                @else
                                    <a style="font-size:15px" href="#">Defult email</a>
                                @endif

                            </p>
                        </div>
                    </div>

                    <!-- /Brand -->
                </div>
                <div class="col-12 col-xl-3 col-md-6">
                    <!-- Quick Links -->
                    <div class="footer-widget aboutus">
                        <h2 class="h4 pb-3" style="font-size:20px ">Company</h2>
                        <ul class="footer-link">
                            <li class="link-item">
                                <a style="font-size:15px"  href="{{route('aboutus')}}" >About us</a>
                            </li>
                            <li class="link-item">
                                <a style="font-size:15px" href="{{route('howitworks')}}" >How It Works</a>
                            </li>
                            <li class="link-item">
                                <a style="font-size:15px" href="{{route('contactus')}}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /Quick Links -->
                </div>
                <div class="col-12 col-xl-3 col-md-6">
                    <div class="footer-widget aboutus">
                        <h2 class="h4 pb-3" style="font-size:20px">Polices</h2>
                          <ul class="footer-link">
                            <li class="link-item">
                                <a style="font-size:15px" href="{{route('termsandcondition')}}" >Terms & Conditions</a>
                            </li>
                            <li class="link-item">
                                <a style="font-size:15px" href="{{route('privacypolicy')}}" >Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                 <div class="col-12 col-xl-3 col-md-6">
                    <div class="footer-widget aboutus">
                        <h2 class="h4 pb-3" style="font-size:20px">Follow Us</h2>
                          <ul class="footer-link">
                            <li class="link-item">
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

                            </li>
                            <li style="font-weight:600;font-size:15px;color:#FFD31C">Trusted Our Service</li>
                            <li class="link-item">
                                <h3 style="color:white"><a href="https://www.trustpilot.com/review/airparq.co.uk"><img alt="Trustpilot reviews" width="140" src="https://cdn.trustpilot.net/brand-assets/4.3.0/logo-white.svg"></a></h3>
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
