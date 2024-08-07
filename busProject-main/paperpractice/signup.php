<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="signup.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="password" name="password" placeholder="Password">
        <input type="text" name="role" placeholder="Role">
        <input type="submit" name="submit" value="Register">
        <h3>Already have an account?<a href="login.php">Login</a></h3>
    </form>
    <?php
        $con=mysqli_connect("localhost","root","","practice");
        if($con){
            // echo("Connection Sucessful:");
        }
        else{
            die(mysqli_connect_error($con));
        }



        $sql1="CREATE TABLE `newtable` (id int(11) PRIMARY KEY AUTO_INCREMENT,name varchar(20),password varchar(20),role varchar(12))";

        $result1=mysqli_query($con,$sql1);





        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $password=$_POST['password'];
            $role=$_POST['role'];
            $sql="INSERT INTO `data` (`name`,`password`,`role`) VALUES('$name','$password','$role')";
            $result=mysqli_query($con,$sql);
            if($result){
                echo'
                    <script>
                        alert("Data Added");
                        </script>
                        ';
                        // window.location.href="mainpage.php";
            }
            else{
                echo'
                    <script>
                        alert("Error");
                    </script>
                ';
            }
        }
    ?>
</body>
</html>