<?php
include'connect.php';
if(isset($_POST['submit']))
{   
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $dept = $_POST['dept'];
    $arrival = $_POST['arrival'];
    $time = $_POST['time'];
    $fare = $_POST['fare'];

    $sql = "INSERT INTO `passenger_info` (`name`, `mobile`, `dept`, `arrival`, `time`, `fare`) 
    VALUES ('$name', '$mobile','$dept', '$arrival', '$time','$fare');";
  
    $result=mysqli_query($con,$sql);
    if($result)
    {
    echo "Data inserted Successfully";
    header('location:userdisplay.php');
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
    

  <h4 class="my-5 d-flex align-items-center justify-content-center">Enter Your Data</h4>

  <ul class="list-group list-group-flush text-center">
      <li class="list-group-item">Description(FARE)</li>
      <li class="list-group-item">Lahore to Peshawar - 7200</li>
      <li class="list-group-item">Karachi to Islamabad - 5000</li>
      <li class="list-group-item">Kashmir to karachi - 10000</li>
      <li class="list-group-item">Chakwal to Islamabad - 1000</li>
    </ul>
<div class="container my-5">
    <form method="post">
  <div class="mb-3">
   <label  class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Enter your Name" autocomplete="off" name="name"> 


  <div class="mb-3">
    <label class="form-label">Mobile No.</label>
    <input type="mobile" class="form-control"  placeholder="Enter your Mobile No." autocomplete="off" name="mobile">
  </div>


  <div class="mb-3">
    <label class="form-label">Departure</label>
    <input type="tex" class="form-control"  placeholder="Enter your Departure" autocomplete="off" name="dept">
  </div>



  <div class="mb-3">
    <label class="form-label">Arrival</label>
    <input type="text" class="form-control"  placeholder="Enter your Arrival." autocomplete="off" name="arrival">
  </div>



  <div class="mb-3">
    <label class="form-label">Time</label>
    <input type="time" class="form-control"  placeholder="Enter your Time" autocomplete="off" name="time">
  </div>

  <div class="mb-3">
    <label class="form-label">Fare</label>
    <input type="text" class="form-control"  placeholder="Enter your Fare" autocomplete="off" name="fare">
  </div>


  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>


  </form>
  </body>
</html>