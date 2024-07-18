<?php
include 'partials/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <style>
        @font-face {
    font-family: 'League Spartan';
    src: url('League_Spartan/static/LeagueSpartan-Regular.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
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
        .booking-form .form-group input {
            border: 1px solid var(--grey-color);
            border-radius: 5px;
            padding: 10px;
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
                        <a class="nav-link" href="HomeMain.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="ShopMain.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ContactMain.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="BookingAppointmentMain.php">Booking Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Accounts.php">Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Log out</a>
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
            <form class="booking-form" action="partials/process_booking.php" method="post">
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
            <button type="submit" class="btn btn-primary btn-block">Reserve</button>
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
                'front-suspension': ['Standard front suspension tuning', 'Link-type front suspension tuning'],
                'steering': ['Steering Overhaul', 'Big bike steering Overhaul'],
                'cvt': ['Small bike CVT Tune up', 'Big bike CVT Tune up', 'Small bike CVT Drivetrain Overhaul', 'Big bike CVT Drivetrain Overhaul'],
                'wheels': ['Small bike wheel set and tune', 'Big bike wheel set and tune'],
                'rear-shock': ['Small bike Rear shock tune up', 'Big bike Rear shock tune up'],
                'suspension-profiling': ['Suspension profiling - New', 'Suspension profiling - Existing'],
                'breaking-system': ['Small bike Break Overhaul', 'Big bike Break Overhaul'],
                'electrical': ['Electrical Trouble shooting', 'Big bike Electrical Trouble shooting']
            };

            if (services[category]) {
                services[category].forEach(function(service) {
                    var option = document.createElement('option');
                    option.value = service.toLowerCase().replace(/\s+/g, '-');
                    option.textContent = service;
                    serviceSelect.appendChild(option);
                });
            }
        });

        function toggleChat() {
            var chatWindow = document.getElementById('chat-window');
            if (chatWindow.style.display === 'none' || chatWindow.style.display === '') {
                chatWindow.style.display = 'block';
            } else {
                chatWindow.style.display = 'none';
            }
        }

        function sendMessage() {
            var chatBody = document.getElementById('chat-body');
            var chatInput = document.getElementById('chat-input');
            var message = chatInput.value.trim();
            if (message) {
                var messageDiv = document.createElement('div');
                messageDiv.textContent = message;
                messageDiv.className = 'chat-message chat-message-sent';
                chatBody.appendChild(messageDiv);
                chatInput.value = '';
                chatBody.scrollTop = chatBody.scrollHeight; // Scroll to the bottom
            }
        }
    </script>
</body>
</html>
