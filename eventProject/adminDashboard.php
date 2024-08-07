<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminDashboard.css">
    <style>
        
        /* Style for event cards */
        .event-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .event-card {
            width: 300px;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background-color: #fff;
            overflow: hidden; /* Prevents image overflow */
            position: relative;
            transition: all 0.3s ease;
        }

        .event-card:hover {
            height: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .event-card h3 {
            margin-top: 0;
        }

        .event-card img {
            width: 100%;
            height: 200px; /* Adjust as needed */
            object-fit: cover; /* Ensures the image covers the container */
            border-radius: 5px 5px 0 0; /* Rounded corners only at the top */
        }

        .event-card .event-details {
            padding: 10px;
            display: none;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 0 0 5px 5px; /* Rounded corners only at the bottom */
        }

        .event-card:hover .event-details {
            display: block;
        }
    </style>
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="events.php" id="eventsLink">Events</a></li>
            <li><a href="addEventHtml.php" id="addEventLink">Add Event</a></li>
            <li><a href="ticket_sales.php" id="usersLink">Ticket-Sales</a></li>
            <li><a href="register.html" id="usersLink">Register Admin</a></li>
            <?php
            session_start();
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="login.html">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
    <main>
        <div class="event-cards">
            <!-- PHP code to fetch and display upcoming events with poster images -->
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "event_planning";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM events WHERE event_date >= CURRENT_DATE() ORDER BY event_date ASC";
            $result = $conn->query($sql);

            if (!$result) {
                die("Error executing the query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="event-card">
                        <img src="<?php echo $row['event_poster']; ?>" alt="<?php echo $row['event_name']; ?> Poster">
                        <div class="event-details">
                            <h3><?php echo $row['event_name']; ?></h3>
                            <p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>
                            <p><strong>Time:</strong> <?php echo $row['event_time']; ?></p>
                            <p><strong>Location:</strong> <?php echo $row['event_location']; ?></p>
                            <!-- You can add more event details here -->
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p>No upcoming events right now.</p>';
            }

            $conn->close();
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var eventsLink = document.getElementById('eventsLink');
            var addEventLink = document.getElementById('addEventLink');
            var usersLink = document.getElementById('usersLink');

            <?php
            if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
                echo "eventsLink.addEventListener('click', preventNavigation);";
                echo "addEventLink.addEventListener('click', preventNavigation);";
                echo "usersLink.addEventListener('click', preventNavigation);";

                echo "function preventNavigation(event) {";
                echo "event.preventDefault();";
                echo "alert('Please login as admin to access this feature.');";
                echo "}";
            }
            ?>
        });
    </script>
</body>
</html>
