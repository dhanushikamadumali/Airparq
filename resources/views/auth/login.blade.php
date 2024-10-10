
@extends('layouts.auth.master')
@section('content')
    <div class="container">
     <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="page-inner">
    <div class="row" style="margin-top:50px">
    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row "><h2 style="margin-bottom:20px;font-weight:bold">SIGN IN</h2></div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="form-group">
                            <label for="email2">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="password">Password</label>
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="card-action">
                    <button class="btn btn page_btn" type="submit">LOGIN</button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </form>
    </div>
    </div>
@endsection
