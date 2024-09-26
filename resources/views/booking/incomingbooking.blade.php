@extends('layouts.main.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Today Incoming Booking</h3>
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
                            <div class="col-md-2 mt-4 ">
                                <lable style="font-weight:600" >Select Terminal</lable>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                      <select id="terminal" name="terminal" class="form-select form-control" required>
                                      @foreach ( $terminallist as $terminal )
                                        <option value="{{$terminal->id}}"" >{{$terminal->name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-3 mt-2">
                            <a href="">
                            <button id="filterincomebookButton" class="btn page_btn">Search</button>
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="filterdate_incomebooktable"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                    <tr>
                                        <th>Booking Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Time</th>
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

