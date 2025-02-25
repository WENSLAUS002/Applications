<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['volunteer_name'];
    $email = $_POST['volunteer_email'];
    $phone = $_POST['volunteer_phone'];
    $area_of_service = $_POST['volunteer_area'];

    $sql = "INSERT INTO volunteers (name, email, phone, area_of_service) 
            VALUES ('$name', '$email', '$phone', '$area_of_service')";

    if ($conn->query($sql) === TRUE) {
        echo "Volunteer application submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
