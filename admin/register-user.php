<?php

session_start();

// Validate admin session (assuming 'loggedadmin' is the session variable)
if (!isset($_SESSION['loggedadmin']) || $_SESSION['loggedadmin'] !== true) {
  header("location: admin-login.php");
  exit(); // Terminate script execution to prevent further processing
}

require '../config.php';

// Sanitize user input (prevent XSS and SQL injection)
$user_email = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
$parent_name = filter_var($_POST["parent_name"], FILTER_SANITIZE_STRING);
$child_name = filter_var($_POST["child_name"], FILTER_SANITIZE_STRING);
$phone_number = filter_var($_POST["phone_number"], FILTER_SANITIZE_STRING);
$school = filter_var($_POST["school"], FILTER_SANITIZE_STRING); // Assuming school name doesn't require special filtering
$bus_number = filter_var($_POST["bus_number"], FILTER_SANITIZE_STRING); 


// Hash password for secure storage (using bcrypt for current best practice)
$password_hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

// Prepare SQL statement with parameterized query
$sql = "INSERT INTO user (parent_name, child_name, email_id, password, school_id, bus_number, phone_number)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind parameters with sanitized data
$stmt->bind_param("sssssss", $parent_name, $child_name, $user_email, $password_hash, $school, $bus_number, $phone_number);

if ($stmt->execute()) {
  echo "School registered successfully!";
  header("location: dashboard.php"); // Optional: Redirect to dashboard if successful
} else {
  echo "Error: " . $stmt->error;

  // Consider logging the error for troubleshooting purposes
  error_log("Registration error: " . $stmt->error, 3, "/path/to/error.log");
}

$stmt->close();
$conn->close();

?>
