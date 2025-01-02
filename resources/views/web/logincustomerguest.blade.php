    @extends('layouts.web.master')
    @section('content')
      <!-- Main -->
    <main>

        <div class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
                <section class="container" id="step2"  >


                <div class="row g-0">
                    <div class="col-12 col-xl-1">

                    </div>
                    <div class="col-12 col-xl-5">
                         <form class="search-tour-form" action="{{ route('returningcustomerlogin') }}"  method="post">
                        @csrf
                        <div class="pe-xl-4 me-xl-2">
                             <!-- Booking & Payment -->
                            <div class="card border-0 shadow-sm z-0" data-aos="fade">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h2 class="h3 ff-primary mb-0 text-body-emphasis" style="font-size:1rem;font-weight:600">Returning Customers</h2>
                                    </div>
                                        <div class="border-bottom pb-4 mb-4">
                                            <div class="row g-3">
                                             Login to your account
                                            <input type="hidden" id="promocode" name="promocode" value="{{$pCode}}">
                                            <input type="hidden" id="airport" name="airport" value="{{$airport}}">
                                            <input type="hidden" class="form-control shadow-sm" id="parking_from_date" name="parking_from_date"  value={{$fDate}}>
                                            {{-- <input type="hidden" class="form-control shadow-sm" id="parking_from_time" name="parking_from_time" value={{$fTime}}> --}}
                                            {{-- <input type="hidden" class="form-control shadow-sm" id="parking_till_time" name="parking_till_time" value={{$tTime}}> --}}
                                            <input type="hidden" class="form-control shadow-sm" id="parking_till_date" name="parking_till_date"  value={{$tDate}}>
                                            <input type="hidden" class="form-control shadow-sm" id="bookingprice" name="bookingprice"  value={{$price}}>
                                            <input type="hidden" class="form-control shadow-sm" id="bookingdiscount" name="bookingdiscount"value={{$discount}}>
                                            <input type="hidden" class="form-control shadow-sm" id="price" name="price"  value={{ $tPrice}}>
                                            <input type="hidden" class="form-control shadow-sm" id="inbound_terminal" name="inbound_terminal"  value={{$terminalid}}>
                                            <input type="hidden" class="form-control shadow-sm" id="inbound_terminal_name" name="inbound_terminal_name"  value={{$terminalname}}>
                                            {{-- <input type="text" id="customer_id" name="customer_id" value="{{$cusid ?? ''}}"> --}}
                                                   <input type="hidden" class="form-control shadow-sm" id="parking_from_hour" name="parking_from_hour" value={{$fHour}}>
                                                 <input type="hidden" class="form-control shadow-sm" id="parking_from_min" name="parking_from_min" value={{$fMin}}>
                                                 <input type="hidden" class="form-control shadow-sm" id="parking_till_hour" name="parking_till_hour" value={{$tHour}}>
                                                 <input type="hidden" class="form-control shadow-sm" id="parking_till_min" name="parking_till_min" value={{$fMin}}>

                                                <div class="mb-4">
                                                    <label for="txtEmail" class="form-label">Email<span class="text-danger">*</span></label>
                                                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror shadow-sm" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="mb-4">
                                                    <label for="txtPassword" class="form-label">Password<span class="text-danger">*</span></label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow-sm" name="password" required autocomplete="current-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-6">
                                                    <button class="btn btn-primary w-100" type="submit" id="btnSubmit">
                                                        <span>Login</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- /Booking & Payment -->
                        </div>
                        </form>
                    </div>
                     <div class="col-12 col-xl-5">
                        <!-- Selected tours -->
                        <div class="pe-xl-4 me-xl-2">
                            <div class="card border-0 shadow-sm mb-4" data-aos="fade">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h2 class="h3 ff-primary mb-0 text-body-emphasis" style="font-size:1rem;font-weight:600">New Customer?</h2>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="h5 mb-2" style="font-size:1rem;font-weight:200">Register now to get discount on all of your future bookings</h3>
                                    </div>
                                         <a href={{route('showbookingcustomerregister')}} class="btn btn-primary w-100" type="button">
                                            <span>Register & Checkout</span>
                                        </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Selected tours -->
                         <div class="pe-xl-4 me-xl-2">
                            <div class="card border-0 shadow-sm mb-4" data-aos="fade">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h2 class="h3 ff-primary mb-0 text-body-emphasis" style="font-size:1rem;font-weight:600">Guest Checkout</h2>
                                    </div>
                                    <a href={{route('guestshowcheckout')}} class="btn btn-primary w-100" type="button">

                                        <span>Guest Checkout</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-12 col-xl-1">

                    </div>
                </div>
               </section>
        </div>
    </main>
    <!-- /Main -->
    @endsection


