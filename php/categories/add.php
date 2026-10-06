<?php

require_once "../db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $description = $_POST["description"];

    $sql = "INSERT INTO categories (name, description)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ss",
        $name,
        $description
    );

    if ($stmt->execute()) {
        $message = "Category added successfully!";
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
    <title>Add Category - Smart Inventory</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

<div class="main-content">

    <h1>Add Category</h1>

    <?php if ($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">

        <label>Category Name</label><br>
        <input type="text" name="name" required><br><br>

        <label>Description</label><br>
        <input type="text" name="description"><br><br>

        <button type="submit">Add Category</button>

    </form>

</div>

</body>
</html>