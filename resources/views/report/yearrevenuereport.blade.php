@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Annual Revenue Report</h3>
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
                         <a href="{{asset('admin/yearrevenuepdf')}}">
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
                              @foreach ($yearbookinglists as $yearbookinglist)
                            <tr>
                                 <td>{{$yearbookinglist->booking_code}}</td>
                                <td>{{$yearbookinglist->first_name}} {{$yearbookinglist->last_name}}</td>
                                <td>{{$yearbookinglist->email}}</td>
                                <td>{{$yearbookinglist->phone_no}}</td>
                                <td>{{$yearbookinglist->price}}</td>
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
                                    <th style="font-size:20px">Annual Revenue</th>
                                    <th style="font-size:20px">£ {{$yearallrevenue}}</th>
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

