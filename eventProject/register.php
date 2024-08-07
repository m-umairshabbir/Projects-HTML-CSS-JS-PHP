<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Start session for user registration

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_planning";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Check if admin is logged in
    if (isset($_SESSION['role']) && $_SESSION['role']) {
        // Admin is logged in, allow registration as admin
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login page with success message
            header("Location: adminDashboard.php?registration=success");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Admin is not logged in, disallow registration as admin
        if ($role != 'user') {
            // Invalid role selected, redirect back to registration form with error message
            header("Location: register.html?error=invalidrole");
            exit();
        }

        // Insert user data into the database
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login page with success message
            header("Location: login.html?registration=success");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
