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
    :root {
      --primary-color: #004AAD;
      --secondary-color: #009DDF;
      --grey-color: #737476;
      --light-grey-color: #F8F9FA;
      --black-color: #000000;
    }

    body {
      font-family: 'League Spartan', sans-serif;
      background-color: var(--light-grey-color);
      margin: 0;
      padding: 0;
    }

    .home-section {
      padding: 20px;
    }

    .home-section .text {
      font-size: 24px;
      margin-bottom: 20px;
      color: var(--primary-color);
    }

    .search-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .search-bar input {
      width: 70%;
      padding: 10px;
      border: 1px solid var(--grey-color);
      border-radius: 5px;
      font-size: 16px;
    }

    .search-bar button {
      background-color: var(--secondary-color);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .search-bar button:hover {
      background-color: var(--primary-color);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      font-size: 18px;
      min-width: 400px;
    }

    table th,
    table td {
      padding: 12px 15px;
      border: 1px solid var(--grey-color);
      text-align: left;
    }

    table th {
      background-color: var(--primary-color);
      color: white;
    }

    table tr:nth-child(even) {
      background-color: var(--light-grey-color);
    }

    .action-buttons button {
      background-color: var(--primary-color);
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 3px;
      font-size: 14px;
      cursor: pointer;
      margin-right: 5px;
      transition: background-color 0.3s;
    }

    .action-buttons button:hover {
      background-color: var(--secondary-color);
    }

    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px 0;
    }

    .pagination button {
      background-color: var(--primary-color);
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin: 0 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .pagination button:hover {
      background-color: var(--secondary-color);
    }

    .pagination button:disabled {
      background-color: var(--grey-color);
      cursor: not-allowed;
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
  <section class="home-section">
    <div class="text">Orders</div>
    <div class="search-bar">
    <input type="text" id="searchInput" placeholder="Search orders...">
    </div>
    
    <!-- Guest Orders -->
    <div class="text">Guest Orders</div>
    <?php
    include 'db_conn.php';

    $sqlGuest = "SELECT gp.id AS order_id, gp.reference_code, gp.status
                 FROM GuestBuyedProducts gp
                 ORDER BY gp.purchased_at DESC";

    $stmtGuest = $conn->prepare($sqlGuest);
    $stmtGuest->execute();
    $resultGuest = $stmtGuest->get_result();
    ?>

    <table id="guestOrderTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Reference Code</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultGuest->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                <td><?php echo htmlspecialchars($row['reference_code']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td class="action-buttons">
                    <button onclick="viewOrder('<?php echo htmlspecialchars($row['order_id']); ?>')">View</button>
                    <button onclick="modifyOrder('<?php echo htmlspecialchars($row['order_id']); ?>')">Modify</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Registered Orders -->
    <div class="text">Registered User Orders</div>
    <?php
    $sqlRegistered = "SELECT rbp.id AS order_id, rbp.reference_code, rbp.status
                      FROM RegisteredBuyedProducts rbp
                      ORDER BY rbp.purchased_at DESC";

    $stmtRegistered = $conn->prepare($sqlRegistered);
    $stmtRegistered->execute();
    $resultRegistered = $stmtRegistered->get_result();
    ?>

    <table id="registeredOrderTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Reference Code</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $resultRegistered->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                <td><?php echo htmlspecialchars($row['reference_code']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td class="action-buttons">
                    <button onclick="viewOrder('<?php echo htmlspecialchars($row['order_id']); ?>')">View</button>
                    <button onclick="modifyOrder('<?php echo htmlspecialchars($row['order_id']); ?>')">Modify</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="pagination">
        <button id="prevBtn">Prev</button>
        <button id="nextBtn">Next</button>
    </div>
</section>
<script>
          document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function() {
                var searchTerm = searchInput.value;
                fetchOrders(searchTerm);
            });

            function fetchOrders(searchTerm) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'search_orders.php?search=' + encodeURIComponent(searchTerm), true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById('guestOrderBody').innerHTML = response.guestOrders;
                        document.getElementById('registeredOrderBody').innerHTML = response.registeredOrders;
                    }
                };
                xhr.send();
            }
        });
</script>
  <script src="script.js"></script>
</body>

</html>