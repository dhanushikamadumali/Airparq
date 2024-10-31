<script defer="" src="{{asset('account/js/theme-1.min.js')}}"></script>
<script defer="" src="{{asset('account/js/theme-2.min.js')}}"></script>
<script defer="" src="{{asset('account/js/theme-3.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to the "Next" button
        document.getElementById('paybtn').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default form submission
            // Get form values
            //const terminalId = document.getElementById('selected_terminal_id').value;
            const parkingFromDate = document.getElementById('bookingfromDate').value;
            const parkingFromTime = document.getElementById('bookingfromTime').value;
            const parkingTillDate = document.getElementById('bookingtillDate').value;
            const parkingTillTime = document.getElementById('bookingtillTime').value;
            const inbound_terminal = document.getElementById('inbound_terminal').value;

            // Prepare data to send
            const formData = {
                inbound_terminal: inbound_terminal,
                from_date: parkingFromDate,
                from_time: parkingFromTime,
                till_date: parkingTillDate,
                till_time: parkingTillTime,

            };
             let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Send the data using the fetch API
            fetch('ckoutbooking', {

                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN':token// Ensure CSRF token is set if needed
                },
                body: JSON.stringify(formData) // Send the form data
            })
            .then(response => {
               //
                return response.json();
            })
            .then(data => {

            })
            .catch(error => console.error('Error:', error));
        });


    });

document.addEventListener('DOMContentLoaded', function () {
     // Select all 'Choose' buttons
        const chooseButtons = document.querySelectorAll('.choose-terminal');
        chooseButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Set values for the hidden inputs based on button data attributes
                const terminalid =  this.getAttribute('value');
                document.getElementById('selected_terminal_id').value = this.getAttribute('value');


                // Submit the form
                document.getElementById('bookingForm').submit();
            });
        });

});


  //contact form
    const code = new URLSearchParams(window.location.search).get('code');

    if (code) {
        const alertElement = document.getElementById('msg_alert');
        alertElement.classList.remove('d-none');
        alertElement.classList.add(code === '200' ? 'alert-success' : 'alert-danger');

        alertElement.innerHTML = code === '200'
            ? "Your message has been sent. Thank you for contacting us!"
            : code === '500'
                ? "Error! Your message could not be sent."
                : "Access denied! You cannot send the message.";
    }



      document.getElementById('form_view').addEventListener('click', function() {
        var bookingForm = document.getElementById('booking_details_form');
        var terminalView = document.getElementById('terminalview');
        // Toggle form visibility
        if (bookingForm.classList.contains('d-none')) {
            bookingForm.classList.remove('d-none');
            terminalView.classList.add('d-none');
            this.textContent = 'Show Terminal';
        } else {
            bookingForm.classList.add('d-none');
            terminalView.classList.remove('d-none');
            this.textContent = 'Amend';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const chooseButtons = document.querySelectorAll('.choose-terminal');
     chooseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const terminalId = this.getAttribute('value');
                document.getElementById('selected_terminal_id').value = terminalId;
            });
        });
    });

     document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.editsearch').addEventListener('click', function() {

            // Collect form values
            let parkingFromDate = document.querySelector('#parking_from_date').value;
            let fromTime = document.querySelector('#parking_from_time').value;
            let parkingTillDate = document.querySelector('#parking_till_date').value;
            let tillTime = document.querySelector('#parking_till_time').value;
            let promoCode = document.querySelector('#promocode').value;
            let airport = document.querySelector('#airport').value;


            // Prepare data for the AJAX request
            let data = {
                parking_from_date: parkingFromDate,
                from_time: fromTime,
                parking_till_date: parkingTillDate,
                till_time: tillTime,
                promocode: promoCode,
                airport: airport,
                _token: "{{ csrf_token() }}"  // CSRF token for security
            };

            // Send the AJAX request
            fetch('{{ route("bookingedit") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
             .then(result => {
                if (result.success) {
                    // Success: reload the page to reflect updated session values
                    window.location.reload();
                } else if (result.errors) {
                    // Validation error: display the errors using notify
                    let errorMessages = '';
                    Object.keys(result.errors).forEach(function (key) {
                        errorMessages += result.errors[key] + ' '; // Concatenate error messages
                    });

                    Swal.fire({
                        icon: 'error',
                        text: errorMessages.trim(),
                        showCancelButton: true, // This will show a close button
                        cancelButtonText: 'Close', // Custom text for the close button
                        cancelButtonColor: '#d33', // Optional: Customize the color of the close button
                        showConfirmButton: false, // Hide the default "OK" button
                        timer:3000,
                    });
                } else {
                    // Generic error handling
                     Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: result.message,
                        showCancelButton: true, // This will show a close button
                        cancelButtonText: 'Close', // Custom text for the close button
                        cancelButtonColor: '#d33', // Optional: Customize the color of the close button
                        showConfirmButton: false,// Hide the default "OK" button
                        timer: 3000,
                    });

                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });


    //home page animation

    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = "leftIn 2s ease-in-out forwards";
                        observer.unobserve(entry.target); // Stop observing once animated
                    }
                });
            },
            {
                threshold: 0.25 // Trigger when 25% of the element is visible
            }
        );

        document.querySelectorAll(".headingtitle").forEach((element) => {
            observer.observe(element);
        });
    });
</script>
