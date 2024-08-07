<?php
include'connect.php';
$id=$_GET['id'];
if(isset($_POST['submit']))
{   
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $dept = $_POST['dept'];
    $arrival = $_POST['arrival'];
    $time = $_POST['time'];
    $fare = $_POST['fare']; 
    $sql="SELECT FROM passenger_info where id='$id'";
    $result=mysqli_query($con,$sql);
  
    $sql = "UPDATE passenger_info set id=$id , name='$name' , dept='$dept' , arrival='$arrival' , time='$time' , fare='$fare' where id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
    echo "Data update Successfully";
     header('location:display.php');
    }
        else{
             die(mysqli_error($con));
        }   
    }
?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Bus Ticket</title>
  </head>
  <body>

<h4 class="my-5 d-flex align-items-center justify-content-center">Update Passenger Data</h4>
<div class="container my-5">
    <form method="post">
  <div class="mb-3"> 
   <label  class="form-label">Name</label>
    <input type="text" class="form-control"  placeholder="Update Name" autocomplete="off" name="name"  >


  <div class="mb-3">
    <label class="form-label">Mobile No.</label>
    <input type="mobile" class="form-control"  placeholder="Update Mobile No." autocomplete="off" name="mobile" >
  </div>



  <div class="mb-3">
    <label class="form-label">Departure</label>
    <input type="tex" class="form-control"  placeholder="Update Departure" autocomplete="off" name="dept">
  </div>


  <div class="mb-3">
    <label class="form-label">Arrival</label>
    <input type="text" class="form-control"  placeholder="Update Arrival." autocomplete="off" name="arrival">
  </div>


  <div class="mb-3">
    <label class="form-label">Time</label>
    <input type="time" class="form-control"  placeholder="Update Time" autocomplete="off" name="time">
  </div>



  <div class="mb-3">
    <label class="form-label">Fare</label>
    <input type="text" class="form-control"  placeholder="Update Fare" autocomplete="off" name="fare">
  </div>


  <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </div>

  </form>

  
  </body>
</html>
