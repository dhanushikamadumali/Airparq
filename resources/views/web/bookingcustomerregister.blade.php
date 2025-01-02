
    @extends('layouts.web.master')
    @section('content')
    <!-- Main -->
    <main>

        <!-- Register -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-5 col-lg-7 col-md-9">
                        <div class="card border-0 shadow-sm p-xl-2" data-aos="fade">
                            <div class="card-body">
                                <div class="border-bottom mb-4">
                                    <h1 class="h2 text-body-emphasis">Register</h1>
                                </div>
                                    <form method="POST" action="{{ route('storebookingcustomerregister') }}">
                                    @csrf
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
                                    <input type="hidden" class="form-control shadow-sm" id="inbound_terminal_name" name="inbound_terminal_name"  value={{$terminalname}}>
                                    <div class="border-bottom pb-4">
                                        <div class="mb-4">
                                            <label>First Name<span class="text-danger">*</span></label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror shadow-sm" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                             @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label>Last Name<span class="text-danger">*</span></label>
                                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror shadow-sm" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                             @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror shadow-sm" name="email" value="{{ old('email') }}" required autocomplete="email">
                                             @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label>Phone No<span class="text-danger">*</span></label>
                                            <input id="phone_no" type="text" class="form-control shadow-sm @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no">
                                            @error('phone_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow-sm" name="password" required autocomplete="new-password">
                                             @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                         <div class="mb-4">
                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                            <input id="cpassword" type="password" class="form-control shadow-sm" name="password_confirmation" required autocomplete="new-password">

                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">
                                            <i class="hicon hicon-profiles"></i>
                                            <span>Register</span>
                                        </button>
                                    </div>
                                    </form>
                                    {{-- <div class="mt-4">
                                        <span>Already have an account? <a href="{{route('showlogin')}}">Login</a></span>
                                    </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Register -->
    </main>
    <!-- /Main -->

@endsection
