<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit;
}
include 'config.php';

// Handle product addition
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = intval($_POST['price']);
    $image = $_POST['image'];
    $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', $price, '$image')");
}

$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | AToZ Mobile Stores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>
<main>
    <h2>Add Product</h2>
    <form method="post" class="admin-form">
        <input type="text" name="name" placeholder="Mobile Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <input type="text" name="image" placeholder="Image URL" required>
        <button type="submit">Add Product</button>
    </form>
    <h2>Current Products</h2>
    <table>
        <tr><th>Name</th><th>Price</th><th>Image</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td>Rs. <?php echo number_format($row['price']); ?></td>
            <td><img src="<?php echo $row['image']; ?>" alt="" width="60"></td>
        </tr>
        <?php endwhile; ?>
    </table>
</main>
</body>
</html>