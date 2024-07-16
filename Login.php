<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-commerce Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
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
        .login-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background-color: var(--light-grey-color);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-container .row {
            align-items: center;
        }

        .login-container img {
            max-width: 100%;
            border-radius: 10px;
        }

        .login-container h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group label {
            font-weight: bold;
            color: var(--black-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            transition: background-color var(--transition-speed);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .form-control {
            border-radius: 5px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            color: var(--secondary-color);
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
                        <a class="nav-link" href="#">Shop</a>
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
                        <a class="nav-link" href="BookingAppointment.php">Booking Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="Login.php">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6">
                <img src="img/AV Moto Logo.png" alt="Login Image">
            </div>
            <div class="col-md-6">
                <h2>Welcome Back!</h2>
                <form action="partials/login_process.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
                <div class="login-link">
                    <p>Don't have an account? <a href="SignUp.php">Sign Up</a></p>
                </div>
            </div>
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
