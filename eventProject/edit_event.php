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
    $eventId = $_POST['id'];
    $eventName = $_POST['event_name'];
    $eventDate = $_POST['event_date'];
    $eventTime = $_POST['event_time'];
    $eventLocation = $_POST['event_location'];
    $eventDescription = $_POST['event_description'];
    $ticketPrice = $_POST['ticket_price']; // Added ticket price
    $totalTickets = $_POST['total_tickets']; // Added total tickets

    // Check if delete poster checkbox is checked
    if (isset($_POST['delete_poster'])) {
        // Delete existing poster
        $sqlDeletePoster = "UPDATE events SET event_poster='' WHERE id=$eventId";
        if ($conn->query($sqlDeletePoster) === TRUE) {
            $_SESSION['message'] = "Event poster deleted successfully!";
        } else {
            $_SESSION['message'] = "Error deleting event poster: " . $conn->error;
        }
    }

    // File upload handling for event poster update
    if ($_FILES['event_poster']['size'] > 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["event_poster"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["event_poster"]["size"] > 5000000) {
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
            if (move_uploaded_file($_FILES["event_poster"]["tmp_name"], $targetFile)) {
                $posterUrl = $targetFile;
                // Update event details with new poster URL, ticket price, and total tickets
                $sql = "UPDATE events SET event_name='$eventName', event_date='$eventDate', event_time='$eventTime', event_location='$eventLocation', event_description='$eventDescription', event_poster='$posterUrl', ticket_price='$ticketPrice', total_tickets='$totalTickets' WHERE id=$eventId";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['message'] = "Event details updated successfully!";
                } else {
                    $_SESSION['message'] = "Error updating event details: " . $conn->error;
                }
            } else {
                $_SESSION['message'] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Update event details without changing the poster, but including ticket price and total tickets
        $sql = "UPDATE events SET event_name='$eventName', event_date='$eventDate', event_time='$eventTime', event_location='$eventLocation', event_description='$eventDescription', ticket_price='$ticketPrice', total_tickets='$totalTickets' WHERE id=$eventId";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Event details updated successfully!";
        } else {
            $_SESSION['message'] = "Error updating event details: " . $conn->error;
        }
    }

    // Redirect back to event management page
    header("Location: events.php");
    exit(); // Ensure script stops execution after redirection
}

// Fetch event details for editing
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    $sql = "SELECT * FROM events WHERE id=$eventId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $eventName = $row['event_name'];
        $eventDate = $row['event_date'];
        $eventTime = $row['event_time'];
        $eventLocation = $row['event_location'];
        $eventDescription = $row['event_description'];
        $eventPoster = $row['event_poster'];
        $ticketPrice = $row['ticket_price']; // Added ticket price
        $totalTickets = $row['total_tickets']; // Added total tickets
    } else {
        $_SESSION['message'] = "Event not found!";
        header("Location: events.php");
        exit();
    }
} else {
    $_SESSION['message'] = "Invalid request!";
    header("Location: events.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h2>Edit Event</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $eventId; ?>">
            <div class="form-group">
                <label>Event Name</label>
                <input type="text" name="event_name" value="<?php echo $eventName; ?>">
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="event_date" value="<?php echo $eventDate; ?>">
            </div>
            <div class="form-group">
                <label>Time</label>
                <input type="time" name="event_time" value="<?php echo $eventTime; ?>">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="event_location" value="<?php echo $eventLocation; ?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="event_description"><?php echo $eventDescription; ?></textarea>
            </div>
            <div class="form-group">
                <label>Ticket Price</label>
                <input type="text" name="ticket_price" value="<?php echo $ticketPrice; ?>">
            </div>

            <div class="form-group">
                <label>Total Tickets</label>
                <input type="number" name="total_tickets" value="<?php echo $totalTickets; ?>">
            </div>
            <div class="form-group">
                <label>Event Poster</label>
                <img src="<?php echo $eventPoster; ?>" alt="Event Poster" style="max-width: 200px;"><br>
                <input type="file" name="event_poster"><br>
                <label>Delete Poster:</label>
                <input type="checkbox" name="delete_poster">
            </div>
            <button type="submit">Update Event</button>
        </form>
    </div>
</body>

</html>