<?php

session_start();

if (!isset ($_SESSION['loggedadmin']) || $_SESSION['loggedadmin'] !== true) {
  header("location: admin-login.php");
}

require '../config.php';


// Get form data
$school_name = $_POST["school_name"];
$phone_number = $_POST["school_phone"];
$address = $_POST["address"];

// Prepare SQL statement
$sql = "INSERT INTO school (school_name, phone_number, school_address)
VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind parameters (prevents SQL injection)
$stmt->bind_param("sss", $school_name, $phone_number, $address);

if ($stmt->execute()) {
  echo "School registered successfully!";
  header("location: dashboard.php");
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();



?>