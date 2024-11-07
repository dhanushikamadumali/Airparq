
<!DOCTYPE html>
<html>
  {{-- css --}}
   @include('layouts.main.css')

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <span id="result"></span>
                <div class="card mb-4">
                    <!-- Account -->
                    <div id="printableArea" class="card-body">
                        <style>
                            .space_top{
                                margin-top:40px ;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-4 text-center">
                               <p>{{$bookingdetails[0]->first_name}}{{$bookingdetails[0]->last_name}} </p>
                               <p>{{$bookingdetails[0]->phone_no}}</p>
                               <p>{{$bookingdetails[0]->email}}</p>
                               <p class="space_top">{{$bookingdetails[0]->vehicle_reg}}</p>
                               <p> {{$bookingdetails[0]->vehicle_manufacturer}}</p>
                               <p class="space_top"> {{$bookingdetails[0]->parking_from_date}}{{$bookingdetails[0]->parking_from_time}}</p>
                               <p> {{$bookingdetails[0]->parking_till_date}} {{$bookingdetails[0]->parking_till_time}}</p>
                           </div>
                            <div class="col-md-4 text-center">
                               <p > {{$bookingdetails[0]->parking_till_date}}</p>
                               <p style="margin-top: 30px;
                                        margin-bottom: 30px;">
                                        {{$bookingdetails[0]->parking_till_time}}</p>
                               <p style="""> {{$bookingdetails[0]->parking_till_date}}</p>
                               <p class="space_top"> {{$bookingdetails[0]->vehicle_reg}}</p>
                               <p>  {{$bookingdetails[0]->vehicle_manufacturer}}{{$bookingdetails[0]->vehicle_model}}</p>
                           </div>
                            <div class="col-md-4 text-center">
                               <p style="margin-top: 110px">{{$bookingdetails[0]->vehicle_reg}}</p>
                               <p> {{$bookingdetails[0]->vehicle_manufacturer}} {{$bookingdetails[0]->vehicle_model}}  {{$bookingdetails[0]->vehicle_color}}</p>
                               <p>{{$bookingdetails[0]->parking_till_time}}  {{$bookingdetails[0]->parking_till_date}}</p>

                           </div>
                    </div>
                    </div>

                    </div>
                    <!-- /Account -->
                </div>

            </div>

    </div>
    <input type="text" value="{{$bookingdetails[0]->id}}" name="ids" hidden="hidden">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        $(document).ready(function() {
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
        });
            document.body.innerHTML = originalContents;


    </script>

</body>
</html>

