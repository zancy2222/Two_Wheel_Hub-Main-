<?php
session_start();
include 'partials/db_conn.php';

$sessionId = session_id();

$sql = "SELECT p.product_name, p.description, p.category, p.product_image, p.price, pu.size, pu.color, pu.quantity
        FROM purchased pu
        JOIN products p ON pu.product_id = p.id
        WHERE pu.session_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $sessionId);
$stmt->execute();
$result = $stmt->get_result();
$purchasedItems = [];
$totalPrice = 0;

while ($row = $result->fetch_assoc()) {
    $purchasedItems[] = $row;
    $totalPrice += $row['price'] * $row['quantity'];
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <style>
        body {
            /* Background image example */
            background-image: url('img/AV\ Moto\ Logo.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'League Spartan', sans-serif;
            /* Background color example */
            /* background-color: #f0f0f0; */
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

        /* Cart table styles */
        .cart-table th,
        .cart-table td {
            vertical-align: middle;
            text-align: center;
            background-color: #009DDF;
        }

        .cart-table img {
            width: 50px;
            height: auto;
        }

        .cart-total {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        /* Checkout form styles */
        #checkout-form .form-group {
            margin-bottom: 1.5rem;

        }

        #checkout-form .form-control {
            border-radius: 0;
            box-shadow: none;

            border: 1px solid var(--grey-color);
        }

        #checkout-form .form-check-label {
            margin-left: 0.5rem;
        }

        #checkout-form button {
            background-color: var(--primary-color);
            color: var(--white-color);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color var(--transition-speed);
        }

        #checkout-form button:hover {
            background-color: var(--secondary-color);
        }

        /* Enhanced styles for better UI */
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #d0d1d4;

        }

        .card img {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
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
                        <a class="nav-link active" href="Shop.php">Shop</a>
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
                        <a class="nav-link" href="BookingAppointment.php">Booking Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Accounts.php">Accounts</a>
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
            <!-- Cart Section -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2>Shopping Cart</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered cart-table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="purchased-items">
                                    <?php foreach ($purchasedItems as $item) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                            <td><?php echo htmlspecialchars($item['description']); ?></td>
                                            <td><?php echo htmlspecialchars($item['category']); ?></td>
                                            <td><?php echo htmlspecialchars($item['size']); ?></td>
                                            <td><?php echo htmlspecialchars($item['color']); ?></td>
                                            <td>₱<?php echo htmlspecialchars($item['price']); ?></td>
                                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                            <td>₱<?php echo htmlspecialchars($item['price'] * $item['quantity']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <h4>Total: ₱<span id="purchased-total" class="purchased-total"><?php echo number_format($totalPrice, 2); ?></span></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkout Section -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2>Checkout</h2>
                        <form id="checkout-form" action="partials/process_checkout.php" method="POST">
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label>Delivery Option</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="deliveryOption" id="ship" value="Ship" checked>
            <label class="form-check-label" for="ship">Ship</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="deliveryOption" id="pickUp" value="Pick Up">
            <label class="form-check-label" for="pickUp">Pick Up</label>
        </div>
    </div>
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" required>
    </div>
    <div class="form-group">
        <label for="middleName">Middle Name</label>
        <input type="text" class="form-control" id="middleName" name="middleName">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" required>
    </div>
    <div class="form-group">
        <label for="address">Complete Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Unit No./House No./Building" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="street" name="street" placeholder="Street" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Barangay" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="province" name="province" placeholder="Province" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Zip Code" required>
    </div>
    <div class="form-group">
        <label for="phone">Mobile/Phone No.</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label>Payment Options</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paymentOption" id="cod" value="COD" checked>
            <label class="form-check-label" for="cod">COD (Cash-on-Delivery)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paymentOption" id="counter" value="Counter">
            <label class="form-check-label" for="counter">Payment at the Counter (For Pick Up Only)</label>
        </div>
    </div>
    <input type="hidden" name="totalPrice" value="<?php echo htmlspecialchars($totalPrice); ?>">

    <button type="submit" class="btn btn-primary btn-block">Buy Now</button>
</form>

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