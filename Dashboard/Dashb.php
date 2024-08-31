<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Responsive Sidebar Menu HTML CSS | CodingNepal</title>
  <link rel="stylesheet" href="style.css" />
  <!-- Boxicons CDN Link -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
  <style>
body {
    font-family: 'League Spartan', sans-serif;
}

.home-section {
    padding: 20px;
    text-align: center;
}

.home-section .text {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Card Container */
.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Card */
.card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 250px;
    padding: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s, box-shadow 0.3s;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.card-icon {
    font-size: 40px;
    margin-bottom: 15px;
    color: #890606;
}

.card-title {
    font-size: 18px;
    margin-bottom: 10px;
    font-weight: bold;
}

.card-text {
    font-size: 14px;
    color: #666;
}

.card-number {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

/* Notification Modal */
.notification-popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    width: 500px;
    padding: 30px;
    z-index: 1000;
    border-radius: 12px;
    text-align: center;
    max-height: 80%;
    overflow-y: auto;
    transition: transform 0.3s ease, opacity 0.3s ease;
    opacity: 0;
}

.notification-popup.show {
    display: block;
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
}

.notification-popup h4 {
    margin-top: 0;
    font-size: 24px;
    margin-bottom: 15px;
}

.notification-popup p {
    font-size: 16px;
    color: #666;
    margin: 10px 0; /* Added margin for spacing between messages */
}

.notification-popup .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 20px;
    color: #888;
    cursor: pointer;
    transition: color 0.3s;
}

.notification-popup .close-btn:hover {
    color: #333;
}

.see-notifications-btn {
    background-color: #ff5400;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 12px 20px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 15px;
    transition: background-color 0.3s;
}

.see-notifications-btn:hover {
    background-color: #e64a19;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-container {
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 90%;
    }
}

  </style>
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">

      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">

      <li>
        <a href="Dashb.php">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="Users.php">
          <i class="bx bx-user"></i>
          <span class="links_name">User Accounts</span>
        </a>
        <span class="tooltip">User Accounts</span>
      </li>
      <li>
        <a href="AdminAcc.php">
        <i class='bx bx-shield-quarter'></i>
          <span class="links_name">Add Admin Accounts</span>
        </a>
        <span class="tooltip">Add Admin Accounts</span>
      </li>

      <li>
        <a href="Products.php">
          <i class='bx bx-store-alt'></i>
          <span class="links_name">Products</span>
        </a>
        <span class="tooltip">Products</span>
      </li>
      <li>
        <a href="HistoryLogs.php">
          <i class='bx bx-receipt'></i>
          <span class="links_name">History Logs</span>
        </a>
        <span class="tooltip">History Logs</span>
      </li>
      <li>
        <a href="Categories.php">
          <i class='bx bx-purchase-tag-alt'></i>
          <span class="links_name">Categories</span>
        </a>
        <span class="tooltip">Categories</span>
      </li>
      <li>
        <a href="Orders.php">
          <i class="bx bx-cart-alt"></i>
          <span class="links_name">Order</span>
        </a>
        <span class="tooltip">Order</span>
      </li>
      <li>
        <a href="Appointments.php">
          <i class='bx bx-spreadsheet'></i>
          <span class="links_name">Booking</span>
        </a>
        <span class="tooltip">Booking</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bxs-credit-card'></i>
          <span class="links_name">Payments</span>
        </a>
        <span class="tooltip">Payments</span>
      </li>
      <li class="profile">
        <div class="profile-details">
          <img src="../img/AV Moto Logo.png" alt="profileImg" />
          <div class="name_job">
            <div class="name">AV MOTO</div>
            <div class="job">TUNING</div>
          </div>
        </div>
        <!-- Logout Button -->
        <form action="Partials/logout.php" method="post" style="display: inline;">
          <button type="submit" id="log_out" class="bx bx-log-out"></button>
        </form>
      </li>
    </ul>
  </div>
  <section class="home-section mt-5">
    <div class="text">Dashboard</div>
    <div class="card-container">
    <div class="card">
        <i class='bx bx-user card-icon'></i>
        <div class="card-number">
            <?php
            include 'db_conn.php';

            $sql = "SELECT COUNT(*) AS total_users FROM Users";
            $result = $conn->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                echo $row['total_users'];
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
            ?>
        </div>
        <div>
            <h5 class="card-title">Total User</h5>
            <p class="card-text">View total users.</p>
        </div>
    </div>

    <div class="card">
        <i class='bx bx-calendar card-icon'></i>
        <div class="card-number">
            <?php
            include 'db_conn.php';

            $sql = "SELECT (SELECT COUNT(*) FROM GuestAppointment) + (SELECT COUNT(*) FROM Appointment) AS total_bookings";
            $result = $conn->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                echo $row['total_bookings'];
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
            ?>
        </div>
        <div>
            <h5 class="card-title">Appointments</h5>
            <p class="card-text">View and manage appointments.</p>
        </div>
    </div>

    <div class="card">
        <i class='bx bx-box card-icon'></i>
        <div class="card-number">
            <?php
            include 'db_conn.php';

            $sql = "SELECT COUNT(*) AS total_products FROM products";
            $result = $conn->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                echo $row['total_products'];
            } else {
                echo "Error: " . $conn->error;
            }

            $conn->close();
            ?>
        </div>
        <div>
            <h5 class="card-title">Products</h5>
            <p class="card-text">Manage your products.</p>
        </div>
    </div>

    <div class="card">
        <i class='bx bx-category card-icon'></i>
        <div class="card-number">5</div>
        <div>
            <h5 class="card-title">Categories</h5>
            <p class="card-text">Manage categories.</p>
        </div>
    </div>

    <!-- Notification Card -->
    <div class="card notification-card" onclick="toggleNotificationPopup()">
        <i class='bx bx-bell card-icon'></i>
        <div class="card-number" id="notificationCount">0</div>
        <div>
            <h5 class="card-title">Notifications</h5>
            <p class="card-text">See Notifications</p>
        </div>
    </div>
</div>

<!-- Notification Modal Popup -->
<div class="notification-popup" id="notificationPopup">
    <button class="close-btn" onclick="toggleNotificationPopup()">&times;</button>
    <h4>Notifications</h4>
    <div id="notificationContent">
        <p>No new notifications</p>
    </div>
    <button class="see-notifications-btn" onclick="toggleNotificationPopup()">Close</button>
</div>


  
  </section>
  <script>
        function toggleNotificationPopup() {
            var popup = document.getElementById('notificationPopup');
            popup.classList.toggle('show');
        }

        // Function to update notifications
        function updateNotifications() {
            fetch('notifications.php')
                .then(response => response.json())
                .then(data => {
                    var countElement = document.getElementById('notificationCount');
                    var popupElement = document.getElementById('notificationPopup');

                    countElement.innerText = data.count;

                    if (data.count > 0) {
                        popupElement.innerHTML = '<p>' + data.message + '</p>';
                    } else {
                        popupElement.innerHTML = '<p>No new notifications</p>';
                    }
                });
        }

        // Update notifications when page loads
        document.addEventListener('DOMContentLoaded', updateNotifications);
    </script>
  <script src="script.js"></script>
</body>

</html>