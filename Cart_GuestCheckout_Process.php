<?php
session_start();
include 'partials/db_conn.php';

if (!isset($_SESSION['guest_id'])) {
    echo "No products found for checkout.";
    exit();
}

$session_id = $_SESSION['guest_id'];

// Fetch bought products from the session
$query_bought = "SELECT p.image, p.description, g.quantity, g.price, p.id AS product_id
                 FROM GuestBuyedProducts g
                 JOIN products p ON g.product_id = p.id
                 WHERE g.session_id = ?";

$stmt_bought = $conn->prepare($query_bought);
$stmt_bought->bind_param("s", $session_id);
$stmt_bought->execute();
$result_bought = $stmt_bought->get_result();

$total = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <style>
          body {
        font-family: 'League Spartan', sans-serif;
    }

    .checkout-container {
        margin: 20px auto;
        max-width: 1200px;
        padding: 0 15px;
    }

    .order-summary img {
        width: 80px;
        height: auto;
        object-fit: contain;
        margin-right: 10px;
    }

    .order-summary h6 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .order-summary .item-info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        justify-content: space-between;
    }

    .order-summary .item-info div {
        flex-grow: 1;
        margin-right: 10px;
    }

    .order-summary .item-info span:last-child {
        font-weight: 700;
        font-size: 16px;
    }

    .order-summary {
        border: 1px solid #ddd;
        padding: 20px;
        background-color: #f9f9f9;
    }

    .order-summary .total-section {
        display: flex;
        justify-content: space-between;
        font-size: 18px;
        font-weight: 700;
    }

    .checkout-container .pay-now-btn {
        background-color: #007bff;
        color: #fff;
        font-weight: 700;
        border-radius: 5px;
        padding: 10px 15px;
        text-align: center;
        display: inline-block;
    }

    .pay-now-btn:hover {
        background-color: #0056b3;
    }

    .payment-options img {
        width: 50px;
        margin-left: 10px;
    }

    .btn-remove {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        border-radius: 4px;
    }

    .btn-remove:hover {
        background-color: #d32f2f;
    }

    @media (max-width: 768px) {
        .order-summary img {
            width: 60px;
        }

        .order-summary h6 {
            font-size: 16px;
        }

        .order-summary .item-info {
            flex-direction: column;
            align-items: flex-start;
        }

        .order-summary .item-info span:last-child {
            margin-top: 5px;
        }

        .checkout-container {
            padding: 0 10px;
        }
    }

    @media (max-width: 576px) {
        .order-summary h6 {
            font-size: 14px;
        }

        .order-summary img {
            width: 50px;
        }

        .checkout-container .pay-now-btn {
            width: 100%;
            text-align: center;
        }
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

                </ul>
            </div>
        </div>
    </nav>

<div class="checkout-container">
    <div class="row">
        <div class="col-md-7">
            <!-- Delivery Information -->
            <div class="delivery-info">
                <h5>Contact</h5>
                <input type="email" class="form-control" placeholder="Email" required>

                <h5 class="mt-4">Delivery</h5>
                <div class="form-group">
                    <label for="country">Country/Region</label>
                    <select id="country" class="form-control">
                        <option>Philippines</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" placeholder="City">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="postalCode">Postal code</label>
                        <input type="text" class="form-control" id="postalCode" placeholder="Postal code">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="region">Region</label>
                        <input type="text" class="form-control" id="region" placeholder="Region">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="Phone">
                    </div>
                </div>
            </div>

            <!-- Payment Options -->
            <div class="payment-info mt-4">
                <h5>Payment</h5>
                <div class="payment-options d-flex align-items-center">
                    <input type="radio" name="payment" id="paypal" checked>
                    <img src="img/paypal.png" alt="PayPal">
                </div>
            </div>
        </div>

        <div class="col-md-5">
        <div class="order-summary">
    <h5>Order Summary</h5>
    
    <?php while ($product = $result_bought->fetch_assoc()) {
        $total += $product['price'];
    ?>
    <div class="item-info">
        <img src="Dashboard/Partials/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image">
        <div>
            <h6><?php echo htmlspecialchars($product['description']); ?></h6>
            <span>Qty: <?php echo htmlspecialchars($product['quantity']); ?></span>
        </div>
        <span>₱<?php echo number_format($product['price'], 2); ?></span>
        <form method="POST" action="Partials/remove_bought_item.php" style="display:inline;">
            <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($product['product_id']); ?>">
            <button type="submit" class="btn-remove">Remove</button>
        </form>
    </div>
    <?php } ?>

    <div class="total-section">
        <span>Total</span>
        <span>₱<?php echo number_format($total, 2); ?></span>
    </div>
</div>

            <!-- Pay Now Button -->
            <div class="text-right mt-4">
                <a href="#" class="pay-now-btn">Pay now</a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>
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