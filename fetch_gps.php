<?php
$servername = "localhost";
$username = "id22061438_locateweb";
$password = "Locate@111";
$dbname = "id22061438_locateme";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the latitude and longitude from the POST parameters
$lat = $_POST['latitude'];
$lon = $_POST['longitude'];

// Insert the latitude and longitude into the database
$sql = "UPDATE bus_location SET bus_latitude = '$lat', bus_longitude = '$lon' WHERE bus_unique_id = 13";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
