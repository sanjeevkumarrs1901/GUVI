<?php
$conn = new mysqli("localhost", "root", "", "userdata");
  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>