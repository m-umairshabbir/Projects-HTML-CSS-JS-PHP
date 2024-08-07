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

// Fetch ticket sales information
$sql = "SELECT t.buyer_name, t.buyer_email, t.number_of_tickets, e.event_name, e.event_date, e.event_time, e.event_location
        FROM tickets t
        JOIN events e ON t.event_id = e.id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Sales</title>
    <link rel="stylesheet" href="sales.css">
</head>
<body>
    <h1>Ticket Sales</h1>
    <div class="sales-container">
        <?php
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Buyer Name</th><th>Email</th><th>Number of Tickets</th><th>Event Name</th><th>Event Date</th><th>Event Time</th><th>Event Location</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['buyer_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['buyer_email']) . '</td>';
                echo '<td>' . htmlspecialchars($row['number_of_tickets']) . '</td>';
                echo '<td>' . htmlspecialchars($row['event_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['event_date']) . '</td>';
                echo '<td>' . htmlspecialchars($row['event_time']) . '</td>';
                echo '<td>' . htmlspecialchars($row['event_location']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No ticket sales found.</p>';
        }
        ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
