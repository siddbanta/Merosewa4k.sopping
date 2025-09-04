<?php
session_start();
include 'config.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND is_admin=1";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid admin credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login | AToZ Mobile Stores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Admin Login</h1>
</header>
<main>
    <form method="post" class="login-form">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
        <p style="color:red;"><?php echo $error; ?></p>
    </form>
</main>
</body>
</html>