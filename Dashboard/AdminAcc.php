<?php
include 'db_conn.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$rowsPerPage = 5;
$offset = ($page - 1) * $rowsPerPage;

// Fetch total number of rows to calculate pagination
$totalRowsResult = $conn->query("SELECT COUNT(*) as total FROM admin_users");
$totalRows = $totalRowsResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $rowsPerPage);

// Fetch users with pagination
$sql = "SELECT * FROM admin_users LIMIT $offset, $rowsPerPage";
$result = $conn->query($sql);
?>

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
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content h2 {
            text-align: center;
            color: var(--primary-color);
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
        }

        .modal-content form .form-row {
            display: flex;
            justify-content: space-between;
        }

        .modal-content form .form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .modal-content form .form-group label {
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        .modal-content form .form-group input,
        .modal-content form .form-group select {
            padding: 10px;
            border: 1px solid var(--grey-color);
            border-radius: 5px;
            font-size: 16px;
        }

        .modal-content form .btn-block {
            width: 100%;
            background-color: var(--primary-color);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-content form .btn-block:hover {
            background-color: var(--secondary-color);
        }

        #editUserForm {
            display: flex;
            flex-direction: column;
        }

        #editUserForm label {
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        #editUserForm input[type="text"],
        #editUserForm input[type="email"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        #editUserForm button {
            padding: 10px 20px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        #editUserForm button:hover {
            background-color: #0056b3;
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
        <div class="text">Dashboard</div>
        <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search Admin or Staff...">
            <button class="add-button">Add User</button>
        </div>
        <table id="userTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["full_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["contact"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td class='action-buttons'>
                    <button class='edit-button'>Edit</button>
                    <button class='delete-button' data-id='" . $row["id"] . "'>Delete</button>
                  </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

<div class="pagination">
    <button id="prevBtn" 
            <?php if ($page <= 1) { echo 'disabled'; } ?> 
            onclick="changePage(<?php echo $page - 1; ?>)">Prev</button>

    <button id="nextBtn" 
            <?php if ($page >= $totalPages) { echo 'disabled'; } ?> 
            onclick="changePage(<?php echo $page + 1; ?>)">Next</button>
</div>

        <div id="addUserModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add Admin or Staff</h2>
                <form id="addUserForm" method="post">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="tel" class="form-control" id="contact" name="contact" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Add Admin</button>
                </form>
            </div>
        </div>


        <div id="editUserModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Admin or Staff</h2>
        <form id="editUserForm" method="post">
            <input type="hidden" id="editUserId" name="id">
            <div class="form-group">
                <label for="editFullName">Full Name</label>
                <input type="text" class="form-control" id="editFullName" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="editEmail">Email</label>
                <input type="email" class="form-control" id="editEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="editContact">Contact</label>
                <input type="text" class="form-control" id="editContact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="editRole">Role</label>
                <select class="form-control" id="editRole" name="role" required>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>
            <div class="form-group">
                <label for="editPassword">Password</label>
                <input type="password" class="form-control" id="editPassword" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
        </form>
    </div>
</div>





    </section>

    <script>
        var addModal = document.getElementById("addUserModal");
        var addBtn = document.querySelector(".add-button");
        var addSpan = document.querySelector("#addUserModal .close");

        addBtn.onclick = function() {
            addModal.style.display = "block";
        }

        addSpan.onclick = function() {
            addModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            }
        }

        document.getElementById("addUserForm").onsubmit = function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "partials/admin_reg_process.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    alert("An error occurred while adding the user.");
                }
            };
            xhr.send(formData);
        };
    </script>


    <script>
       document.addEventListener('DOMContentLoaded', function() {
    var editModal = document.getElementById("editUserModal");
    var editBtns = document.querySelectorAll(".edit-button");
    var editSpan = document.querySelector("#editUserModal .close");

    editBtns.forEach(function(editBtn) {
        editBtn.onclick = function() {
            editModal.style.display = "block";
            var row = editBtn.closest("tr");
            var cells = row.querySelectorAll("td");

            document.getElementById("editUserId").value = cells[0].innerText;
            document.getElementById("editFullName").value = cells[1].innerText;
            document.getElementById("editEmail").value = cells[2].innerText;
            document.getElementById("editContact").value = cells[3].innerText;
            document.getElementById("editRole").value = cells[4].innerText;
        }
    });

    editSpan.onclick = function() {
        editModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
    }

    document.getElementById("editUserForm").onsubmit = function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "partials/admin_edit_process.php", true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                location.reload();
            } else {
                alert("An error occurred while updating the user.");
            }
        };
        xhr.send(formData);
    };
});



document.addEventListener('DOMContentLoaded', function() {
    var deleteBtns = document.querySelectorAll(".delete-button");
    deleteBtns.forEach(function(deleteBtn) {
        deleteBtn.onclick = function() {
            var userId = deleteBtn.getAttribute("data-id");
            if (confirm("Are you sure you want to delete this user?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "partials/admin_delete_process.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        if (xhr.responseText.trim() === "success") {
                            location.reload();
                        } else {
                            alert("An error occurred while deleting the user: " + xhr.responseText);
                        }
                    } else {
                        alert("An error occurred while deleting the user.");
                    }
                };
                xhr.send("id=" + userId);
            }
        };
    });
});

        function changePage(page) {
            window.location.href = "?page=" + page;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('userTable');
            const tbody = table.querySelector('tbody');

            searchInput.addEventListener('input', function() {
                const filter = searchInput.value.toLowerCase();
                const rows = tbody.querySelectorAll('tr');

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    let match = false;

                    cells.forEach(cell => {
                        if (cell.textContent.toLowerCase().includes(filter)) {
                            match = true;
                        }
                    });

                    row.style.display = match ? '' : 'none';
                });
            });
        });
    </script>


    <script src="script.js"></script>
</body>

</html>