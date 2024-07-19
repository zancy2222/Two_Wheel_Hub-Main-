<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <style>
    body {
      font-family: 'League Spartan', sans-serif;
    }
        .booking-form {
            background-color: var(--light-grey-color);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .booking-form .form-group label {
            font-weight: bold;
        }
        .booking-form .form-group select,
        .booking-form .form-group input,
        .booking-form .form-group textarea {
            border: 1px solid var(--grey-color);
            border-radius: 5px;
            padding: 5px;
        }
        .booking-form .btn {
            background-color: var(--primary-color);
            color: var(--white-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .booking-form .btn:hover {
            background-color: var(--secondary-color);
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
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
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

    <!-- Booking Appointment Form -->
    <div class="container mt-5">
        <h2 class="text-center">Book an Appointment</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
            <form class="booking-form" action="partials/process_guest_booking.php" method="post">
            <div class="form-group">
                <label for="service-category">Service Category</label>
                <select class="form-control" id="service-category" name="service_category" required>
                    <option value="">Select a category</option>
                    <option value="front-suspension">Front Suspension</option>
                    <option value="steering">Steering</option>
                    <option value="cvt">CVT</option>
                    <option value="wheels">Wheels</option>
                    <option value="rear-shock">Rear Shock</option>
                    <option value="suspension-profiling">Suspension Profiling</option>
                    <option value="breaking-system">Breaking System</option>
                    <option value="electrical">Electrical</option>
                </select>
            </div>
            <div class="form-group">
                <label for="service">Service</label>
                <select class="form-control" id="service" name="service" required>
                    <option value="">Select a service</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Preferred Date</label>
                <input type="date" class="form-control" id="date" name="preferred_date" required>
            </div>
            <div class="form-group">
                <label for="time">Preferred Time</label>
                <input type="time" class="form-control" id="time" name="preferred_time" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email_address" required>
            </div>
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" class="form-control" id="first-name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle-name">Middle Name</label>
                <input type="text" class="form-control" id="middle-name">
            </div>
            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" class="form-control" id="last-name" name="last_name" required>
            </div>
           <!-- Other fields omitted for brevity -->
    <div class="form-group">
        <label for="address">Complete Address</label>
        <input type="text" class="form-control" id="unit-no" name="unit_no_house_no_building" placeholder="Unit No./House No./Building" required>
        <input type="text" class="form-control mt-2" id="street" name="street" placeholder="Street" required>
        <input type="text" class="form-control mt-2" id="barangay" name="barangay" placeholder="Barangay" required>
        <input type="text" class="form-control mt-2" id="city" name="city" placeholder="City" required>
        <input type="text" class="form-control mt-2" id="province" name="province" placeholder="Province" required>
        <input type="text" class="form-control mt-2" id="zip-code" name="zip_code" placeholder="Zip Code" required>
    </div>
    <div class="form-group">
        <label for="phone">Mobile/Phone No.</label>
        <input type="tel" class="form-control" id="phone" name="mobile_phone_no" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Book Now</button>
        </form>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('service-category').addEventListener('change', function() {
            var category = this.value;
            var serviceSelect = document.getElementById('service');
            serviceSelect.innerHTML = ''; // Clear previous options

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

            if (services[category]) {
                services[category].forEach(function(service) {
                    var option = document.createElement('option');
                    option.value = service.toLowerCase().replace(/ /g, '-');
                    option.text = service;
                    serviceSelect.appendChild(option);
                });
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
