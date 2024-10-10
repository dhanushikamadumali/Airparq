@extends('layouts.main.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                    <h3 class="fw-bold mb-3">User List</h3>
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
                        <a href="{{route('createuser')}}">
                        <button
                            class="btn page_btn"
                            data-bs-toggle="modal"
                            data-bs-target="#addRowModal"
                        >
                            <i class="fa fa-plus"></i>
                            Add New User
                        </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userlists as $userlist)
                                    <tr>
                                        <td>{{$userlist->name}}</td>
                                        <td>{{$userlist->email}}</td>
                                        <td>{{$userlist->role}}</td>
                                        <td>
                                            <a href="{{ route('edituser',Crypt::encryptString($userlist->id))}}">
                                                <i class="fa fa-edit editbtn"></i>
                                            </a>
                                            <button class="btn p-0 delete" onclick="userdelete('{{Crypt::encryptString($userlist->id)}}')">
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

