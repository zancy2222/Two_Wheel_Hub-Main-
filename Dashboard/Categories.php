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

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      gap: 20px;
    }

    .card {
      background-color: white;
      border: 1px solid var(--grey-color);
      border-radius: 10px;
      width: 200px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    .card img {
      width: 100%;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .card .card-content {
      padding: 15px;
      text-align: center;
    }

    .card .card-content h3 {
      font-size: 18px;
      margin: 10px 0;
      color: var(--primary-color);
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

  <body>
    <section class="home-section">
      <div class="text">Categories</div>
      <div class="card-container">
        <div class="card">
          <img src="../img/Oils.jpg" class="card-img-top category-img" alt="Suspension Oils">
          <div class="card-content">
            <h3>Suspension Oils</h3>
          </div>
        </div>
        <div class="card">
          <img src="../img/shock.jpg" class="card-img-top category-img" alt="Rear Shock">
          <div class="card-content">
            <h3>Rear Shock</h3>
          </div>
        </div>
        <div class="card">
          <img src="../img/accsrs.jpg" class="card-img-top category-img" alt="Accessories">
          <div class="card-content">
            <h3>Accessories</h3>
          </div>
        </div>
        <div class="card">
          <img src="../img/tires.jpg" class="card-img-top category-img" alt="Tires">
          <div class="card-content">
            <h3>Tires</h3>
          </div>
        </div>
        <div class="card">
          <img src="../img/others.jpg" class="card-img-top category-img" alt="Others">
          <div class="card-content">
            <h3>Others</h3>
          </div>
        </div>
      </div>
    </section>
    <script src="script.js"></script>
  </body>

</html>