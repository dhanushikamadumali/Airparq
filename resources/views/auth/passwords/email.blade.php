@extends('layouts.auth.master')
@section('content')
    <div class="container">
     <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="page-inner">
    <div class="row" style="margin-top:50px">
    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="row "><h2 style="margin-bottom:20px;font-weight:bold">RESET PASSWORD</h2></div>
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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

                        </div>
                    </div>
                    </form>
                </div>


                 <div class="card-action">
                    <button type="submit" class="btn btn page_btn">
                        {{ __('Send Password Reset Link') }}
                    </button>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </form>
    </div>
    </div>
@endsection
