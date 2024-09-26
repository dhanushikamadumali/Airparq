@extends('layouts.main.master')
@section('content')
    <div class="container">
    <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Company Setting</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="#">Back</a>
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
            <input type="hidden" id="id" name="id" value="{{$csetting->id}}"/>
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Mail Host</label>
                  <input
                    type="text"
                    class="form-control"
                    id="mail_host"
                    name="mail_host"
                    value="{{$csetting->mail_host}}"
                  />
                  @error('mail_host')
                <div style="color:red">{{$message}}</div>
                  @enderror
                </div>
            </div>
             <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Mail Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="mail_username"
                    name="mail_username"
                    value="{{$csetting->mail_username}}"
                  />
                  @error('mail_username')
                <div style="color:red">{{$message}}</div>
                  @enderror
                </div>
            </div>
            </div>
             <div class="row">
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Mail Password</label>
                  <input
                    type="text"
                    class="form-control"
                    id="mail_password"
                    name="mail_password"
                    value="{{$csetting->mail_password}}"
                  />
                  @error('mail_password')
                <div style="color:red">{{$message}}</div>
                  @enderror
                </div>
            </div>
              <div class="col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Mail enc</label>
                  <input
                    type="text"
                    class="form-control"
                    id="mail_enc"
                    name="mail_enc"
                    value="{{$csetting->mail_enc}}"
                  />
                  @error('mail_enc')
                <div style="color:red">{{$message}}</div>
                  @enderror
                </div>
            </div>
            </div>
                 <div class="row">
                 <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                      <label>Mail Port</label>
                      <input
                        type="text"
                        class="form-control"
                        id="mail_port"
                        name="mail_port"
                        value="{{$csetting->mail_port}}"
                      />
                      @error('mail_port')
                    <div style="color:red">{{$message}}</div>
                      @enderror
                    </div>
                </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image" name="image"/>
                        <img  src="{{asset('assets/img/'.$csetting->image)}}" alt="{{  $csetting->image }}" style="width: 50px; height: 50px;">
                        @error('image')
                        <div style="color:red">{{$message}}</div>
                        @enderror
                    </div>
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


