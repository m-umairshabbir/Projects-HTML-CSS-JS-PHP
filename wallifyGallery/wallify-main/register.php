<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wallify";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Insert data into the database
$sql = "INSERT INTO user (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
header('location: login.html');} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
