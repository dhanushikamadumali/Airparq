
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.png"
      type="image/x-icon"
    />
    <title>AIRPARQ</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Themenix.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- notify css --}}
    @notifyCss
    {{-- css --}}
    @include('layouts.web.css')
</head>
<!-- /Head -->
<body>
    <x-notify::notify />
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- /Preloader -->
     {{-- header --}}
    @include('layouts.web.header')
     {{-- content --}}
     @yield('content')
     {{-- footer --}}
    @include('layouts.web.footer')
    <!-- Scroll top -->
    <a href="#" class="scroll-top">
        <i class="hicon hicon-thin-arrow-up"></i>
    </a>
    <!-- /Scroll top -->
    {{-- js --}}
    @include('layouts.web.script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add event listener to the "Next" button
            document.getElementById('paybtn').addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default form submission
                // Get form values
                //const terminalId = document.getElementById('selected_terminal_id').value;
                const parkingFromDate = document.getElementById('bookingfromDate').value;
                const parkingFromTime = document.getElementById('bookingfromTime').value;
                const parkingTillDate = document.getElementById('bookingtillDate').value;
                const parkingTillTime = document.getElementById('bookingtillTime').value;
                const inbound_terminal = document.getElementById('inbound_terminal').value;

                // Prepare data to send
                const formData = {
                    inbound_terminal: inbound_terminal,
                    from_date: parkingFromDate,
                    from_time: parkingFromTime,
                    till_date: parkingTillDate,
                    till_time: parkingTillTime,

                };
                 let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                // Send the data using the fetch API
                fetch('ckoutbooking', {

                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN':token// Ensure CSRF token is set if needed
                    },
                    body: JSON.stringify(formData) // Send the form data
                })
                .then(response => {
                   //
                    return response.json();
                })
                .then(data => {

                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
     {{-- notify js --}}
    @notifyJs

</body>

</html>
