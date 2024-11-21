@extends('layouts.main.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                 <h3 class="fw-bold mb-3">Status Filter List</h3>
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
                            <div class="col-12 col-md-2">
                                <label style="margin-left:10px;font-weight:800;font-size:30px">Status</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <select class="form-select dropdown-select shadow-sm" id="status" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Completed</option>
                                    <option value="0">Cancle</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="filterstatus_rangetable"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                    <tr>
                                        <th>Booking Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
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

