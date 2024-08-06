<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="libs/fullcalendar/main.min.css">
    <script src="libs/fullcalendar/main.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <style>
        body {
            font-family: 'League Spartan', sans-serif;
        }

        #calendar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .fc-daygrid-day {
            position: relative;
        }

        .fc-daygrid-day .am-pm-buttons {
            position: absolute;
            bottom: 5px;
            left: 5px;
            right: 5px;
            display: flex;
            justify-content: space-between;
        }

        .fc-daygrid-day .am-pm-buttons button {
            width: 100%;
            height: auto;
            font-size: 12px;
            padding: 2px 4px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-footer {
            display: flex;
            justify-content: space-between;
        }

        .chat-window {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container d-flex justify-content-between align-items-center">
            <form class="form-inline mx-4">
                <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Search for products">
                    <div class="input-group-append">
                        <button class="btn btn-search" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="navbar-icons">
                <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i><span class="cart-count">0</span></a>
            </div>
        </div>
    </nav>
    <!-- Bottom Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                                    <a class="nav-link" href="About.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="BookingAppointment.php">Booking Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id='calendar'></div>

    <div class="modal fade" id="preferredTimeModal" tabindex="-1" role="dialog" aria-labelledby="preferredTimeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="preferredTimeModalLabel">Book Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="bookingForm">
                        <div class="form-group">
                            <label for="selected-date">Selected Date</label>
                            <input type="text" class="form-control" id="selected-date" name="selected_date" readonly>
                        </div>
                        <div class="form-group">
                            <label for="preferred-time">Preferred Time</label>
                            <select class="form-control" id="preferred-time" name="preferred_time" required></select>
                        </div>
                        <div class="form-group">
                            <label for="service-category">Service Category</label>
                            <select class="form-control" id="service-category" name="service_category" required>
                                <option value="">Select Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service">Service</label>
                            <select class="form-control" id="service" name="service" required>
                                <option value="">Select Service</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" class="form-control" id="first-name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="middle-name">Middle Name</label>
                            <input type="text" class="form-control" id="middle-name" name="middle_name">
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" class="form-control" id="last-name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="complete-address">Complete Address</label>
                            <input type="text" class="form-control" id="complete-address" name="complete_address" required>
                        </div>
                        <div class="form-group">
                            <label for="unit-no">Unit No./House No./Building</label>
                            <input type="text" class="form-control" id="unit-no" name="unit_no">
                        </div>
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                        <div class="form-group">
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control" id="barangay" name="barangay" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province" required>
                        </div>
                        <div class="form-group">
                            <label for="zip-code">Zip Code</label>
                            <input type="text" class="form-control" id="zip-code" name="zip_code" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile/Phone No.</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveBookingButton">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Reference Code Modal -->
    <div class="modal fade" id="referenceCodeModal" tabindex="-1" role="dialog" aria-labelledby="referenceCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="referenceCodeModalLabel">Enter Reference Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="referenceCodeForm">
                        <div class="form-group">
                            <label for="reference-code">Reference Code</label>
                            <input type="text" class="form-control" id="reference-code" name="reference-code" required>
                        </div>
                        <button type="button" class="btn btn-primary" id="submitReferenceCodeButton">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Icon -->
    <div class="chat-icon" onclick="toggleChat()">
        <i class="fas fa-comments"></i>
    </div>

    <!-- Chat Window -->
    <div class="chat-window" id="chat-window">
        <div class="chat-header">Chat with us</div>
        <div class="chat-body" id="chat-body">
            <!-- Example messages -->
            <div class="chat-message chat-message-received">
                Hello! How can I help you today?
            </div>
            <div class="chat-message chat-message-sent">
                Hi, I'd like to inquire about booking an appointment.
            </div>
        </div>
        <div class="chat-footer">
            <input type="text" id="chat-input" placeholder="Type a message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-column">
                    <h5>OFFICE ADDRESS</h5>
                    <p>1665 Ilang Ilang St. <br>
                        Bgry 174,<br>
                        Caloocan, Philippines</p>
                    <p>
                        Telephone: <br>
                        + (63) 917 - 5695 - 469<br>
                        Ecommerce Team:<br>
                        Mon-Sun 8:00am-5:00pm, excluding holidays
                    </p>
                </div>
                <div class="col-md-3 footer-column">
                    <h5>CUSTOMER CARE</h5>
                    <ul>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Payment Policy</a></li>
                        <li><a href="#">Shipping & Delivery Policy</a></li>
                        <li><a href="#">Return, Exchange, Cancellation & Refund Policy</a></li>
                    </ul>
                </div>

                <div class="col-md-3 footer-column">
                    <h5>NEWSLETTER</h5>
                    <p>Receive our latest news, product launches & exclusive offers. T&Cs Apply</p>
                    <div class="newsletter">
                        <input type="email" placeholder="Your email">
                        <button>Subscribe</button>
                    </div>
                    <div class="social-icons" style="margin-top: 30px;">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                © 2024 AV MOTO Philippines.
            </div>
        </div>
    </footer>

    <script src="libs/moment/moment.min.js"></script>
    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/fullcalendar/main.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var services = {
            'front-suspension': ['Small bike front suspension tuning', 'Big bike front suspension tuning'],
            'steering': ['Ball race replacement', 'Steering alignment'],
            'cvt': ['Cleaning', 'Tuning', 'Upgrades', 'Gearbox Bearing Replacement'],
            'wheels': ['Installation', 'Static Balance', 'Computerized Balance'],
            'rear-shock': ['Installation', 'Tuning', 'Repair'],
            'suspension-profiling': ['Big bike', 'Small bike', 'Vespa'],
            'breaking-system': ['Cleaning and Bleeding'],
            'electrical': ['Horn and Aux light']
        };

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    showPreferredTimeModal('AM', info.dateStr); // Pass 'AM' by default or modify as needed
                },
                dayCellDidMount: function(info) {
                    var amButton = document.createElement('button');
                    var pmButton = document.createElement('button');

                    // Format date to YYYY-MM-DD
                    var date = info.date;
                    var formattedDate = date.getFullYear() + '-' +
                        ('0' + (date.getMonth() + 1)).slice(-2) + '-' +
                        ('0' + date.getDate()).slice(-2);

                    // Fetch AM slots
                    fetch(`load_slots.php?date=${formattedDate}&period=AM`)
                        .then(response => response.json())
                        .then(data => {
                            amButton.innerHTML = `AM<br><span>${data.slots_remaining} Slots</span>`;
                            amButton.className = 'btn btn-primary btn-sm';
                            amButton.style.marginRight = '5px';
                            amButton.addEventListener('click', function(event) {
                                event.stopPropagation();
                                showPreferredTimeModal('AM', formattedDate);
                            });
                        })
                        .catch(error => console.error('Error fetching AM slots:', error));

                    // Fetch PM slots
                    fetch(`load_slots.php?date=${formattedDate}&period=PM`)
                        .then(response => response.json())
                        .then(data => {
                            pmButton.innerHTML = `PM<br><span>${data.slots_remaining} Slots</span>`;
                            pmButton.className = 'btn btn-primary btn-sm';
                            pmButton.addEventListener('click', function(event) {
                                event.stopPropagation();
                                showPreferredTimeModal('PM', formattedDate);
                            });
                        })
                        .catch(error => console.error('Error fetching PM slots:', error));

                    var buttonContainer = document.createElement('div');
                    buttonContainer.className = 'am-pm-buttons';
                    buttonContainer.appendChild(amButton);
                    buttonContainer.appendChild(pmButton);

                    info.el.appendChild(buttonContainer);
                }
            });

            calendar.render();

            // Populate service categories
            var serviceCategorySelect = document.getElementById('service-category');
            Object.keys(services).forEach(function(category) {
                var option = document.createElement('option');
                option.value = category;
                option.text = category.replace(/-/g, ' ');
                serviceCategorySelect.appendChild(option);
            });

            serviceCategorySelect.addEventListener('change', function() {
                var serviceSelect = document.getElementById('service');
                serviceSelect.innerHTML = '<option value="">Select Service</option>';
                var selectedCategory = this.value;
                if (selectedCategory && services[selectedCategory]) {
                    services[selectedCategory].forEach(function(service) {
                        var option = document.createElement('option');
                        option.value = service;
                        option.text = service;
                        serviceSelect.appendChild(option);
                    });
                }
            });
        });

        function showPreferredTimeModal(period, date) {
            var timeSelect = document.getElementById('preferred-time');
            timeSelect.innerHTML = ''; // Clear existing options

            var times = period === 'AM' ? ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM'] : ['12:00 PM', '1:00 PM', '2:00 PM', '3:00 PM', '4:00 PM', '5:00 PM'];

            // Make sure date is a string and handle accordingly
            fetch(`load_slots.php?date=${date}&period=${period}`)
                .then(response => response.json())
                .then(data => {
                    if (data.slots_remaining > 0) {
                        times.forEach(function(time) {
                            var option = document.createElement('option');
                            option.value = time;
                            option.text = time;
                            timeSelect.appendChild(option);
                        });
                        document.getElementById('selected-date').value = date; // Set the selected date
                        $('#preferredTimeModal').modal('show');
                    } else {
                        alert(`No slots available for ${period} on ${date}`);
                    }
                })
                .catch(error => console.error('Error fetching slots:', error));
        }

        document.getElementById('saveBookingButton').addEventListener('click', function() {
            var formData = new FormData(document.getElementById('bookingForm'));
            var selectedTime = document.getElementById('preferred-time').value;
            if (selectedTime) {
                formData.append('preferred_time', selectedTime);
                checkReferenceCode(formData);
            } else {
                alert('Please select a preferred time.');
            }
        });

        function checkReferenceCode(formData) {
            $.ajax({
                url: 'save_booking.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.includes('Error:') || response.includes('Invalid reference code')) {
                        // Display an error message and keep the modal open
                        alert('Please try again, wrong reference code.');
                    } else {
                        // Hide the modal and proceed to the next step
                        $('#referenceCodeModal').modal('show');
                    }
                },
                error: function() {
                    alert('An error occurred while sending the reference code.');
                }
            });
        }


        document.getElementById('submitReferenceCodeButton').addEventListener('click', function() {
            var refCode = document.getElementById('reference-code').value;
            if (refCode) {
                var formData = new FormData(document.getElementById('bookingForm'));
                formData.append('reference_code', refCode);
                saveBooking(formData);
                $('#referenceCodeModal').modal('hide');
            } else {
                alert('Please enter the reference code.');
            }
        });

        function saveBooking(formData) {
            $.ajax({
                url: 'send_verification.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.includes('Invalid reference code')) {
                        // Display an error message and keep the modal open
                        alert('Please try again, wrong reference code.');
                    } else {
                       
                        $('#preferredTimeModal').modal('hide');
                        window.location.reload(); // Reload the page
                    }
                },
                error: function() {
                    alert('An error occurred while saving the booking.');
                }
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to update the cart count
            function updateCartCount() {
                fetch('Partials/get_cart_count.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.cart_count !== undefined) {
                            document.querySelector('.cart-count').textContent = data.cart_count;
                        }
                    })
                    .catch(error => console.error('Error fetching cart count:', error));
            }

            // Update cart count initially
            updateCartCount();


        });
    </script>

</body>

</html>