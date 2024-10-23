@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Terminal</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="separator">
                        <i class="icon-arrow-left"></i>
                    </li>
                    <li class="nav-item">
                         <a href="{{ URL::previous() }}">Back</a>
                    </li>
                </ul>
        </div>
        <form action="{{route('updateterminal')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                     <input type="hidden" class="form-control" id="id"  name="id" value="{{$terminal->id}}"/>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="name"  name="name" value="{{$terminal->name}}"/>
                                        @error('name')
                                        <div style="color:red" >{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Base Price</label>
                                        <input type="number" class="form-control" id="base_price" name="base_price" value="{{ $terminal->base_price }}"/>
                                        @error('base_price')
                                        <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Per Day Price</label>
                                        <input type="number" class="form-control" id="per_day_price" name="per_day_price" value="{{$terminal->per_day_price}}"/>
                                        @error('per_day_price')
                                        <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" id="image" name="image"/>
                                        <img  src="{{asset('images/' . $terminal->image )}}" alt="{{ $terminal->image }}" style="width: 50px; height: 50px;">
                                        @error('image')
                                        <div style="color:red">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="description" class="form-control" name="description" rows="3">{{$terminal->description}}</textarea>
                                        @error('description')
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

