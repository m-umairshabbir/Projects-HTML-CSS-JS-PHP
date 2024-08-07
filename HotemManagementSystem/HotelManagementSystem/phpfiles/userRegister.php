<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// display_errors = On
// display_startup_errors = On
// error_reporting = E_ALL


include "connection.php";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $sql = "INSERT INTO users ( username, email, pass ,age) VALUES ('$username', '$email', '$password','$age')";

  $result = mysqli_query($conn, $sql);
  
  if ($result) {
   header("Location:userLogin.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userRegister</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container" id="signup-container">
        <h1>Sign Up</h1>
        <form  method="POST">
          <input name="username" type="text" placeholder="Username">
          <input name="email" type="email" placeholder="Email">
          <input name="password" type="password" placeholder="Password">
          <input name="age" type="number" placeholder="Age">
          <button name="submit" type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="#" id="login-link">Login</a></p>
      </div>
</body>
</html>