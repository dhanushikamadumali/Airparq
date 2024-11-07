<!DOCTYPE html>
<html>
  {{-- css --}}
   @include('layouts.main.css')
<body>
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                <span id="result"></span>
                <div class="mb-4">
                    <!-- Account -->
                    <div id="printableArea" class="card-body">
                        <style>
                            p {
                                font-size: 19px !important;
                            }
                            label{
                                font-size: 19px !important;
                            }
                            h6{
                                font-size: 19px !important;
                            }
                        </style>
                        <div  class="row">
                            <div class="col-md-4 p-4">
                                <div  class="h-100">
                                    <div class="card-header text-center ">
                                        <img src="{{asset('assets/img/logo.jpg')}}" class="img-fluid" style="margin-bottom:20px">
                                    </div>
                                      <hr style="color: #000;">
                                    <div class="card-body hover">
                                        <!-- Customer -->
                                        <h5 class=" coloring">Customer</h5>
                                        <!-- Step 1 -->
                                        <div class="step step-1">
                                            <div class="border p-2">
                                                <label for="field1" class="form-label">Name:</label>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="step step-2">
                                            <div class="border p-2">
                                                <label for="field2" class="form-label">Mobile:</label>
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="step step-3 ">
                                            <div class="mb-3 border p-2">
                                                <label for="field3" class="form-label">Booking Ref:</label>
                                                <p></p>
                                            </div>
                                        </div>
                                        <!--                                    Vehicle-->
                                        <h5 class="coloring">Vehicle</h5>
                                        <!-- Step 1 -->
                                        <div class="row">
                                        <div class="col-md-4 border p-2">
                                            <label for="field1" class="form-label">Car Registration:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field1" class="form-label">Mileage:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field2" class="form-label">Return Mileage:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-8 border p-2">
                                            <label for="field3" class="form-label">Make Model:</label>
                                            <p></p>
                                        </div>
                                            <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Colour:</label>
                                                <p></p>
                                        </div>
                                            <div class="col-md-12 mb-3 border p-2">
                                            <label for="field3" class="form-label">Parked At Zone:</label>
                                                <p></p>
                                        </div>
                                        </div>
                                        <h5 class="coloring">Flight Details</h5>
                                        <div class="row">
                                        <div class="col-md-4 border p-2">
                                            <label for="field1" class="form-label">Departure Date:</label>
                                            <p></p>
                                        </div>

                                        <div class="col-md-4 border p-2">
                                            <label for="field2" class="form-label">Time:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Terminal:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Return Date:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Time:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Terminal:</label>
                                            <p></p>
                                        </div>
                                            <div class="col-md-12 mb-3 border p-2">
                                                <label for="field3" class="form-label">Return Flight Number:</label>
                                                <p></p>
                                            </div>
                                        </div>
                                        <h5 class="coloring mb-3">Declaration</h5>
                                          <p class="mb-1" style="text-align:justify">
                                              By signing this document, I agree that I have read and am willing to be bound by the terms and conditions of . I also acknowledge and accept any damage noted on my car. However, I further assert that the damage noted may not be an accurate reflection of the car's condition, due to time constraints and location.

                                          </p>
                                        <div class="row">
                                            <div class="col-md-8 border p-2">
                                                <label for="field3" class="form-label">Signature 1:</label>
                                                <p></p>
                                            </div>
                                            <div class="col-md-4 border p-2">
                                                <label for="field3" class="form-label">Time:</label>
                                                <p></p>
                                            </div>
                                            <div class="col-md-8 border p-2">
                                                <label for="field3" class="form-label">Signature 2:</label>
                                                <p></p>
                                            </div>
                                            <div class="col-md-4 border p-2">
                                                <label for="field3" class="form-label">Time:</label>
                                                <p></p>
                                            </div>
                                            <p style="text-align:justify">SIGNATURE #01 - We con rm that no items/valuables have been left in
                                             the vehicle.</p>
                                             <p style="text-align:justify">SIGNATURE #02 - This is to con rm AIRPARQ PRKING has delivered your
                                             vehicle.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 p-4">
                                <div  class="h-100" style="padding:10px">
                                    <div class="card-body" style="padding-bottom: 74px;">
                                        <!-- Your form content goes here -->
                                        <h5 class=" coloring" style="margin-top: 70px;">Date Of Arrival</h5>
                                        <!-- Step 1 -->
                                        <div class="step step-1">
                                            <div class="mb-3 border p-2" >
                                                <p style="padding-bottom: 225px;"> </p>
                                            </div>
                                        </div>
                                        <!-- Step 2 -->
                                        <h5 class="coloring">Time Of Arrival</h5>
                                        <div class="step step-2 mt-3">
                                            <div class="mb-3 border p-2">
                                                <p style="padding-bottom: 225px;"> </p>
                                            </div>

                                        </div>
                                        <h5 class="coloring">Terminal</h5>
                                        <div class="step step-3 mt-3">
                                            <div class="mb-3 border p-2">
                                                <p style="padding-bottom: 251px;"> </p>
                                            </div>
                                            <!-- Add more form fields as needed -->
                                        </div>
                                        <h5 class="coloring">Details</h5>
                                        <div class="row">
                                        <div class="col-md-8 border p-2">
                                            <label for="field2" class="form-label">Booking Ref:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Car Reg:</label>
                                            <p></p>
                                        </div>
                                            <div class="col-md-8 border p-2">
                                            <label for="field3" class="form-label">Make Model:</label>
                                                <p></p>
                                        </div>
                                            <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Colour:</label>
                                                <p></p>
                                        </div>
                                        </div>
                                        <!-- Add more steps as needed -->
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 ">
                                <div  class="h-100" style="padding:10px">
                                    <div class="card-header text-center ">
                                        <img src="{{asset('assets/img/logo.jpg')}}" class="img-fluid" style="margin-bottom:20px">
                                    </div>
                                    <div class="card-body">
                                        <!-- Your form content goes here -->
                                        <h7 class="text-center coloring">ONCE YOU HAVE COLLECTED ALL YOUR LUGGAGE PLEASE CALL</h7>
                                        <div class="" style="padding-left: 50px;">
                                               <h5 class=" coloring"><i class="fa-solid fa-phone" style="border: 1px solid; padding: 8px; border-radius: 50%;font-size:10px"></i> +44 7464 777258</h5>
                                            <h5 class=" coloring"><i class="fa-solid fa-phone" style="border: 1px solid; padding: 8px; border-radius: 50%;font-size:10px"></i> +44 7301 330702</h5>
                                            <h5 class=" coloring" style="padding-bottom: 20px;"><i class="fa-solid fa-envelope" style="border: 1px solid; padding: 8px; border-radius: 50%;font-size:10px "></i> contact@airparq.co.uk</h5>

                                        </div>
                                        <div class="" ">
                                            <h7 class="text-center coloring" style="">for all customer relation feedback, please email:  </h7>
                                            <h6 class="text-center" style="margin-bottom:10px">contact@airparq.co.uk</h6>
                                            <h7 class="text-center coloring" style="padding-bottom:10px">For Amendments & Cancellations,Please Call:  </h7>
                                            <h5 class="text-center coloring" style=""><i class="fa-solid fa-phone" style="border: 1px solid; padding: 8px; border-radius: 50%;font-size:10px"></i> +44 7464 777258</h5>
                                        </div>
                                         <div class="row mb-3" ">
                                        <div class="col-md-3">
                                        <h6 class="text-center coloring">Don't Forget:  </h6>
                                        </div>
                                        <div class="col-md-3">
                                            <div style="display: flex; align-items: center;font-size:12px">
                                                <img src="{{asset('assets/img/tick.jpg')}}" style="width:20px;height:20px;margin-right:5px" />
                                                Tickets
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                               <div style="display: flex; align-items: center;font-size:12px;"><img src="{{asset('assets/img/tick.jpg')}}" style="width:20px;height:20px;margin-right:5px" />Passport </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div style="display: flex; align-items: center;font-size:12px;"><img src="{{asset('assets/img/tick.jpg')}}" style="width:20px;height:20px;margin-right:6px;margin-left:5px" />Currency</div>
                                        </div>
                                        </div>

                                        <h5 class="coloring">Booking Details</h5>
                                        <div class="row">

                                        <div class="col-md-7 border p-2">
                                            <label for="field1" class="form-label">Booking Ref:</label>
                                            <p></p>
                                        </div>
                                            <div class="col-md-5 border p-2">
                                            <label for="field1" class="form-label">Car Reg:</label>
                                                <p></p>
                                        </div>
                                        <div class="col-md-8 border p-2">
                                            <label for="field1" class="form-label">Make Model:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field2" class="form-label">Colour:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Return Date:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field1" class="form-label">Time:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field2" class="form-label">Terminal:</label>
                                            <p></p>
                                        </div>
                                        <div class="col-md-8 border p-2">
                                            <label for="field3" class="form-label">Return Flight No:</label>
                                            <p> </p>
                                        </div>
                                        <div class="col-md-4 border p-2">
                                            <label for="field3" class="form-label">Service:</label>
                                            <p></p>
                                        </div>
                                    </div>
                                        <div class="mt-3 mb-3">
                                            <h5 class="coloring mb-2">Present This Voucher On Your Return</h5>
                                                 <p style="text-align:justify">
                                                     AIRPARQ will only charge for car parking for a maximum of 15 minutes for vehicle delivery. For any changes while you are abroad, please email <br>
                                                  <br>
                                                     Please note that there will be extra charges for any amendments and extra parking at £20.00 per day.
                                                     <br>
                                                     <b>NO CASH collections taken,<br>
                                                         Only card transactions taken for payment.</b><br>
                                                 </p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <input type="text" value="{{$bookingdetails[0]->id}}" name="ids" hidden="hidden">
    <script>
          window.print();  // Automatically trigger print dialog

        // After printing, redirect to the appointments list
        window.onafterprint = function() {
            window.location.href = "{{ route('currentmonthreport') }}";
        };

    </script>
</body>
</html>
