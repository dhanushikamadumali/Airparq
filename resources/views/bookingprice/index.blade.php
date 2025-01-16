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



                                    <form action="{{ route('storebookingprice') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                                        @csrf
                                         <div class="col-10 col-md-6 mb-2">
                                             <input type="file" name="csv_file" id="csv_file" required>
                                         </div>
                                         <div class="col-2 col-md-6 mb-2">
                                            <button type="submit" href="{{ asset('admin/createbookingprice') }}" class="btn page_btn w-100 d-flex align-items-center justify-content-center">
                                                Upload Csv
                                            </button>
                                         </div>
                                    </form>
                                
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
                                <th style="text-align:center">Days</th>
                                <th style="text-align:center">Meet and Greed outdoor(£)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bookingpricelists as $bookingpricelist)
                            <tr>
                                <td style="text-align:center">{{$bookingpricelist->datecount}}</td>
                                <td style="text-align:center">£ {{$bookingpricelist->booking_price	}}</td>
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

