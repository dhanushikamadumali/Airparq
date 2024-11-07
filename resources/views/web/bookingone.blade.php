@extends('layouts.web.master')
@section('content')
 <!-- Main -->
<main>
         <!-- Book tour -->
        <section id="book-tour" class="hero" data-aos="fade">
            <div class="bg-content container">
                <div class="p-top-90 p-bottom-90">
                    <div class="row g-0 justify-content-between">
                        <!-- Book tour form -->
                        <div class="col-12 col-xl-12">
                            <div>
                                  <div class="card border-0 shadow p-lg-2 bg-light-gray" >
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h1 class="headingtitle">Secure Your Spot with AIRPARQ Today!</h1>
                                        </div>
                                        <form  class="row g-3" action="{{route('bookingdetailstep2')}}" method="post">
                                            @csrf
                                            <div class="col-12">
                                                <div class="input-icon-group">
                                                      <label for="txtKeyword" class="input-icon hicon hicon-flights-pin"></label>
                                                         <div class="input-icon-group">
                                                         <select class="form-select dropdown-select shadow-sm" id="airport" name="airport">
                                                            <option value="London Heathrow" {{ $airport == 'London Heathrow' ? 'selected' : '' }}>London Heathrow</option>
                                                            <option value="New York JFK" {{ $airport == 'New York JFK' ? 'selected' : '' }}>New York JFK</option>
                                                            <option value="Tokyo Narita" {{ $airport == 'Tokyo Narita' ? 'selected' : '' }}>Tokyo Narita</option>
                                                              <option value="Birmingham" {{ $airport == 'Birmingham' ? 'selected' : '' }} >Birmingham</option>
                                                            <option value="Gatwick" {{ $airport == 'Gatwick' ? 'selected' : '' }}>Gatwick</option>
                                                            <option value="Heathrow" {{ $airport == 'Heathrow' ? 'selected' : '' }}>Heathrow</option>
                                                            <option value="Luton Airport" {{ $airport == 'Luton Airport' ? 'selected' : '' }}>Luton Airport</option>
                                                            <option value="Southampton Port" {{ $airport == 'Southampton Port' ? 'selected' : '' }}>Southampton Port</option>
                                                            <option value="Southend" {{ $airport == 'Southend' ? 'selected' : '' }}>Southend</option>
                                                            <option value="Stansted" {{ $airport == 'Stansted' ? 'selected' : '' }}>Stansted</option>
                                                               <optgroup label="Other Airports">
                                                                    <option value="Aberdeen" {{ $airport == 'Aberdeen' ? 'selected' : '' }}>Aberdeen</option>
                                                                    <option value="Atlanta Airport" {{ $airport == 'Atlanta Airport' ? 'selected' : '' }}>Atlanta Airport</option>
                                                                    <option value="Belfast City (George Best)" {{ $airport == 'Belfast City (George Best)' ? 'selected' : '' }}>Belfast City (George Best)</option>
                                                                    <option value="Belfast International" {{ $airport == 'Belfast International' ? 'selected' : '' }}>Belfast International</option>
                                                                    <option value="Blackpool Tower" {{ $airport == 'Blackpool Tower' ? 'selected' : '' }}>Blackpool Tower</option>
                                                                    <option value="Bournemouth" {{ $airport == 'Bournemouth' ? 'selected' : '' }}>Bournemouth</option>
                                                                    <option value="Brisbane" {{ $airport == 'Brisbane' ? 'selected' : '' }}>Brisbane</option>
                                                                    <option value="Bristol" {{ $airport == 'Bristol' ? 'selected' : '' }}>Bristol</option>
                                                                    <option value="Budapest Airport" {{ $airport == 'Budapest Airport' ? 'selected' : '' }}>Budapest Airport</option>
                                                                    <option value="Cardiff" {{ $airport == 'Cardiff<' ? 'selected' : '' }}>Cardiff</option>
                                                                    <option value="Cork" {{ $airport == 'Cork' ? 'selected' : '' }}>Cork</option>
                                                                    <option value="Dallas Fort Worth" {{ $airport == 'Dallas Fort Worth' ? 'selected' : '' }}>Dallas Fort Worth</option>
                                                                    <option value="Doncaster-Sheffield (Robin Hood)" {{ $airport == 'Doncaster-Sheffield (Robin Hood)' ? 'selected' : '' }}>Doncaster-Sheffield (Robin Hood)</option>
                                                                    <option value="Dublin" {{ $airport == 'Dublin' ? 'selected' : '' }}>Dublin</option>
                                                                    <option value="Durham Tees Valley" {{ $airport == 'Durham Tees Valley' ? 'selected' : '' }}>Durham Tees Valley</option>
                                                                    <option value="East Midlands" {{ $airport == 'East Midlands' ? 'selected' : '' }}>East Midlands</option>
                                                                    <option value="Edinburgh" {{ $airport == 'Edinburgh' ? 'selected' : '' }}>Edinburgh</option>
                                                                    <option value="Exeter" {{ $airport == 'Exeter' ? 'selected' : '' }}>Exeter</option>
                                                                    <option value="Frankfurt Airport" {{ $airport == 'Frankfurt Airport' ? 'selected' : '' }}>Frankfurt Airport</option>
                                                                    <option value="Glasgow International" {{ $airport == 'Glasgow International' ? 'selected' : '' }}>Glasgow International</option>
                                                                    <option value="Glasgow Prestwick" {{ $airport == 'Glasgow Prestwick' ? 'selected' : '' }}>Glasgow Prestwick</option>
                                                                    <option value="Gran Canaria" {{ $airport == 'Gran Canaria' ? 'selected' : '' }}>Gran Canaria</option>
                                                                    <option value="Humberside" {{ $airport == 'Humberside' ? 'selected' : '' }}>Humberside </option>
                                                                    <option value="Inverness" {{ $airport == 'Inverness' ? 'selected' : '' }}>Inverness</option>
                                                                    <option value="Isle of Man" {{ $airport == 'Isle of Man' ? 'selected' : '' }}>Isle of Man</option>
                                                                    <option value="Kuala Lumpur International Airport" {{ $airport == 'Kuala Lumpur International Airport' ? 'selected' : '' }}>Kuala Lumpur International Airport</option>
                                                                    <option value="Leeds Bradford" {{ $airport == 'Leeds Bradford' ? 'selected' : '' }}>Leeds Bradford</option>
                                                                    <option value="Liverpool" {{ $airport == 'Liverpool' ? 'selected' : '' }}>Liverpool</option>
                                                                    <option value="London City" {{ $airport == 'London City' ? 'selected' : '' }}>London City</option>
                                                                    <option value="Manchester" {{ $airport == 'Manchester' ? 'selected' : '' }}>Manchester</option>
                                                                    <option value="Newcastle" {{ $airport == 'Newcastle' ? 'selected' : '' }}>Newcastle</option>
                                                                    <option value="Norwich" {{ $airport == 'Norwich' ? 'selected' : '' }}>Norwich</option>
                                                                    <option value="NS Treinen" {{ $airport == 'NS Treinen' ? 'selected' : '' }}>NS Treinen</option>
                                                                    <option value="Orlando International Airport" {{ $airport == 'Orlando International Airport' ? 'selected' : '' }}>Orlando International Airport</option>
                                                                    <option value="Paris Charles De Gaulle" {{ $airport == 'Paris Charles De Gaulle' ? 'selected' : '' }}>Paris Charles De Gaulle</option>
                                                                    <option value="Paris Orly" {{ $airport == 'Paris Orly' ? 'selected' : '' }}>Paris Orly</option>
                                                                    <option value="San Francisco International" {{ $airport == 'San Francisco International' ? 'selected' : '' }}>San Francisco International</option>
                                                                    <option value="Shannon" {{ $airport == 'Shannon' ? 'selected' : '' }}>Shannon</option>
                                                                    <option value="Southampton Airport" {{ $airport == 'Southampton Airport' ? 'selected' : '' }}>Southampton Airport</option>
                                                                    <option value="Sydney" {{ $airport == 'Sydney' ? 'selected' : '' }}>Sydney</option>
                                                                    <option value="Toronto Pearson International" {{ $airport == 'Toronto Pearson International' ? 'selected' : '' }}>Toronto Pearson International</option>
                                                                    <option value="Washington Dulles International Airport" {{ $airport == 'Washington Dulles International Airport' ? 'selected' : '' }}>Washington Dulles International Airport</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-icon-group">
                                                     <label class="input-icon hicon hicon-adults-line hicon-bold" for="txtCheckDate2"></label>
                                                     <div class="input-icon-group">
                                                        <input id="promocode" name="promocode" type="Text" class="form-control shadow-sm" placeholder="Promo code" data-input="" value="{{ $pCode ?? '' }}">
                                                         @error('promocode')
                                                        <div style="color:red">{{$message}}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                 <div class="input-icon-group tour-date">
                                                    <label class="input-icon hicon hicon-menu-calendar hicon-bold"></label>
                                                    <input id="parking_from_date" name="parking_from_date" type="date" class="form-select shadow-sm" placeholder="Parking From" value="{{$fDate ?? ''}}" data-input="">
                                                       @error('parking_from_date')
                                                    <div style="color:red">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                @php
                                                    use Carbon\Carbon;
                                                    // Get the current time in London and add 2 hours
                                                    $startTime = Carbon::now('Europe/London')->addHours(2);
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
                                                    <select id="parking_from_time" name="parking_from_time" class="form-control">
                                                        <option value="">Select From Time</option>
                                                        @foreach ($timeOptions as $time)
                                                         <option value="{{ $time }}" {{ $time == $initialTime ? 'selected' : '' }}>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('parking_from_time')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="input-icon-group tour-date">
                                                    <label class="input-icon hicon hicon-menu-calendar hicon-bold"></label>
                                                    <input type="date" name="parking_till_date" id="parking_till_date" class="form-select shadow-sm" placeholder="Parking Till" data-input=""  value="{{$tDate ?? ''}}">
                                                      @error('parking_till_date')
                                                    <div style="color:red">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                 @php
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
                                                      <select id="parking_till_time" name="parking_till_time" class="form-control">
                                                        <option value="">Select Till Time</option>
                                                        @foreach ($timeOptions as $time)
                                                         <option value="{{ $time }}" {{ $time == $initialTime ? 'selected' : '' }}>{{ $time }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                @error('parking_till_time')
                                                    <div style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-0">
                                                        <button type="submit" class="btn btn-primary btn-uppercase w-100">
                                                            Next
                                                        </button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                             </div>

                        </div>
                        <!-- Book tour form -->
                    </div>
                </div>
            </div>
        </section>

</main>
<!-- /Main -->
@endsection

