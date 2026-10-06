<?php
require_once "php/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Smart Inventory</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>

    <!-- Main Layout -->
    <div class="dashboard-layout">

        <!-- Sidebar -->
        <aside class="sidebar">

            <div class="sidebar-logo">
                <h2>Smart Inventory</h2>
            </div>

            <nav class="sidebar-menu">

                <a href="dashboard.html" class="active">
                    Dashboard
                </a>

                <a href="products.php">
                    Products
                </a>

                <a href="categories.php">
                    Categories
                </a>

                <a href="stock.html">
                    Stock
                </a>

                <a href="reports.html">
                    Reports
                </a>

                <a href="index.html">
                    Logout
                </a>

            </nav>

        </aside>


        <!-- Main Content -->
        <main class="main-content">

            <!-- Top Bar -->
            <header class="top-bar">

                <div>
                    <h1>Dashboard</h1>
                    <p>Welcome to Smart Inventory Management System</p>
                </div>

            </header>


            <!-- Summary Cards -->
            <section class="dashboard-cards">

                <div class="dashboard-card">
                    <h3>Total Products</h3>
                    <p class="card-number">
<?php

$result = $conn->query("SELECT COUNT(*) AS total FROM products");
$row = $result->fetch_assoc();

echo $row["total"];

?>                 </p>
                </div>


                <div class="dashboard-card">
                    <h3>Total Stock</h3>
                    <p class="card-number">
<?php

$result = $conn->query("SELECT COALESCE(SUM(quantity), 0) AS total FROM products");
$row = $result->fetch_assoc();

echo $row["total"];

?></p>
                </div>


                <div class="dashboard-card">
                    <h3>Low Stock</h3>
                    <p class="card-number">
<?php

$result = $conn->query("SELECT COUNT(*) AS total FROM products WHERE quantity <= 5");
$row = $result->fetch_assoc();

echo $row["total"];

?></p>
                </div>


                <div class="dashboard-card">
                    <h3>Categories</h3>
                    <p class="card-number">
<?php

$result = $conn->query("SELECT COUNT(*) AS total FROM categories");
$row = $result->fetch_assoc();

echo $row["total"];

?>
                    </p>
                </div>

            </section>


            <!-- Recent Activity -->
            <section class="dashboard-section">

                <div class="section-header">
                    <h2>Recent Stock Activity</h2>
                </div>


                <div class="table-container">

                    <table>

                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>


                        <tbody>

                            <tr>
                                <td>05 Oct 2026</td>
                                <td>Laptop</td>
                                <td>Stock In</td>
                                <td>10</td>
                            </tr>

                            <tr>
                                <td>05 Oct 2026</td>
                                <td>Mouse</td>
                                <td>Stock Out</td>
                                <td>5</td>
                            </tr>

                            <tr>
                                <td>04 Oct 2026</td>
                                <td>Keyboard</td>
                                <td>Stock In</td>
                                <td>15</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </section>

        </main>

    </div>

</body>
</html>