<?php

session_start();

// Validate admin session (assuming 'loggedadmin' is the session variable)
if (!isset($_SESSION['loggedadmin']) || $_SESSION['loggedadmin'] !== true) {
  exit(); // Terminate script execution to prevent unauthorized access
}

require '../config.php';

// Check if school ID is provided and it's an integer
if (isset($_GET['school_id']) && is_numeric($_GET['school_id'])) {
  $school_id = (int) $_GET['school_id'];

  // Prepare SQL statement with parameterized query
  $sql_bus = "SELECT bus_number FROM bus_location WHERE school_id = ?";

  $stmt = $conn->prepare($sql_bus);

  // Bind parameter
  $stmt->bind_param("i", $school_id);

  if ($stmt->execute()) {
    $result_bus = $stmt->get_result(); // Get the result set

    $buses = [];
    if ($result_bus->num_rows > 0) {
      // Fetch buses and store in an array
      while ($row_bus = $result_bus->fetch_assoc()) {
        $buses[] = $row_bus;
        
      }
    }

    echo json_encode($buses); // Send buses as JSON response
  } else {
    echo "Error fetching buses: " . $stmt->error;
  }

  $stmt->close();
} else {
  // Handle invalid or missing school ID
  echo "Invalid school ID";
}

$conn->close();

exit; // Ensure script execution stops after sending JSON
?>
