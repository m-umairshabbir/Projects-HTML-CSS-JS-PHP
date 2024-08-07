<?php
session_start();

// Check if the user is already logged in, redirect to dashboard if so
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Check user credentials
    $sql = "SELECT id, name, email, password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful, set session variables and redirect to dashboard
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid email or password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Invalid email or password.";
        header("Location: login.php");
        exit();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<div class="error-message">' . $_SESSION['login_error'] . '</div>';
        unset($_SESSION['login_error']);
    }
    if (isset($_SESSION['registration_success'])) {
        echo '<div class="success-message">' . $_SESSION['registration_success'] . '</div>';
        unset($_SESSION['registration_success']);
    }
    ?>
    <div class="container">
        <div class="form-wrapper">
            <h1>User Login</h1>
            <form id="loginForm" action="login.php" method="POST">
                <input type="email" id="email" name="email" placeholder="Your Email" required>
                <input type="password" id="password" name="password" placeholder="Your Password" required>
                <button type="submit">Login</button>
                <div id="errorMessage" class="error-message"></div>
            </form>
            <div class="register-link">
                <p>Not registered? <a href="register.html">Register here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
