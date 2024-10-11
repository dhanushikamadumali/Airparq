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
    <link href="{{asset('account/img/logos/logo.png')}}" rel="shortcut icon" type="image/png">
    <link href="{{asset('account/css/theme-1.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-3.min.css')}}" rel="stylesheet">
</head>

<!-- /Head -->

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
                            <a href="index.html" class="d-inline-block">
                                <img src="{{asset('account/img/logos/menu-logo.png')}}" srcset="{{asset('account/img/logos/menu-logo%402x.png')}} 2x" alt="">
                            </a>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-4 p-xl-0">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle-hover active" href="{{route('/')}}" data-bs-display="static">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-toggle-hover" href="{{route('aboutus')}}" data-bs-display="static">
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
                            </ul>

                        </div>
                    </div>
                     <div class="hero-action">
                        <a href="{{route('showbooking')}}" class="btn btn-outline-light btn-uppercase mnw-180 me-4">
                            <span>BOOK NOW</span>
                        </a>
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

        <!-- Title -->
        <section class="hero" data-aos="fade">
            <div class="hero-bg">
                <img src="{{asset('account/img/hero/bread-bg8.jpg')}}" alt="">
            </div>
            <div class="bg-content container">
                <div class="hero-page-title">

                    <h1 class="display-3 hero-title">
                        Terms & Conditions
                    </h1>
                </div>

            </div>
        </section>
        <!-- /Title -->


        <!-- About -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row g-0">

                    <div class="col-12 col-xl-12 order-0 order-xl-1">
                        <!-- Content -->
                        <div class="pt-xl-4 mb-xl-0 mb-5">
                            <div class="block-title">
                                <h2 class="h1 title lh-sm">Terms & Conditions</h2>
                            </div>
                             <p class="title font-size-16 line-height-26 pt-4 pb-2">
                            <h5> BOOKINGS AND SERVICE</h5> <br>
                                1.1 We confirm bookings made on our website or phone by issuing a booking reference via email. All terms and conditions are deemed to have been accepted at the point confirmation is made.
                                <br> <br>
                                1.2 Where a meet & greet service has been booked, whilst every effort is made to ensure that collections and deliveries of the vehicle are made at the requested times. We do not accept any responsibility for delays of its service, caused as a result of circumstances beyond our control, such as traffic congestion, delayed flights, road accidents, security alerts, severe weather conditions, luggage delays and immigration delays. This list is not exhaustive.
                                <br> <br>
                                1.3 Where a third-party service provider is used, they will have their own terms and conditions. If you require a copy of these, please ask, however, we will do our best to make you aware of anything you need to know. Once your booking is complete, our role will be as an intermediary between you and the service provider, booking details will be provided with the supplier and we will send you a booking reference number by email on behalf of the supplier.
                                <br> <br>
                                1.4 All services are subject to availability and may be changed without notification.
                                <br> <br>
                                1.5 AIRPARQ reserves the right not to accept or fulfill a booking.
                                <br> <br>
                                1.6 Bookings through the AIRPARQ website are deemed to be made when validated by the issue of a booking reference number.
                                <br> <br>
                               <h5> PRICES AND PAYMENT</h5><br>
                                2.1 Discounts and savings cannot be used with any other offer or promotion.
                                <br> <br>
                                2.2 Full payment or booked service is due prior to the commencement of the service.
                                <br> <br>
                                2.3 Where a park & ride service is booked, if ther are any extra charges including amounts due for extra days, these must be paid prior to you leaving the car park.
                                <br> <br>
                                2.4 Where a park & ride service is booked, in the event that entry and exit times change from those booked, this may result in your actual time parked exceeding the number of days you have pre-paid for. An additional charge will need to be paid prior to leaving the car park.
                                <br> <br>
                                2.5 Where a Meet & Greet service is booked any increased duration of the stay will be debited from the client's account and payment collected prior to the return of the vehicle. Any extended days will be charged at a daily rate of £30.00
                                <br> <br>
                                2.6 Where a Meet & Greet service is booked and if your return time passes midnight from your actual paid booking date and your car needs to be delivered after midnight, an additional charge of £30.00 is applied.
                                <br> <br>
                            <h5> CANCELLATIONS AND CURTAILMENT</h5>
                                <br> <br>
                                3.1 Cancellations must be by email and only after an email confirmation has been sent back acknowledging the cancellation will a refund be made.
                                <br> <br>
                                3.2 Cancellations or amendments cannot be accepted if you book a supersaver, saver or non-flexible parking product. Flexible products may be canceled up to 48 hours prior to the date for which the service has been booked and a full refund, less an administration fee (£20 for Meet & Greet/15 for Park & Ride) will be made.
                                <br> <br>
                                3.3 No refunds will be given for any cancellations or non-use of our service made within 48 hours of the day of travel.
                                <br> <br>
                                3.4 For the purposes of conditions 3.2 and 3.3, the parking period begins at one minute past midnight on the first day of the parking period.
                                <br> <br>
                                3.5 Any customer wishing to curtail the length of stay for a service once that service has commenced will be liable to pay the fee for the whole of the service booked.
                                <br> <br>
                                3.6 Any alterations made within 24 hours of departure and during the duration of stay will incur a charge of £30.00 for each and every amendment made.
                                <br> <br>
                            <h5> LIABILITIES AND OTHER TERMS</h5> <br>

                                4.1 Where a third-party service provider is used, the company acts only as a booking agent for the service provider, the company is liable to the customer only for losses directly arising from any negligence of the company in processing a booking. Any claims by the customer in respect of the delivery of the product must be made against the service provider and subject to its terms and conditions.
                                <br> <br>
                                4.2 Where we are the service provider, our insurance covers our legal liabilities.
                                <br> <br>
                                4.3 Vehicles and moveable items which are left unattended are left at the owner's risk whilst the vehicle is in our possession.
                                <br> <br>
                                4.4 No claim for damage can be made unless that damage was brought to the attention of our representative upon collection of your vehicle on your return and written notification is given to you at the time.
                                <br> <br>
                                4.5 We accept no liability for mechanical, structural and electrical failure of any part of your vehicle including windscreens, glass chips, clutches, tyres and alloy wheels. This list is not exhaustive.
                                <br> <br>
                                4.6 We accept no liability for any loss or damage whatsoever caused unless proved to be caused by the negligence of our employees.
                                <br> <br>
                                4.7 Your vehicle must be taxed and comply with the Road Traffic Act 1988. This is deemed by us to be the case for the whole duration while the vehicle is in our possession.
                                <br> <br>
                                4.8 We accept no liability for any faulty keys, alarm fobs, house or other keys left on the key ring. In the event of vehicles not starting, we reserve the right to charge for our time. We therefore advise that only the car key should be given.
                                <br> <br>
                                4.9 In the event that the car acquires a puncture whilst in our possession, (including slow punctures) we reserve the right to charge either to inflate the tyre or for the changing of the tyre. We do not accept liability for punctures whilst in our custody.
                                <br> <br>
                                4.10 In the event that the vehicle does not start due to a flat battery, we reserve the right to charge for our time in attempting to start the vehicle. Please note that we cannot be held responsible for any consequences that may result as a direct result of us having to jump-start your vehicle.
                                <br> <br>
                                4.11 We advise that the customers either leave a spare key with us, or keep a spare key for their vehicle on their person.
                                <br> <br>
                                4.12 During busy periods your car may be stored in any one of our secondary compounds, (within a 15-mile radius of our main car park). You agree to us driving the vehicle within and between car parks on the public highways. Please note that security levels may vary.
                                <br> <br>
                                4.13 In the event that your vehicle needs to be repaired as a result of our negligence, it must be carried out by our own approved organisation. It will be your responsibility to deliver and collect the car from the garage at your own cost. We cannot authorise or agree for any works to be carried out by dealerships that have not been approved, even in the event of the vehicle forgoing its warranty. The company reserves the right to undertake repairs to your vehicle on your behalf in a manner which restores it to the condition in which it arrived at the car park.
                                <br> <br>
                                4.14 Our drivers do not consent to being filmed. Therefore, in some cases dash cams may be disconnected.
                                <br> <br>
                            <h5> EXCLUSION AND LIMITS OF OUR RESPONSIBILITY</h5> <br>

                                5.1 If a third party product is purchased, the company acts only as a booking agent for the service provider, the company is liable to the customer only for losses directly arising from any negligence of the company in processing a booking. Any claims by the customer in respect of the delivery of the product must be made against the service provider and subject to its terms and conditions.
                                <br> <br>
                                5.2 Vehicles parked by the customers personally at a car park/hotel do so entirely at their own risk.
                                <br> <br>
                                5.3 Loss or damage should be covered by your own insurance. No vehicles will be covered for Theft/Fire/Flood/Malicious damage or any other intervening act of nature whilst the vehicle is parked in our custody.
                                <br> <br>
                                5.4 Any indirect/direct loss as a result of damage or loss to the vehicle (such as loss of earnings/missed flights etc.).
                                <br> <br>
                                5.5 We cannot pay more than £20,000 for loss of or damage to the vehicle.
                                <br> <br>
                                5.6 The company will not accept responsibility for damage to windscreens, other glass or for alloy wheel damage/ scuffs.
                                <br> <br>
                                5.7 The company will not be liable for any loss of, or damage to the vehicle arising from mechanical or electrical failure, jump-starting of vehicle, self-locking, air pollution/weather, terrorism, natural disaster, damage by vandals, criminal activity and other matters outside our control.
                                <br> <br>
                                5.8 Where a Meet & Greet service is booked, we will endeavour to deliver your vehicle back to you within 45 mins depending on traffic, weather conditions.
                                <br> <br>
                                5.9 We cannot be held liable for any delayed or missed flights/car hire charges as a direct or indirect result of our service.
                                <br> <br>
                                5.10 We will not be responsible for any discolour of paintwork or dents or scratches that may become visible after a Car wash/rainfall. This is regardless if the dents or scratches are mentioned in this document or not.
                                <br> <br>
                                5.11 We are unable to accept vehicles that are fitted with a roof luggage box that do not fall under the height restrictions within the airport car parks. In the event of a customer booking the service with a vehicle fitted with a roof luggage box, the Company cannot accept liability for any damage.
                                <br> <br>
                                5.12 It is not always possible to check the internal condition of the car and therefore we may not accept responsibility for the interior condition.
                                <br> <br>
                                5.13 Unless proved otherwise, minor claims, (those below £750) may not be accepted.
                                <br> <br>
                                5.14 Personal property left in the vehicle or transfer vehicle or left unattended at any time. We strongly advise that No valuables should be left within the car whilst parked in our compound. No responsibility can be accepted in the event that valuables are left in the vehicle.
                                <br> <br>
                                5.15 We will not be liable for any loss arising from a stolen or mislaid receipt or ticket. If you lose the receipt or ticket, we will need proof of identity. We will not release any vehicles to other persons unless by prior arrangement.
                                <br> <br>
                                5.16 Although we will try our best to help, we cannot be held liable for any delay in making the vehicle available for collection, if you arrive prior or later to the date or time booked or if you do not adhere to the time guidelines given.
                                <br> <br>
                                5.17 Please note that in the event you arrive prior to your departure date, we require at least and up to 3 hours to make your car available.
                                <br> <br>
                            <h5>YOUR RESPONSIBILITIES</h5> <br>

                                6.1 Vehicle conditions must be roadworthy and comply with the Road Traffic Acts.
                                <br> <br>
                                6.2 You shall be liable for and indemnify AIRPARQ in respect of any death, personal injury or damage caused by you or any person with you whilst on our premises.
                                <br> <br>
                                6.3 That when you commence your Parking Period your vehicle is in a roadworthy condition, has a current MOT certificate, (if required by law) for the whole of the Parking Period, is insured and covers the points mentioned in 6.2.
                                <br> <br>
                                6.4 No dangerous toxic or illegal substances are left within the vehicle.
                                <br> <br>
                                6.5 In the event your vehicle will not start, we assume you give permission and will make an attempt to start the vehicle using a battery starter pack. In the event your vehicle still does not start you will need to contact a breakdown company at your cost. Your vehicle must be removed from the car park within 24 hours of the end of the parking period. After this time we may charge you the daily parking charge.
                                <br> <br>
                                6.6 You must not tow the vehicle into the car park unless supervised and with written consent.
                                <br> <br>
                                6.7 Where a Park & Ride service is booked, you must not fill your tank with fuel, unless we are notified and are supervised.
                                <br> <br>
                                6.9 We may photograph or video the vehicle when you enter. No liability of damage will be accepted once the vehicle has left the car park or reported thereafter.
                                <br> <br>
                                6.10 To clarify, you must inspect the vehicle prior to departure and report any damage to us on a report form before driving out of the car park. Claims cannot be considered once vehicles have left the premises so please check your car before leaving.
                                <br> <br>
                                6.11 Your vehicle will not be checked for damage unless requested. It is deemed that you agree to a waiver that your vehicle condition has not been inspected and AIRPARQ cannot be held responsible for any claims made whatsoever. If you ask and pay a £5 charge, we will inspect the paintwork and bodywork and record any damage before we park the vehicle (the vehicle inspection report).
                                <br> <br>
                                6.12 You must inform us about any vehicle immobiliser, automatic security feature or modification to the vehicle.
                                <br> <br>
                                INDEMNITY<br>
                                7.1 You shall indemnify the company and its staff for any loss, damage, actions and claims arising from a breach of your obligations contained in clause 6.1 to 6.4.
                                <br> <br>
                            <h5> SPECIAL ASSISTANCE REQUIREMENTS</h5> <br>
                                8.1 If you have any special assistance requirements, please let us know when you make your booking.
                                <br> <br>
                                8.2 All reasonable steps will be taken to meet your needs.
                                <br> <br>
                                VEHICLE SECURITY<br>
                                9.1 Where Park & Ride is booked, you must leave your car keys at the car park. If you do not do this, we may need to move the vehicle, we cannot be held responsible for any damage caused by this process.
                                <br> <br>
                                9.2 Please do not leave any house or other keys on your car key ring or in the vehicle. No responsibility is accepted in the event that they are lost or misplaced.
                                <br> <br>
                                9.3 Please do not leave any Sat Navs in the vehicle.
                                <br> <br>
                                9.4 Although all measures will be taken to ensure the security of the car parks, this cannot be guaranteed at all times by AIRPARQ. Your vehicle insurance must cover you for the parking of the vehicle in a car park for all eventualities.

                                <br> <br>




                            <h5> SAFETY IN THE CAR PARK</h5> <br>
                                10.1 When entering the car park drive slowly and carefully in the car park and follow the directional signs. Do not drive more than 5MPH.
                                <br> <br>
                                10.2 After parking your vehicle at a Park & Ride service, go to the reception area nearest exit. These are signposted. Please do not wander around the car park, as car parks are dangerous. Keep careful control of your children and do not allow them to play in the car park, children must be supervised at all times.
                                <br> <br>
                                PARK & RIDE-TRANSPORT TO AND FROM AIRPORT<br>
                                11.1 You should not get on a transfer bus if you cannot find a seat. The maximum number of passengers will be displayed in the bus.
                                <br> <br>
                                11.2 In case of large families or large parties, it may not be possible to get everyone on the same bus.
                                <br> <br>
                                11.3 Children under the age of eight must be seated and accompanied by an adult.
                                <br> <br>
                                11.4 No animals are allowed on the transfer bus, unless a dog to assist the blind.
                                <br> <br>
                                11.5 Do not place luggage and personal belongings in the aisles or standing areas.
                                <br> <br>
                                11.6 The driver may refuse to help you load heavy luggage due to Health and safety.
                                <br> <br>
                                11.7 The driver is responsible for the safety of the bus. The driver may ask any passenger they believe to be a danger or potential danger to the bus or its passengers to leave the coach or refuse to take to or from the airport.
                                <br> <br>
                                11.8 The Bus will pick you up at the airport from the same stop it drops you off at the terminal building.
                                <br> <br>
                            <h5> PARK & RIDE-CHECK IN TIME</h5> <br>
                                12.1 Transport between the car park and the airport leaves at regular intervals. It is your responsibility to arrive at the car park in good time, (a minimum of 100 minutes prior to the earliest airline recommended check-in time is suggested) to enable you to arrive at the airport by the airline's recommended check-in time.
                                <br> <br>
                                12.2 In the event you wish you vehicle to be inspected, please allow an extra 45 minutes on top of the recommended 100 minutes
                                <br> <br>
                            <h5> CUSTOMER RELATIONS PROCEDURE</h5> <br>
                                13.1 This procedure does not affect your right to take legal action.
                                <br> <br>
                                13.2 If you believe your vehicle is damaged while in the car park or you lose the vehicle, (or any of your possessions from the vehicle), you should: Immediately let a member of staff know before you leave the car park, you will be requested to email your complaint.
                                <br> <br>
                                13.3 We will write and acknowledge your complaint upon receiving it. Our customer relations team shall endeavour to respond back to your query within a maximum of 5 working days.
                                <br> <br>
                                13.4 If a complaint relates to damage to the vehicle, you must allow us to inspect the vehicle before repairs are carried out. In the event that we agree to carry out any repairs they must be carried out only by our approved garage.
                                <br> <br>
                                13.5 Unless proved otherwise, minor claims, (those below £750) may not be accepted.
                                <br> <br>
                                13.6 Any incidents/issues raised whilst picking or dropping your vehicle need to be made apparent to a AIRPARQ member of staff which will be reported/logged back to the Duty Manager. No acceptance of liability can be made until the matter is thoroughly investigated.
                                <br> <br>
                            <h5>  CHANGING THE CONDITIONS</h5> <br>
                                14.1 Nobody can change these conditions unless the change is made in writing with our permission.
                                <br> <br>
                                14.2 These terms and conditions may be changed by ourselves at any time. Please request up-to-date terms and conditions at the time of booking.
                                <br> <br>
                                A full-size copy of our conditions is available on our website:
                                <br> <br>
                                https://airparq.co.uk


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
