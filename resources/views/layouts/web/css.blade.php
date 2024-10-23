  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
<link href="{{asset('account/img/logos/logo.png')}}" rel="shortcut icon" type="image/png">
<link href="{{asset('account/css/theme-1.min.css')}}" rel="stylesheet">
<link href="{{asset('account/css/theme-2.min.css')}}" rel="stylesheet">
<link href="{{asset('account/css/theme-3.min.css')}}" rel="stylesheet">
<style>
       /* Media query for mobile view (up to 768px) */
    @media (max-width: 768px) {
        .nav-link.active span {
            color: #EBC51E; /* Set the color you want for mobile view */
        }
        .bookingbtn{
            background-color:#FFD31C;
        }
    }

     #toggleButton {
        display: none;
      }

      /* Desktop view: show both divs */
      @media (min-width: 769px) {
        #viewDiv, #hideDiv {
          display: block !important;
        }
      }

      /* Mobile view: only show the button initially, and one div at a time */
      @media (max-width: 768px) {
        #toggleButton {
          display: inline-flex;
        }

        #viewDiv, #hideDiv {
          display: none;
        }

        #viewDiv.active, #hideDiv.active {
          display: block;
        }
      }

    /* Hide Form View button on desktop */
    #form_view {
        display: none;
    }
     #form_view1 {
        display: none;
    }
    .mobilebtnrow{
        display:none;
    }
    #drop{
        display:none;
    }
    /* Show Form View button only on mobile */
    @media (max-width: 768px) {
        #form_view {
            display: block; /* Show on mobile */
        }
        .mobilebtnrow{
            display:block;
        }
        .defultbtn{
            display:none;
        }
         #drop{
            display:block;
        }
        /* Default hidden on mobile */
        #terminalview {
            display: block;
        }
        #booking_detailsform {
            display: none; /* Hide the booking form by default */
        }
         #form_view1 {
            display: block; /* Show on mobile */
        }
    }

</style>
