<?php
$host = 'localhost';
$username = 'root';
$password = 'wenslaus001'; 
$database = 'hospital_management';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
