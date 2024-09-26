@extends('layouts.main.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Date Filter List</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="separator">
                    <i class="icon-arrow-left"></i>
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
                        <div class="row">
                            <div class="col-md-4  mt-3 ">
                                <lable style="margin-left:10px;font-weight:600">Parking From</lable>
                                <div class="form-group">
                                    <input type="date" id="from_date" name="from_date" class="form-control" value="{{date("Y-m-d")}}"/>
                                </div>
                            </div>
                            <div class="col-md-4  mt-3">
                                <lable style="margin-left:10px;font-weight:600">Parking To</lable>
                                <div class="form-group">
                                    <input type="date" id="to_date" name="to_date" class="form-control" value="{{date("Y-m-d")}}"/>
                                </div>
                            </div>
                        <div class="col-md-3 mt-5">
                            <a href="">
                            <button id="filterButton" class="btn page_btn">Search</button>
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="filterdate_rangetable"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                    <tr>
                                        <th>Booking Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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

