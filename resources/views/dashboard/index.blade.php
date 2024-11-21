@extends('layouts.main.master')

@section('content')
<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
    >
      <div>
        <h3 class="fw-bold mb-3">Dashboard</h3>
        <h6 class="op-7 mb-2">Admin Dashboard</h6>
      </div>
    </div>
     @if(Auth::check())
     @if(Auth::user()->role == 'admin' || Auth::user()->role == 'driver')
    <div class="row">

         <div class="col-sm-6 col-md-4">
             <a href="{{route('todayreport')}}">
            <div class="card card-stats card-round">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-icon">
                    <div
                      class="icon-big text-center icon-primary bubble-shadow-small" style="background-color:#ffbf80"
                    >
                      <i class="fas fa-chevron-circle-left"></i>
                    </div>
                  </div>
                  <div class="col col-stats ms-3 ms-sm-0">
                    <div class="numbers">
                      <p class="card-category">Today Incoming Bookings</p>
                       <h4 class="card-title">{{$todayincomebooking}}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </a>
        </div>
      <div class="col-sm-6 col-md-4">
        <a href="{{route('todayoutgoingreport')}}">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-info bubble-shadow-small" style="background-color:#ff99ff"
                >
                  <i class="fas fa-chevron-circle-right"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                     <p class="card-category">Today Outgoing Bookings</p>
                      <h4 class="card-title">{{$todayoutgoingbooking}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-4">
         <a href="{{route('currentmonthreport')}}">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-success bubble-shadow-small" style="background-color:#4dffb8"
                >
                  <i class="fas fa-check-circle"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                 <div class="numbers">
                  <p class="card-category">Total Booking For The Month</p>
                  <h4 class="card-title">{{$currentyearmonth}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
    </div>
     @endif
    @endif
      @if(Auth::check())
     @if(Auth::user()->role == 'admin')
     <div class="row">
      <div class="col-sm-6 col-md-4">
        <a href="{{route('todayrevenuereport')}}">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-primary bubble-shadow-small" style="background-color:#ff6666"
                >
                  <i class="fas fa-money-check"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                <div class="numbers">
                  <p class="card-category">Today Revenue</p>
                  <h4 class="card-title">£ {{$todayallrevenue}}</h4>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <a href="{{route('monthtodaterevenuereport')}}">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-info bubble-shadow-small" style="background-color:#ffdb4d"
                >
                  <i class="fas fa-money-check-alt"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                     <p class="card-category">Month Revenue</p>
                      <h4 class="card-title">£ {{$monthtodateallrevenue}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="card card-stats card-round">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-icon">
                <div
                  class="icon-big text-center icon-success bubble-shadow-small" style="background-color:#66d9ff"
                >
                  <i class="fas fa-users"></i>
                </div>
              </div>
              <div class="col col-stats ms-3 ms-sm-0">
                 <div class="numbers">
                  <p class="card-category">Repeat Customer Current Month </p>
                  <h4 class="card-title">{{$currentmonthrepeatecustomer[0]['total_count']}}</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
        <div class="col-md-6">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Month to date bookings</div>

            </div>
          </div>
            <!-- Canvas for the daily sales chart -->

            <!-- Legend Container (if needed) -->
            <div id="monthlyRevenueChart"></div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Today income bookings</div>

            </div>
          </div>
            <!-- Canvas for the daily sales chart -->

            <!-- Legend Container (if needed) -->
            <div id="TodayIncomeBookingChart"></div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Month to date Revenue</div>

            </div>
          </div>
            <!-- Canvas for the daily sales chart -->

            <!-- Legend Container (if needed) -->
            <div id="monthtoDateBookingRevenueChart"></div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card card-round">
          <div class="card-header">
            <div class="card-head-row">
              <div class="card-title">Today Revenue</div>

            </div>
          </div>
            <!-- Canvas for the daily sales chart -->

            <!-- Legend Container (if needed) -->
            <div id="TodayIncomeBookingRevenueChart"></div>
        </div>
        </div>
    </div>
      @endif
    @endif
  </div>
</div>



@endsection








