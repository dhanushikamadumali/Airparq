<!DOCTYPE html>
<html>
  {{-- css --}}
   @include('layouts.main.css')
<head>
    <title>Print Appointment</title>
</head>
<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-4">
                <span id="result"></span>
                <div class="card mb-4">
                    <!-- Account -->
                    <div  class="card-body">
                        <div style="width: 100%;" id="printableArea">
                            <style>
                                .space_top{
                                    margin-top:40px ;
                                }
                                .divider{
                                    width: 33%; float: left;
                                }
                            </style>
                            <div class="d-flex"><img src="{{asset('assets/img/logo.jpg')}}" style="width:150px;height:60px;padding:10px"/><div style="margin-left:20px;margin-top:20px">CONTACT@AIRPARQ.CO.U</div></div>
                            <hr/>
                            <div class="divider">
                            <div>CUSTOMER</div>
                            <br/>
                             <table class="table table-bordered" style="width:600px">
                                <tr>
                                <td> NAME:<br/>{{$bookingdetails[0]->first_name}}{{$bookingdetails[0]->last_name}}</td>
                                </tr>
                                <tr>
                                <td > MOBILE:<br/>{{$bookingdetails[0]->phone_no}}</td>
                                </tr>
                                <tr>
                                <td> NAME:<br/>{{$bookingdetails[0]->first_name}}{{$bookingdetails[0]->last_name}}</td>
                                </tr>
                            </table>

                            <div> VEHICLE</div>
                            <br/>
                            <table class="table table-bordered" style="width:600px">
                                <tr>
                                <td> CAR REGISTRATION:
                                    <br/>
                                </td>
                                <td> MILEAGE:</td>
                                <td>RETURN MILEAGE:</td>
                                </tr>
                                <tr>
                                <td colspan='2'> MAKE MODEL:</td>
                                <td> COLOUR:</td>
                                </tr>
                                 <tr>
                                <td colspan='3'> RETURN FLIGHT NUMBER:</td>
                                </tr>
                            </table>
                            <div> DECLARATION</div>
                                <table  style="width:600px">
                                    <tr>
                                    <td>By signing this document I agree that I have read and I am willing to be
                                         bound by the terms and conditions of AIRPARQ parking and agree to the
                                         damage noted on my car. I further agree that the damage noted is not
                                         and accurate re ection of the condition of the car, due to time
                                         constraints/location
                                    </td>
                                    </tr>
                                </table>
                                 <br/>
                                 <table class="table table-bordered" style="width:600px">
                                    <tr>
                                    <td>SIGNATURE 1:</td>
                                    <td>TIME:</td>
                                    </tr>
                                    <tr>
                                        <td>  SIGNATURE 2:</td>
                                        <td >TIME:</td>
                                    </tr>
                                </table>
                                <table  style="width:600px">
                                    <tr>
                                    <td> SIGNATURE #01 - We con rm that no items/valuables have been left in
                                         the vehicle.
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>  SIGNATURE #02 - This is to con rm AIRPARQ PRKING has delivered your
                                         vehicle
                                    </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Account -->
            </div>

             <div class="col-md-4">
                <span id="result"></span>
                <div class="card mb-4">
                    <!-- Account -->
                    <div  class="card-body">
                        <div style="width: 100%;" id="printableArea">
                            <style>
                                .space_top{
                                    margin-top:40px ;
                                }
                                .divider{
                                    width: 33%; float: left;
                                }
                            </style>
                            <div class="divider">
                                <div>DATE OF ARIVAL</div>
                                 <table class="table table-bordered" style="width:600px;height:200px">
                                    <tr>
                                    <td> </td>
                                    </tr>
                                </table>
                                 <div>TIME OF ARIVAL</div>
                                 <table class="table table-bordered" style="width:600px;height:200px">
                                    <tr>
                                    <td></td>
                                    </tr>
                                </table>
                                 <div>TERMINAL</div>
                                 <table class="table table-bordered" style="width:600px;height:200px">
                                    <tr>
                                    <td></td>
                                    </tr>
                                </table>
                                <div>DETAILS</div>
                                 <table class="table table-bordered" style="width:600px">
                                    <tr>
                                    <td> BOOKING REF:</td>
                                    <td > CAR REG:</td>
                                    </tr>
                                    <tr>
                                         <td> MAKE MODEL:</td>
                                        <td > COLOUR:</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Account -->
            </div>

             <div class="col-md-4">
                <span id="result"></span>
                <div class="card mb-4">
                    <!-- Account -->
                    <div  class="card-body">
                        <div style="width: 100%;" id="printableArea">
                            <style>
                                .space_top{
                                    margin-top:40px ;
                                }
                                .divider{
                                    width: 33%; float: left;
                                }
                            </style>

                            <div class="divider">
                                 <table style="width:600px" ><tr><td style="text-align: center; vertical-align: middle;"><img src="{{asset('assets/img/logo.jpg')}}" style="width:150px;height:60px;justify-content: center; align-items: center;"/></td></tr></table>
                                <br/><br/>
                               <table style="width:600px" ><tr><td style="text-align: center; vertical-align: middle;">ONCE YOU HAVE COLLECTED ALL YOUR LUGGAGE PLEASE CALL</td></tr></table>

                                 <table style="width:600px">
                                 <tr>
                                    <td >
                                    <div class="d-flex" style="align-items: center; justify-content: center; margin-bottom: 10px;"> <img src="{{asset('assets/img/phone.jpg')}}" style="width:40px;height:40px;"/>+44 7464 777258</div>
                                    <div class="d-flex" style="align-items: center; justify-content: center; margin-bottom: 10px;"> <img src="{{asset('assets/img/phone.jpg')}}" style="width:40px;height:40px;"/>+44 7301 330702</div>
                                    <div class="d-flex" style="align-items: center; justify-content: center; margin-bottom: 10px;margin-left:70px"> <img src="{{asset('assets/img/email.png')}}" style="width:30px;height:30px;"/>CONTACT@AIRPARQ.CO.UK</div>
                                    </td>
                                 </tr>
                                 </table>
                                 <br/>
                                 <br/>
                                 <table style="width:600px;padding:20px">
                                 <tr>
                                 <td style="text-align: center; vertical-align: middle;">FOR ALL CUSTOMER RELATION FEEDBACK, PLEASE EMAIL:<br/>
                                     <br/>
                                     <div style="text-align: center; vertical-align: middle;">CONTACT@AIRPARQ.CO.UK</div>
                                 </td>
                                 </tr>
                                 </table>
                                 <br/>
                                <table style="width:600px;padding:20px">
                                 <tr>
                                 <td>
                                     <div style="text-align: center; vertical-align: middle;font-weight:bold">FOR AMENDMENTS & CANCELLATIONS,PLEASE CALL:</div>
                                     <br/>
                                     <div class="d-flex" style="align-items: center; justify-content: center; margin-bottom: 10px;"> <img src="{{asset('assets/img/phone.jpg')}}" style="width:40px;height:40px;"/>+44 7464 777258</div>
                                 </td>
                                 </tr>
                                 </table>
                                 <br/>
                                <table style="width:600px;  margin: 0 auto;">
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="d-flex" style="display: flex; gap: 20px; justify-content: center; align-items: center;">
                                                <div>DON'T FORGET</div>
                                                <div style="display: flex; align-items: center;">
                                                    <img src="{{asset('assets/img/tick.jpg')}}" style="width:20px;height:20px; margin-right: 5px;" />Tickets
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <img src="{{asset('assets/img/tick.jpg')}}" style="width:20px;height:20px; margin-right: 5px;" />Passport
                                                </div>
                                                <div style="display: flex; align-items: center;">
                                                    <img src="{{asset('assets/img/tick.jpg')}}" style="width:20px;height:20px; margin-right: 5px;" />Currency
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                 <br/>
                                <div> BOOKING DETAILS</div>
                                <br/>
                                 <table class="table table-bordered" style="width:600px">
                                    <tr>
                                    <td> BOOKING REF:</td>
                                    <td > CAR REG:</td>
                                    </tr>
                                </table>
                                  <table class="table table-bordered" style="width:600px">
                                    <tr>
                                    <td colspan="2">MAKE MODEL:</td>
                                    <td > CAR REG:</td>
                                    </tr>
                                      <tr>
                                    <td>  RETURN DATE:</td>
                                    <td > TIME:</td>
                                    <td>TERMINAL:</td>
                                    </tr>
                                      <tr>
                                    <td colspan="2"> RETURN FLIGHT NO:</td>
                                    <td >SERVICE::</td>
                                    </tr>
                                </table>
                                <div>BOOKING DETAILS</div>
                                 <table  style="width:600px">
                                <tr>
                                <td>
                                     AIRPARQ Parking will only pay for the car parking charges for a
                                     maximum of 15 mins upon delivery of vehicle. For any changes while you
                                     are abroad, please email:
                                     contact@airparq.co.uk
                                     Please note that there will be an extra charge for any amendments and
                                </td>
                                </tr>
                                </table>
                                   <table  style="width:600px">
                                <tr>
                                <td>
                                     extra days parking @ 20.00p per day.
                                     NO CASH collection taken,
                                     Only card transactions taken for payment.
                                     Thomas House, Peters eld Avenue, Slough, SL2 5E
                                </td>
                                </tr>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Account -->
            </div>

        </div>
    </div>

    <script>
        window.print();  // Automatically trigger print dialog

        // After printing, redirect to the appointments list
        window.onafterprint = function() {

        };
    </script>
</body>
</html>
