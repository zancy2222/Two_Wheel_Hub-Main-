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
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
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
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-10px);
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
          <a href="">
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
          <i class="bx bx-log-out" id="log_out"></i>
        </li>
      </ul>
    </div>
    <section class="home-section mt-5">
      <div class="text">Dashboard</div>
      <div class="card-container">
          <div class="card">
              <i class='bx bx-box card-icon'></i>
              <div class="card-number">120</div>
              <div>
                  <h5 class="card-title">Products</h5>
                  <p class="card-text">Manage your products.</p>
              </div>
          </div>
          <div class="card">
              <i class='bx bx-calendar card-icon'></i>
              <div class="card-number">45</div>
              <div>
                  <h5 class="card-title">Appointments</h5>
                  <p class="card-text">View and manage appointments.</p>
              </div>
          </div>
          <div class="card">
              <i class='bx bx-user card-icon'></i>
              <div class="card-number">320</div>
              <div>
                  <h5 class="card-title">Total User</h5>
                  <p class="card-text">View total users.</p>
              </div>
          </div>
          <div class="card">
              <i class='bx bx-category card-icon'></i>
              <div class="card-number">10</div>
              <div>
                  <h5 class="card-title">Categories</h5>
                  <p class="card-text">Manage categories.</p>
              </div>
          </div>
      </div>
  </section>

    <script src="script.js"></script>
  </body>
</html>