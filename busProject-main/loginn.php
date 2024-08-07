<?php 
include"connect.php";
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="SELECT * FROM signup";
  $result=mysqli_query($con,$sql);

  while($row=mysqli_fetch_assoc($result)){
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    if($username==$dbusername&&$password==$dbpassword){
      // echo"Login Sucessful!";
      header("Location:userdisplay.php");
    }
    else{
      echo'<script>
          alert("Invalid username or password.");
          window.location.href = "login.php";
      </script>';
    }
  }

}
?>