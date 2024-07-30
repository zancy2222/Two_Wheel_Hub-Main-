<?php
include 'partials/session.php';
include 'partials/db_conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT * FROM Users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chat.css">
    <style>
        body {
            font-family: 'League Spartan', sans-serif;
        }

        .form-container {
            max-width: 700px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .btn-primary {
            background-color: #890606;
            border: none;
        }

        .btn-primary:hover {
            background-color: #6a0505;
        }

        .btn-save-edit {
            margin-top: 1rem;
            background-color: #17a2b8;
            border: none;
        }

        .btn-save-edit:hover {
            background-color: #138496;
        }

        .order-status-table {
            margin-bottom: 2rem;
        }

        .order-status-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-status-table th,
        .order-status-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .order-status-table th {
            background-color: #f2f2f2;
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
                    <li class="nav-item">
                        <a class="nav-link active" href="Accounts.php">Accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

    <div class="container form-container">
        <h2>Create Account</h2>
        <div class="order-status-table">
            <h3>Order Status</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>QTY</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sample 1</td>
                        <td>1</td>
                        <td>Processing</td>
                        <td>2023-07-01</td>
                    </tr>
                    <tr>
                        <td>Sample 2</td>
                        <td>2</td>
                        <td>Shipped</td>
                        <td>2023-07-02</td>
                    </tr>
                    <tr>
                        <td>Sample 3</td>
                        <td>3</td>
                        <td>Delivered</td>
                        <td>2023-07-03</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <form action="partials/update_process.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter your first name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter your last name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="address">Complete Address</label>
                <input type="text" class="form-control" id="unit-no" name="unit_no_house_no_building" placeholder="Unit No./House No./Building" value="<?php echo htmlspecialchars($user['unit_no_house_no_building']); ?>" required>
                <input type="text" class="form-control mt-2" id="street" name="street" placeholder="Street" value="<?php echo htmlspecialchars($user['street']); ?>" required>
                <input type="text" class="form-control mt-2" id="barangay" name="barangay" placeholder="Barangay" value="<?php echo htmlspecialchars($user['barangay']); ?>" required>
                <input type="text" class="form-control mt-2" id="city" name="city" placeholder="City" value="<?php echo htmlspecialchars($user['city']); ?>" required>
                <input type="text" class="form-control mt-2" id="province" name="province" placeholder="Province" value="<?php echo htmlspecialchars($user['province']); ?>" required>
                <input type="text" class="form-control mt-2" id="zip-code" name="zip_code" placeholder="Zip Code" value="<?php echo htmlspecialchars($user['zip_code']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Mobile/Phone No.</label>
                <input type="tel" class="form-control" id="phone" name="mobile_phone_no" placeholder="Enter your mobile/phone number" value="<?php echo htmlspecialchars($user['mobile_phone_no']); ?>" required>
            </div>
            <button type="submit" class="btn btn-save-edit btn-block">Save Edit</button>
        </form>
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