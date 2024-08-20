<?php
// Establish the database connection and store it in the $conn variable
$conn = mysqli_connect("localhost", "root", "", "mafarims");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
