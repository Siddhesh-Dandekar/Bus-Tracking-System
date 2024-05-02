<?php

session_start();

if (!isset ($_SESSION['loggedadmin']) || $_SESSION['loggedadmin'] !== true) {
  header("location: admin-login.php");
}

require '../config.php';

$school = $_POST["school"];
$driver = $_POST["driver"];
$bus = $_POST["bus_number"];
$origin = $_POST["origin"];
$destination =$_POST["destination"];

// Check if origin and destination are the same
if ($origin == $destination) {
  echo "Origin and destination cannot be the same. Please choose different cities. ";
  echo " Redirecting wait 3 seconds";
  // Redirect after 5 seconds to the previous page
  header("Refresh: 3; dashboard.php");
  exit; // Stop the script
}

// Prepare SQL statement
$sql = "INSERT INTO bus_location (school_id, driver_id, bus_number, origin, destination)
VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind parameters (prevents SQL injection)
$stmt->bind_param("sssss", $school, $driver, $bus, $origin, $destination);

if ($stmt->execute()) {
  echo "bus registered successfully!";
  header("location: dashboard.php");
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
