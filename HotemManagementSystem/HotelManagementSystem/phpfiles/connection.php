<?php
$host="localhost";
$username="root";
$password="";
$user_db="user123_db";

$conn=mysqli_connect($host,$username,$password,$user_db);
if(!$conn){
    die("connecting").mysqli_connect_error();
}
?>