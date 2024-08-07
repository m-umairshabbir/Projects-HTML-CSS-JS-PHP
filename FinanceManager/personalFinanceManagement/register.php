<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $servername = "localhost";
    $username = "root"; // Default username in XAMPP
    $password_db = ""; // Default password is empty in XAMPP
    $dbname = "finance_manager";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $sql_check = "SELECT id FROM users WHERE email='$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        $_SESSION['registration_error'] = "This email is already registered.";
        header("Location: register.html");
        exit();
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['registration_success'] = "Registration successful! ...";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['registration_error'] = "Error: " . $sql . "<br>" . $conn->error;
            header("Location: register.html");
            exit();
        }
    }

    $conn->close();
}
?>
