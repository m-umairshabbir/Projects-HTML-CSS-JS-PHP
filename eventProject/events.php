<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events Record</title>
    <link rel="stylesheet" href="events.css">
</head>
<body>
    <h1>All Events Record</h1>
    <div class="event-container">
        <?php
        // Include database connection
        include 'connection.php';

        // Fetch all events from database
        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="event">';
                echo '<h3>' . $row['event_name'] . '</h3>';
                echo '<p>Date: ' . $row['event_date'] . '</p>';
                echo '<p>Time: ' . $row['event_time'] . '</p>';
                echo '<p>Location: ' . $row['event_location'] . '</p>';
                echo '<p>Description: ' . $row['event_description'] . '</p>';
                echo '<p>Ticket Price: $' . $row['ticket_price'] . '</p>'; // Display ticket price
                echo '<p>Total Tickets: ' . $row['total_tickets'] . '</p>'; // Display total tickets
                echo '<div class="btn-container">';
                echo '<a href="edit_event.php?id=' . $row['id'] . '">Edit</a>';
                echo '<a href="delete_event.php?id=' . $row['id'] . '">Delete</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No events found.</p>';
        }

        // Close database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
