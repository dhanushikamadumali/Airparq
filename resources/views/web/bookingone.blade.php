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
                            <div id="booking_details_form1" class="d-none d-md-block">
                                  <div class="card border-0 shadow p-lg-2 bg-light-gray" >
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <strong class="fs-2 fw-semibold fw-medium">Secure Your Spot with AIRPARQ Today!</strong>
                                        </div>
                                        <form  class="row g-3" action="{{route('bookingdetailstep2')}}" method="post">
                                            @csrf
                                            <div class="col-12">
                                                <div class="input-icon-group">
                                                    <label class="input-icon hicon hicon-adults-line hicon-bold" for="txtCheckDate2"></label>                                                    <div class="input-icon-group">
                                                    <select class="form-select dropdown-select shadow-sm" id="airport" name="airport">
                                                        <option value="London Heathrow" {{ $airport == 'London Heathrow' ? 'selected' : '' }}>London Heathrow</option>
                                                        <option value="New York JFK" {{ $airport == 'New York JFK' ? 'selected' : '' }}>New York JFK</option>
                                                        <option value="Tokyo Narita" {{ $airport == 'Tokyo Narita' ? 'selected' : '' }}>Tokyo Narita</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-icon-group">
                                                    <label class="input-icon hicon hicon-child-line hicon-bold" for="txtCheckDate2"></label>
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
                                                <div class="input-icon-group">
                                                <?php
                                                 date_default_timezone_set('Asia/Colombo'); //e timeze to Sri Lanka
                                                ?>
                                                    <input id="parking_from_time" name="parking_from_time" type="time" class="form-control" placeholder="Time" value="{{ $fTime ?? date('H:i', strtotime('+2 hours')) }}" min="{{ $fTime ?? date('H:i', strtotime('+2 hours')) }}" >
                                                      @error('parking_from_time')
                                                    <div style="color:red">{{$message}}</div>
                                                    @enderror
                                                </div>
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
                                                 <div class="input-icon-group tour-date">
                                                    <input id="parking_till_time" name="parking_till_time" type="time" class="form-control" placeholder="Time" value="{{$tTime ?? ''}}">
                                                      @error('parking_till_time')
                                                    <div style="color:red">{{$message}}</div>
                                                    @enderror
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

