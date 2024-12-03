@extends('layouts.main.master')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Zoom Image</h3>
            <ul class="breadcrumbs mb-3">
                <li class="separator">
                    <i class="icon-arrow-left"></i>
                </li>
                <li class="nav-item">
                     <a href="{{ URL::previous() }}">Back</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Large Image Display with Zoom -->
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <div class="d-flex flex-wrap">
                                          @if(!empty($images))
                                        <div class="zoom-container">
                                                 <div id="imageZoom"  style="
                                                    --url:url('{{ asset('assets/vehicleimage/' .$firstImage) }}');
                                                    --zoom-x: 0%; --zoom-y: 0%;
                                                    --display: none
                                                ">
                                                    <img src="{{asset('assets/vehicleimage/' . $firstImage) }}" alt="">
                                                {{-- <img src="{{asset('assets/vehicleimage/' . $firstImage) }}"  alt=""> --}}
                                            </div>
                                        </div>

                                        @else
                                            <p>No images available.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                              <!-- Thumbnail Images -->
                              <div class="col-md-6 col-lg-6">
                                <div class="form-group">

                                    <div class="d-flex flex-wrap">
                                        @if(!empty($images))
                                            @foreach ($images as $image)
                                                <img
                                                    src="{{ asset('assets/vehicleimage/' . $image) }}"
                                                    alt="Thumbnail"
                                                    class="thumbnail"
                                                    style="width: 100px; height: 100px; padding: 10px; cursor: pointer;"
                                                    onclick="updateLargeImage('{{ asset('assets/vehicleimage/' . $image) }}')"
                                                >

                                            @endforeach
                                        @else
                                            <p>No images available.</p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- End Card Body -->
                </div> <!-- End Card -->
            </div> <!-- End Col -->
        </div> <!-- End Row -->
    </div> <!-- End Page Inner -->
</div> <!-- End Container -->
@endsection

<!-- JavaScript to Handle Image Click -->
<script>

    document.addEventListener('DOMContentLoaded', () => {
        let imageZoom = document.getElementById('imageZoom');

        // Function to update the large image and reset styles
        window.updateLargeImage = (imageSrc) => {
            if (imageZoom) {
                // Update the background image for the zoom effect
                imageZoom.style.setProperty('--url', `url(${imageSrc})`);
                imageZoom.style.setProperty('--display', 'none'); // Ensure zoom is hidden initially

                // Update the <img> tag inside the zoom container
                const imgElement = imageZoom.querySelector('img');
                if (imgElement) {
                    imgElement.src = imageSrc;

                    // Reset object-fit and object-position to match the first image
                    imgElement.style.objectFit = 'cover';
                    imgElement.style.objectPosition = '0 0';
                }
            }
        };

        if (imageZoom) {
            // Mouse move event to trigger zoom
            imageZoom.addEventListener('mousemove', (event) => {
                imageZoom.style.setProperty('--display', 'block');

                let pointer = {
                    x: (event.offsetX * 100) / imageZoom.offsetWidth,
                    y: (event.offsetY * 100) / imageZoom.offsetHeight
                };

                imageZoom.style.setProperty('--zoom-x', `${pointer.x}%`);
                imageZoom.style.setProperty('--zoom-y', `${pointer.y}%`);
            });

            // Mouse out event to hide zoom
            imageZoom.addEventListener('mouseout', () => {
                imageZoom.style.setProperty('--display', 'none');
            });
        }
    });



</script>

  <style>
    #imageZoom {
        width: 500px;
        height: 750px;
        position: relative;
    }

    #imageZoom img {
        object-position: 0 0;
    }

    #imageZoom::after {
        display: var(--display);
        content: '';
        width: 100%;
        height: 100%;
        background-color: black;
        background-image: var(--url);
        background-size: 200%;
        background-position: var(--zoom-x) var(--zoom-y);
        position: absolute;
        left: 0;
        top: 0;
        pointer-events: none; /* Prevent interference with clicking */
    }





</style>
