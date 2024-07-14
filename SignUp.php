<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - E-commerce Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .signup-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: var(--light-grey-color);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: var(--primary-color);
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

        .benefits-section {
            margin-top: 50px;
            text-align: center;
        }

        .benefits-section h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .benefit-item {
            margin-bottom: 20px;
        }

        .benefit-item i {
            font-size: 2rem;
            color: var(--secondary-color);
        }

        .benefit-item p {
            margin-top: 10px;
            color: var(--black-color);
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
                        <a class="nav-link active" href="SignUp.php">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sign Up Form -->
    <div class="container signup-container">
        <h2>Create Your Account</h2>
        <form action="partials/reg_process.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
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
                <input type="tel" class="form-control" id="phone" name="mobile_phone_no" placeholder="Enter your mobile/phone number" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create Account</button>
        </form>

        <!-- Benefits Section -->
        <div class="benefits-section">
            <h3>Why Create an Account?</h3>
            <div class="row">
                <div class="col-md-4 benefit-item">
                    <i class="fas fa-truck"></i>
                    <p>Fast and Free Shipping</p>
                </div>
                <div class="col-md-4 benefit-item">
                    <i class="fas fa-bell"></i>
                    <p>Exclusive Promotions</p>
                </div>
                <div class="col-md-4 benefit-item">
                    <i class="fas fa-heart"></i>
                    <p>Personalized Recommendations</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-column">
                    <h5>OFFICE ADDRESS</h5>
                    <p>Unit B, 2/F Topy II Building,<br>
                       No.3 Economia St.,<br>
                       Bagumbayan, Quezon City</p>
                    <p>
                        Telephone: <br>
                        + (632) 8470-4745 (loc: 162 or 168)<br>
                        + (632) 8470-4746 (loc: 162 or 168)<br>
                        Ecommerce Team:<br>
                        Mon-Fri 8:00am-4:00pm, excluding holidays
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
                    <h5>QUICK LINKS</h5>
                    <ul>
                        <li><a href="#">Motorcycle</a></li>
                        <li><a href="#">Bicycle</a></li>
                        <li><a href="#">SALE</a></li>
                        <li><a href="#">Stores</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">BE A DEALER</a></li>
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
