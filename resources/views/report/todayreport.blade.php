@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Today Report</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Back</a>
                    </li>
                </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{asset('todaypdf')}}">
                            <button class="btn page_btn" >
                                    PDF
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="today_booking" class="display table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Booking Code</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone no</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($todaybookinglists as $todaybookinglist)
                            <tr>
                                <td>{{$todaybookinglist->booking_code}}</td>
                                <td>{{$todaybookinglist->first_name}} {{$todaybookinglist->last_name}}</td>
                                <td>{{$todaybookinglist->email}}</td>
                                <td>{{$todaybookinglist->phone_no}}</td>
                                <td>
                                    <a href="{{route('printbooking',Crypt::encryptString($todaybookinglist->id))}}">
                                    <i class="fas fa-print p-2"></i>
                                    </a>
                                    <button class="btn p-0 delete" onclick="todayreportdelete('{{Crypt::encryptString($todaybookinglist->id)}}')">
                                    <i class="fa fa-times deletebtn"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

