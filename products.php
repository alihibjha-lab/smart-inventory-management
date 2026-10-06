<?php
require_once "php/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Smart Inventory</title>
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
                <a href="products.php" class="active">Products</a>
                <a href="categories.html">Categories</a>
                <a href="stock.html">Stock</a>
                <a href="reports.html">Reports</a>
                <a href="index.html">Logout</a>
            </nav>
        </aside>

        <main class="main-content">

            <header class="top-bar">
                <div>
                    <h1>Products</h1>
                    <p>Manage your inventory products</p>
                </div>
            </header>

            <section class="dashboard-section">

                <div class="section-header">
                    <h2>Product List</h2>
                </div>
<a href="php/products/add.php">Add Product</a>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
<?php

$sql = "SELECT products.id, products.name, categories.name AS category,
               products.price, products.quantity, products.status
        FROM products
        LEFT JOIN categories ON products.category_id = categories.id
        ORDER BY products.id DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["category"] ?? "No Category") . "</td>";
        echo "<td>₹" . number_format($row["price"], 2) . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
        echo "</tr>";
    }

} else {

    echo "<tr>";
    echo "<td colspan='6'>No products found.</td>";
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