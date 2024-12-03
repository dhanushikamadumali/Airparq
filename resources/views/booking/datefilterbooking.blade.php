@extends('layouts.main.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                 <h3 class="fw-bold mb-3">Date Filter List</h3>
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
                        <div class="card-header">
                        <div class="row">
                                <div class="col-md-4  mt-3 ">
                                    <lable style="margin-left:10px;font-weight:600">Parking From</lable>
                                    <div class="form-group">
                                        <input type="date" id="from_date" name="from_date" class="form-control" value="{{date("Y-m-d")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-4  mt-3">
                                    <lable style="margin-left:10px;font-weight:600">Parking To</lable>
                                    <div class="form-group">
                                        <input type="date" id="to_date" name="to_date" class="form-control" value="{{date("Y-m-d")}}"/>
                                    </div>
                                </div>
                                <div class="col-md-3 mt-5">
                                    <a href="">
                                    <button id="filterButton" class="btn page_btn">Search</button>
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                id="filterdate_rangetable"
                                class="display table table-striped table-hover"
                            >
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>PNo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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
    document.addEventListener('DOMContentLoaded', () => {
        // Delegate event listener for dynamically added zoom image buttons
        document.body.addEventListener('click', (event) => {
            const button = event.target.closest('button[data-bs-target="#zoomImageModal"]');
            if (button) {
                const route = button.getAttribute('data-url');
                if (route) {
                    loadZoomImage(route);
                }
            }
        });
        // Function to load zoom image content
        function loadZoomImage(route) {
            const zoomImageContent = document.getElementById('zoomImageContent');
            zoomImageContent.innerHTML = '<p>Loading...</p>'; // Show loading indicator

            fetch(route)
                .then(response => response.json())
                .then(data => {
                    const { images, firstImage } = data;

                    if (!images || images.length === 0) {
                        zoomImageContent.innerHTML = '<p>No images available.</p>';
                        return;
                    }
                    const assetPath = "{{ asset('assets/vehicleimage') }}/";
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

        // Function to update the large image
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
        // Zoom behavior
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
