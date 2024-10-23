@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Booking Price</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="separator">
                        <i class="icon-arrow-left"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Back</a>
                    </li>
                </ul>
        </div>
        <form action="{{route('updatebookingprice')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                     <input type="hidden" class="form-control" id="id"  name="id" value="{{$bookingprice->id}}"/>
                                    <div class="form-group">
                                        <label>Date Count</label>
                                        <input type="text" class="form-control" id="datecount"  name="datecount" value="{{$bookingprice->datecount}}"/>
                                        @error('datecount')
                                        <div style="color:red" >{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Booking Price</label>
                                        <input type="text" class="form-control" id="booking_price" name="booking_price" value="{{ $bookingprice->booking_price }}"/>
                                        @error('booking_price')
                                        <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn page_btn" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

