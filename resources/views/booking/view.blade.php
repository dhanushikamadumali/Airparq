@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">View Booking</h3>
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="icon-arrow-left"></i>
                </li>
                <li class="nav-item">
                     <a href="{{ URL::previous() }}">Back</a>
                </li>
            </ul>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" ><h2 style="{{ $booking[0]->status == 1 ? 'color:green' : 'color: red;' }}">{{$booking[0]->status == 1 ? 'Completed Booking' : 'Cancle Booking'}}</h2></div>
                            <div class="row">
                            <h5 style="font-weight:600">Booking Information</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Booking Code</label>
                                        <input type="text" class="form-control"  value="{{$booking[0]->booking_code}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Total Amount</label>
                                        <input type="text" class="form-control"  value="{{$booking[0]->price}}" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>PromoCode</label>
                                          <input type="text" class="form-control" value="{{$booking[0]->promocode}}" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <h5 style="font-weight:600">Customer Information</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Customer First Name</label>
                                        <input type="text" class="form-control" id="first_name"  name="first_name" value="{{$booking[0]->first_name}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Customer Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$booking[0]->last_name}}" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                          <input type="eamil" class="form-control" id="email"  name="email" value="{{$booking[0]->email}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Phone No</label>
                                         <input type="text" class="form-control" id="phone_no"  name="phone_no" value="{{$booking[0]->phone_no}}" readonly/>
                                    </div>
                                </div>
                            </div>
                               <div class="row">
                                <h5 style="font-weight:600">Vehicle Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Reg No</label>
                                            <input type="text" class="form-control" id="vehicle_reg"  name="vehicle_reg" value="{{$booking[0]->vehicle_reg}}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Manufaturer</label>
                                            <input type="text" class="form-control" id="vehicle_manufacturer" name="vehicle_manufacturer" value="{{$booking[0]->vehicle_manufacturer}}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Model</label>
                                              <input type="text" class="form-control" id="vehicle_model"  name="vehicle_model" value="{{$booking[0]->vehicle_model}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Color</label>
                                             <input type="text" class="form-control" id="vehicle_color"  name="vehicle_color" value="{{$booking[0]->vehicle_color}}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Image</label>
                                             <div class="d-flex flex-wrap">
                                             @if(!empty($images))
                                                @foreach ($images as $image )
                                                    <img src="{{ asset('assets/vehicleimage/' . $image) }}" alt="" style="width: 100px; height: 100px; padding: 10px;">
                                                @endforeach
                                            @else
                                                <p>No images available.</p>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <h5 style="font-weight:600">Flight Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking From Date</label>
                                            <input type="date" class="form-control" id="parking_from_date"  name="parking_from_date" value="{{$booking[0]->parking_from_date}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking Form Time</label>
                                            <input type="time" class="form-control" id="parking_from_time" name="parking_from_time" value="{{$booking[0]->parking_from_time}}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking Till Date</label>
                                              <input type="date" class="form-control" id="parking_till_date"  name="parking_till_date" value="{{$booking[0]->parking_till_date}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking Till Time</label>
                                             <input type="time" class="form-control" id="parking_till_time"  name="parking_till_time" value="{{$booking[0]->parking_till_time}}" readonly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Inbound Terminal</label>
                                            <input type="text" class="form-control" id="inbound_terminal_name" name="inbound_terminal_name"
                                               value="{{ $selectedTerminalName ?? $booking[0]->inbound_terminal_name }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                             <label>Outbound Terminal</label>
                                            <input type="text" class="form-control" id="inbound_terminal_name" name="inbound_terminal_name"
                                               value="{{ $selectedTerminalName ?? $booking[0]->outbound_terminal_name }}" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                         <div class="form-group">
                                            <label>Parking Till Time</label>
                                             <input type="text" class="form-control" id="flight_arrival_date"  name="flight_arrival_date" value="{{$booking[0]->flight_arrival_date}}" readonly/>
                                             @error('flight_arrival_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                          <div class="form-group">
                                            <label>Flight Arrival Time</label>
                                              <input type="text" class="form-control" id="flight_arrival_time"  name="flight_arrival_time" value="{{$booking[0]->flight_arrival_time}}" readonly/>
                                             @error('flight_arrival_time')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6 col-lg-6">
                                          <div class="form-group">
                                            <label>Flight Departure Date</label>
                                              <input type="text" class="form-control" id="flight_departure_date"  name="flight_departure_date" value="{{$booking[0]->flight_departure_date}}" readonly/>
                                             @error('flight_departure_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                         <div class="form-group">
                                            <label>Flight Departure Time</label>
                                             <input type="text" class="form-control" id="flight_departure_time"  name="flight_departure_time" value="{{$booking[0]->flight_departure_time}}" readonly/>
                                             @error('flight_departure_time')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                         <div class="form-group">
                                            <label>Airport</label>
                                             <input type="text" class="form-control" id="airport"  name="airport" value="{{$booking[0]->airport}}" readonly/>
                                             @error('text')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

    </div>
</div>
@endsection

