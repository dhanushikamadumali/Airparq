
    @extends('layouts.main.master')
    @section('content')

    <div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Account</h3>
                <ul class="breadcrumbs mb-3">

                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                     <li class="nav-item">
                        <a href="{{ URL::previous() }}">Back</a>
                    </li>
                </ul>
        </div>
    <form action="{{route('updateuser')}}" method="POST" >
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                        <input type="hidden" value="{{$user->id}}" name="id">
                            <div class="form-group">
                            <label>Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Email</label>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Password</label>
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="{{$user->password}}">
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Password Confirmation</label>
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{$user->password}}">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                            <label>Role</label>
                                  <select id="role" name="role" class="form-control" required>
                                        <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}} >Admin</option>
                                        <option value="superadmin" {{$user->role == 'superadmin' ? 'selected' : ''}}>Super Admin</option>
                                </select>
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
