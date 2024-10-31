<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body style="background-color:#e6e6ff;padding: 10px 20px 10px 20px">
    <div style="text-align:center;margin-bottom:10px"> <img src="{{ asset('assets/img/logo.jpg')}}" style="width:250px;height:60px"></div>
        <div class="card" style="width: 100%;">

        <div class="card-body">
            <h5 class="card-title">Your booking confirmation number:{{$data['booking_code']}} </h5>
            <h2>Booking Details</h2>
            <table class="table table-sm">

              <tbody>
                <tr>
                <td>Parking From Date</td>
                    <td>{{$data['parking_from_date']}}</td>
                </tr>
                 <tr>
                <td>Parking Till Date</td>
                    <td>{{$data['parking_till_date']}}</td>
                </tr>
                <tr>
                <td>Vehicle Reg No</td>
                    <td>{{$data['vehicle_reg']}}</td>
                </tr>
              </tbody>
            </table>

            <span>Prices exclude airport access fees.Customer/owner has to bear the cost of paying the ULEZ if the vehicle does not meet the ULEZ standards. The customer has to pay ULEZ for both days (the day of dropoff and the day of collection)</span>
            <span>Beginning on August 29, 2023, the Ultra Low Emission Zone (ULEZ) in London has been extended to cover the entire Greater London area, Heathrow Airport included.This expansion, executed by Transport for London (TfL), seeks to mitigate air pollution across the city. As of this date, Heathrow Airport and its terminals (2, 3, 4, and 5) fall within the boundaries of ULEZ. Consequently, vehicles entering the airport are required to comply with specific emission criteria to avoid incurring a daily fee.To check if your car is ULEZ complaint please visit: https://tfl.gov.uk/modes/driving/check-your-vehicle/Please be aware that if your vehicle does not meet ULEZ compliance standards, you will be responsible for paying the daily charge on both the day of drop-off and pick-up. To pay this, please visit: https://tfl.gov.uk/modes/driving/pay-to-drive-in-london Once your holiday parking has been booked and confirmed via email you are ready to go. Please do call us on +44 7464 777258 or +44 7301 330702 when you are 30 minutes away so we can allocate a driver to collect your car. We have a designated AIRPARQ Parking desk located in the short stay car park with our friendly chauffeurs waiting to accept your car. Please note, if the phone lines are busy, make your way to our desk where our staff will meet you.</span>
            <h4>Please see the drections for each Terminal we serve below.</h4>
            <span>Terminal 2 - sat-nav postcode: TW6 1EW</span>
            <span>Terminal 2 - Departure Instructions</span>
            <p>From the M25 exit at Junction 15, follow the signs for Terminals 1, 2 & 3 all the way round following onto the Western Perimeter Road:
            Go through the main tunnel to the Central Terminal Area for Terminals 1, 2 & 3.</p>
            <p>Exiting the tunnel, keep right, passing the Central Bus Station, joining the final approaches to Terminal 2 on Cosmopolitan Way.
            Please keep to the right, as the road to Terminal 2 will move away from building before turning back as the road ramps up to Terminal 2 Departures & the Short Stay 2 car park on Constellation Way.
            Once you are on the rising ramp, continue to keep right as the ramp will lead directly into the "Short stay car park" entry barriers.</p>
            <p>Please make sure you are in lane 5 or 6, (towards the ticket machine), which will take you to Level 4 of the Short Stay car park.
            Take a ticket at the barrier and enter the carp ark.</p>
            <p>Once you enter the car park on Level 4, keep to the RIGHT following the signs for "Off Airport Parking Meet & Greet" and then please park your car in "Row B".
            Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.
            Terminal 2 Return Instructions</p>
            <p>On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
            Make your way to the same place where you dropped the vehicle off, (Level 4 of the Short Stay car park) and your car will be ready and waiting for you in Row B next to the lift/pay machine</p>
        <p>Terminal 3 - sat-nav postcode: TW6 1QG</p>
        <p>erminal 3 - Departure Instructions</p>
        <p>From the M25 exit at Junction 15, follow the signs for Terminals 1, 2 & 3 all the way round following onto the Western Perimeter Road.
            Go through the main tunnel to the Central Terminal Area for Terminals 1, 2 & 3.
            Exiting the tunnel, keep in the 1st lane and follow signs for Terminal 3 Short Stay Carpark (Carpark 3).
            Take a ticket from the barrier and follow signs to Level 4, then please park your car in "Row A"
            Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.
            Terminal 3 Return Instructions.On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
            As you arrive in the arrivals, just before the Exit door on the Right Hand Side, please take the lift to Level 4 Short Stay Car Park and your car will be ready and waiting for you in ROW A.</p>
       <p>Terminal 4 - sat-nav postcode: TW6 3XA</p>
       <p>Terminal 3 - Departure Instructions</p>
       <p>Please follow directions to the Short Stay car park and then drive up to Level 2, Row F. Look for the "Off Airport Meet and Greet" sign, our desk is located in the lobby.
           Please follow directions to the Short Stay car park and then drive up to Level 2, Row F. Look for the "Off Airport Meet and Greet" sign, our desk is located in the lobby.
            Please have your email booking confirmation ready, together with your return flight details.
            From our desk it's just a short walk to the terminal.
            Terminal 4 Return Instructions
            On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.Walk back to the Short Stay car park (Level 2, Row R) where your car will be ready and waiting for you.</p>
        <p>Terminal 5 - sat-nav postcode: TW6 2GA</p>
        <p>Terminal 5 - Departure Instructions</p>
        <p> Please follow the signs for the "Short Stay car park", which is located on the right hand side of the ramp, as you take the exit for Terminal 5 from the roundabout.
            On arrival at the Short Stay car park, please move to the left hand lane, following directions to "LEVEL 4".
            Take a ticket from the barrier and make your way to Zones "R-S". Please park your car in these designated areas, sign posted as "Off Airport Meet & Greet"
            Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.

        </p>
        <p>Terminal 5 Return Instructions</p>

           <p>On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
            Make your way to where you dropped the car off, (Level 4, Short Stay car park), where your car will be ready and waiting for you in Row R OR S.

            </p>
<p>If you did not request this verification, please ignore this email.</p>

<h5>thank you,</h5>
        </div>
        </div>

  </body>
</html>
