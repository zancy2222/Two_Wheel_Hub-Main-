<?php
session_start();
include 'partials/db_conn.php';

if (!isset($_SESSION['guest_id'])) {
    echo "No products in cart.";
    exit();
}

$session_id = $_SESSION['guest_id'];

// Fetch cart products along with their prices
$query_cart = "SELECT p.image, p.description, g.quantity, p.price, g.color, g.id AS g_id
               FROM GuestCartOrder g
               JOIN products p ON g.product_id = p.id
               WHERE g.session_id = ?";

$stmt_cart = $conn->prepare($query_cart);
$stmt_cart->bind_param("s", $session_id);
$stmt_cart->execute();
$result_cart = $stmt_cart->get_result();
$cart_products = $result_cart->fetch_all(MYSQLI_ASSOC);

$total = 0;
$subtotal = 0;
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
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.cart-container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h1 {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.cart-item {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ddd;
    padding: 20px 0;
}

.item-image img {
    width: 100px;
    height: auto;
    border-radius: 10px;
}

.item-details {
    flex: 2;
    margin-left: 20px;
}

.item-details h2 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.item-details p {
    margin-bottom: 5px;
}

.price {
    color: #C82333;
    font-weight: bold;
}

.item-quantity {
    display: flex;
    align-items: center;
    margin-left: 20px;
}

.item-quantity button {
    background: none;
    border: 1px solid #ddd;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

.item-quantity input {
    width: 40px;
    height: 40px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin: 0 10px;
}

.item-total {
    flex: 1;
    text-align: right;
    margin-left: 20px;
}

.item-actions {
    margin-left: 20px;
}

.btn-remove {
    background-color: #C82333;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
}

.btn-remove:hover {
    background-color: #A71B2C;
}

.cart-summary {
    text-align: right;
    margin-top: 20px;
}

.cart-summary h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.cart-summary p {
    font-size: 18px;
    margin-bottom: 10px;
}

.btn-checkout {
    background-color: #C82333;
    color: #fff;
    border: none;
    padding: 15px 30px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
}

.btn-checkout:hover {
    background-color: #A71B2C;
}

/* Media Queries for Responsiveness */
@media (max-width: 768px) {
    .cart-item {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px 0;
    }

    .item-image img {
        width: 80px;
    }

    .item-details {
        margin-left: 0;
        margin-top: 10px;
    }

    .item-quantity {
        margin-left: 0;
        margin-top: 10px;
    }

    .item-total {
        margin-left: 0;
        margin-top: 10px;
        text-align: left;
    }

    .item-actions {
        margin-left: 0;
        margin-top: 10px;
    }

    .cart-summary {
        text-align: center;
        margin-top: 30px;
    }

    .btn-checkout {
        width: 100%;
        padding: 15px 0;
    }
}

@media (max-width: 576px) {
    h1 {
        font-size: 24px;
    }

    .cart-summary h2 {
        font-size: 20px;
    }

    .cart-summary p {
        font-size: 16px;
    }

    .btn-checkout {
        font-size: 16px;
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
    <div class="cart-container">
    <h1>Your Cart</h1>

    <?php foreach ($cart_products as $product) { 
        $item_total = $product['price'] * $product['quantity'];
        $subtotal += $item_total;
    ?>
    <div class="cart-item" data-price="<?php echo $product['price']; ?>">
        <div class="item-image">
            <img src="Dashboard/Partials/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image">
        </div>
        <div class="item-details">
            <h2><?php echo htmlspecialchars($product['description']); ?></h2>
            <p>Color: <span><?php echo htmlspecialchars($product['color']); ?></span></p>
            <p class="price">₱<?php echo number_format($product['price'], 2); ?></p>
        </div>
        <!-- <div class="item-quantity">
            <button type="button" onclick="changeQuantity(this, -1)">-</button>
            <input type="text" value="<?php echo htmlspecialchars($product['quantity']); ?>" id="quantity" name="quantity" readonly>
            <button type="button" onclick="changeQuantity(this, 1)">+</button>
        </div> -->
        <div class="item-total">
            <p>Total: ₱<span><?php echo number_format($item_total, 2); ?></span></p>
        </div>
        <div class="item-actions">
            <form method="POST" action="Partials/remove_item_cart.php" style="display:inline;">
                <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($product['g_id']); ?>">
                <button type="submit" class="btn-remove">Remove</button>
            </form>
        </div>
    </div>
    <?php } ?>

    <div class="cart-summary">
        <h2>Order Summary</h2>
        <p>Subtotal: ₱<span id="subtotal"><?php echo number_format($subtotal, 2); ?></span></p>
        <p>Total: ₱<span id="total"><?php echo number_format($subtotal, 2); ?></span></p>
        <form method="POST" action="Partials/cart_buy_now_guest.php">
            <button type="submit" class="btn-checkout">Proceed to Checkout</button>
        </form>
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
<script>
function changeQuantity(button, change) {
    var cartItem = button.closest('.cart-item');
    var quantityInput = cartItem.querySelector('input[name="quantity"]');
    var currentQuantity = parseInt(quantityInput.value);
    var newQuantity = currentQuantity + change;

    if (newQuantity < 1) return; // Prevent quantity from going below 1

    quantityInput.value = newQuantity;

    var price = parseFloat(cartItem.getAttribute('data-price'));
    var newItemTotal = price * newQuantity;
    
    cartItem.querySelector('.item-total span').innerText = newItemTotal.toFixed(2);

    updateSubtotal();
}

function updateSubtotal() {
    var subtotal = 0;
    document.querySelectorAll('.cart-item').forEach(function(cartItem) {
        var itemTotal = parseFloat(cartItem.querySelector('.item-total span').innerText);
        subtotal += itemTotal;
    });

    document.getElementById('subtotal').innerText = subtotal.toFixed(2);
    document.getElementById('total').innerText = subtotal.toFixed(2);
}
</script>
</body>

</html>