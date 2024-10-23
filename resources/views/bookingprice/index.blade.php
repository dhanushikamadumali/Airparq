@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">All Booking Price</h3>
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
                        <a href="{{asset('admin/createbookingprice')}}">
                            <button class="btn page_btn" data-bs-toggle="modal" data-bs-target="#addRowModal" >
                                <i class="fa fa-plus"></i>
                                    Add New Price
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Date Count</th>
                                <th>Booking Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bookingpricelists as $bookingpricelist)
                            <tr>
                                <td>{{$bookingpricelist->datecount}}</td>
                                <td>{{$bookingpricelist->booking_price	}}</td>
                                <td>
                                    <a href="{{ route('editbookingprice',Crypt::encryptString($bookingpricelist->id))}}">
                                        <i class="fa fa-edit editbtn"></i>
                                    </a>
                                    <button class="btn p-0 delete" onclick="bookingpricedelete('{{Crypt::encryptString($bookingpricelist->id)}}')">
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

