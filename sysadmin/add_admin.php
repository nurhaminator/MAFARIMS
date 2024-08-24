<?php
include("../includes/dbcon.php");

// Prepare the data for the new account
$new_username = 'mafarAdmin';
$new_password = password_hash('mafarBARMMAdmin', PASSWORD_DEFAULT); // Hash the password for security
$full_name = 'MAFAR Admin';
$role = 'SystemAdmin';
$banner = NULL;
$province_id = NULL;
$municipality_id = NULL;
$created_at = date('Y-m-d H:i:s');
$updated_at = $created_at;

// Prepare the SQL statement
$sql = "INSERT INTO Users (username, password, full_name, role, banner, province_id, municipality_id, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Initialize the prepared statement
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("sssssiiss", $new_username, $new_password, $full_name, $role, $banner, $province_id, $municipality_id, $created_at, $updated_at);

// Execute the statement
if ($stmt->execute()) {
    echo "New user created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
