@extends('layouts.main.master')
@section('content')
    <div class="container">
    <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Company Setting</h3>
        <ul class="breadcrumbs mb-3">
            <li class="separator">
                <i class="icon-arrow-left"></i>
            </li>
            <li class="nav-item">
                 <a href="{{ URL::previous() }}">Back</a>
            </li>
        </ul>
    </div>
         <form action="{{route('updatecsetting')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <div class="row">
                       <input type="hidden" id="id" name="id" value="{{$csetting1->id}}"/>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                        <label>SMTP Host</label>
                        <input
                            type="text"
                            class="form-control"
                            id="smtp_host"
                            name="smtp_host"
                            value="{{$csetting1->smtp_host}}"
                        />
                        @error('smtp_host')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="form-group">
                        <label>Username</label>
                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            name="username"
                        value="{{$csetting1->username}}"
                        />
                        @error('username')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Password</label>
                            <input
                                type="text"
                                class="form-control"
                                id="password"
                                name="password"
                            value="{{$csetting1->password}}"
                            />
                            @error('password')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Enc type</label>
                            <input
                                type="text"
                                class="form-control"
                                id="enc_type"
                                name="enc_type"
                            value="{{$csetting1->enc_type}}"
                            />
                            @error('enc_type')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                            value="{{$csetting1->email}}"

                            />
                            @error('email')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Address</label>
                            <input
                                type="text"
                                class="form-control"
                                id="address"
                                name="address"
                            value="{{$csetting1->address}}"
                            />
                            @error('address')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Phone1</label>
                            <input
                                type="text"
                                class="form-control"
                                id="phone1"
                                name="phone1"
                            value="{{$csetting1->phone1}}"

                            />
                            @error('phone1')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Phone2</label>
                            <input
                                type="text"
                                class="form-control"
                                id="phone2"
                                name="phone2"
                            value="{{$csetting1->phone2}}"
                            />
                            @error('phone2')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Port</label>
                            <input
                                type="text"
                                class="form-control"
                                id="port"
                                name="port"
                            value="{{$csetting1->port}}"
                            />
                            @error('port')
                            <div style="color:red">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{$csetting1->image}}"/>
                                <img  src="{{asset('assets/img/'.$csetting1->image)}}" alt="{{  $csetting1->image }}" style="width: 100px">
                                @error('image')
                                <div style="color:red">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-action">
                <button class="btn btn page_btn updatebtn" type="submit">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    </div>
    </div>
@endsection


