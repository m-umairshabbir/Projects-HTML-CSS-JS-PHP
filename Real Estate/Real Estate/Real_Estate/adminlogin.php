<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realstate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input (assuming no sanitization or hashing)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $sql = "SELECT * FROM adminsignup WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("s", $username);

    // Execute statement
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // Loop through each row
        while ($row = $result->fetch_assoc()) {
            // Fetch stored password
            $storedPassword = $row['password'];

            // Verify password (not hashed for demonstration)
            if ($password === $storedPassword) {
                echo "Login successful!";
                // Redirect to home page or wherever you want
                header("Location: homeadmin.php");
                exit();
            }
        }
        // If no matching password found
        echo "Invalid password.";
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
}

$conn->close();
?>
