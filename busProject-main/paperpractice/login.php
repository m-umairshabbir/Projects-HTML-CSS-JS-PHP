<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Login">
        <h3>Dont have an account?<a href="signup.php">Signup</a></h3>
    </form>    
    <?php
        session_start();
        $con=mysqli_connect("localhost","root","","practice");
        if($con){
            // echo("Connection Sucessful:");
        }
        else{
            die(mysqli_connect_error($con));
        }
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $password=$_POST['password'];
            $sql="SELECT * FROM data;";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $dbname=$row['name'];
                    $dbpassword=$row['password'];
                    if($dbpassword==$password && $dbname==$name){
                        $_SESSION['login']=true;
                        echo'
                            <script>
                                alert("Loged in");
                            </script>
                        ';
                    }
                    else{
                        echo'
                            <script>
                                alert("Invalid user name or password");
                            </script>
                        ';
                    }
                }
            }
        }
     ?>
</body>
</html>