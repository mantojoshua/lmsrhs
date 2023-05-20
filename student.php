<?php
//this are variables for database connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "educatum_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
