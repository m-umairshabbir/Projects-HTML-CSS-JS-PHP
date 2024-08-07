<?php
    include"connect.php";
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sql="SELECT * FROM admin_data";
        $result=mysqli_query($con,$sql);

        while($row=mysqli_fetch_assoc($result)){
            $dbusername=$row['username'];
            $dbpassword=$row['password'];
            if($username==$dbusername&&$password==$dbpassword){
                // echo"Login Sucessful!";
                header("Location:display.php");
              }
              else{
                echo'<script>
                    alert("Password or Username is Invalid!");
                    window.location.href = "adminn.php";
                </script>';
              }
            }
          }
?>