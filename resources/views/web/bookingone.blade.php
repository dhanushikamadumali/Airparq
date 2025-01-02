@extends('layouts.web.master')
@section('content')
 <!-- Main -->
<main>         <!-- Book tour -->
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
                                            <h1 class="bookingheadingtitle">Secure Your Spot with AIRPARQ Today!</h1>
                                        </div>
                                        <form  class="row g-3" action="{{route('bookingdetailstep2')}}" method="post">
                                            @csrf
                                              <div class="alert alert-danger dangeralert" style="display:none"></div>
                                            @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            @if(session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <div class="col-12">
                                                  <label style="font-size:15px">Select Airport</label>
                                                <div class="input-icon-group">
                                                      <label for="txtKeyword" class="input-icon hicon hicon-flights-pin"></label>
                                                         <div class="input-icon-group">
                                                         <select class="form-select dropdown-select shadow-sm" id="airport" name="airport">
                                                            <option value="London Heathrow" {{ $airport == 'London Heathrow' ? 'selected' : '' }}>London Heathrow</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                 <label style="font-size:15px"> Promo Code</label>
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
                                                <label style="font-size:15px">Start Date</label>
                                                <input id="parking_from_date" name="parking_from_date" type="date" class="form-select shadow-sm" placeholder="Parking From" value="{{$fDate ?? ''}}" onchange="updateTillDateMin()">
                                                @error('parking_from_date')
                                                <div style="color:red">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                 @php
                                                  use Carbon\Carbon;
                                                    // Get the current time in London and add 2 hours
                                                    $currentTime = Carbon::now('Europe/London')->addHours(2);
                                                    // Round to the nearest 15 minutes
                                                    $startTime = $currentTime->copy()->addMinutes(15 - ($currentTime->minute % 15))->startOfMinute();
                                                    $timeOptions = [];
                                                    // Generate time slots for the next 24 hours (every 15 minutes)
                                                    for ($i = 0; $i < 96; $i++) { // 24 hours * 4 intervals per hour = 96 intervals
                                                        $timeOptions[] = $startTime->copy()->addMinutes($i * 15)->format('H:i'); // Format as hour:minute
                                                    }
                                                    // Determine the initial value for the dropdown
                                                    $initialTime = $fTime ?? $startTime->format('H:i');
                                                @endphp
                                                 <label style="font-size:15px">Start Time</label>
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
                                                 <label style="font-size:15px">End Date</label>
                                                <input id="parking_till_date" name="parking_till_date" type="date" class="form-select " placeholder="Parking Till" value="{{$tDate ?? ''}}">
                                                 @error('parking_till_date')
                                                <div style="color:red">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6">
                                                 @php
                                                // Get the current time in London and add 2 hours
                                                    $currentTime = Carbon::now('Europe/London');
                                                    $startTime  = $currentTime->copy()->addMinutes(15 - ($currentTime->minute % 15))->startOfMinute();
                                                    $timeOptions = [];
                                                    // Generate time slots for the next 24 hours (every minute)
                                                     for ($i = 0; $i < 96; $i++) { // 24 hours * 4 intervals per hour = 96 intervals
                                                        $timeOptions[] = $startTime->copy()->addMinutes($i * 15)->format('H:i'); // Format as hour:minute
                                                    }
                                                    // Determine the initial value for the dropdown
                                                    $initialTime = $tTime ?? $startTime->format('H:i');
                                                @endphp
                                                 <label style="font-size:15px">  End Time</label>
                                                <div class="input-icon-group tour-date">
                                                <label class="input-icon hicon hicon-time-clock hicon-bold"></label>
                                                      <select id="parking_till_time" name="parking_till_time" class="form-control">
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

<script>
    // Set minimum date for both inputs
    document.addEventListener('DOMContentLoaded', () => {
        const currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
        const fromDateInput = document.getElementById('parking_from_date');
        const tillDateInput = document.getElementById('parking_till_date');

        if (fromDateInput && tillDateInput) {
            // Set the min attribute to current date
            fromDateInput.min = currentDate;
            tillDateInput.min = currentDate;
        }
    });

    function updateTillDateMin() {
        const fromDateInput = document.getElementById('parking_from_date');
        const tillDateInput = document.getElementById('parking_till_date');

        if (fromDateInput && tillDateInput) {
            // Get selected "From Date"
            const selectedFromDate = fromDateInput.value;

            // Update the min attribute of "Till Date"
            tillDateInput.min = selectedFromDate;

            // Clear "Till Date" if it's earlier than the selected "From Date"
            if (tillDateInput.value && tillDateInput.value < selectedFromDate) {
                tillDateInput.value = '';
            }
        }
    }

</script>
