<?php

require_once "../db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $category_id = $_POST["category_id"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $status = ($quantity > 0) ? "In Stock" : "Out of Stock";

    $sql = "INSERT INTO products (name, category_id, price, quantity, status)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sidds",
        $name,
        $category_id,
        $price,
        $quantity,
        $status
    );

    if ($stmt->execute()) {
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Smart Inventory</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

<div class="main-content">

    <h1>Add Product</h1>

    <?php if ($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">

        <label>Product Name</label><br>
        <input type="text" name="name" required><br><br>

        <label>Category ID</label><br>
        <input type="number" name="category_id" required><br><br>

        <label>Price</label><br>
        <input type="number" step="0.01" name="price" required><br><br>

        <label>Quantity</label><br>
        <input type="number" name="quantity" required><br><br>

        <button type="submit">Add Product</button>

    </form>

</div>

</body>
</html>