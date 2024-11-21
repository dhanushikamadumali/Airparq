@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Month to Date Revenue Report</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                         <a href="{{ URL::previous() }}">Back</a>
                    </li>
                </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                         <a href="{{asset('admin/monthtodaterevenuepdf')}}">
                            <button class="btn page_btn" >
                                    PDF
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Booking Code</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone no</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach ($currentmonthbookinglists as $currentmonthbookinglist)
                            <tr>
                                 <td>{{$currentmonthbookinglist->booking_code}}</td>
                                <td>{{$currentmonthbookinglist->first_name}} {{$currentmonthbookinglist->last_name}}</td>
                                <td>{{$currentmonthbookinglist->email}}</td>
                                <td>{{$currentmonthbookinglist->phone_no}}</td>
                                <td>{{$currentmonthbookinglist->price}}</td>
                            </tr>
                            @endforeach
                             
                            </tbody>
                        </table>
                             <table id="basic-datatables" class="display table table-striped table-hover">
                                 <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="font-size:20px">Month To Date Revenue</th>
                                    <th style="font-size:20px">£ {{$monthtodateallrevenue}}</th>
                                </tr>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

