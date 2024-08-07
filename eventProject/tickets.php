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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buy_tickets'])) {
    $eventId = $_POST['event_id'];
    $buyerName = $_POST['buyer_name'];
    $buyerEmail = $_POST['buyer_email'];
    $numberOfTickets = $_POST['number_of_tickets'];

    // Fetch total tickets and sold tickets
    $sqlFetch = "SELECT total_tickets, (SELECT COALESCE(SUM(number_of_tickets), 0) FROM tickets WHERE event_id = $eventId) AS sold_tickets FROM events WHERE id = $eventId";
    $resultFetch = $conn->query($sqlFetch);

    if ($resultFetch->num_rows > 0) {
        $rowFetch = $resultFetch->fetch_assoc();
        $totalTickets = $rowFetch['total_tickets'];
        $soldTickets = $rowFetch['sold_tickets'];
        $remainingTickets = $totalTickets - $soldTickets;

        if ($remainingTickets >= $numberOfTickets) {
            // Insert ticket purchase record
            $sqlInsert = "INSERT INTO tickets (event_id, buyer_name, buyer_email, number_of_tickets)
                          VALUES ($eventId, '$buyerName', '$buyerEmail', $numberOfTickets)";

            if ($conn->query($sqlInsert) === TRUE) {
                $_SESSION['message'] = "Tickets purchased successfully!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error: " . $sqlInsert . "<br>" . $conn->error;
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Not enough tickets available.";
            $_SESSION['message_type'] = "error";
        }
    }
}

// Fetch all events
$sql = "SELECT e.*, (e.total_tickets - COALESCE(t.sold_tickets, 0)) AS remaining_tickets
        FROM events e
        LEFT JOIN (SELECT event_id, SUM(number_of_tickets) AS sold_tickets FROM tickets GROUP BY event_id) t
        ON e.id = t.event_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets</title>
    <link rel="stylesheet" href="tickets.css">
    <style>
        .message {
            color: #ff6f61;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
        .event-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .event {
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .event h3 {
            margin-top: 0;
        }
        .event form {
            display: flex;
            flex-direction: column;
        }
        .event form label,
        .event form input {
            margin-bottom: 10px;
        }
        .event form button {
            padding: 10px;
            background: #ff6f61;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Tickets</h1>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<p class="message">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>
    <div class="event-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="event">';
                echo '<h3>' . $row['event_name'] . '</h3>';
                echo '<p>Ticket Price: $' . $row['ticket_price'] . '</p>';
                echo '<p>Remaining Tickets: ' . $row['remaining_tickets'] . '</p>';
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="event_id" value="' . $row['id'] . '">';
                echo '<label for="buyer_name">Name:</label>';
                echo '<input type="text" id="buyer_name" name="buyer_name" required>';
                echo '<label for="buyer_email">Email:</label>';
                echo '<input type="email" id="buyer_email" name="buyer_email" required>';
                echo '<label for="number_of_tickets">Number of Tickets:</label>';
                echo '<input type="number" id="number_of_tickets" name="number_of_tickets" min="1" max="' . $row['remaining_tickets'] . '" required>';
                echo '<button type="submit" name="buy_tickets">Buy Tickets</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo '<p>No events found.</p>';
        }
        ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
