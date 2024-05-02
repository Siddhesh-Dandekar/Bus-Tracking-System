<?php

session_start();

if (!isset ($_SESSION['loggedadmin']) || $_SESSION['loggedadmin'] !== true) {
  header("location: admin-login.php");
}

require '../config.php';


// Get form data
$driver_name = $_POST["driver_name"];
$driver_number = $_POST["driver_phone"];
$driving_card = $_POST["driving_card"];

// Prepare SQL statement
$sql = "INSERT INTO driver (driver_name, phone_number, driving_card)
VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind parameters (prevents SQL injection)
$stmt->bind_param("sss", $driver_name, $driver_number, $driving_card);

if ($stmt->execute()) {
  echo "School registered successfully!";
  header("location: dashboard.php");
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();



?>