
    @extends('layouts.web.master')
    @section('content')
     <!-- Main -->
    <main>

        <div class="p-top-90 p-bottom-90 bg-gray-gradient" data-aos="fade">


            <!-- Completed -->
            <section class="container">
                <div class="card border-0 shadow-sm" data-aos="fade">
                    <div class="card-body">
                        <div class="border-bottom pb-4 mb-4">
                            <h2 class="h3 ff-primary mb-0 text-body-emphasis">Booking Successfully</h2>
                        </div>
                        <p>
                            Your booking was sent successfully. We will contact you very soon!
                            <br>
                            Thank you for your booking!
                        </p>
                        <a href="{{route('/')}}" class="fw-medium">
                            <span>Homepage</span>
                            <i class="hicon hicon-thin-circle-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </section>
            <!-- /Completed -->

        </div>

    </main>
    <!-- /Main -->
    @endsection


