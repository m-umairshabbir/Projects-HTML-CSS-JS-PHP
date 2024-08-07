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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input (assuming no sanitization or hashing)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Insert user into database without hashing
    $stmt = $conn->prepare("INSERT INTO usersignup (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password); // No hashing

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
