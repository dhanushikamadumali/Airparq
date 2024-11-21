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
                        <div class="row g-3">
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <!-- Add New Button on Right Side -->
                                <div class="col-12 col-md-2 mb-2">
                                    <a href="{{ asset('admin/createbookingprice') }}" class="btn page_btn w-100 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-plus me-1"></i> Add New
                                    </a>
                                </div>
                                <!-- Search Form on Left Side -->
                                <form action="{{ route('allbookingprice') }}" method="GET" class="d-flex align-items-center">
                                    @csrf
                                    <!-- Search Input Field -->
                                    <div class="col-10 col-md-9 mb-2">
                                        <input type="text" class="form-control" name="search" id="search" placeholder="Search.." />
                                    </div>

                                    <!-- Search Button -->
                                    <div class="col-2 col-md-3 mb-2">
                                        <button type="submit" class="btn page_btn searchbtn" style="margin-left:13px">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table  class="display table table-striped table-hover">
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
                        {{$bookingpricelists->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

