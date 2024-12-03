@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Booking</h3>
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="icon-arrow-left"></i>
                </li>
                <li class="nav-item">
                     <a href="{{ URL::previous() }}">Back</a>
                </li>
            </ul>
        </div>
        <form action="{{route('updatebooking')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <h2>Customer Information</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <input type="hidden" class="form-control" id="id"  name="id" value="{{$booking[0]->id}}"/>
                                    <input type="hidden" class="form-control" id="customer_id"  name="customer_id" value="{{$booking[0]->customer_id}}"/>
                                    <input type="hidden" class="form-control" id="price"  name="price" value="{{$booking[0]->price}}"/>
                                    <input type="hidden" class="form-control" id="promocode"  name="promocode" value="{{$booking[0]->promocode}}"/>

                                    <div class="form-group">
                                        <label>Customer First Name</label>
                                        <input type="text" class="form-control" id="first_name"  name="first_name" value="{{$booking[0]->first_name}}" readonly/>
                                        @error('first_name')
                                        <div style="color:red" >{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Customer Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{$booking[0]->last_name}}" readonly/>
                                        @error('last_name')
                                        <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                          <input type="eamil" class="form-control" id="email"  name="email" value="{{$booking[0]->email}}" readonly/>
                                         @error('email')
                                        <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Phone No</label>
                                         <input type="text" class="form-control" id="phone_no"  name="phone_no" value="{{$booking[0]->phone_no}}" readonly/>
                                         @error('phone_no')
                                        <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                               <div class="row">
                                <h2>Vehicle Information</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Reg No</label>
                                            <input type="text" class="form-control" id="vehicle_reg"  name="vehicle_reg" value="{{$booking[0]->vehicle_reg}}" />
                                            @error('vehicle_reg')
                                            <div style="color:red" >{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Manufaturer</label>
                                            <input type="text" class="form-control" id="vehicle_manufacturer" name="vehicle_manufacturer" value="{{$booking[0]->vehicle_manufacturer}}"/>
                                            @error('vehicle_manufacturer')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Model</label>
                                              <input type="text" class="form-control" id="vehicle_model"  name="vehicle_model" value="{{$booking[0]->vehicle_model}}"/>
                                             @error('vehicle_model')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Vehicle Color</label>
                                             <input type="text" class="form-control" id="vehicle_color"  name="vehicle_color" value="{{$booking[0]->vehicle_color}}"/>
                                             @error('vehicle_color')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
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
                                <h2>Flight Information</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking From Date</label>
                                            <input type="date" class="form-control" id="parking_from_date"  name="parking_from_date" value="{{$booking[0]->parking_from_date}}"/>
                                            @error('parking_from_date')
                                            <div style="color:red" >{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking Form Time</label>
                                            <input type="time" class="form-control" id="parking_from_time" name="parking_from_time" value="{{$booking[0]->parking_from_time}}"/>
                                            @error('parking_from_time')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking Till Date</label>
                                              <input type="date" class="form-control" id="parking_till_date"  name="parking_till_date" value="{{$booking[0]->parking_till_date}}"/>
                                             @error('parking_till_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Parking Till Time</label>
                                             <input type="time" class="form-control" id="parking_till_time"  name="parking_till_time" value="{{$booking[0]->parking_till_time}}"/>
                                             @error('parking_till_time')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Inbound Terminal</label>
                                              <select class="form-select dropdown-select shadow-sm" id="inbound_terminal" name="inbound_terminal">
                                              @foreach ($allterminallists as $allterminallist )
                                             {{ (old('inbound_terminal') == $allterminallist->id || isset($selectedTerminal) && $selectedTerminal == $allterminallist->id) ? 'selected' : '' }}>
                                             <option value="{{$allterminallist->id}}" selected="">{{$booking[0]->inbound_terminal_name}}</option>
                                              @endforeach
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                             <label>Outbound Terminal</label>
                                              <select class="form-select dropdown-select shadow-sm" id="outbound_terminal" name="outbound_terminal">
                                              @foreach ($allterminallists as $allterminallist )
                                             {{ (old('inbound_terminal') == $allterminallist->id || isset($selectedTerminal) && $selectedTerminal == $allterminallist->id) ? 'selected' : '' }}>
                                             <option value="{{$allterminallist->id}}" selected="">{{$booking[0]->outbound_terminal_name}}</option>
                                              @endforeach
                                             </select>
                                        </div>
                                    </div>
                                </div>
                                  <div class="row">
                                     <div class="col-md-6 col-lg-6">
                                          <div class="form-group">
                                            <label>Flight Departure Date</label>
                                              <input type="date" class="form-control" id="flight_departure_date"  name="flight_departure_date" value="{{$booking[0]->flight_departure_date}}"/>
                                             @error('flight_departure_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                         <div class="form-group">
                                            <label>Flight Departure Time</label>
                                             <input type="time" class="form-control" id="flight_departure_time"  name="flight_departure_time" value="{{$booking[0]->flight_departure_time}}"/>
                                             @error('flight_departure_time')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                         <div class="form-group">
                                            <label>Flight Arrival Date</label>
                                             <input type="date" class="form-control" id="flight_arrival_date"  name="flight_arrival_date" value="{{$booking[0]->flight_arrival_date}}"/>
                                             @error('flight_arrival_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                          <div class="form-group">
                                            <label>Flight Arrival Time</label>
                                              <input type="time" class="form-control" id="flight_arrival_time"  name="flight_arrival_time" value="{{$booking[0]->flight_arrival_time}}"/>
                                             @error('flight_arrival_time')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                         <div class="form-group">
                                            <label>Airport</label>
                                             <select class="form-select dropdown-select shadow-sm" id="airport" name="airport">
                                                <option value="London Heathrow" {{ $booking[0]->airport == 'London Heathrow' ? 'selected' : '' }}>London Heathrow</option>
                                                <option value="New York JFK" {{ $booking[0]->airport == 'New York JFK' ? 'selected' : '' }}>New York JFK</option>
                                                <option value="Tokyo Narita" {{ $booking[0]->airport == 'Tokyo Narita' ? 'selected' : '' }}>Tokyo Narita</option>
                                                  <option value="Birmingham" {{ $booking[0]->airport == 'Birmingham' ? 'selected' : '' }} >Birmingham</option>
                                                <option value="Gatwick" {{ $booking[0]->airport == 'Gatwick' ? 'selected' : '' }}>Gatwick</option>
                                                <option value="Heathrow" {{ $booking[0]->airport == 'Heathrow' ? 'selected' : '' }}>Heathrow</option>
                                                <option value="Luton Airport" {{ $booking[0]->airport == 'Luton Airport' ? 'selected' : '' }}>Luton Airport</option>
                                                <option value="Southampton Port" {{ $booking[0]->airport == 'Southampton Port' ? 'selected' : '' }}>Southampton Port</option>
                                                <option value="Southend" {{ $booking[0]->airport == 'Southend' ? 'selected' : '' }}>Southend</option>
                                                <option value="Stansted" {{ $booking[0]->airport == 'Stansted' ? 'selected' : '' }}>Stansted</option>
                                                   <optgroup label="Other Airports">
                                                        <option value="Aberdeen" {{ $booking[0]->airport == 'Aberdeen' ? 'selected' : '' }}>Aberdeen</option>
                                                        <option value="Atlanta Airport" {{ $booking[0]->airport == 'Atlanta Airport' ? 'selected' : '' }}>Atlanta Airport</option>
                                                        <option value="Belfast City (George Best)" {{ $booking[0]->airport == 'Belfast City (George Best)' ? 'selected' : '' }}>Belfast City (George Best)</option>
                                                        <option value="Belfst International" {{ $booking[0]->airport == 'Belfast International' ? 'selected' : '' }}>Belfast International</option>
                                                        <option value="Blackpool Tower" {{ $booking[0]->airport == 'Blackpool Tower' ? 'selected' : '' }}>Blackpool Tower</option>
                                                        <option value="Bournemouth" {{ $booking[0]->airport == 'Bournemouth' ? 'selected' : '' }}>Bournemouth</option>
                                                        <option value="Brisbane" {{ $booking[0]->airport == 'Brisbane' ? 'selected' : '' }}>Brisbane</option>
                                                        <option value="Bristol" {{ $booking[0]->airport == 'Bristol' ? 'selected' : '' }}>Bristol</option>
                                                        <option value="Budapest Airport" {{ $booking[0]->airport == 'Budapest Airport' ? 'selected' : '' }}>Budapest Airport</option>
                                                        <option value="Cardiff" {{ $booking[0]->airport == 'Cardiff<' ? 'selected' : '' }}>Cardiff</option>
                                                        <option value="Cork" {{ $booking[0]->airport == 'Cork' ? 'selected' : '' }}>Cork</option>
                                                        <option value="Dallas Fort Worth" {{ $booking[0]->airport == 'Dallas Fort Worth' ? 'selected' : '' }}>Dallas Fort Worth</option>
                                                        <option value="Doncaster-Sheffield (Robin Hood)" {{ $booking[0]->airport == 'Doncaster-Sheffield (Robin Hood)' ? 'selected' : '' }}>Doncaster-Sheffield (Robin Hood)</option>
                                                        <option value="Dublin" {{ $booking[0]->airport == 'Dublin' ? 'selected' : '' }}>Dublin</option>
                                                        <option value="Durham Tees Valley" {{ $booking[0]->airport == 'Durham Tees Valley' ? 'selected' : '' }}>Durham Tees Valley</option>
                                                        <option value="East Midlands" {{ $booking[0]->airport == 'East Midlands' ? 'selected' : '' }}>East Midlands</option>
                                                        <option value="Edinburgh" {{ $booking[0]->airport == 'Edinburgh' ? 'selected' : '' }}>Edinburgh</option>
                                                        <option value="Exeter" {{ $booking[0]->airport == 'Exeter' ? 'selected' : '' }}>Exeter</option>
                                                        <option value="Frankfurt Airport" {{ $booking[0]->airport == 'Frankfurt Airport' ? 'selected' : '' }}>Frankfurt Airport</option>
                                                        <option value="Glasgow International" {{ $booking[0]->airport == 'Glasgow International' ? 'selected' : '' }}>Glasgow International</option>
                                                        <option value="Glasgow Prestwick" {{ $booking[0]->airport == 'Glasgow Prestwick' ? 'selected' : '' }}>Glasgow Prestwick</option>
                                                        <option value="Gran Canaria" {{ $booking[0]->airport == 'Gran Canaria' ? 'selected' : '' }}>Gran Canaria</option>
                                                        <option value="Humberside" {{ $booking[0]->airport == 'Humberside' ? 'selected' : '' }}>Humberside </option>
                                                        <option value="Inverness" {{ $booking[0]->airport == 'Inverness' ? 'selected' : '' }}>Inverness</option>
                                                        <option value="Isle of Man" {{ $booking[0]->airport == 'Isle of Man' ? 'selected' : '' }}>Isle of Man</option>
                                                        <option value="Kuala Lumpur International Airport" {{ $booking[0]->airport == 'Kuala Lumpur International Airport' ? 'selected' : '' }}>Kuala Lumpur International Airport</option>
                                                        <option value="Leeds Bradford" {{ $booking[0]->airport == 'Leeds Bradford' ? 'selected' : '' }}>Leeds Bradford</option>
                                                        <option value="Liverpool" {{ $booking[0]->airport == 'Liverpool' ? 'selected' : '' }}>Liverpool</option>
                                                        <option value="London City" {{ $booking[0]->airport == 'London City' ? 'selected' : '' }}>London City</option>
                                                        <option value="Manchester" {{ $booking[0]->airport == 'Manchester' ? 'selected' : '' }}>Manchester</option>
                                                        <option value="Newcastle" {{ $booking[0]->airport == 'Newcastle' ? 'selected' : '' }}>Newcastle</option>
                                                        <option value="Norwich" {{ $booking[0]->airport == 'Norwich' ? 'selected' : '' }}>Norwich</option>
                                                        <option value="NS Treinen" {{ $booking[0]->airport == 'NS Treinen' ? 'selected' : '' }}>NS Treinen</option>
                                                        <option value="Orlando International Airport" {{ $booking[0]->airport == 'Orlando International Airport' ? 'selected' : '' }}>Orlando International Airport</option>
                                                        <option value="Paris Charles De Gaulle" {{ $booking[0]->airport == 'Paris Charles De Gaulle' ? 'selected' : '' }}>Paris Charles De Gaulle</option>
                                                        <option value="Paris Orly" {{ $booking[0]->airport == 'Paris Orly' ? 'selected' : '' }}>Paris Orly</option>
                                                        <option value="San Francisco International" {{ $booking[0]->airport == 'San Francisco International' ? 'selected' : '' }}>San Francisco International</option>
                                                        <option value="Shannon" {{ $booking[0]->airport == 'Shannon' ? 'selected' : '' }}>Shannon</option>
                                                        <option value="Southampton Airport" {{ $booking[0]->airport == 'Southampton Airport' ? 'selected' : '' }}>Southampton Airport</option>
                                                        <option value="Sydney" {{ $booking[0]->airport == 'Sydney' ? 'selected' : '' }}>Sydney</option>
                                                        <option value="Toronto Pearson International" {{ $booking[0]->airport == 'Toronto Pearson International' ? 'selected' : '' }}>Toronto Pearson International</option>
                                                        <option value="Washington Dulles International Airport" {{ $booking[0]->airport == 'Washington Dulles International Airport' ? 'selected' : '' }}>Washington Dulles International Airport</option>
                                                </optgroup>
                                            </select>
                                             @error('text')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-action">
                            <button class="btn btn page_btn" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

