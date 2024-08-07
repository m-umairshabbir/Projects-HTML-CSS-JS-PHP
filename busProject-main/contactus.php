<?php
    include"connect.php";
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];

        $sql="INSERT INTO contactus VALUES('$name','$email','$message');";

        $result=mysqli_query($con,$sql);

        if($result){
            header("Location:check.php");
        }
        else{
            echo'<script>
                alert("Sorry for the inconvience.");
                window.location.href = "contact.php";
            </script>';
        }
    }
?>