@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Today Outgoing Report</h3>
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
                         <a href="{{asset('admin/todayoutgoingpdf')}}">
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
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($todayoutgoingbookinglists as $todayoutgoingbookinglist)
                            <tr>
                                 <td>{{$todayoutgoingbookinglist->booking_code}}</td>
                                <td>{{$todayoutgoingbookinglist->first_name}} {{$todayoutgoingbookinglist->last_name}}</td>
                                <td>{{$todayoutgoingbookinglist->email}}</td>
                                <td>{{$todayoutgoingbookinglist->phone_no}}</td>
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

