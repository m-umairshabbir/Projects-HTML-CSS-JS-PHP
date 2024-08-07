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
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    // Check if the uploads directory exists, if not, create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Validate and move the uploaded file
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO properties (title, price, description, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $price, $description, $target_file);

        // Execute the statement
        if ($stmt->execute()) {
            echo "success"; // Return success message
        } else {
            echo "Failed to add property: " . $stmt->error; // Return error message
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close connection
$conn->close();
?>
