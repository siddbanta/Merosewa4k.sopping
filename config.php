<?php
$host = "localhost";
$db = "atoz_mobile";
$user = "root";
$pass = ""; // Your MySQL password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>