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

        .modal-content form label {
            margin-top: 10px;
            margin-bottom: 5px;
            color: var(--primary-color);
        }

        .modal-content form input,
        .modal-content form select {
            padding: 10px;
            border: 1px solid var(--grey-color);
            border-radius: 5px;
            font-size: 16px;
        }

        .modal-content form button {
            margin-top: 20px;
            background-color: var(--primary-color);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-content form button:hover {
            background-color: var(--secondary-color);
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
            <th>ID</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Variations</th>
            <th>Quantity</th> <!-- New Quantity Column -->
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'db_conn.php';

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $rowsPerPage = 5;
        $offset = ($page - 1) * $rowsPerPage;

        $totalRowsResult = $conn->query("SELECT COUNT(*) as total FROM products");
        $totalRows = $totalRowsResult->fetch_assoc()['total'];
        $totalPages = ceil($totalRows / $rowsPerPage);

        $sql = "SELECT * FROM products LIMIT $offset, $rowsPerPage";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td><img src='Partials/uploads/" . $row["product_image"] . "' alt='" . $row["product_name"] . "' width='150'></td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";

                echo "<td>";
                $productId = $row["id"];
                $variationsSql = "SELECT * FROM product_variations WHERE product_id = $productId";
                $variationsResult = $conn->query($variationsSql);
                if ($variationsResult->num_rows > 0) {
                    while ($variation = $variationsResult->fetch_assoc()) {
                        echo "Color: " . $variation["color"] . " - Size: " . $variation["size"] . "<br>";
                    }
                }
                echo "</td>";

                echo "<td>";
                if ($variationsResult->num_rows > 0) {
                    $variationsResult->data_seek(0); // Reset result pointer to beginning
                    while ($variation = $variationsResult->fetch_assoc()) {
                        echo $variation["quantity"] . "<br>";
                    }
                }
                echo "</td>";

                echo "<td>₱" . $row["price"] . "</td>";
                echo "<td class='action-buttons'>
                        <button class='edit-button'>Edit</button>
                        <button class='delete-button' data-id='" . $row["id"] . "'>Delete</button>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No products found</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>



        <div class="pagination">
            <button id="prevBtn" <?php if ($page <= 1) {
                                        echo 'disabled';
                                    } ?> onclick="changePage(<?php echo $page - 1; ?>)">Prev</button>
            <button id="nextBtn" <?php if ($page >= $totalPages) {
                                        echo 'disabled';
                                    } ?> onclick="changePage(<?php echo $page + 1; ?>)">Next</button>
        </div>

        <div id="addProductModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add Product</h2>
                <form id="addProductForm" enctype="multipart/form-data" action="Partials/save_products.php" method="post">
                    <label for="productImage">Product Image</label>
                    <input type="file" id="productImage" name="productImage" accept="image/*" required>

                    <label for="productName">Product Name</label>
                    <input type="text" id="productName" name="productName" required>

                    <label for="description">Description</label>
                    <textarea id="description" name="description" required></textarea>

                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="Suspension Oils">Suspension Oils</option>
                        <option value="Rear Shock">Rear Shock</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Tires">Tires</option>
                        <option value="Others">Others</option>
                    </select>

                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" required>

                    <div id="variations">
                        <div class="variation">
                            <label for="color">Color</label>
                            <input type="text" name="color[]" required>

                            <label for="size">Size</label>
                            <input type="text" name="size[]" required>

                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity[]" required>
                        </div>
                    </div>
                    <button type="button" id="addVariation">Add Variation</button>

                    <button type="submit">Add Product</button>
                </form>
            </div>
        </div>



        <div id="editProductModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Edit Product</h2>
                <form id="editProductForm" enctype="multipart/form-data">
                    <input type="hidden" id="editProductId" name="editProductId">

                    <label for="editProductImage">Product Image</label>
                    <input type="file" id="editProductImage" name="editProductImage" accept="image/*">
                    <br>
                    <img id="currentProductImage" src="" alt="Current Image" style="max-width: 150px; display: none;">

                    <label for="editProductName">Product Name</label>
                    <input type="text" id="editProductName" name="editProductName" required>

                    <label for="editDescription">Description</label>
                    <textarea id="editDescription" name="editDescription" required></textarea>

                    <label for="editCategory">Category</label>
                    <select id="editCategory" name="editCategory" required>
                        <option value="Suspension Oils">Suspension Oils</option>
                        <option value="Rear Shock">Rear Shock</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Tires">Tires</option>
                        <option value="Others">Others</option>
                    </select>

                    <div id="editVariations">
                        <!-- Variations will be populated here by JavaScript -->
                    </div>
                    <button type="button" id="addEditVariation">Add Variation</button>

                    <label for="editPrice">Price</label>
                    <input type="text" id="editPrice" name="editPrice" required>

                    <button type="submit">Save Changes</button>
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


            var deleteBtns = document.querySelectorAll(".delete-button");
            deleteBtns.forEach(function(deleteBtn) {
                deleteBtn.onclick = function() {
                    var productId = deleteBtn.getAttribute("data-id");
                    if (confirm("Are you sure you want to delete this product?")) {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "Partials/delete_product.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                location.reload();
                            } else {
                                alert("An error occurred while deleting the product.");
                            }
                        };
                        xhr.send("id=" + productId);
                    }
                };
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var editModal = document.getElementById("editProductModal");
            var editBtns = document.querySelectorAll(".edit-button");
            var editSpan = document.querySelector("#editProductModal .close");

            editBtns.forEach(function(editBtn) {
                editBtn.onclick = function() {
                    editModal.style.display = "block";
                    var row = editBtn.closest("tr");
                    var cells = row.querySelectorAll("td");

                    // Set the product information
                    document.getElementById("editProductId").value = cells[0].innerText;
                    document.getElementById("editProductName").value = cells[2].innerText;
                    document.getElementById("editDescription").value = cells[3].innerText;
                    document.getElementById("editCategory").value = cells[4].innerText;
                    document.getElementById("editPrice").value = cells[6].innerText.replace('₱', '').trim(); // Fetch price

                    // Handle the current product image
                    var imageUrl = row.querySelector("img").src;
                    var currentImage = document.getElementById("currentProductImage");
                    if (imageUrl) {
                        currentImage.src = imageUrl;
                        currentImage.style.display = "block";
                    } else {
                        currentImage.style.display = "none";
                    }

                    // Fetch and display existing variations
                    var productId = cells[0].innerText;
                    fetchVariations(productId);
                };
            });

            editSpan.onclick = function() {
                editModal.style.display = "none";
            };

            function fetchVariations(productId) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "Partials/get_product_variations.php?productId=" + productId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var variations = JSON.parse(xhr.responseText);
                        var variationsContainer = document.getElementById("editVariations");
                        variationsContainer.innerHTML = ''; // Clear existing variations
                        variations.forEach(function(variation) {
                            var variationDiv = document.createElement("div");
                            variationDiv.className = "variation";
                            variationDiv.innerHTML = `
                        <label for="editColor">Color</label>
                        <input type="text" name="editColor[]" value="${variation.color}" required>
                        <label for="editSize">Size</label>
                        <input type="text" name="editSize[]" value="${variation.size}" required>
                        <label for="editQuantity">Quantity</label>
                        <input type="number" name="editQuantity[]" value="${variation.quantity}" required>
                    `;
                            variationsContainer.appendChild(variationDiv);
                        });
                    } else {
                        alert("Failed to load variations.");
                    }
                };
                xhr.send();
            }

            document.getElementById("addEditVariation").onclick = function() {
                var variationContainer = document.getElementById("editVariations");
                var newVariation = document.createElement("div");
                newVariation.className = "variation";
                newVariation.innerHTML = `
            <label for="editColor">Color</label>
            <input type="text" name="editColor[]" required>
            <label for="editSize">Size</label>
            <input type="text" name="editSize[]" required>
            <label for="editQuantity">Quantity</label>
            <input type="number" name="editQuantity[]" required>
        `;
                variationContainer.appendChild(newVariation);
            };

            document.getElementById("editProductForm").onsubmit = function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "Partials/edit_product.php", true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        location.reload();
                    } else {
                        alert("An error occurred while updating the product.");
                    }
                };
                xhr.send(formData);
            };
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var addVariationBtn = document.getElementById("addVariation");
            addVariationBtn.addEventListener("click", function() {
                var variationContainer = document.getElementById("variations");
                var newVariation = document.createElement("div");
                newVariation.className = "variation";
                newVariation.innerHTML = `
            <label for="color">Color</label>
            <input type="text" name="color[]" required>
            <label for="size">Size</label>
            <input type="text" name="size[]" required>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity[]" required>
        `;
                variationContainer.appendChild(newVariation);
            });
        });
    </script>
    <script>
        function changePage(page) {
            window.location.href = "?page=" + page;
        }
    </script>
 <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function() {
                var searchTerm = searchInput.value;
                fetchProducts(searchTerm);
            });

            function fetchProducts(searchTerm) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'search.php?search=' + encodeURIComponent(searchTerm), true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.querySelector('#productTable tbody').innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            }
        });
    </script>
    <script src="script.js"></script>
</body>

</html>