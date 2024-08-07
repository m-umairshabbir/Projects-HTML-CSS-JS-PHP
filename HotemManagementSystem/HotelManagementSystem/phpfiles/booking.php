<?php
include "connection.php";
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnic = $_POST["cnic"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $checkIn = $_POST["check-in"];
    $checkOut = $_POST["check-out"];
    $roomType = $_POST["room-type"];
    $message = $_POST["message"];
    // Prepare and execute the SQL query to insert data into the database
    $sql = "INSERT INTO bookings (cnic, name, email, check_in, check_out, room_type, message) 
            VALUES ('$cnic', '$name', '$email', '$checkIn', '$checkOut', '$roomType', '$message')";
            
    if ($conn->query($sql) === TRUE) {
       header('Location:userlogout.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 5px 25px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 10px 20px 30px #20002c;
            /* color: #f2f2f2; */
        }
        
        h2 {
            font-family: cursive;
            font-weight: 1000;
            font-size: 2em;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            font-weight: bold;
        }
        textarea,
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            outline: none;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .btn-submit {
            color: #20002c ;
            background-color: #fff;
            font-weight: bolder;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            
            border: 4px solid #cbb4d4;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn-submit:hover {
            color: #fff;
            background-image: linear-gradient(to right, #20002c, #cbb4d4);
        }
        .datecontainer{
            display: flex;
            justify-content: space-around;
        }
        .s{
            display: flex;
            justify-content: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Room Booking</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="cnic">CNIC:</label>
                <input type="text" id="cnic" name="cnic" min=13 max=13 required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="room-type">Room Type:</label>
                <select id="room-type" name="room-type" required>
                    <option value="">Select Room Type</option>
                    <option value="single">Single Room</option>
                    <option value="double">Double Room</option>
                    <option value="suite">Luxuary</option>
                </select>
            </div>

            
            <div class="form-group">
                <label for="message">Additional Message:</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
           <div class="datecontainer">
           <div class="form-group">
                <label for="check-in">Check-in Date:</label>
                <input type="date" id="check-in" name="check-in" required>
            </div>
            <div class="form-group">
                <label for="check-out">Check-out Date:</label>
                <input type="date" id="check-out" name="check-out" required>
            </div>
           </div>
            <div class="form-group s">
                <input type="submit" class="btn-submit" value="Submit Booking">
            </div>
        </form>
    </div>
</body>
</html>
