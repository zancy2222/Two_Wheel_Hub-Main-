<!--ITO GAGAWEN KO BUKAS-->
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
    background-color: rgba(0, 0, 0, 0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 90%;
    max-width: 600px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
    margin-bottom: 20px;
}

.modal-content form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: var(--primary-color);
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid var(--grey-color);
    border-radius: 5px;
    font-size: 16px;
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.addColorButton {
    margin-top: 5px;
    background-color: var(--secondary-color);
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.addColorButton:hover {
    background-color: darken(var(--secondary-color), 10%);
}

button[type="submit"] {
    background-color: var(--primary-color);
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: var(--secondary-color);
}
/* General button styles */
button.editBtn, button.deleteBtn {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    transition: background-color 0.3s, color 0.3s;
}

button.editBtn {
    background-color: #4CAF50; /* Green for Edit */
}

button.editBtn:hover {
    background-color: #45a049; /* Darker green on hover */
}

button.deleteBtn {
    background-color: #f44336; /* Red for Delete */
}

button.deleteBtn:hover {
    background-color: #e53935; /* Darker red on hover */
}

/* Optional: Add some spacing between buttons */
button {
    margin-right: 5px;
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
        <input type="text" id="searchInput" placeholder="Search products...">
            <button class="add-button">Add Product</button>
        </div>
        <table id="productTable">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Category</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Brand</th>
            <th>Size</th>
            <th>Volume</th>
            <th>Motorcycle</th>
            <th>Colors</th>
            <th>Action</th> <!-- New Action Column -->
        </tr>
    </thead>
    <tbody>
    <?php
    // Database connection using MySQLi
    include('db_conn.php');

    // Query to fetch products
    $sql = "SELECT p.*, GROUP_CONCAT(pc.color SEPARATOR ', ') AS colors 
            FROM products p
            LEFT JOIN product_colors pc ON p.id = pc.product_id
            GROUP BY p.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='Partials/uploads/" . $row['image'] . "' alt='Product Image' width='100'></td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . ($row['brand'] ? $row['brand'] : '-') . "</td>";
            echo "<td>" . ($row['size'] ? $row['size'] : '-') . "</td>";
            echo "<td>" . ($row['volume'] ? $row['volume'] : '-') . "</td>";
            echo "<td>" . ($row['motorcycle'] ? $row['motorcycle'] : '-') . "</td>";
            echo "<td>" . ($row['colors'] ? $row['colors'] : '-') . "</td>";
            echo "<td>
                    <button class='editBtn' data-id='" . $row['id'] . "'>Edit</button>
                    <button class='deleteBtn' data-id='" . $row['id'] . "'>Delete</button>
                  </td>"; // Edit and Delete Buttons
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='11'>No products found</td></tr>";
    }

    $conn->close();
    ?>
    </tbody>
</table>



        <!-- <div class="pagination">
            <button id="prevBtn" <?php if ($page <= 1) {
                                        echo 'disabled';
                                    } ?> onclick="changePage(<?php echo $page - 1; ?>)">Prev</button>
            <button id="nextBtn" <?php if ($page >= $totalPages) {
                                        echo 'disabled';
                                    } ?> onclick="changePage(<?php echo $page + 1; ?>)">Next</button>
        </div> -->

        <div id="addProductModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Product</h2>
        <form id="addProductForm" enctype="multipart/form-data" action="Partials/save_products.php" method="post">
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" id="productImage" name="productImage" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="">Select a Category</option>
                    <option value="Front Suspension">Front Suspension</option>
                    <option value="Rear Suspension">Rear Suspension</option>
                    <option value="CVT">CVT</option>
                    <option value="Tires">Tires</option>
                    <option value="Oil">Oil</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div id="commonFields" class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" required>
            </div>

            <!-- Rear Suspension Specific Fields -->
            <div id="rearSuspensionFields" class="categoryFields form-group">
                <label for="brandRearSuspension">Brand</label>
                <input type="text" id="brandRearSuspension" name="brandRearSuspension">

                <label for="color">Colors</label>
                <div id="colorContainerRearSuspension">
                    <div class="colorField">
                        <input type="text" name="colorRearSuspension[]" placeholder="Enter a color">
                    </div>
                </div>
                <button type="button" class="addColorButton" data-target="colorContainerRearSuspension">Add Another Color</button>

                <label for="motorcycleRearSuspension">Motorcycle</label>
                <input type="text" id="motorcycleRearSuspension" name="motorcycleRearSuspension">
            </div>

            <!-- CVT Specific Fields -->
            <div id="cvtFields" class="categoryFields form-group">
                <label for="brandCVT">Brand</label>
                <input type="text" id="brandCVT" name="brandCVT">

                <label for="motorcycleCVT">Motorcycle</label>
                <input type="text" id="motorcycleCVT" name="motorcycleCVT">
            </div>

            <!-- Tires Specific Fields -->
            <div id="tiresFields" class="categoryFields form-group">
                <label for="brandTires">Brand</label>
                <input type="text" id="brandTires" name="brandTires">

                <label for="sizeTires">Size</label>
                <input type="text" id="sizeTires" name="sizeTires">
            </div>

            <!-- Oil Specific Fields -->
            <div id="oilFields" class="categoryFields form-group">
                <label for="brandOil">Brand</label>
                <input type="text" id="brandOil" name="brandOil">

                <label for="volumeOil">Volume</label>
                <input type="text" id="volumeOil" name="volumeOil">
            </div>

            <!-- Others Specific Fields -->
            <div id="othersFields" class="categoryFields form-group">
                <label for="brandOthers">Brand</label>
                <input type="text" id="brandOthers" name="brandOthers">
            </div>

            <button type="submit">Add Product</button>
        </form>
    </div>
</div>


<div id="editProductModal" class="modal form-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Product</h2>
        <form id="editProductForm" enctype="multipart/form-data" action="Partials/update_product.php" method="post">
            <input type="hidden" id="editProductId" name="product_id">

            <div class="form-group">
                <label for="editProductImage">Product Image</label>
                <input type="file" id="editProductImage" name="productImage" accept="image/*">
                <img id="currentProductImage" src="" alt="Current Product Image" width="100">
            </div>

            <div class="form-group">
                <label for="editCategory">Category</label>
                <select id="editCategory" name="category" required>
                    <option value="">Select a Category</option>
                    <option value="Front Suspension">Front Suspension</option>
                    <option value="Rear Suspension">Rear Suspension</option>
                    <option value="CVT">CVT</option>
                    <option value="Tires">Tires</option>
                    <option value="Oil">Oil</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div id="editCommonFields" class="form-group">
                <label for="editDescription">Description</label>
                <textarea id="editDescription" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="editQuantity">Quantity</label>
                <input type="number" id="editQuantity" name="quantity" required>
            </div>

            <div class="form-group">
                <label for="editPrice">Price</label>
                <input type="text" id="editPrice" name="price" required>
            </div>

            <!-- Rear Suspension Specific Fields -->
            <div id="editRearSuspensionFields" class="categoryFields form-group">
                <label for="editBrandRearSuspension">Brand</label>
                <input type="text" id="editBrandRearSuspension" name="brand">

                <label for="editColors">Colors</label>
                <div id="editColorContainerRearSuspension">
                    <!-- Existing colors will be added here dynamically -->
                </div>
                <button type="button" class="addColorButton" data-target="editColorContainerRearSuspension">Add Another Color</button>

                <label for="editMotorcycleRearSuspension">Motorcycle</label>
                <input type="text" id="editMotorcycleRearSuspension" name="motorcycle">
            </div>

            <!-- CVT Specific Fields -->
            <div id="editCvtFields" class="categoryFields form-group">
                <label for="editBrandCVT">Brand</label>
                <input type="text" id="editBrandCVT" name="brand">

                <label for="editMotorcycleCVT">Motorcycle</label>
                <input type="text" id="editMotorcycleCVT" name="motorcycle">
            </div>

            <!-- Tires Specific Fields -->
            <div id="editTiresFields" class="categoryFields form-group">
                <label for="editBrandTires">Brand</label>
                <input type="text" id="editBrandTires" name="brand">

                <label for="editSizeTires">Size</label>
                <input type="text" id="editSizeTires" name="size">
            </div>

            <!-- Oil Specific Fields -->
            <div id="editOilFields" class="categoryFields form-group">
                <label for="editBrandOil">Brand</label>
                <input type="text" id="editBrandOil" name="brand">

                <label for="editVolumeOil">Volume</label>
                <input type="text" id="editVolumeOil" name="volume">
            </div>

            <!-- Others Specific Fields -->
            <div id="editOthersFields" class="categoryFields form-group">
                <label for="editBrandOthers">Brand</label>
                <input type="text" id="editBrandOthers" name="brand">
            </div>

            <button type="submit">Update Product</button>
        </form>
    </div>
</div>



    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addProductModal = document.getElementById("addProductModal");
            var addBtn = document.querySelector(".add-button");
            var addSpan = document.querySelector("#addProductModal .close");


            addBtn.onclick = function() {
                addProductModal.style.display = "block";
            }

            addSpan.onclick = function() {
                addProductModal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == addProductModal) {
                    addProductModal.style.display = "none";
                } else if (event.target == editModal) {
                    editModal.style.display = "none";
                }
            }


         
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var categoryField = document.getElementById('category');
    var commonFields = document.getElementById('commonFields');
    var categoryFields = document.querySelectorAll('.categoryFields');

    // Hide all category-specific fields initially
    categoryFields.forEach(function(field) {
        field.style.display = 'none';
    });

    // Show/hide fields based on the selected category
    categoryField.addEventListener('change', function() {
        // Hide all category-specific fields initially
        categoryFields.forEach(function(field) {
            field.style.display = 'none';
        });

        // Show relevant fields based on selected category
        switch (categoryField.value) {
            case 'Front Suspension':
                commonFields.style.display = 'block';
                break;
            case 'Rear Suspension':
                commonFields.style.display = 'block';
                document.getElementById('rearSuspensionFields').style.display = 'block';
                break;
            case 'CVT':
                commonFields.style.display = 'block';
                document.getElementById('cvtFields').style.display = 'block';
                break;
            case 'Tires':
                commonFields.style.display = 'block';
                document.getElementById('tiresFields').style.display = 'block';
                break;
            case 'Oil':
                commonFields.style.display = 'block';
                document.getElementById('oilFields').style.display = 'block';
                break;
            case 'Others':
                commonFields.style.display = 'block';
                document.getElementById('othersFields').style.display = 'block';
                break;
            default:
                commonFields.style.display = 'none';
        }
    });

    // Handle adding additional color fields
    document.querySelectorAll('.addColorButton').forEach(function(button) {
        button.addEventListener('click', function() {
            var targetContainer = document.getElementById(button.dataset.target);
            var colorField = document.createElement('div');
            colorField.className = 'colorField';
            colorField.innerHTML = '<input type="text" name="colorRearSuspension[]" placeholder="Enter another color">';
            targetContainer.appendChild(colorField);
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Handle Edit Button Click
    document.querySelectorAll('.editBtn').forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.dataset.id;

            // Fetch product data using AJAX or populate the modal with the existing data directly if available
            var modal = document.getElementById('editProductModal');
            modal.style.display = 'block';

            fetch('Partials/get_product.php?id=' + productId)
    .then(response => response.json())
    .then(data => {
        // Update the current product image
        document.getElementById('currentProductImage').src = 'Partials/uploads/' + data.image;

        // Populate other form fields
        document.getElementById('editProductId').value = productId;
        document.getElementById('editCategory').value = data.category;
        document.getElementById('editDescription').value = data.description;
        document.getElementById('editQuantity').value = data.quantity;
        document.getElementById('editPrice').value = data.price;

        // Handle category-specific fields
        if (data.category === 'Rear Suspension') {
            document.getElementById('editBrandRearSuspension').value = data.brand;
            document.getElementById('editMotorcycleRearSuspension').value = data.motorcycle;

            var colorContainer = document.getElementById('editColorContainerRearSuspension');
            colorContainer.innerHTML = ''; // Clear existing fields
            data.colors.forEach(function(color) {
                var colorField = document.createElement('div');
                colorField.className = 'colorField';
                colorField.innerHTML = '<input type="text" name="editColors[]" value="' + color + '" placeholder="Enter a color">';
                colorContainer.appendChild(colorField);
            });
        } else if (data.category === 'CVT') {
            document.getElementById('editBrandCVT').value = data.brand;
            document.getElementById('editMotorcycleCVT').value = data.motorcycle;
        } else if (data.category === 'Tires') {
            document.getElementById('editBrandTires').value = data.brand;
            document.getElementById('editSizeTires').value = data.size;
        } else if (data.category === 'Oil') {
            document.getElementById('editBrandOil').value = data.brand;
            document.getElementById('editVolumeOil').value = data.volume;
        } else if (data.category === 'Others') {
            document.getElementById('editBrandOthers').value = data.brand;
        }

        // Show relevant fields based on category
        showEditCategoryFields(data.category);
    })
    .catch(error => console.error('Error fetching product data:', error));

        });
    });

    // Close Modal
    document.querySelectorAll('.close').forEach(function(span) {
        span.addEventListener('click', function() {
            var modal = span.closest('.modal');
            modal.style.display = 'none';
        });
    });

    // Function to show/hide fields based on selected category
    function showEditCategoryFields(category) {
    var commonFields = document.getElementById('editCommonFields');
    var categoryFields = document.querySelectorAll('.categoryFields');

    // Hide all category-specific fields initially
    categoryFields.forEach(function(field) {
        field.style.display = 'none';
    });

    // Show relevant fields based on category
    switch (category) {
        case 'Front Suspension':
            commonFields.style.display = 'block';
            break;
        case 'Rear Suspension':
            commonFields.style.display = 'block';
            document.getElementById('editRearSuspensionFields').style.display = 'block';
            break;
        case 'CVT':
            commonFields.style.display = 'block';
            document.getElementById('editCvtFields').style.display = 'block';
            break;
        case 'Tires':
            commonFields.style.display = 'block';
            document.getElementById('editTiresFields').style.display = 'block';
            break;
        case 'Oil':
            commonFields.style.display = 'block';
            document.getElementById('editOilFields').style.display = 'block';
            break;
        case 'Others':
            commonFields.style.display = 'block';
            document.getElementById('editOthersFields').style.display = 'block';
            break;
        default:
            commonFields.style.display = 'none';
    }
}


    // Handle Delete Button Click
    document.querySelectorAll('.deleteBtn').forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.dataset.id;
            if (confirm("Are you sure you want to delete this product?")) {
                // Redirect or use AJAX to delete the product
                fetch('Partials/delete_product.php?id=' + productId, {
                    method: 'DELETE',
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Product deleted successfully');
                        location.reload(); // Refresh the page to reflect changes
                    } else {
                        alert('Error deleting product: ' + data.message);
                    }
                })
                .catch(error => console.error('Error deleting product:', error));
            }
        });
    });

    // Close Modal
    document.querySelectorAll('.close').forEach(function(span) {
        span.addEventListener('click', function() {
            var modal = span.closest('.modal');
            modal.style.display = 'none';
        });
    });
});

    </script>
   
    <script src="script.js"></script>
</body>

</html>