 <!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jsvectormap/world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Kaiadmin JS -->
<script src="{{asset('assets/js/kaiadmin.min.js')}}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{asset('assets/js/setting-demo.js')}}"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>

<script src="{{asset('assets/js/image-zoom.min.js')}}"></script>

<script>
  $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#177dff",
    fillColor: "rgba(23, 125, 255, 0.14)",
  });

  $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#f3545d",
    fillColor: "rgba(243, 84, 93, .14)",
  });

  $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#ffa534",
    fillColor: "rgba(255, 165, 52, .14)",
  });
    $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });

    const table4 = $("#filterstatus_rangetable").DataTable({
        pageLength: 5,
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select class="form-select"><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },
    });


    /// filter status

    $('#status').change(function (e) {

        e.preventDefault();
        var status = $('#status').val();
        var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: `getfilterbookingstatus`,
                method: 'POST',
                data: {
                    status: status,
                    _token: token
                    },
                success: function (response) {
                    console.log(response);
                    table4.clear().rows.add(response.data).draw();
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });
    });

     // Handle Filter Status Click
    const table1= $("#filterdate_rangetable").DataTable({
        pageLength: 5,
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select class="form-select"><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },
    });


    /// filter date range

    $('#filterButton').click(function (e) {
                e.preventDefault();
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: `getfilterbookingdate`,
                    method: 'POST',
                    data: {
                        from_date: from_date,
                        to_date:to_date,
                        _token: token
                        },
                    success: function (response) {
                        console.log(response);
                        table1.clear().rows.add(response.data).draw();
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });


        // Handle Filter date Button Click


        /// filter income booking
         const table2 = $("#filterdate_incomebooktable").DataTable({
            pageLength: 5,
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        var column = this;
                        var select = $(
                            '<select class="form-select"><option value=""></option></select>'
                        )
                            .appendTo($(column.footer()).empty())
                            .on("change", function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? "^" + val + "$" : "", true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + "</option>"
                                );
                            });
                    });
            },
        });

        // Handle Filter income Button Click
        $('#filterincomebookButton').click(function (e) {
            e.preventDefault();
            var terminal = $('#terminal').val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: `getfilterincomebooking`,
                method: 'POST',
                data: {
                    terminal:terminal,
                    _token: token
                    },
                success: function (response) {
                     console.log(response);
                    table2.clear().rows.add(response.data).draw();
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });

          /// filter outgoing booking
         const table3 = $("#filterdate_outgoingbooktable").DataTable({
            pageLength: 5,
            initComplete: function () {
                this.api()
                    .columns()
                    .every(function () {
                        var column = this;
                        var select = $(
                            '<select class="form-select"><option value=""></option></select>'
                        )
                            .appendTo($(column.footer()).empty())
                            .on("change", function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? "^" + val + "$" : "", true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + "</option>"
                                );
                            });
                    });
            },
        });

        // Handle Filter income Button Click
        $('#filteroutgoingbookButton').click(function (e) {
            e.preventDefault();
            var terminal = $('#terminal').val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: `getfilteroutgoingbooking`,
                method: 'POST',
                data: {
                    terminal:terminal,
                    _token: token
                    },
                success: function (response) {
                    console.log(response);
                    table3.clear().rows.add(response.data).draw();
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });



        var table = $('#today_booking').DataTable({
            dom: 'Bfrtip', // Layout for DataTables with Buttons
            buttons: [
                {
                    extend: 'copyHtml5',
                    footer: true
                },
                {
                    extend: 'excelHtml5',
                    footer: true
                },
                {
                    extend: 'csvHtml5',
                    footer: true
                },
                {
                    extend: 'pdfHtml5',
                    footer: true,
                    customize: function (doc) {
                        // Set a margin for the footer
                        doc.content[1].margin = [0, 0, 0, 20];
                    }
                },
                {
                    extend: 'print',
                    footer: true
                }
            ],

        });



    ///// today booking report




    /// Handle Filter income Button Click
    $('#today_booking').click(function (e) {
        e.preventDefault();
        var terminal = $('#terminal').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: `getfilteroutgoingbooking`,
            method: 'POST',
            data: {
                terminal:terminal,
                _token: token
                },
            success: function (response) {
                table.clear().rows.add(response.data).draw();
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });





    let video = document.getElementById('video');
    let photos = [];  // Array to store multiple base64 images
    let useFrontCamera = true;
    let currentStream;
    let currentRowId = null;  // Keep track of the current row ID

    // Show modal when camera button is clicked and set the row ID
    $(".open_camera").click(function() {
        currentRowId = $(this).data('row-id');  // Get row ID from the button's data attribute
        $('#row_id').val(currentRowId);  // Store the row ID in the hidden form input
        $('#cameraModal').modal('show');  // Show the Bootstrap modal
        startCamera();  // Start the camera stream
    });

    // Close modal and stop the camera stream
    $("#close-modal, .close").click(function() {
        $('#cameraModal').modal('hide');
        stopCamera();  // Stop the camera when modal is closed
    });

    // Function to start the camera stream
    function startCamera() {
        if (currentStream) {
            currentStream.getTracks().forEach(track => {
                track.stop();
            });
        }

        const constraints = {
            video: {
                facingMode: useFrontCamera ? 'user' : { exact: 'environment' }  // Front or back camera
            }
        };

        navigator.mediaDevices.getUserMedia(constraints)
            .then(stream => {
                currentStream = stream;
                video.srcObject = stream;  // Display the video stream in the <video> element
            })
            .catch(error => console.error('Error accessing camera: ', error));
    }

    // Function to stop the camera stream
    function stopCamera() {
        if (currentStream) {
            currentStream.getTracks().forEach(track => {
                track.stop();  // Stop all media tracks (camera)
            });
            currentStream = null;
        }
    }
    // Switch camera (front/back) on button click
    $("#switch-camera").click(function() {
        useFrontCamera = !useFrontCamera;  // Toggle between front and back camera
        startCamera();  // Restart the camera with the new facing mode
    });

    // Take a snapshot from the video stream
    $("#take-photo").click(function() {
        let canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        let context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        let dataUri = canvas.toDataURL('image/jpeg');  // Convert the canvas to base64
        photos.push(dataUri);  // Store the base64 image in the photos array

        // Display the captured photo in the results div
        let imgElement = document.createElement('img');
        imgElement.src = dataUri;
        imgElement.classList.add('img-thumbnail', 'mr-2');  // Add some styling for display
        document.getElementById('results').appendChild(imgElement);
    });

    $("#upload-photos").click(function() {
        if (photos.length === 0) {
            alert('No photos to upload!');
            return;
        }

        let formData = {
            row_id: currentRowId,
            photos: JSON.stringify(photos),  // Convert the photos array to a JSON string
            _token: $('input[name="_token"]').val()  // Include CSRF token for Laravel
        };

        $.ajax({
            url: '/admin/uploadvehiclephoto',  // Your route to handle the upload
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                // Optionally, clear the results after successful upload
                photos = [];  // Clear the array after upload
                //document.getElementById('results').innerHTML = '';  // Clear the displayed images
                 window.location.reload();
                $('#cameraModal').modal('hide');  // Close the modal after uploading
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while uploading photos.');
            }
        });
    });


      const table5 = $("#todayregisteredbookingrangetable").DataTable({
        pageLength: 5,
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $(
                        '<select class="form-select"><option value=""></option></select>'
                    )
                        .appendTo($(column.footer()).empty())
                        .on("change", function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append(
                                '<option value="' + d + '">' + d + "</option>"
                            );
                        });
                });
        },
    });





</script>

