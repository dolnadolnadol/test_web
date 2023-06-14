<?php
$host = "localhost";
$database = "snack";
$username = "root";
$password = "";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
