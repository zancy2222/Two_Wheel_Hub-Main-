


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
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
}

.close {
    color: #888;
    float: right;
    font-size: 24px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-content h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
    font-size: 1.5em;
}

.modal-content form {
    display: flex;
    flex-direction: column;
}

.modal-content form .form-group {
    margin-bottom: 15px;
}

.modal-content form .form-group label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.modal-content form .form-group input,
.modal-content form .form-group select {
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s, box-shadow 0.3s;
}

.modal-content form .form-group input:focus,
.modal-content form .form-group select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.modal-content form .btn-block {
    width: 100%;
    background-color: #007bff;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    margin-top: 10px;
}

.modal-content form .btn-block:hover {
    background-color: #0056b3;
}

.modal-content form .btn-block:active {
    transform: scale(0.98);
}


#additionalServices {
    margin-top: 20px;
}

#additionalServices .form-group {
    margin-bottom: 10px;
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
        <a href="Staff.php">
          <i class='bx bx-store-alt'></i>
          <span class="links_name">Manage Products</span>
        </a>
        <span class="tooltip">Manage Products</span>
      </li>
      <li>
        <a href="Services.php">
        <i class='bx bx-bar-chart-alt'></i>
          <span class="links_name">Manage Services</span>
        </a>
        <span class="tooltip">Manage Services</span>
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
            <input type="text" placeholder="Search users...">
            <button class="add-button">Add Services</button>
        </div>
        <table id="orderTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Categories</th>
                    <th>Services</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <div class="pagination">
            <button id="prevBtn">Prev</button>
            <button id="nextBtn">Next</button>
        </div>
        <div id="addServiceModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Service</h2>
        <form id="addServiceForm" method="post" action="Partials/add_service.php">
            <div class="form-group">
                <label for="serviceCategory">Service Category</label>
                <input type="text" class="form-control" id="serviceCategory" name="service_category" required>
            </div>
            <div id="serviceContainer">
                <div class="form-group">
                    <label for="serviceName">Service Name</label>
                    <input type="text" class="form-control" id="serviceName" name="service_name[]" required>
                </div>
            </div>
            <button type="button" class="btn btn-secondary btn-block" id="addMoreService">Add More Services</button>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>
</div>
<!-- Edit Category Modal -->
<div id="editCategoryModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Category</h2>
        <form id="editCategoryForm">
            <input type="hidden" id="editCategoryId" name="editCategoryId">

            <div class="form-group">
                <label for="editCategoryName">Category Name</label>
                <input type="text" class="form-control" id="editCategoryName" name="editCategoryName" required>
            </div>

            <div class="form-group">
                <label for="editServices">Services (comma-separated)</label>
                <input type="text" class="form-control" id="editServices" name="editServices" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
        </form>
    </div>
</div>

    </section>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    // Fetch data from the server and populate the table
    $.ajax({
        url: 'Partials/fetch_services.php',
        method: 'GET',
        success: function(data) {
            $('#orderTable tbody').html(data);
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });

    // Show edit modal
    $(document).on('click', '.edit-button', function() {
        var row = $(this).closest('tr');
        var categoryId = row.find('td').eq(0).text();
        var categoryName = row.find('td').eq(1).text();
        var services = row.find('td').eq(2).text();

        $('#editCategoryId').val(categoryId);
        $('#editCategoryName').val(categoryName);
        $('#editServices').val(services);

        $('#editCategoryModal').show();
    });

    // Close edit modal
    $('.close').click(function() {
        $('#editCategoryModal').hide();
    });

    // Submit edit form
    $('#editCategoryForm').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).serialize();

        $.ajax({
            url: 'Partials/update_services.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('Category updated successfully.');
                location.reload(); // Refresh the table data
            },
            error: function(xhr, status, error) {
                console.error('Error updating category:', error);
            }
        });
    });
});
</script>





    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Show modal
    document.querySelector('.add-button').addEventListener('click', function() {
        document.getElementById('addServiceModal').style.display = 'block';
    });

    // Hide modal
    document.querySelector('.close').addEventListener('click', function() {
        document.getElementById('addServiceModal').style.display = 'none';
    });

    // Add more services
    document.getElementById('addMoreService').addEventListener('click', function() {
        const serviceContainer = document.getElementById('serviceContainer');
        const newServiceDiv = document.createElement('div');
        newServiceDiv.classList.add('form-group');
        newServiceDiv.innerHTML = `
            <label for="serviceName">Service Name</label>
            <input type="text" class="form-control" name="service_name[]" required>
        `;
        serviceContainer.appendChild(newServiceDiv);
    });
});
</script>
</body>

</html>