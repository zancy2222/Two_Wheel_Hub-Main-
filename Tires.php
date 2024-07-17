<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tires - Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        :root {
            --primary-color: #004AAD;
            --secondary-color: #009DDF;
            --danger-color: #D9534F;
            --white-color: #FFFFFF;
            --grey-color: #737476;
            --light-grey-color: #F8F9FA;
            --black-color: #000000;
            --font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            --transition-speed: 0.3s;
        }

        .navbar-light.bg-white {
            background-color: var(--white-color);
            border-bottom: 1px solid var(--grey-color);
        }

        .navbar-light .navbar-nav .nav-link {
            color: var(--black-color);
            font-weight: bold;
            padding: 0.5rem 1rem;
            transition: color 0.3s;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: var(--secondary-color);
        }

        .form-inline .input-group .form-control {
            border: 1px solid var(--grey-color);
            border-radius: 20px 0 0 20px;
            padding: 0.5rem 1rem;
        }

        .form-inline .input-group .btn-search {
            border-radius: 0 20px 20px 0;
            border: 1px solid var(--grey-color);
            background-color: var(--grey-color);
            color: var(--white-color);
        }

        .navbar-icons .nav-link {
            color: var(--secondary-color);
            font-size: 1.5rem;
            margin-left: 15px;
            transition: color 0.3s;
            position: relative;
        }

        .navbar-icons .nav-link .cart-count {
            position: absolute;
            top: -1px;
            right: -10px;
            background-color: var(--danger-color);
            color: var(--white-color);
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.8rem;
        }

        .navbar-icons .nav-link:hover {
            color: var(--primary-color);
        }

        .navbar-light.bg-light {
            background-color: var(--white-color);
            border-bottom: 1px solid var(--grey-color);
        }

        .navbar-light .navbar-nav .nav-link.active {
            color: var(--primary-color);
        }

        .navbar-light .navbar-nav .nav-link {
            color: var(--black-color);
            font-weight: bold;
            padding: 0.5rem 1rem;
            transition: color 0.3s;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: var(--secondary-color);
        }

        .navbar .navbar-nav {
            font-size: 1rem;
        }

        .navbar .form-inline {
            flex-grow: 1;
        }

        .navbar .input-group {
            width: 100%;
        }

        .container.mt-5 .btn:hover {
            background-color: var(--secondary-color);
        }

        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .product-card-body {
            padding: 20px;
            background-color: var(--white-color);
        }

        .product-card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-card-description {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .product-card-info {
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .product-card-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .product-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .btn-add-to-cart,
        .btn-buy {
            width: calc(50% - 5px);
            padding: 10px;
            border: none;
            color: var(--white-color);
            border-radius: 5px;
            cursor: pointer;
            transition: background-color var(--transition-speed);
        }

        .btn-add-to-cart {
            background-color: var(--primary-color);
        }

        .btn-buy {
            background-color: var(--secondary-color);
        }

        .btn-add-to-cart:hover,
        .btn-buy:hover {
            opacity: 0.9;
        }

        .footer {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 40px 0;
        }

        .footer .footer-column {
            margin-bottom: 30px;
        }

        .footer .footer-column h5 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer .footer-column ul li a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .footer .footer-column ul li a:hover {
            text-decoration: underline;
        }

        .footer .footer-column .social-icons a {
            font-size: 20px;
            margin-right: 15px;
            color: var(--primary-color);
            text-decoration: none;
        }

        .footer .footer-column .social-icons a:hover {
            color: #dddddd;
        }

        .footer .newsletter input[type="email"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .footer .newsletter button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: var(--primary-color);
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .footer .newsletter button:hover {
            background-color: #555555;
        }

        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid var(--primary-color);
            margin-top: 20px;
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
                <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i><span class="cart-count">0</span></a>
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
                        <a class="nav-link active" href="Shop.php">Shop</a>
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
                        <a class="nav-link" href="Login.php">Log in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/400x200?text=Product+1" class="card-img-top product-img" alt="Product 1">
                    <div class="card-body product-card-body">
                        <h5 class="card-title product-card-title">Product 1</h5>
                        <p class="card-text product-card-description">This is a short description of Product 1.</p>
                        <p class="card-text product-card-info">Category: Tires</p>
                        <p class="card-text product-card-info">Size: 1L</p>
                        <p class="card-text product-card-info">Color: Transparent</p>
                        <p class="card-text product-card-price">₱19.99</p>
                        <div class="product-buttons">
                            <button class="btn btn-add-to-cart">Add to Cart</button>
                            <button class="btn btn-buy">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/400x200?text=Product+2" class="card-img-top product-img" alt="Product2">
                    <div class="card-body product-card-body">
                        <h5 class="card-title product-card-title">Product 2</h5>
                        <p class="card-text product-card-description">This is a short description of Product 2.</p>
                        <p class="card-text product-card-info">Category: Tires</p>
                        <p class="card-text product-card-info">Size: 1L</p>
                        <p class="card-text product-card-info">Color: Transparent</p>
                        <p class="card-text product-card-price">₱19.99</p>
                        <div class="product-buttons">
                            <button class="btn btn-add-to-cart">Add to Cart</button>
                            <button class="btn btn-buy">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/400x200?text=Product+3" class="card-img-top product-img" alt="Product 3">
                    <div class="card-body product-card-body">
                        <h5 class="card-title product-card-title">Product 3</h5>
                        <p class="card-text product-card-description">This is a short description of Product 3.</p>
                        <p class="card-text product-card-info">Category: Tires</p>
                        <p class="card-text product-card-info">Size: 1L</p>
                        <p class="card-text product-card-info">Color: Transparent</p>
                        <p class="card-text product-card-price">₱19.99</p>
                        <div class="product-buttons">
                            <button class="btn btn-add-to-cart">Add to Cart</button>
                            <button class="btn btn-buy">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/400x200?text=Product+1" class="card-img-top product-img" alt="Product 1">
                    <div class="card-body product-card-body">
                        <h5 class="card-title product-card-title">Product 1</h5>
                        <p class="card-text product-card-description">This is a short description of Product 1.</p>
                        <p class="card-text product-card-info">Category: Tires</p>
                        <p class="card-text product-card-info">Size: 1L</p>
                        <p class="card-text product-card-info">Color: Transparent</p>
                        <p class="card-text product-card-price">₱19.99</p>
                        <div class="product-buttons">
                            <button class="btn btn-add-to-cart">Add to Cart</button>
                            <button class="btn btn-buy">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/400x200?text=Product+2" class="card-img-top product-img" alt="Product2">
                    <div class="card-body product-card-body">
                        <h5 class="card-title product-card-title">Product 2</h5>
                        <p class="card-text product-card-description">This is a short description of Product 2.</p>
                        <p class="card-text product-card-info">Category: Tires</p>
                        <p class="card-text product-card-info">Size: 1L</p>
                        <p class="card-text product-card-info">Color: Transparent</p>
                        <p class="card-text product-card-price">₱19.99</p>
                        <div class="product-buttons">
                            <button class="btn btn-add-to-cart">Add to Cart</button>
                            <button class="btn btn-buy">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/400x200?text=Product+3" class="card-img-top product-img" alt="Product 3">
                    <div class="card-body product-card-body">
                        <h5 class="card-title product-card-title">Product 3</h5>
                        <p class="card-text product-card-description">This is a short description of Product 3.</p>
                        <p class="card-text product-card-info">Category: Tires</p>
                        <p class="card-text product-card-info">Size: 1L</p>
                        <p class="card-text product-card-info">Color: Transparent</p>
                        <p class="card-text product-card-price">₱19.99</p>
                        <div class="product-buttons">
                            <button class="btn btn-add-to-cart">Add to Cart</button>
                            <button class="btn btn-buy">Buy Now</button>
                        </div>
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


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="script.js"></script>
</body>
</html>
