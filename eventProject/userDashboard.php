<?php
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

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page with a message to login first
    header("Location: login.html?message=loginfirst");
    exit();
}

$sql = "SELECT * FROM events WHERE event_date >= CURRENT_DATE() ORDER BY event_date ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Error executing the query: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="userDashboard.css">
</head>
<body>
    <header>
        <h1>User Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#ft">Events</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <?php
            // Check if the user is logged in before displaying the logout option
            if (isset($_SESSION['user_id'])) {
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="login.html">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
    <main>
        <div class="event-cards">
            <!-- Display upcoming events with poster images -->
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="event-card">';
                    echo '<div class="event-image">';
                    echo '<img src="' . $row['event_poster'] . '" alt="' . $row['event_name'] . ' Poster">';
                    echo '</div>';
                    echo '<div class="event-details">';
                    echo '<h3>' . $row['event_name'] . '</h3>';
                    echo '<p><strong>Date:</strong> ' . $row['event_date'] . '</p>';
                    echo '<p><strong>Time:</strong> ' . $row['event_time'] . '</p>';
                    echo '<p><strong>Location:</strong> ' . $row['event_location'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No upcoming events right now.</p>';
            }
            ?>
        </div>
    </main>
    <footer id="ft">
        <p>&copy; 2024 User Dashboard. All rights reserved.</p>
    </footer>
</body>
</html>
