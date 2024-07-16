<?php
include 'partials/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
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
        .category-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .category-img {
            height: 250px;
            object-fit: cover;
        }

        .category-card-body {
            padding: 20px;
            background-color: var(--white-color);
        }

        .category-card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .category-card-btn {
            background-color: var(--primary-color);
            color: var(--white-color);
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color var(--transition-speed);
        }

        .category-card-btn:hover {
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
                        <a class="nav-link active" href="ShopMain.php">Shop</a>
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
                        <a class="nav-link" href="BookingAppointmentMain.php">Booking Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card category-card">
                    <img src="img/Oils.jpg" class="card-img-top category-img" alt="Suspension Oils">
                    <div class="card-body category-card-body">
                        <h5 class="card-title category-card-title">Suspension Oils</h5>
                        <a href="SuspensionOilsMain.php" class="btn category-card-btn">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card category-card">
                    <img src="img/shock.jpg" class="card-img-top category-img" alt="Rear Shock">
                    <div class="card-body category-card-body">
                        <h5 class="card-title category-card-title">Rear Shock</h5>
                        <a href="RearShockMain.php" class="btn category-card-btn">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card category-card">
                    <img src="img/accsrs.jpg" class="card-img-top category-img" alt="Accessories">
                    <div class="card-body category-card-body">
                        <h5 class="card-title category-card-title">Accessories</h5>
                        <a href="AccessoriesMain.php" class="btn category-card-btn">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card category-card">
                    <img src="img/tires.jpg" class="card-img-top category-img" alt="Tires">
                    <div class="card-body category-card-body">
                        <h5 class="card-title category-card-title">Tires</h5>
                        <a href="TiresMain.php" class="btn category-card-btn">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card category-card">
                    <img src="img/others.jpg" class="card-img-top category-img" alt="Others">
                    <div class="card-body category-card-body">
                        <h5 class="card-title category-card-title">Others</h5>
                        <a href="OthersMain.php" class="btn category-card-btn">View</a>
                    </div>
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