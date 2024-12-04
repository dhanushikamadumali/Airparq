@extends('layouts.main.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Today Registered Bookings List</h3>
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="todayregisteredbookingrangetable"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filterdata as $data)
                                    <td>{{$data->booking_code}}</td>
                                    <td>{{$data->first_name}} </td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone_no}}</td>
                                    <td>
                                     @if ($data->status == 0)
                                        <span class="badge badge-danger">Cancel</span>
                                     @endif
                                    @if ($data->status == 1)
                                        <span class="badge badge-success">Success</span>
                                    @endif
                                     </td>
                                    <td>
                                        <a href="{{ route('editbooking',Crypt::encryptString($data->id))}}">
                                            <i class="fa fa-edit editbtn"></i>
                                        </a>
                                        <button class="open_camera btn p-0 camerabtn" data-row-id="{{$data->id }}">
                                            <i class="fas fa-camera"></i>
                                        </button>
                                        <a href="{{route('printbooking1',$data->id)}}">
                                        <i class="fas fa-print print"></i>
                                        </a>
                                         <a href="{{ route('viewbooking',Crypt::encryptString($data->id))}}">
                                            <i class="far fa-eye viewbtn"></i>
                                        </a>
                                          <button class="btn p-0 cancle" onclick="bookingdetailscancle('{{Crypt::encryptString($data->id)}}')">
                                        <i class="fas fa-ban canclebtn"></i>
                                        </button>
                                        <button class="btn p-0 delete" onclick="bookingdetailsdelete('{{Crypt::encryptString($data->id)}}')">
                                        <i class="fa fa-times deletebtn"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="btn p-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#zoomImageModal"
                                            onclick="loadZoomImage('{{ route('zoomimage', Crypt::encryptString($data->id)) }}')">
                                            <i class="fa-solid fa-image" style="color:#660066"></i>
                                        </button>
                                    </td>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="zoomImageModal" tabindex="-1" aria-labelledby="zoomImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="zoomImageModalLabel">Image View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Dynamic content will be loaded here -->
        <div id="zoomImageContent">
          <p>Loading...</p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal for Camera -->
<div id="cameraModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Take Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <video id="video" width="100%" height="100%" autoplay></video>
                <div id="results" class="mt-3"></div> <!-- Display captured images here -->
            </div>
            <div class="modal-footer">
                <button id="switch-camera" class="btn btn-secondary">Switch Camera</button>
                <button id="take-photo" class="btn btn-primary">Take Photo</button>
                <button type="button" id="close-modal" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="upload-photos" class="btn btn-success">Upload</button>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function loadZoomImage(route) {
        const zoomImageContent = document.getElementById('zoomImageContent');
        // Show loading indicator
        zoomImageContent.innerHTML = '<p>Loading...</p>';
        // Fetch the data from the server
        fetch(route)
            .then(response => response.json())
            .then(data => {
                const { images, firstImage } = data;

                if (!images || images.length === 0) {
                    zoomImageContent.innerHTML = '<p>No images available.</p>';
                    return;
                }

                // Construct asset path base
                const assetPath = "{{ asset('assets/vehicleimage') }}/";

                // Build the modal content with zoom functionality
                const thumbnails = images.map(image => `
                    <img
                        src="${assetPath}${image}"
                        alt="Thumbnail"
                        class="thumbnail"
                        style="width: 100px; height: 100px; padding: 10px; cursor: pointer;"
                        onclick="updateLargeImage('${assetPath}${image}')"
                    >
                `).join('');

                const firstImagePath = firstImage ? `${assetPath}${firstImage}` : '';

                zoomImageContent.innerHTML = `
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="zoom-container">
                                    <div id="imageZoom" style="
                                        --url:url('${firstImagePath}');
                                        --zoom-x: 0%; --zoom-y: 0%;
                                        --display: none;">
                                        <img src="${firstImagePath}" alt="" style="width: 100%; height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                                <div class="d-flex flex-wrap">
                                    ${thumbnails}
                                </div>

                        </div>
                    </div>
                `;
            })
            .catch(error => {
                console.error('Error loading image data:', error);
                zoomImageContent.innerHTML = '<p>Error loading content. Please try again.</p>';
            });
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Function to update the large image and reset styles
        window.updateLargeImage = (imageSrc) => {
            const imageZoom = document.getElementById('imageZoom');
            if (imageZoom) {
                imageZoom.style.setProperty('--url', `url(${imageSrc})`);
                imageZoom.style.setProperty('--display', 'none'); // Ensure zoom is hidden initially

                const imgElement = imageZoom.querySelector('img');
                if (imgElement) {
                    imgElement.src = imageSrc;
                }
            }
        };

        // Zoom behavior for the modal
        document.body.addEventListener('mousemove', (event) => {
            const imageZoom = document.getElementById('imageZoom');
            if (imageZoom && imageZoom.contains(event.target)) {
                imageZoom.style.setProperty('--display', 'block');

                const pointer = {
                    x: (event.offsetX * 100) / imageZoom.offsetWidth,
                    y: (event.offsetY * 100) / imageZoom.offsetHeight,
                };

                imageZoom.style.setProperty('--zoom-x', `${pointer.x}%`);
                imageZoom.style.setProperty('--zoom-y', `${pointer.y}%`);
            }
        });

        document.body.addEventListener('mouseout', (event) => {
            const imageZoom = document.getElementById('imageZoom');
            if (imageZoom && imageZoom.contains(event.target)) {
                imageZoom.style.setProperty('--display', 'none');
            }
        });
    });



</script>
