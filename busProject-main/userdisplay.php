<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <title>Bus Ticket</title>
  </head>
<body>
    <h1 class="my-5 d-flex align-items-center justify-content-center">Bus Ticket</h1>

    <ul class="list-group list-group-flush text-center">
      <li class="list-group-item">Description(FARE)</li>
      <li class="list-group-item">Lahore to Peshawar - 7200</li>
      <li class="list-group-item">Karachi to Islamabad - 5000</li>
      <li class="list-group-item">Kashmir to karachi - 10000</li>
      <li class="list-group-item">Chakwal to Islamabad - 1000</li>
    </ul>

<table class="table table-striped my-5" >
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Departure</th>
      <th scope="col">Arrival</th>
      <th scope="col">Time</th>
      <th scope="col">Fare</th>
    </tr>
  </thead>
  <tbody>
  
  <!-- <a  class= 'btn btn-primary btn-sm'  href='check.php'>Go BACK<</a> -->
  <div class="containar">
    <button class="btn btn-primary ml-2 mt-3"><a href="check.php" class="text-light">Go Back</a></button>
  </div>


<?php
include'connect.php';
$sql="SELECT * FROM passenger_info";
$result=mysqli_query($con,$sql);
if(!$result){
  die("Invalid query:" . mysqli_error($con)); 
}
while($row = mysqli_fetch_assoc($result)){
  echo"
  <tr>
  <td>{$row['name']}</td>
  <td>{$row['dept']}</td>
  <td>{$row['arrival']}</td>
  <td>{$row['time']}</td>
  <td>{$row['fare']}</td>
  <td>
  </td>
  </tr>
  ";
}
?>

  </tbody>
</table>
<div class="containar">
      <button class="btn btn-primary ml-2"><a href="usershow.php" class="text-light">Book Ticket</a></button>
  </div>
</body>
</html>