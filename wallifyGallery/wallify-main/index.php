<?php
session_start();
if(isset($_SESSION['username'])){
   header("location: Home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallify</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
   <div class="container">
      <img src="./14.jpg" alt="">
      <div class="logo">Wallify</div>
      <div class="ptext"><button ><a href="./register.html"> Sign-Up</a></button>       <button ><a href="./lOgin.html"> Sign-in</a></button></div>
   </div>
</body>
</html>