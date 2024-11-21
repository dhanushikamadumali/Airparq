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
<!-- Modal for Camera -->
<div id="cameraModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Take Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video id="video" width="100%" height="100%" autoplay></video>
                <div id="results" class="mt-3"></div> <!-- Display captured images here -->
            </div>
            <div class="modal-footer">
                <button id="switch-camera" class="btn btn-secondary">Switch Camera</button>
                <button id="take-photo" class="btn btn-primary">Take Photo</button>
                <button type="button" id="close-modal" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="upload-photos" class="btn btn-success">Upload</button>
            </div>
        </div>
    </div>
</div>
@endsection

