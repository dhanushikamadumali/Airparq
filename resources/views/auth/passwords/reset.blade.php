
@extends('layouts.auth.master')
@section('content')
    <div class="container">

    <div class="page-inner">
    <div class="row" style="margin-top:50px">
    <div class="col-md-3"></div>
        <div class="col-md-6">
             <div class="row d-flex justify-content-center align-items-center"><img src="{{ asset('assets/img/logo.jpg') }}" style="width:250px" /></div>
            <div class="row d-flex justify-content-center align-items-center"><h2 style="margin-bottom:20px;font-weight:bold;text-align:center;margin-top:10px">RESET PASSWORD</h2></div>
           <div class="card">
                <div class="card-body">
                     <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                      <input type="hidden" name="token" value="{{ $token }}">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">

                            <div class="form-group">
                                 <label for="email">{{ __('Email Address') }}</label>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                  <label for="password">{{ __('Password') }}</label>
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-action">
                            <button class="btn btn page_btn" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </form>
    </div>
    </div>
@endsection
