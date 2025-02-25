<?php
include 'db_connects.php';

// Patient Registration Form Data
if (isset($_POST['reg-name'])) {
    $name = $_POST['reg-name'];
    $gender = $_POST['reg-gender'];
    $age = $_POST['reg-age'];
    $contact = $_POST['reg-contact'];
    $address = $_POST['reg-address'];

    $stmt = $conn->prepare("INSERT INTO patients (name, gender, age, contact, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $gender, $age, $contact, $address);
    $stmt->execute();
    $patient_id = $stmt->insert_id; // Get the newly created patient ID
    $stmt->close();
}

// Admission Form Data
if (isset($_POST['adm-sickness'])) {
    $sickness = $_POST['adm-sickness'];
    $description = $_POST['adm-description'];
    $doctor = $_POST['adm-doctor'];

    $stmt = $conn->prepare("INSERT INTO admissions (patient_id, sickness, description, assigned_doctor) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $patient_id, $sickness, $description, $doctor);
    $stmt->execute();
    $stmt->close();
}

// Surgery Form Data
if (isset($_POST['sur-name'])) {
    $surgery_type = $_POST['sur-surgery-type'];
    $surgeon = $_POST['sur-doctor'];
    $consent = $_POST['sur-consent'];

    $stmt = $conn->prepare("INSERT INTO surgeries (patient_id, surgery_type, surgeon, consent_given) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $patient_id, $surgery_type, $surgeon, $consent);
    $stmt->execute();
    $stmt->close();
}

// Discharge Form Data
if (isset($_POST['dis-name'])) {
    $treatment = $_POST['dis-treatment'];
    $followup = $_POST['dis-followup'];
    $next_appointment = $_POST['dis-next-appointment'];

    $stmt = $conn->prepare("INSERT INTO discharges (patient_id, treatment, followup_instructions, next_appointment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $patient_id, $treatment, $followup, $next_appointment);
    $stmt->execute();
    $stmt->close();
}

// Medical Card Form Data
if (isset($_POST['card-name'])) {
    $amount_due = $_POST['card-amount'];
    $sickness = $_POST['card-sickness'];
    $description = $_POST['card-description'];

    $stmt = $conn->prepare("INSERT INTO medical_cards (patient_id, amount_due, sickness, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("idss", $patient_id, $amount_due, $sickness, $description);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
echo "Form data submitted successfully!";
?>
