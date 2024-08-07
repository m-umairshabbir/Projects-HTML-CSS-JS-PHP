<?php 
  include"connect.php";
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $age=$_POST['age'];

  $sql="INSERT INTO signup VALUES ('$username','$email','$password','$age');";

  $result=mysqli_query($con,$sql);
  if($result){
    echo"Sucessfull";
    header("Location:login.php");
  }
  else{
    echo"Re Submit";
  }


?>