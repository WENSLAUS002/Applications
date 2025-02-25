<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['job_name'];
    $email = $_POST['job_email'];
    $phone = $_POST['job_phone'];
    $position = $_POST['job_position'];
    $resume = $_FILES['resume']['name'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($resume);

    if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO jobApplications (name, email, phone, position, resume) 
                VALUES ('$name', '$email', '$phone', '$position', '$resume')";

        if ($conn->query($sql) === TRUE) {
            echo "Job application submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}
$conn->close();
?>
