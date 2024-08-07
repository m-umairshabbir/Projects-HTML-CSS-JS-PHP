<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_planning";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $eventTime = $_POST['eventTime'];
    $eventLocation = $_POST['eventLocation'];
    $eventDescription = $_POST['eventDescription'];
    $ticketPrice = $_POST['ticketPrice'];
    $totalTickets = $_POST['totalTickets'];

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["eventPoster"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["eventPoster"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['message'] = "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["eventPoster"]["size"] > 5000000) {
        $_SESSION['message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['message'] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["eventPoster"]["tmp_name"], $targetFile)) {
            $posterUrl = $targetFile;

            // Prepare SQL statement
            $sql = "INSERT INTO events (event_name, event_date, event_time, event_location, event_description, ticket_price, total_tickets, event_poster)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Bind parameters and execute prepared statement
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssss", $eventName, $eventDate, $eventTime, $eventLocation, $eventDescription, $ticketPrice, $totalTickets, $posterUrl);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Event added successfully!";
            } else {
                $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
            }

            $stmt->close();
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        }
    }
}

// Close connection
$conn->close();
?>
