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
                                              <div class="col-12 col-md-12"> <label > Flying From</label></div>
                                            <div class="col-12">
                                                <div class="input-icon-group">
                                                      <label for="txtKeyword" class="input-icon hicon hicon-flights-pin"></label>
                                                         <div class="input-icon-group">
                                                         <select class="form-select dropdown-select shadow-sm" id="airport" name="airport">
                                                         <option>Select Airport</option>
                                                            <option value="London Heathrow" {{ $airport == 'London Heathrow' ? 'selected' : '' }}>London Heathrow</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12"> <label > Discount Code</label></div>
                                            <div class="col-12">
                                                <div class="input-icon-group">

                                                     <div class="input-icon-group">
                                                        <label class="input-icon hicon hicon-child-line hicon-bold" for="txtCheckDate2"></label>
                                                            <div class="input-icon-group">
                                                            <input id="promocode" name="promocode" type="Text" class="form-control shadow-sm" placeholder="Discount code" data-input="" value="{{ $pCode ?? '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                 <div class="col-6 col-md-6 mb-20">
                                                <label>Parking From</label>
                                                </div>
                                                 <div class="col-6 col-md-6 mb-20">
                                                      <label >Drop of Time</label>
                                                 </div>

                                             <div class="col-6 col-md-6">
                                                 <label class="bookingwrapper">
                                                    <input
                                                      type="date"
                                                      required="required"
                                                      class="form-control shadow-sm"
                                                      id="parking_from_date"
                                                      name="parking_from_date"
                                                      onchange="updateTillDateMin()"
                                                     value="{{$fDate ?? ''}}"
                                                    />
                                                    <span class="date-label"></span>
                                                </label>
                                                @error('parking_from_date')
                                                    <div style="color:red">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-3 col-md-3">
                                                <div class="mb-0">
                                                    @php
                                                        // Generate hours (00 to 23)
                                                        $hourOptions = [];
                                                        for ($hour = 0; $hour < 24; $hour++) {
                                                            $hourOptions[] = str_pad($hour, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                        }
                                                        // Determine the initial hour for the dropdown
                                                        $initialHour = $fHour ?? 00;
                                                    @endphp

                                                    <select id="parking_from_hour" name="parking_from_hour" class="form-control" required>
                                                        @foreach ($hourOptions as $hour)
                                                            <option value="{{ $hour }}" {{ $hour == $initialHour ? 'selected' : '' }}>{{ $hour }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('parking_from_hour')
                                                        <div style="color:red">{{ $message }}</div>
                                                    @enderror
                                                    {{-- <input type="hidden" name="parking_from_time" id="parking_from_time"> --}}
                                                </div>
                                            </div>

                                            <div class="col-3 col-md-3">
                                                <div class="mb-0">
                                                    @php
                                                        // Generate minutes (00 to 55 in increments of 5)
                                                        $minuteOptions = [];
                                                        for ($minute = 0; $minute < 60; $minute += 5) {
                                                            $minuteOptions[] = str_pad($minute, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                        }
                                                        // Determine the initial minute for the dropdown
                                                        $initialMinute = $fMin ?? 00;
                                                    @endphp

                                                    <select id="parking_from_min" name="parking_from_min" class="form-control" required>
                                                        @foreach ($minuteOptions as $minute)
                                                            <option value="{{ $minute }}" {{ $minute == $initialMinute ? 'selected' : '' }}>{{ $minute }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('parking_from_min')
                                                        <div style="color:red">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                                 <div class="col-6 col-md-6 mb-20">
                                                <label >Return Date</label>
                                                </div>
                                                 <div class="col-6 col-md-6 mb-20">
                                                      <label >Return Time</label>
                                                 </div>


                                            <div class="col-6 col-md-6">
                                                <label class="bookingwrapper">
                                                    <input
                                                      type="date"
                                                      required="required"
                                                      class="form-control shadow-sm"
                                                      id="parking_till_date"
                                                      name="parking_till_date"
                                                      value="{{$tDate ?? ''}}"
                                                    />
                                                    <span class="date-label"></span>
                                                </label>
                                                 @error('parking_till_date')
                                                <div style="color:red">{{$message}}</div>
                                                @enderror
                                            </div>
                                                 <div class="col-3 col-md-3">
                                                    <div class="mb-0">
                                                        @php
                                                            // Generate hours (00 to 23)
                                                            $hourOptions = [];
                                                            for ($hour = 0; $hour < 24; $hour++) {
                                                                $hourOptions[] = str_pad($hour, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                            }
                                                            // Determine the initial hour for the dropdown
                                                            $initialHour = $tHour ?? 00;
                                                        @endphp
                                                        <select id="parking_till_hour" name="parking_till_hour" class="form-control" required>
                                                            @foreach ($hourOptions as $hour)
                                                                <option value="{{ $hour }}" {{ $hour == $initialHour ? 'selected' : '' }}>{{ $hour }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('parking_till_hour')
                                                            <div style="color:red">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-3 col-md-3">
                                                    <div class="mb-0">
                                                        @php
                                                            // Generate minutes (00 to 55 in increments of 5)
                                                            $minuteOptions = [];
                                                            for ($minute = 0; $minute < 60; $minute += 5) {
                                                                $minuteOptions[] = str_pad($minute, 2, '0', STR_PAD_LEFT); // Pad single digits with leading zero
                                                            }
                                                            // Determine the initial minute for the dropdown
                                                            $initialMinute = $tMin ?? 00;
                                                        @endphp
                                                        <select id="parking_till_min" name="parking_till_min" class="form-control" required>
                                                            @foreach ($minuteOptions as $minute)
                                                                <option value="{{ $minute }}" {{ $minute == $initialMinute ? 'selected' : '' }}>{{ $minute }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('parking_till_min')
                                                            <div style="color:red">{{ $message }}</div>
                                                        @enderror
                                                         {{-- <input type="hidden" name="parking_end_time" id="parking_end_time"> --}}
                                                    </div>

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

      function moveToNext(current) {
        if (current.value.length >= current.maxLength) {
            let next = current.nextElementSibling;
            if (next && next.classList.contains('otp-input')) {
                next.focus();
            }
        }
    }

</script>
