<?php
session_start();
include "connection.php";

if (isset($_POST['submit'])) { // Corrected the name attribute here
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    $_SESSION['userlogin'] = false;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
            if ($username == $dbusername && $password == $dbpassword) {
                $_SESSION['userlogin'] = true;
                header("Location:usermain.php");
            }
        }
        if (!$_SESSION['userlogin']) {
            header("Location:booking.php");
        }
    } else {
        echo "No Record Found";
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userLogin</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form  method="POST">
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="password" placeholder="Password">

            <button name="submit" type="submit">Login</button> <!-- Corrected the name attribute here -->
        </form>
        <p>Don't have an account? <a href="userRegister.php" id="signup-link">Sign up</a></p>
    </div>
</body>
</html>
