<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">

body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }


a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

@media screen and (max-width: 480px) {
    .mobile-hide {
        display: none !important;
    }
    .mobile-center {
        text-align: center !important;
    }
}
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
<body style="margin: 10 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">


{{-- <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
</div> --}}

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding:10px;margin-top:60px;margin-bottom:60px">
    <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
             <tr>
                <td align="center" valign="top" style="font-size:0; padding: 10px; height: 50px;" bgcolor="#FFD31C">
                 <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                             <td align="center" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px;" class="mobile-center">
                                <!-- Middle column with the image -->
                                <img src="{{ asset('assets/img/logo.jpg') }}" style="width:250px; display: block; margin: 0 auto;" />
                            </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Thank You For Your Booking!
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                        Booking Details
                                    </td>
                                    <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">

                                    </td>
                                </tr>
                                <tr>
                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        Booking Code
                                    </td>
                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                        {{$data['booking_code']}}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        Parking From Date
                                    </td>
                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        {{$data['parking_from_date']}}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        Parking Till Date
                                    </td>
                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        {{$data['parking_till_date']}}
                                    </td>
                                </tr>
                                 <tr>
                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                         Vehicle Reg No
                                    </td>
                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        {{$data['vehicle_reg']}}
                                    </td>
                                </tr>
                                 <tr>
                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                         Promocode
                                    </td>
                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                        {{$data['promocode']}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding: 35px;">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                        TOTAL PRICE
                                    </td>
                                    <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                        £{{$data['price']}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                    <td  valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                        <p style="font-weight: 800;">Other Details</p>
                    </td>
                </tr>
                    <tr>
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                            <p>
                                 <p style="text-align:justify">Prices exclude airport access fees.Customer/owner has to bear the cost of paying the ULEZ if the vehicle does not meet the ULEZ standards. The customer has to pay ULEZ for both days (the day of dropoff and the day of collection)</p>
                                <p style="text-align:justify">Beginning on August 29, 2023, the Ultra Low Emission Zone (ULEZ) in London has been extended to cover the entire Greater London area, Heathrow Airport included.This expansion, executed by Transport for London (TfL), seeks to mitigate air pollution across the city. As of this date, Heathrow Airport and its terminals (2, 3, 4, and 5) fall within the boundaries of ULEZ. Consequently, vehicles entering the airport are required to comply with specific emission criteria to avoid incurring a daily fee.To check if your car is ULEZ complaint please visit: https://tfl.gov.uk/modes/driving/check-your-vehicle/Please be aware that if your vehicle does not meet ULEZ compliance standards, you will be responsible for paying the daily charge on both the day of drop-off and pick-up. To pay this, please visit: https://tfl.gov.uk/modes/driving/pay-to-drive-in-london Once your holiday parking has been booked and confirmed via email you are ready to go. Please do call us on +44 7464 777258 or +44 7301 330702 when you are 30 minutes away so we can allocate a driver to collect your car. We have a designated AIRPARQ Parking desk located in the short stay car park with our friendly chauffeurs waiting to accept your car. Please note, if the phone lines are busy, make your way to our desk where our staff will meet you.</p>
                                        <h4>Please see the drections for each Terminal we serve below.</h4>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 2 - sat-nav postcode: TW6 1EW</p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 2 - Departure Instructions</p>
                                        <p style="text-align:justify">From the M25 exit at Junction 15, follow the signs for Terminals 1, 2 & 3 all the way round following onto the Western Perimeter Road:
                                        Go through the main tunnel to the Central Terminal Area for Terminals 1, 2 & 3.</p>
                                        <p style="text-align:justify">Exiting the tunnel, keep right, passing the Central Bus Station, joining the final approaches to Terminal 2 on Cosmopolitan Way.
                                        Please keep to the right, as the road to Terminal 2 will move away from building before turning back as the road ramps up to Terminal 2 Departures & the Short Stay 2 car park on Constellation Way.
                                        Once you are on the rising ramp, continue to keep right as the ramp will lead directly into the "Short stay car park" entry barriers.</p>
                                        <p style="text-align:justify">Please make sure you are in lane 5 or 6, (towards the ticket machine), which will take you to Level 4 of the Short Stay car park.
                                        Take a ticket at the barrier and enter the carp ark.</p>
                                        <p style="text-align:justify">Once you enter the car park on Level 4, keep to the RIGHT following the signs for "Off Airport Parking Meet & Greet" and then please park your car in "Row B".
                                        Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.
                                        Terminal 2 Return Instructions</p>
                                        <p style="text-align:justify">On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
                                        Make your way to the same place where you dropped the vehicle off, (Level 4 of the Short Stay car park) and your car will be ready and waiting for you in Row B next to the lift/pay machine</p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 3 - sat-nav postcode: TW6 1QG</p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 3 - Departure Instructions</p>
                                         <p style="text-align:justify">From the M25 exit at Junction 15, follow the signs for Terminals 1, 2 & 3 all the way round following onto the Western Perimeter Road.
                                        Go through the main tunnel to the Central Terminal Area for Terminals 1, 2 & 3.
                                        Exiting the tunnel, keep in the 1st lane and follow signs for Terminal 3 Short Stay Carpark (Carpark 3).
                                        Take a ticket from the barrier and follow signs to Level 4, then please park your car in "Row A"
                                        Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.
                                        Terminal 3 Return Instructions.On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
                                        As you arrive in the arrivals, just before the Exit door on the Right Hand Side, please take the lift to Level 4 Short Stay Car Park and your car will be ready and waiting for you in ROW A.</p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 4 - sat-nav postcode: TW6 3XA</p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 3 - Departure Instructions</p>
                                        <p style="text-align:justify">Please follow directions to the Short Stay car park and then drive up to Level 2, Row F. Look for the "Off Airport Meet and Greet" sign, our desk is located in the lobby.
                                       Please follow directions to the Short Stay car park and then drive up to Level 2, Row F. Look for the "Off Airport Meet and Greet" sign, our desk is located in the lobby.
                                        Please have your email booking confirmation ready, together with your return flight details.
                                        From our desk it's just a short walk to the terminal.
                                        Terminal 4 Return Instructions
                                        On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.Walk back to the Short Stay car park (Level 2, Row R) where your car will be ready and waiting for you.</p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 5 - sat-nav postcode: TW6 2GA</p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 5 - Departure Instructions</p>
                                        <p style="text-align:justify"> Please follow the signs for the "Short Stay car park", which is located on the right hand side of the ramp, as you take the exit for Terminal 5 from the roundabout.
                                        On arrival at the Short Stay car park, please move to the left hand lane, following directions to "LEVEL 4".
                                        Take a ticket from the barrier and make your way to Zones "R-S". Please park your car in these designated areas, sign posted as "Off Airport Meet & Greet"
                                        Here you see our chauffeurs who are based near the ticket pay machine. They will be wearing black jackets and be expecting you.
                                        </p>
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">Terminal 5 Return Instructions</p>
                                        <p style="text-align:justify"> On your return, once you have collected your luggage and are about to clear Customs, please call the number provided when your car was dropped off.
                                        Make your way to where you dropped the car off, (Level 4, Short Stay car park), where your car will be ready and waiting for you in Row R OR S.
                                        </p>


                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                            <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                If you didn't create an account using this email address, please ignore this email.
                            </p>
                            <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                If you have any questions or require further assistance, please don't hesitate to contact us at contact@airparq.co.uk or +44 7464 777258.
                            </p>
                            <p>Thank you for choosing Airpaq</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                            <tr>
                                <td align="center">
                                     <img
                                        src="{{ asset('assets/img/logo.jpg') }}"
                                         style="display: block; border: 0px;height:20px"
                                    />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                    <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                        Thomas House, <br>
                                        Petersfield Avenue,<br>
                                        Slough,<br>
                                        SL2 5EAe<br>
                                    </p>
                                </td>
                            </tr>

                        </table>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>

</body>
</html>
