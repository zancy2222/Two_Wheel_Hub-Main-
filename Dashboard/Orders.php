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
      <input type="text" placeholder="Search orders...">
    </div>
    <table id="orderTable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Mobile/Phone No.</th>
          <th>Description</th>
          <th>Category</th>
          <th>Size</th>
          <th>Color</th>
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>John Doe</td>
          <td>john.doe@example.com</td>
          <td>123 Main St, Barangay 1, City, Province, 12345</td>
          <td>123-456-7890</td>
          <td>Product Description</td>
          <td>Category Name</td>
          <td>XL</td>
          <td>Blue</td>
          <td>₱100.00</td>
          <td>Processing</td>
          <td class="action-buttons">
            <button>Modify</button>
          </td>
        </tr>
        <!-- Add more static rows as needed -->
      </tbody>
    </table>
    <div class="pagination">
      <button id="prevBtn">Prev</button>
      <button id="nextBtn">Next</button>
    </div>
  </section>
  <script src="script.js"></script>
</body>

</html>