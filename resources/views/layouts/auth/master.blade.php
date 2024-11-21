
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
     <title>AIRPARQ</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
     <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.png"
      type="image/x-icon"
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
