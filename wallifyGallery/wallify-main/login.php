<?php
session_start();
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
$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user from the database
$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    // Compare passwords
    if ($password === $storedPassword) { 
        $_SESSION['username']='email';  
        header('location: ./Home.php');

    } else {
        echo "Incorrect password. Login unsuccessful.";
    }
} else {
    echo "User not found. Login unsuccessful.";
}

$conn->close();
?>
