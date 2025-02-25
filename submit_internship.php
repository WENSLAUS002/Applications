<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['intern_name'];
    $email = $_POST['intern_email'];
    $phone = $_POST['intern_phone'];
    $department = $_POST['intern_department'];

    $sql = "INSERT INTO internships (name, email, phone, department) 
            VALUES ('$name', '$email', '$phone', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "Internship application submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
