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
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO inquiries (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to another page after successful submission
        header("Location: contactui.php?success=true");
        exit; // Make sure to exit after redirecting
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    $stmt->close();
} else {
    // If the request method is not POST, redirect back to the contact form page
    header("Location: contact_form.html");
    exit;
}

// Close connection
$conn->close();

?>
