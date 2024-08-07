<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realstate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);
$propertyId = $data['id'];

// Delete property
$sql = "DELETE FROM properties WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $propertyId);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
