<?php
// Create connection
$conn = new mysqli("localhost", "root", "");
mysqli_select_db($conn,"proyek");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>