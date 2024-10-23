@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">All Booking</h3>
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
                        <div class="row g-3">
                            <div class="col-12 col-md-2">
                                <a href="{{asset('admin/datefilterbooking')}}">
                                    <button class="btn page_btn" style="width:100%" >
                                            Filter Date
                                    </button>
                                </a>
                            </div>
                            <div class="col-12 col-md-2">
                                  <a href="{{asset('admin/incomebooking')}}">
                                    <button class="btn page_btn" style="width:100%" >
                                            Incoming
                                    </button>
                                </a>
                            </div>
                            <div class="col-12 col-md-2">
                                 <a href="{{asset('admin/outgoingbooking')}}">
                                    <button class="btn page_btn" style="width:100%" >
                                            Outgoing
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Booking Code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($allbookinglists as $allbookinglist)
                            <tr>
                                <td>{{$allbookinglist->booking_code}}</td>
                                <td>{{$allbookinglist->first_name}} {{$allbookinglist->last_name}}</td>
                                <td>{{$allbookinglist->email}}</td>
                                <td>{{$allbookinglist->phone_no}}</td>
                                 <td>
                                 @if ($allbookinglist->status == 0)
                                    <div style="color:red">Cancel</div>
                                 @endif
                                    @if ($allbookinglist->status == 1)
                                        <div style="color:#ff8533">Pending</div>
                                     @endif
                                 </td>
                                <td>
                                    <a href="{{ route('editbooking',Crypt::encryptString($allbookinglist->id))}}">
                                        <i class="fa fa-edit p-2 editbtn"></i>
                                    </a>
                                    <button class="open_camera btn p-0 camerabtn" data-row-id="{{ $allbookinglist->id }}">
                                        <i class="fas fa-camera"></i>
                                    </button>
                                    <a href="{{route('printbooking',Crypt::encryptString($allbookinglist->id))}}">
                                    <i class="fas fa-print p-2 print"></i>
                                    </a>
                                    <button class="btn p-0 delete" onclick="bookingdetailsdelete('{{Crypt::encryptString($allbookinglist->id)}}')">
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

<!-- Hidden form for uploading photos -->
{{-- <form id="upload-form">
    @csrf
    <input type="hidden" name="row_id" id="row_id">
    <input type="hidden" name="photos" id="photos">
</form> --}}

@endsection

