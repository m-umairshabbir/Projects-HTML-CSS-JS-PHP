<?php

include'connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="DELETE FROM passenger_info WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo"Deleted Succesfull";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>