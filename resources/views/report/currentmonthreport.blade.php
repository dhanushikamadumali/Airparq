@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Current Month Report</h3>
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
                         <a href="{{asset('admin/currentmonthpdf')}}">
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
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($currentmonthbookinglists as $currentmonthbookinglist)
                            <tr>
                                <td>{{$currentmonthbookinglist->booking_code}}</td>
                                   <td>{{$currentmonthbookinglist->first_name}} {{$currentmonthbookinglist->last_name}}</td>
                                 <td>{{$currentmonthbookinglist->email}}</td>
                                <td>{{$currentmonthbookinglist->phone_no}}</td>
                                 <td>
                                  <a href="{{ route('printbookingdetails',Crypt::encryptString($currentmonthbookinglist->id))}}">
                                    <i class="fa fa-edit p-2 editbtn"></i>
                                    </a>
                                     <button class="btn p-0 delete" onclick="currentmonthreportdelete('{{Crypt::encryptString($currentmonthbookinglist->id)}}')">
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

