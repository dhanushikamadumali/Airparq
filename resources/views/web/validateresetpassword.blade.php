@extends('layouts.web.master')
@section('content')
<!-- Main -->
    <main>
        <!-- Login -->
        <section class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-5 col-lg-8 col-md-9">
                        <div class="card border-0 shadow-sm p-xl-2">
                            <div class="card-body">
                                <div class="border-bottom mb-4">
                                    <h1 class="h2 text-body-emphasis">Reset Password</h1>
                                </div>
                                     <form method="POST" action="{{ route('sendvalidateresetpassword') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <!-- Login Email -->
                                    <div class="border-bottom pb-4">

                                          <div class="mb-4">
                                            <label for="txtPassword" class="form-label">Password<span class="text-danger">*</span></label>
                                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror shadow-sm" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                          <div class="mb-4">
                                            <label>Confirmation password<span class="text-danger">*</span></label>
                                            <input id="cpassword" type="password" class="form-control shadow-sm" name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="mb-6">
                                            <button class="btn btn-primary w-100" type="submit" id="btnSubmit">
                                                <i class="hicon hicon-aps-lock"></i>
                                                <span>Reset</span>
                                            </button>
                                        </div>

                                    </div>
                                    <!-- /Login Email -->
                                    <div class="mt-4">
                                        <span>Don't have an account? <a href="register.html">Register</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Login -->

    </main>
    <!-- /Main -->
@endsection
