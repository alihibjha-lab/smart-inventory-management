<?php

require_once "../db.php";

$sql = "SELECT products.id, products.name, categories.name AS category,
               products.price, products.quantity, products.status
        FROM products
        LEFT JOIN categories ON products.category_id = categories.id
        ORDER BY products.id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Smart Inventory</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

<div class="main-content">

    <h1>Product List</h1>

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

        <?php if ($result && $result->num_rows > 0): ?>

            <?php while ($row = $result->fetch_assoc()): ?>

                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                    <td><?php echo htmlspecialchars($row["category"] ?? "No Category"); ?></td>
                    <td>₹<?php echo number_format($row["price"], 2); ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo htmlspecialchars($row["status"]); ?></td>
                </tr>

            <?php endwhile; ?>

        <?php else: ?>

            <tr>
                <td colspan="6">No products found.</td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>

</div>

</body>
</html>