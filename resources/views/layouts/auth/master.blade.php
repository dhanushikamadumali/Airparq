
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>AirPaq</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- notify css --}}
    @notifyCss
    {{-- script --}}
    <script src="{{asset('assets/js/script.js')}}"></script>
   {{-- css --}}
   @include('layouts.auth.css')
  </head>
  <body>
    <x-notify::notify />
    <div class="wrapper">
        {{-- content --}}
         @yield('content')
    </div>
   {{-- js --}}
   @include('layouts.auth.script')
   {{-- notify js --}}
    @notifyJs
  </body>
</html>
