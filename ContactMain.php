<?php
include 'partials/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <style>
        body {
            font-family: 'League Spartan', sans-serif;
        }

        .contact-info p {
            font-size: 1.1rem;
            color: var(--secondary-color);
        }

        .contact-info i {
            margin-right: 10px;
            color: var(--secondary-color);
        }

        .map-container {
            margin-top: 20px;
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            overflow: hidden;
        }

        .card h2 {
            color: var(--secondary-color);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: #7AB2B2;
            border-color: #7AB2B2;
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
                        <a class="nav-link" href="ShopMain.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="ContactMain.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="AboutMain.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogMain.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="BookingAppointmentMain.php">Booking Appointment</a>
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

    <!-- Contact Section -->
    <main class="container mt-5">
        <h1 class="text-center mb-4">Contact Us</h1>
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-6 mb-4">
                <div class="card p-4">
                    <h2>Get in Touch</h2>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="col-md-6 mb-4">
                <div class="card p-4">
                    <h2>Contact Information</h2>
                    <p><i class="bi bi-geo-alt-fill"></i> Address: 1665 Ilang Ilang St. Bgry 174, Caloocan, Philippines</p>
                    <p><i class="bi bi-telephone-fill"></i> Phone: + (63) 917 - 5695 - 469</p>
                    <p><i class="bi bi-envelope-fill"></i> Email: info@avmototuning.com</p>
                    <p><i class="bi bi-clock-fill"></i> Business Hours: Mon - Sun, 8:00 AM - 5:00 PM</p>
                    <div class="map-container" style="height: 300px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3111.547325087034!2d-77.03687078467502!3d38.89767607957079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b7b82373aef7%3A0x42948dc587b01e93!2sWhite%20House!5e0!3m2!1sen!2sus!4v1620051321269!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to update the cart count
            function updateCartCount() {
                fetch('Partials/Main_get_cart_count.php')
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