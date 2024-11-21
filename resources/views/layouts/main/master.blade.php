
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- script --}}
    <script src="{{asset('assets/js/script.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   {{-- css --}}
   @include('layouts.main.css')
  </head>
  <body>
    <x-notify::notify />
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.main.sidebar')
        <!-- End Sidebar -->
      <div class="main-panel">
        {{-- header --}}
        @include('layouts.main.header')
        {{-- content --}}
         @yield('content')
        {{-- footer --}}
        @include('layouts.main.footer')
      </div>
    </div>
   {{-- js --}}
   @include('layouts.main.script')
   {{-- notify js --}}
    @notifyJs


  </body>
</html>
