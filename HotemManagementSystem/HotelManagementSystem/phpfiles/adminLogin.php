<?php
session_start();
include "connection.php";
if (isset($_POST['submitt'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins";
    $result = mysqli_query($conn, $sql);
    
    $_SESSION['adminlogin']=false;
    if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) {
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        if ($username == $dbusername && $password == $dbpassword) {
            $_SESSION['adminlogin']=true;
            header("Location:display.php");
        }
    }
    if(!$_SESSION['adminlogin']){
        header("Location:adminLogin.php");
    }
    }else{
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
    <title>adminLogin</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container" id="login-container">
        <h1>Login</h1>
        <form id="login-form" action="../php/adminLogin.php" method="POST">
          <input  name="username" type="text" placeholder="Username">
          <input name="password" type="password" placeholder="Password">
         
          <button name="submitt" type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="adminRegister.php" id="signup-link">Sign up</a></p>
      </div>
</body>
</html>