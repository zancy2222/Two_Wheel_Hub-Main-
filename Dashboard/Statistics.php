<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Responsive Sidebar Menu HTML CSS | CodingNepal</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f5f7;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .home-section {
      padding: 20px;
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .home-section .text {
      font-size: 30px;
      font-weight: 700;
      color: #333;
      margin-bottom: 20px;
      font-family: 'League Spartan', sans-serif;
    }
    .chart-container {
      width: 100%;
      margin: 0 auto;
    }
    #salesChart {
      background: #ffffff;
      border-radius: 10px;
      padding: 20px;
    }
    .year-selector {
      margin-bottom: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }
    .year-selector label {
      font-size: 18px;
      font-weight: 500;
      color: #333;
    }
    .year-selector select {
      font-size: 16px;
      padding: 8px 12px;
      border: 2px solid #00c8ff;
      border-radius: 5px;
      background-color: #ffffff;
      color: #333;
      transition: all 0.3s ease;
    }
    .year-selector select:hover {
      border-color: #008bbf;
    }
    .year-selector select:focus {
      outline: none;
      border-color: #006994;
    }
    @media (max-width: 768px) {
      .home-section {
        padding: 15px;
      }
      .year-selector label {
        font-size: 16px;
      }
      .year-selector select {
        font-size: 14px;
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
      <!-- Sidebar content remains unchanged -->
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
  <section class="home-section mt-5">
    <div class="text">Sales Statistics</div>

    <div class="year-selector">
      <label for="year">Select Year:</label>
      <select id="year">
        <?php
        $currentYear = date('Y');
        for ($y = 2024; $y <= $currentYear; $y++): ?>
          <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
        <?php endfor; ?>
      </select>
    </div>


    <div class="chart-container">
      <canvas id="salesChart"></canvas>
    </div>
  </section>

  <script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(0, 200, 255, 0.5)');
    gradient.addColorStop(1, 'rgba(0, 200, 255, 0)');

    let salesChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label: 'Sales',
          data: [], 
          fill: true,
          backgroundColor: gradient,
          borderColor: '#00c8ff',
          borderWidth: 3,
          tension: 0.4,
          pointBackgroundColor: '#ffffff',
          pointBorderColor: '#00c8ff',
          pointHoverBackgroundColor: '#00c8ff',
          pointHoverBorderColor: '#ffffff',
          pointRadius: 5,
          pointHoverRadius: 8
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: 'top',
            labels: {
              color: '#333',
              font: {
                size: 14,
                family: 'Roboto, sans-serif'
              }
            }
          },
          title: {
            display: true,
            text: 'Sales Statistics',
            color: '#333',
            font: {
              size: 24,
              family: 'League Spartan, sans-serif',
              weight: '700'
            },
            padding: { top: 10, bottom: 30 }
          }
        },
        scales: {
          x: { 
            grid: { display: false }, 
            ticks: { color: '#666', font: { size: 12 } } 
          },
          y: { 
            grid: { color: '#e0e0e0' }, 
            ticks: { color: '#666', font: { size: 12 } } 
          }
        }
      }
    });

    function fetchSalesData(year) {
      fetch('Partials/fetch_sales_data.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `year=${year}`
      })
      .then(response => response.json())
      .then(data => {
        salesChart.data.datasets[0].data = data;
        salesChart.update();
      });
    }

    document.getElementById('year').addEventListener('change', function() {
      fetchSalesData(this.value);
    });

    // Fetch initial data for the current year
    fetchSalesData(new Date().getFullYear());
  </script>
  
</body>

</html>
