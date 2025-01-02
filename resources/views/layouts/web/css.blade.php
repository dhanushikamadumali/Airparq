<link href="{{asset('assets/img/kaiadmin/favicon.png')}}" rel="shortcut icon" type="image/png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
<link href="{{asset('account/img/logos/logo.png')}}" rel="shortcut icon" type="image/png">
<link href="{{asset('account/css/theme-1.min.css')}}" rel="stylesheet">
<link href="{{asset('account/css/theme-2.min.css')}}" rel="stylesheet">
<link href="{{asset('account/css/theme-3.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
        .headingtitle{
            font-size:30px;
            font-weight:bold;
        }
        .bookingheadingtitle{
            font-size:30px;
            font-weight:bold;
        }
        .cardtitle{
            font-size:1rem;
            font-weight:600;
        }
        .navbarlink{
            margin-left:380px;
        }
     @media (max-width: 1024px) {
        .nav-link.active span {
            color: #EBC51E; /* Set the color you want for mobile view */
        }
         .navbarlink{
            margin-left:0px;
        }
         .header-navbar .navbar .nav-link{
            font-size:20px;
        }

     }
       /* Media query for mobile view (up to 768px) */
    @media (max-width: 768px) {
        .nav-link.active span {
            color: #EBC51E; /* Set the color you want for mobile view */
        }
        .navbarlink {
            margin-left: 0; /* Remove margin on mobile view */
        }
        .header-navbar .navbar .nav-link{
            font-size:20px;
        }
    }
    /* Default styles for .bookingbtn */
    .bookingbtn {
        font-size: 12px; /* Default font size */
        border-radius: 30px;
        border-top-right-radius: 0;
        transition: 0.5s;
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
        .btntext{
            display:block;
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
            margin-bottom:0px;
        }
         #form_view1 {
            display: block; /* Show on mobile */
        }
    }
    @media (min-width: 1200px) {
         /*home page booking form*/
         .bookingform{
        margin-bottom:0;
        margin-right:0;
         }
    }
    /* navbar font size*/

    /*navbar booking btn */
    {{-- .bookingbtn{
        font-size:12px;
        border-radius:30px;
        border-top-right-radius:0;
        transition:0.5s;

    } --}}
    .bookingbtn:hover{
        border-top-right-radius:30px;
        background-color:white;
        color:#FFD31C;
    }
   .crouselheding1{
        animation:bottomIn 1s ease-in-out forwards;
        animation-delay: 0.2s;
        opacity:0;

   }
    .crouselheding2{
        font-weight:bold;
        animation:bottomIn 1.4s ease-in-out forwards;
        animation-delay: 0.2s;
        opacity:0;
    }
    .crouselheding3{
        font-weight:bold;
        animation:bottomIn 2s ease-in-out forwards;
        animation-delay: 0.2s;
        opacity:0;
    }
    .bookingform{
        animation:zoomIn 1.4s ease-in-out forwards;
        animation-delay:0.2s;
        opacity:0;
    }

    @keyframes leftIn{

         from {
            transform:translateX(-1000px);
        }
        to{
            transform:translateX(0);
            opacity:1;
        }
    }
     @keyframes rightIn{

         from {
            transform:translateX(1000px);
        }
        to{
            transform:translateX(0);
            opacity:1;
        }
    }
    @keyframes bottomIn{
        from {
            transform:translateY(500px);
        }
        to{
            transform:translateY(0);
            opacity:1;
        }
    }
    @keyframes zoomIn{
        from {
            transform:scale(0);
        }
        to{
            transform:scale(1);
            opacity:1;
        }
    }

    @keyframes flyAround {
        0% {
            transform: translate(-100%, 50%); /* Start at the bottom-left corner */
        }
        100% {
            transform: translate(100%, -100%); /* End at the top-right corner */
        }
    }

    .plain {
         animation: flyAround 10s linear infinite;
    }
    .cloud1 {
        position: absolute;
        top: 25rem;
        left: 0.5rem;
        animation: cloudMove 8s ease-in-out infinite;
    }

    @keyframes cloudMove {
        0% {
            transform: translateX(100vw); /* Start from the far right */
        }
        100% {
            transform: translateX(-100vw); /* Move to the far left */
        }
    }

    .cloud2 {
        position: absolute;
        top: 25rem;
        left: 0.5rem;
        animation: cloudMove2 8s ease-in-out infinite;
    }

    @keyframes cloudMove2 {
          0% {
            transform: translateX(100vw); /* Start from the far right */
        }
        100% {
            transform: translateX(-100vw); /* Move to the far left */
        }
    }

    .howitwork{
        animation: zoomIn 2s ease-in-out forwards;
        animation-timeline:view();
        animation-range: cover 25% cover 40%;
    }

    .headingtitle{
        animation: leftIn 2s ease-in-out forwards;

        animation-range: cover 25% cover 40%;
    }
    .sub-title{
         animation: rightIn 1s ease-in-out forwards;
        animation-range: cover 25% cover 40%;
    }

    .howitworktext{
        position:relative;
        transition:all 1s ease-in-out;
    }

   .descriptionpara{
    animation: rightIn 1s ease-in-out forwards;
   }

    /* Change the Bootstrap collapse arrow color to white */
    .accordion-button.collapsed::after {
        filter: brightness(0) invert(1); /* Makes the arrow white */
    }
    .accordion-button::after {
        filter: brightness(0) invert(1); /* Keeps it white for both collapsed and expanded states */
    }
    .navbar-nav .nav-item .nav-link.active {
         color: white;             /* Text color */

    }
    @media (max-width: 768px) {
        .bookingtitle{
            display: none;
        }
    }
     @media (min-width: 768px) {
        .choose-terminal{
            margin-left: 100px;
        }
    }

     .undelinetitle {
        position: relative;
        font-size: 24px; /* Adjust font size as needed */
        display: inline-block;
      }

      .undelinetitle::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px; /* Adjust position below the text */
        width: 100%;
        height: 5px; /* Adjust thickness of the underline */
        background: linear-gradient(to right, #ff7e5f, #feb47b); /* Define your gradient colors */
        transform-origin: left;
        transform: scaleX(1);
        transition: transform 0.3s ease;
        border-radius: 10px; /* Rounds both left and right ends */
      }

      .undelinetitle:hover::after {
        transform: scaleX(1.2); /* Add hover effect if desired */
      }


    @media (max-width: 768px) {
        /* Styles for mobile view */
         .header-topbar {
            padding-top: 28px;
            padding-bottom: 28px;
            text-align:center;
        }

    }

    /* Default (desktop) styles */
    .navbar-brand-logo {
        width: 200px;
        height: 60px;
    }

    /* Mobile-specific styles */
    @media (max-width: 768px) {
        .navbar-brand-logo {
            width: 170px;
            height: 50px;
        }
    }
    /* Extra small devices (if needed) */
    @media (max-width: 576px) {
        .navbar-brand-logo {
            width: 140px;
            height: 50px;
        }
    }
    /* General styles for input[type="date"] */
    input[type="date"] {
        appearance: none; /* Ensure consistency across browsers */
        background-color: #fff; /* Clean background */
        padding: 8px; /* Standard padding for better visuals */
        border: 1px solid #ccc; /* Border for styling */
        border-radius: 4px; /* Rounded corners */
        cursor: pointer; /* Pointer cursor for clarity */
    }
    /* Optional: Customize native calendar picker indicator */
    input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer; /* Ensure it's clickable */
        opacity: 1; /* Fully visible */
        display: block; /* Default display */
    }
    /* Optional: Remove padding adjustments for mobile view */
    @media (max-width: 768px) {
        input[type="date"] {
            padding-right: 8px; /* Adjust padding if needed */
        }
    }
    /* Ensure placeholder is visible in mobile view */
    @media (max-width: 768px) {
        input[type="date"]::placeholder {
            color: #666; /* Make placeholder more visible */
            font-size: 14px;
        }
    }

    /* For the placeholder effect */
    input[type="date"].has-placeholder {
        color: #999; /* Lighter color for the placeholder */
    }


</style>
