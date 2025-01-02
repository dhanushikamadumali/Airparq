@extends('layouts.web.master')
@section('content')
<!-- Main -->
<main>
<!-- Book tour -->
    <section id="book-tour" class="hero d-md-none btntext mt-4" data-aos="fade">
        <div class="bg-content container">
        <div class="row g-0 ">
            <div class="col-6" style="font-weight:600;font-size:18px;margin-top:10px">Select a Booking</div>
            <div class="col-6">
            <button type="button" id="form_view" class="btn btn-primary d-md-none w-100" style="border-radius:30px">
                Amend
            </button>
            </div>
        <br/>
        </div>
        </div>
    </section>
    <section id="booking_details_form" class="d-none d-md-block"  class="hero" style="margin-bottom:30px">
        <div class="bg-content container" style="padding-top:30px">
            {{-- <div class="" > --}}
                <div class="row g-0 justify-content-between">
                    <!-- Book tour form -->
                    <div class="col-12 col-xl-12">
                            {{-- <div > --}}
                                <div class="card border-0 shadow p-lg-2 bg-light-gray" >
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h3 class="bookingtitle" style="font-weight:bold">Secure your spot with AIRPARQ today!</h3>
                                    </div>
                                    <form id="bookingForm"  class="row g-3" action="{{route('selectcustomerlogin')}}" method="post">
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
                                        <input type="hidden" id="selected_terminal_id" name="selected_terminal_id">
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
                                                <label class="input-icon hicon hicon-child-line hicon-bold" for="txtCheckDate2"></label>
                                                    <div class="input-icon-group">
                                                    <input id="promocode" name="promocode" type="Text" class="form-control shadow-sm" placeholder="Promo code" data-input="" value="{{ $pCode ?? '' }}">
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
                                        <div class="col-12 col-md-3">
                                               @php
                                                // Generate hours (00 to 23)
                                                $hourOptions = [];
                                                for ($hour = 0; $hour < 24; $hour++) {
                                                    $hourOptions[] = str_pad($hour, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial hour for the dropdown
                                                $initialHour = $fHour ?? 00;
                                            @endphp
                                            <label style="font-size:15px">Start Hour</label>
                                            <select id="parking_from_hour" name="parking_from_hour" class="form-control">
                                                @foreach ($hourOptions as $hour)
                                                    <option value="{{ $hour }}" {{ $hour == $initialHour ? 'selected' : '' }}>{{ $hour }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_from_hour')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror

                                        </div>
                                         <div class="col-12 col-md-3">
                                            @php
                                                // Generate minutes (00 to 55 in increments of 5)
                                                $minuteOptions = [];
                                                for ($minute = 0; $minute < 60; $minute += 5) {
                                                    $minuteOptions[] = str_pad($minute, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial minute for the dropdown
                                                $initialMinute = $fMin ?? 00;
                                            @endphp
                                            <label style="font-size:15px">Minute</label>
                                            <select id="parking_from_min" name="parking_from_min" class="form-control">
                                                @foreach ($minuteOptions as $minute)
                                                    <option value="{{ $minute }}" {{ $minute == $initialMinute ? 'selected' : '' }}>{{ $minute }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_from_min')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                         </div>
                                        <div class="col-12 col-md-6">
                                             <label style="font-size:15px">End  Date</label>
                                            <input id="parking_till_date" name="parking_till_date" type="date" class="form-select " placeholder="Parking Till" value="{{$tDate ?? ''}}">
                                            @error('parking_till_date')
                                            <div style="color:red">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-3">
                                              @php
                                                // Generate hours (00 to 23)
                                                $hourOptions = [];
                                                for ($hour = 0; $hour < 24; $hour++) {
                                                    $hourOptions[] = str_pad($hour, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial hour for the dropdown
                                                $initialHour = $tHour ?? 00;
                                            @endphp
                                            <label style="font-size:15px">End Hour</label>
                                            <select id="parking_till_hour" name="parking_till_hour" class="form-control">
                                                @foreach ($hourOptions as $hour)
                                                    <option value="{{ $hour }}" {{ $hour == $initialHour ? 'selected' : '' }}>{{ $hour }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_till_hour')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-3">
                                             @php
                                                // Generate minutes (00 to 55 in increments of 5)
                                                $minuteOptions = [];
                                                for ($minute = 0; $minute < 60; $minute += 5) {
                                                    $minuteOptions[] = str_pad($minute, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                }
                                                // Determine the initial minute for the dropdown
                                                $initialMinute = $tMin ?? 00;
                                            @endphp
                                            <label style="font-size:15px">Minute</label>
                                            <select id="parking_till_min" name="parking_till_min" class="form-control">
                                                @foreach ($minuteOptions as $minute)
                                                    <option value="{{ $minute }}" {{ $minute == $initialMinute ? 'selected' : '' }}>{{ $minute }}</option>
                                                @endforeach
                                            </select>
                                            @error('parking_till_min')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                                <div class="row">
                                                <div class="col-12 col-md-6">
                                                <div class="mb-1">
                                                    <button type="button" class="btn btn-primary btn-uppercase w-100 editsearch">
                                                        Edit Search
                                                    </button>
                                                </div>
                                                </div>
                                        </div>
                                </div>
                            {{-- </div> --}}
                            </div>
                    </div>
                    <!-- Book tour form -->
                </div>
            {{-- </div> --}}
        </div>
    </section>
     <div class="p-top-50 p-bottom-50 bg-gray-gradient" id="terminalview" style="margin-top:20px">        <!-- Shopping cart -->
        <section class="container" id="step1">
              <!-- /Book tour -->
            @if($allterminallists !== null && count($allterminallists) > 0)
             <div class="row g-3 g-xl-4">
                 @foreach ($allterminallists as $terminallist)
                <div class="col-12 col-xl-3 col-md-6">
                    <a class="info-card hover-effect shadow-sm rounded h-100">
                        <div class="image-center rounded">
                            <img src="{{asset('images/'.$terminallist->image)}}" class="w-100" alt="">
                        </div>
                        <h3 class="card-title mt-3 mb-3" style="font-size:20px;font-weight:600">{{$terminallist->name}}</h3>
                        <hr/>
                            <p style="text-align: justify;font-size:15px">{{$terminallist->description}}</p>
                             <div style="display: flex;align-items: center;width: 100%;">
                                <div style="font-weight:bold;font-size:30px">
                                    £{{ round($tPrice ?? 50.99, 2) }}
                                </div>
                                <button type="button" class="btn btn-primary  choose-terminal1" style="font-size:12px;margin-left:50px" value="{{$terminallist->id}}">
                                    CHOOSE
                                </button>
                            </div>
                    </a>
                </div>
                 @endforeach
            </div>
        </section>
        <!-- /Shopping cart -->
    </div>
    @elseif($allterminallists === null)

    @endif

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
