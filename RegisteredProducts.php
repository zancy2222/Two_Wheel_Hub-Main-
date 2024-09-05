
<?php
include 'partials/db_conn.php';
include 'partials/session.php'; // Include session management script to get user ID

$product_id = $_GET['id']; // Get the product ID from the URL or request
$query = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Fetch colors for the product if applicable
$colors = [];
if ($product['category'] === 'Rear Suspension' || $product['category'] === 'Tires') {
    $color_query = "SELECT color FROM product_colors WHERE product_id = ?";
    $color_stmt = $conn->prepare($color_query);
    $color_stmt->bind_param("i", $product_id);
    $color_stmt->execute();
    $color_result = $color_stmt->get_result();
    while ($color_row = $color_result->fetch_assoc()) {
        $colors[] = $color_row['color'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suspension Oils - Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="chat.css">
    <style>
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


        .container {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping for smaller screens */
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .product-images {
            flex: 1;
            display: flex;
            justify-content: center; /* Center align images */
            margin-bottom: 20px; /* Space below for smaller screens */
        }

        .product-images img {
            max-width: 100%;
            height: 500px;
            border-radius: 10px;
        }

        .product-details {
            flex: 1;
            margin-left: 40px;
        }

        .product-details h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .price {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .color-options {
            margin-bottom: 20px;
        }

        .color-options label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .color-options .colors {
            display: flex;
            gap: 10px;
        }

        .color-options .color-item {
            width: 40px;
            height: 40px;
            border: 2px solid #ddd;
            border-radius: 50%;
            cursor: pointer;
            transition: border 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .color-options .color-item.default {
            border-color: #000;
            font-size: 20px;
            color: #000;
        }

        .color-options .color-item.selected {
            border-color: #000;
        }

        .actions {
            display: flex;
            flex-direction: column; /* Stack buttons on smaller screens */
            gap: 10px;
            margin-bottom: 20px;
        }

        .quantity {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .quantity input {
            width: 40px;
            height: 40px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 0 10px;
        }

        .quantity button {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        .actions button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: background 0.3s;
        }

        .btn-add-to-cart {
            background-color: #fff;
            color: #000;
            border-color: #000;
        }

        .btn-buy-now {
            background-color: #C82333;
            color: #fff;
            border-color: #C82333;
        }

        .btn-buy-now:hover {
            background-color: #A71B2C;
        }

        .pickup, .shipping {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .pickup span {
            color: #009DDF;
            font-weight: bold;
        }

        .shipping img {
            max-width: 250px;
            height: 200px;
        }

        /* Media Queries for responsive design */
        @media (max-width: 768px) {
            .product-details {
                margin-left: 0;
                margin-top: 20px; /* Add top margin for stacking */
            }

            .product-images, .product-details {
                flex: 1 1 100%; /* Full width on small screens */
                margin: 0;
            }

            .actions {
                flex-direction: column;
            }

            .actions button {
                width: 100%; /* Full width buttons */
            }

            .btn-add-to-cart {
            background-color: #fff;
            color: #000;
            border-color: #000;
            margin-bottom: 4%;
        }

        .btn-buy-now {
            background-color: #C82333;
            color: #fff;
            border-color: #C82333;
        }
            .color-options .colors {
                flex-wrap: wrap; /* Wrap color options */
            }

            .color-options .color-item {
                width: 30px; /* Smaller color circles */
                height: 30px;
            }
            .product-images img {
            max-width: 100%;
            height: 350px;
            border-radius: 10px;
        }
        .shipping img {
        display: none; 
        }
        }

        @media (max-width: 576px) {
            .product-details h1 {
                font-size: 24px; /* Smaller font size for titles */
            }

            .price {
                font-size: 20px; /* Smaller font size for price */
            }

            .color-options .color-item {
                width: 25px; /* Even smaller color circles */
                height: 25px;
            }

            .actions button {
                font-size: 14px; /* Smaller button text */
                padding: 8px; /* Adjust padding */
            }
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

        .color-options {
            display: flex;
            gap: 5px;
        }

        .color-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            border: 1px solid #ccc;
        }

        .color-circle.selected {
            border: 2px solid #000;
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
            <a class="nav-link" href="cartMain.php">
                <i class="fa fa-shopping-cart"></i><span class="cart-count">0</span>
            </a>
            <div class="nav-item dropdown ml-3">
                <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="Order_status_main.php"><i class="fa fa-list"></i> Order Status</a>
                    <a class="dropdown-item" href="Accounts.php"><i class="fa fa-info-circle"></i> Account Info</a>
                    <a class="dropdown-item text-danger" href="partials/user_logout.php"><i class="fa fa-sign-out-alt"></i> Log out</a>
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
                        <a class="nav-link" href="HomeMain.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="ShopMain.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ContactMain.php">Contact Us</a>
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


                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="product-images">
            <img src="Dashboard/Partials/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" id="mainImage">
        </div>

        <div class="product-details">
            <h1><?php echo htmlspecialchars($product['description']); ?></h1>
            <div class="price">₱<?php echo htmlspecialchars($product['price']); ?></div>

            <?php if (!empty($colors)) { ?>
                <div class="color-options">
                    <label for="color">Color: <span id="selectedColor">DEFAULT</span></label>
                    <div class="colors">
                        <div class="color-item default selected" data-color="DEFAULT">✖</div>
                        <?php foreach ($colors as $color) { ?>
                            <div class="color-item" data-color="<?php echo htmlspecialchars($color); ?>" style="background-color: <?php echo htmlspecialchars($color); ?>;"></div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="color-options">
                    <label for="color">Color: <span id="selectedColor">DEFAULT</span></label>
                </div>
            <?php } ?>

            <div class="actions">
                <div class="quantity">
                    <button type="button" onclick="changeQuantity(-1)">-</button>
                    <input type="text" value="1" id="quantity" name="quantity">
                    <button type="button" onclick="changeQuantity(1)">+</button>
                </div>
                <form method="POST" action="Partials/buy_now_registered.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="quantity" id="hiddenQuantity" value="1">
                    <input type="hidden" name="color" id="hiddenColor" value="DEFAULT">
                    <button type="submit" name="action" value="add_to_cart" class="btn-add-to-cart">Add to cart</button>
                    <button type="submit" name="action" value="buy_now" class="btn-buy-now">Buy it now</button>
                </form>
            </div>

            <div class="pickup">Pickup available at <span>AV MOTO Philippines</span></div>
            <div class="shipping"><img src="img/AV Moto Logo Outline.png" alt="Free Shipping"></div>
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
        const colorItems = document.querySelectorAll('.color-item');
    const selectedColorLabel = document.getElementById('selectedColor');

    colorItems.forEach(item => {
        item.addEventListener('click', function () {
            colorItems.forEach(i => i.classList.remove('selected'));
            this.classList.add('selected');
            selectedColorLabel.textContent = this.getAttribute('data-color');
        });
    });
    function changeColor(color) {
    document.getElementById('hiddenColor').value = color;
}

document.querySelectorAll('.color-item').forEach(item => {
    item.addEventListener('click', () => {
        changeColor(item.getAttribute('data-color'));
        document.getElementById('selectedColor').textContent = item.getAttribute('data-color');
    });
});
    function changeQuantity(amount) {
    const quantityInput = document.getElementById('quantity');
    let currentValue = parseInt(quantityInput.value);
    let newValue = currentValue + amount;
    if (newValue < 1) {
        newValue = 1;
    }
    quantityInput.value = newValue;
    document.getElementById('hiddenQuantity').value = newValue;
}
    </script>

</body>

</html>