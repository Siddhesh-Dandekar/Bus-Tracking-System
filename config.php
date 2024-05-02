<?php
# this file contain Database Credentials and used to establish connection with the database

define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "bus_tracking");

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}



?>