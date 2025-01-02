    @extends('layouts.web.master')
    @section('content')
      <!-- Main -->
    <main>

        <div class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
                <section class="container" id="step2"  >
                <div class="row g-0">
                      <div class="col-12 col-xl-8">
                         <form class="search-tour-form" action="{{route('storeguestbooking')}}" method="post">
                        @csrf
                        <div class="pe-xl-4 me-xl-2">
                             <!-- Booking & Payment -->
                            <div class="card border-0 shadow-sm z-0" data-aos="fade">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h2 class="h3 ff-primary mb-0 text-body-emphasis" style="font-size:1rem;font-weight:600">Your Information</h2>
                                    </div>
                                        <div class="border-bottom pb-4 mb-4">
                                            <div class="row g-3">
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

                                            <input type="hidden" class="form-control shadow-sm" id="parking_from_hour" name="parking_from_hour" value={{$fHour}}>
                                             <input type="hidden" class="form-control shadow-sm" id="parking_from_min" name="parking_from_min" value={{$fMin}}>
                                             <input type="hidden" class="form-control shadow-sm" id="parking_till_hour" name="parking_till_hour" value={{$tHour}}>
                                             <input type="hidden" class="form-control shadow-sm" id="parking_till_min" name="parking_till_min" value={{$fMin}}>

                                             {{-- <input type="hidden" id="customer_id" name="customer_id" value="{{$cusid ?? ''}}"> --}}
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="first_name" style="font-size:1rem">First Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="first_name" name="first_name"  value="" required>
                                                         @error('first_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="last_name"  style="font-size:1rem">Last Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="last_name" name="last_name"  value="" required >
                                                         @error('last_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="email"  style="font-size:1rem">Email<span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control shadow-sm" id="email" name="email" value="" required>
                                                         @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="phone_no"  style="font-size:1rem">Phone<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="phone_no" name="phone_no"  value="" required >
                                                        @error('phone_no')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-bottom pb-4 mb-4">
                                            <h3 class="h4 mb-4" style="font-size:1rem;font-weight:600">Flight Information</h3>
                                             <div class="row g-3">
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="inbound_flightno"  style="font-size:1rem">Outbound  Terminal<span class="text-danger">*</span></label>
                                                        <select class="form-select dropdown-select shadow-sm" id="outbound_terminal" name="outbound_terminal">
                                                          @foreach ($allterminallists as $allterminallist )
                                                         {{ (old('outbound_terminal') == $allterminallist->id || isset($selectedTerminal) && $selectedTerminal == $allterminallist->id) ? 'selected' : '' }}>
                                                         <option value="{{$allterminallist->id}}" selected="">{{$allterminallist->name}}</option>
                                                          @endforeach
                                                         </select>
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="outbound_flight_number"  style="font-size:1rem">Outbound Flight Number<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="outbound_flight_number" name="outbound_flight_number" required>
                                                         @error('outbound_flight_number')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="inbound_terminal"  style="font-size:1rem">Inbound Terminal<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm"  value="{{$terminalname}}" readonly >
                                                           {{-- <select class="form-select dropdown-select shadow-sm" id="outbound_terminal" name="outbound_terminal">
                                                          @foreach ($allterminallists as $allterminallist )
                                                         {{ (old('outbound_terminal') == $allterminallist->id || isset($selectedTerminal) && $selectedTerminal == $allterminallist->id) ? 'selected' : '' }}>
                                                         <option value="{{$allterminallist->id}}" selected="">{{$allterminallist->name}}</option>
                                                          @endforeach
                                                         </select> --}}
                                                    </div>
                                                </div>


                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="inbound_flight_number"  style="font-size:1rem">Inbound Flight Number<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control shadow-sm" id="inbound_flight_number " name="inbound_flight_number" required  >
                                                             <label style="font-size:1rem"><span >*</span> Important so we can monitor return flights to improve our service to you </label>                                                             @error('inbound_flight_number')
                                                            <div style="color:red">{{$message}}</div>
                                                            @enderror
                                                              </div>
                                                    </div>
                                                                 
                                                  <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_departure_date"  style="font-size:1rem">Flight Departure Date</label>
                                                         <div class="input-icon-group tour-date">
                                                            <label class="input-icon hicon hicon-menu-calendar hicon-bold"></label>
                                                            <input id="flight_departure_date" name="flight_departure_date" type="date" class="form-select shadow-sm"  data-input="">
                                                        </div>
                                                         @error('flight_departure_date')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_departure_time"  style="font-size:1rem">Flight Departure Time</label>
                                                         @php
                                                              use Carbon\Carbon;
                                                            // Get the current time in London and add 2 hours
                                                            $startTime = Carbon::now('Europe/London');
                                                            $timeOptions = [];
                                                            // Generate time slots for the next 24 hours (every minute)
                                                            for ($i = 0; $i < 1440; $i++) { // 24 hours * 60 minutes = 1440 minutes
                                                                // Add one minute intervals
                                                                $timeOptions[] = $startTime->copy()->addMinutes($i)->format('H:i'); // Format as hour:minute
                                                            }
                                                            // Determine the initial value for the dropdown
                                                            $initialTime = $fTime ?? $startTime->format('H:i');
                                                        @endphp
                                                            <div class="input-icon-group tour-date">
                                                            <label class="input-icon hicon hicon-time-clock hicon-bold"></label>
                                                                  <select id="flight_departure_time" name="flight_departure_time" class="form-control">
                                                                    <option value="">Select Till Time</option>
                                                                    @foreach ($timeOptions as $time)
                                                                     <option value="{{ $time }}" {{ $time == $initialTime ? 'selected' : '' }}>{{ $time }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @error('flight_departure_time')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_arrival_date"  style="font-size:1rem">Flight Arrival Date</label>
                                                        <div class="input-icon-group tour-date">
                                                            <label class="input-icon hicon hicon-menu-calendar hicon-bold"></label>
                                                            <input id="flight_arrival_date" name="flight_arrival_date" type="date" class="form-select shadow-sm"  data-input="">
                                                        </div>
                                                         @error('flight_arrival_date')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label class="form-label" for="flight_arrival_time"  style="font-size:1rem">Flight Arrival Time</label>
                                                         @php
                                                            // Get the current time in London and add 2 hours
                                                            $startTime = Carbon::now('Europe/London');
                                                            $timeOptionsarrival = [];
                                                            // Generate time slots for the next 24 hours (every minute)
                                                            for ($i = 0; $i < 1440; $i++) { // 24 hours * 60 minutes = 1440 minutes
                                                                // Add one minute intervals
                                                                $timeOptionsarrival[] = $startTime->copy()->addMinutes($i)->format('H:i'); // Format as hour:minute
                                                            }
                                                            // Determine the initial value for the dropdown
                                                            $initialTime = $fTime ?? $startTime->format('H:i');
                                                        @endphp
                                                            <div class="input-icon-group tour-date">
                                                            <label class="input-icon hicon hicon-time-clock hicon-bold"></label>
                                                                  <select id="flight_arrival_time" name="flight_arrival_time" class="form-control">
                                                                    <option value="">Select Till Time</option>
                                                                    @foreach ($timeOptionsarrival as $time)
                                                                     <option value="{{ $time }}" {{ $time == $initialTime ? 'selected' : '' }}>{{ $time }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                          @error('flight_arrival_time')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="border-bottom pb-4 mb-4">
                                            <h3 class="h4 mb-4" style="font-size:1rem;font-weight:600">Vehicle Information</h3>
                                            <div class="row g-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                         <label>Vehicle Registration<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_reg" name="vehicle_reg" required >
                                                          @error('vehicle_reg')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label>Vehicle Manufacturer<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_manufacturer" name="vehicle_manufacturer"  >
                                                          @error('vehicle_manufacturer')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label>Vehicle Model<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_model"  name="vehicle_model" >
                                                         @error('vehicle_model')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label>Vehicle Colour<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control shadow-sm" id="vehicle_color" name="vehicle_color" >
                                                        @error('vehicle_color')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- /Booking & Payment -->
                        </div>
                    </div>
                     <div class="col-12 col-xl-4">
                        <!-- Selected tours -->
                        <div class="pe-xl-4 me-xl-2">
                            <div class="card border-0 shadow-sm mb-4" data-aos="fade">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h2 class="h3 ff-primary mb-0 text-body-emphasis" style="font-size:1rem;font-weight:600">Booking Summary</h2>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="h5 mb-2" style="font-size:1rem;font-weight:200">Parking Start From</h3>
                                        <div class="mb-2">
                                              <small class="me-2">Date : <span id="fromDate">{{ $fromDate =date('d-m-Y', strtotime($fDate));}}</span></small>
                                        </div>
                                         <div class="d-flex flex-column">
                                              <small class="mb-2">Time : <span id="fromTime">{{$fHour}}:{{$fMin}}</span></small>
                                        </div>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="h5 mb-2" style="font-size:1rem;font-weight:400">Parking Till</h3>
                                        <div class="mb-2">
                                               <small class="me-2">Date : <span id="tillDate">{{$tillDate= date('d-m-Y', strtotime($tDate));}}</span></small>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small class="mb-2">Time : <span id="tillTime">{{$tHour}}:{{$tMin}}</span></small>
                                        </div>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="h5 mb-2">
                                            <a href="single-tour-1.html" class="link-dark link-hover" style="font-size:1rem;font-weight:600">Package Details</a>
                                        </h3>
                                        <div class="mt-1">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <strong style="font-size:1rem">Price:</strong>
                                                <span class="fw-semibold text-body-emphasis" style="font-size:1rem" >£<span id="price"  >{{$price}}</span></span>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <strong >Discount:</strong>
                                                <span class="fw-semibold text-body-emphasis"><span id="discount">{{$discount}}%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pb-2 mb-4">
                                        <h3 class="h4 mb-4" style="font-size:1rem;font-weight:600">Payment method</h3>
                                        <div class="d-inline-flex align-items-center mb-3">
                                            <strong class=" me-2">Total:</strong>
                                            <span class="fw-semibold text-body-emphasis">£<span id="totalprice">{{ $tPrice}}</span></span>
                                        </div>
                                    </div>
                                    <div style="display: flex; align-items: center;padding-bottom:18px">
                                      <input type="radio" id="html" name="fav_language" value="HTML">
                                      <label for="html" style="margin-left: 5px">
                                        I have read and understood
                                        <a href="{{route('termsandcondition')}}" style="font-weight:600;">Terms and Condition</a>
                                      </label>
                                    </div>

                                    <button  class="btn btn-primary btn-uppercase w-100" id="loginsignupbtn">
                                        <i class="hicon hicon-mmb-my-booking hicon-md mr-1"></i>
                                        <span style="font-size:0.8rem">PAY NOW</span>
                                    </button>
                                     </form>
                                </div>
                            </div>
                        </div>
                        <!-- Selected tours -->
                    </div>
                </div>
               </section>
        </div>
    </main>
    <!-- /Main -->
    @endsection

