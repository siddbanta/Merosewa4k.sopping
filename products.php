<?php
include 'config.php';
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products | AToZ Mobile Stores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>AToZ Mobile Stores</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="admin.php">Admin</a>
    </nav>
</header>
<main>
    <h2>All Mobile Products</h2>
    <div class="product-list">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="product-card">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
            <p class="price">Rs. <?php echo number_format($row['price']); ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> AToZ Mobile Stores</p>
</footer>
</body>
</html>