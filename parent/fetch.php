<?php
// Include connection details
include '../config.php';

// Start session (assuming you need session variables)
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedemail'])) {
  header("location: login.php"); // Redirect to login if not logged in
  exit();
}

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get logged-in user's email ID
$logged_email = $_SESSION['loggedemail'];

// Fetch bus location data from the user's assigned bus
$query = "SELECT 
  bus_location.school_id, 
  school.school_name, 
  bus_location.driver_id, 
  driver.driver_name, 
  bus_location.bus_number, 
  origin.city_name AS origin_city, 
  origin.latitude AS origin_latitude,
  origin.longitude AS origin_longitude,
  destination.city_name AS destination_city,
  destination.latitude AS destination_latitude,
  destination.longitude AS destination_longitude,
  bus_location.bus_latitude,
  bus_location.bus_longitude
FROM bus_location 
INNER JOIN school ON bus_location.school_id = school.school_id
INNER JOIN driver ON bus_location.driver_id = driver.driver_id
INNER JOIN city AS origin ON bus_location.origin = origin.city_id
INNER JOIN city AS destination ON bus_location.destination = destination.city_id
WHERE bus_location.bus_number = (
  SELECT bus_number FROM user WHERE email_id = ?
)";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $logged_email);



$stmt = $conn->prepare($query);
$stmt->bind_param("s", $logged_email);

// Execute the prepared statement
if ($stmt->execute()) {
  $result = $stmt->get_result(); // Get the result of the query
  $data = array();
  while ($row = $result->fetch_assoc()) { // Use fetch_assoc() instead of fetch_array()
    $data[] = $row;
  }
  // Convert the array to JSON
  echo json_encode($data);
} else {
  // Handle execution errors (optional)
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
