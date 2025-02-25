<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $appointment_date = $_POST['appointment_date'];
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];

    $sql = "INSERT INTO appointments (patient_name, email, phone, appointment_date, department, doctor) 
            VALUES ('$patient_name', '$email', '$phone', '$appointment_date', '$department', '$doctor')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
