<?php
require_once "php/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Smart Inventory</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>

    <div class="dashboard-layout">

        <aside class="sidebar">
            <div class="sidebar-logo">
                <h2>Smart Inventory</h2>
            </div>

            <nav class="sidebar-menu">
                <a href="dashboard.html">Dashboard</a>
                <a href="products.html">Products</a>
                <a href="categories.php" class="active">Categories</a>
                <a href="stock.html">Stock</a>
                <a href="reports.html">Reports</a>
                <a href="index.html">Logout</a>
            </nav>
        </aside>

        <main class="main-content">

            <header class="top-bar">
                <div>
                    <h1>Categories</h1>
                    <p>Manage product categories</p>
                </div>
            </header>

            <section class="dashboard-section">

                <div class="section-header">
                    <h2>Category List</h2>
                    <a href="php/categories/add.php">Add Category</a>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Total Products</th>
                            </tr>
                        </thead>

                        <tbody>
                           <?php

$sql = "SELECT id, name, description, created_at
        FROM categories
        ORDER BY id DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }

} else {

    echo "<tr>";
    echo "<td colspan='4'>No categories found.</td>";
    echo "</tr>";

}

?>
                        </tbody>
                    </table>
                </div>

            </section>

        </main>

    </div>

</body>
</html>