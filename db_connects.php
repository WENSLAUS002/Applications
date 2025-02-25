<?php
$host = 'localhost'; // Your database host
$username = 'root'; // Your database username
$password = 'wenslaus001'; // Your database password
$dbname = 'nairobi_hospital'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
