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

    .add-button {
      background-color: var(--primary-color);
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-bottom: 20px;
      transition: background-color 0.3s;
    }

    .add-button:hover {
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


    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.7);
      /* Darker background */
      transition: opacity 0.3s ease-in-out;
    }

    .modal-content {
      background-color: #ffffff;
      margin: 100px auto;
      padding: 30px;
      border-radius: 8px;
      /* Rounded corners */
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      /* Subtle shadow */
      width: 50%;
      max-width: 600px;
      /* Maximum width */
      transition: transform 0.3s ease-in-out;
      transform: translateY(-100px);
      opacity: 0;
    }

    .modal-content.show {
      transform: translateY(0);
      opacity: 1;
    }

    .close {
      color: #bbb;
      float: right;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
      transition: color 0.3s ease-in-out;
    }

    .close:hover,
    .close:focus {
      color: #333;
      text-decoration: none;
    }

    /* Optional: Add some basic styling for the modal content */
    #modalContent {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333;
      line-height: 1.6;
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .modal-header h2 {
      margin: 0;
    }

    .modal-footer {
      display: flex;
      justify-content: flex-end;
      border-top: 1px solid #ddd;
      padding-top: 10px;
      margin-top: 20px;
    }

    .modal-footer button {
      padding: 10px 20px;
      margin-left: 10px;
      border: none;
      border-radius: 4px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .modal-footer button:hover {
      background-color: #0056b3;
    }
    #log_out {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: white;
}

#log_out:hover {
    color: #f00; /* Change color on hover */
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
      <h2 class="text">History Logs</h2>
      <table id="adminLogsTable">
        <thead>
          <tr>
            <th>Action</th>
            <th>Timestamp</th>
          </tr>
        </thead>
        <tbody id="adminLogsBody">
          <!-- Admin logs will be inserted here -->
        </tbody>
      </table>
      <div class="pagination" id="adminLogsPagination">
        <button id="adminLogsPrevBtn">Prev</button>
        <button id="adminLogsNextBtn">Next</button>
      </div>

      <!-- Modal structure -->



    </section>
    <script src="script.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const logsPerPage = 10;
        let currentPage = 1;

        function fetchLogs(page) {
          fetch(`Partials/fetch_admin_logs.php?page=${page}&limit=${logsPerPage}`)
            .then(response => response.json())
            .then(data => {
              const tbody = document.getElementById('adminLogsBody');
              tbody.innerHTML = '';

              data.logs.forEach(log => {
                const row = document.createElement('tr');
                const actionCell = document.createElement('td');
                actionCell.textContent = log.action;
                const timestampCell = document.createElement('td');
                timestampCell.textContent = log.timestamp;
                row.appendChild(actionCell);
                row.appendChild(timestampCell);
                tbody.appendChild(row);
              });

              document.getElementById('adminLogsPrevBtn').disabled = page === 1;
              document.getElementById('adminLogsNextBtn').disabled = data.logs.length < logsPerPage;
            });
        }

        document.getElementById('adminLogsPrevBtn').addEventListener('click', function() {
          if (currentPage > 1) {
            currentPage--;
            fetchLogs(currentPage);
          }
        });

        document.getElementById('adminLogsNextBtn').addEventListener('click', function() {
          currentPage++;
          fetchLogs(currentPage);
        });

        fetchLogs(currentPage);
      });
    </script>


  </body>

</html>