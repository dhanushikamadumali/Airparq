@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Terminal</h3>
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
                        <a href="{{asset('admin/createterminal')}}">
                            <button class="btn page_btn" data-bs-toggle="modal" data-bs-target="#addRowModal" >
                                <i class="fa fa-plus"></i>
                                    Add New Terminal
                            </button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Base Price</th>
                                <th>Per day Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($terminallists as $terminallist)
                            <tr>
                                <td><img src="{{asset('images/'.$terminallist->image)}}" style="width:50px;height:50px"/></td>
                                <td>{{$terminallist->name}}</td>
                                <td>{{$terminallist->base_price}}</td>
                                <td>{{$terminallist->per_day_price}}</td>
                                <td>
                                    <a href="{{ route('editterminal',Crypt::encryptString($terminallist->id))}}">
                                        <i class="fa fa-edit editbtn"></i>
                                    </a>
                                    <button class="btn p-0 delete" onclick="terminaldelete('{{Crypt::encryptString($terminallist->id)}}')">
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

