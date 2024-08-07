<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finance_manager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    // Update the budget for the selected category
    $updateBudgetQuery = "INSERT INTO budgets (category, amount) VALUES ('$category', $amount)
                          ON DUPLICATE KEY UPDATE amount = amount + $amount";
    if ($conn->query($updateBudgetQuery) === TRUE) {
        // Update the total account balance
        $updateBalanceQuery = "UPDATE accounts SET balance = balance + $amount WHERE id = 1";
        if ($conn->query($updateBalanceQuery) === TRUE) {
            echo "Success: Budget and balance updated successfully.";
        } else {
            echo "Error updating balance: " . $conn->error;
        }
    } else {
        echo "Error updating budget: " . $conn->error;
    }
}

$conn->close();
?>
