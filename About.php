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
            --primary-color: #004AAD;
            --secondary-color: #009DDF;
            --danger-color: #D9534F;
            --white-color: #FFFFFF;
            --grey-color: #737476;
            --light-grey-color: #F8F9FA;
            --black-color: #000000;
            font-family: 'League Spartan', sans-serif;
        }

        .about-section {
            padding: 60px 0;
            background-color: var(--light-grey-color);
            text-align: center;
        }

        .about-section h2 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: var(--primary-color);
        }

        .about-section p {
            font-size: 1.1rem;
            margin-bottom: 20px;
            color: var(--grey-color);
        }

        .about-section .icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .about-section .motto {
            font-size: 1.3rem;
            font-weight: 700;
            margin-top: 40px;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
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
        <div class="navbar-icons d-flex align-items-center">
            <a class="nav-link" href="cart.php">
                <i class="fa fa-shopping-cart"></i><span class="cart-count">0</span>
            </a>
            <div class="nav-item dropdown ml-3">
                <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="login.php">
                        <i class="fa fa-sign-in-alt"></i> Login
                    </a>
                    <a class="dropdown-item" href="SignUp.php">
                        <i class="fa fa-user-plus"></i> Register
                    </a>
                </div>
            </div>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="About.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="BookingAppointment.php">Booking Appointment</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
  <!-- About Us Content -->
  <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fas fa-bullseye icon"></i>
                    <h2>Vision</h2>
                    <p>To become top of mind and world-class company that provides premium products and excellent services.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-flag icon"></i>
                    <h2>Mission</h2>
                    <p>To focus on services that are crafted with excellence which promote confidence, safety and motorcycle reliability. Ensuring everyone has a safe, reliable and worry-free ride.</p>
                </div>
                <div class="col-md-4">
                    <i class="fas fa-heart icon"></i>
                    <h2>Motto</h2>
                    <p>Your ride is our masterpiece<br>Your safety is our passion</p>
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
</body>
</html>
