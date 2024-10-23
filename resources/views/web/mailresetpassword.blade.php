
<!DOCTYPE html>

<html lang="en">
<!-- Head -->
<head>
    <link href="{{asset('account/img/logos/logo.png')}}" rel="shortcut icon" type="image/png">
    <link href="{{asset('account/css/theme-1.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('account/css/theme-3.min.css')}}" rel="stylesheet">
</head>
<body>
    <h2>Hello!</h2>
    <p>You are receiving this mail because we received a password reset request for your account.</p>
    <div>
    <a href="{{route('validateresetpassword',['token' => $token])}}"  class="btn btn-primary w-50">Click</a>
    </div>
    <p>This password reset link will expire in 60 minutes.</p>
    <p>If you did not request a password reset no further action is required.</p>
</body>
</html>

