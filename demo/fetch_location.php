<?php
// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus_tracking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Simulate fetching latest coordinates (replace with your actual logic)
$sql = "SELECT * FROM bus_location WHERE bus_number='442'"; // Get the latest record
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $data = array(
    "latitude" => $row["latitude"],
    "longitude" => $row["longitude"],
  );
  echo json_encode($data);
} else {
  echo "No data found";
}

$conn->close();
?>