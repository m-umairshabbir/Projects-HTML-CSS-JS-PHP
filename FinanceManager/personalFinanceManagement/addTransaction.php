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
    $itemName = $_POST['itemName'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    // Check if budget for the category is available
    $checkBudgetQuery = "SELECT amount FROM budgets WHERE category = '$category'";
    $budgetResult = $conn->query($checkBudgetQuery);
    if ($budgetResult->num_rows > 0) {
        $row = $budgetResult->fetch_assoc();
        $budgetAmount = $row['amount'];

        if ($amount <= $budgetAmount) {
            // Deduct amount from category budget
            $updateBudgetQuery = "UPDATE budgets SET amount = amount - $amount WHERE category = '$category'";
            if ($conn->query($updateBudgetQuery) === TRUE) {
                // Update total balance
                $updateBalanceQuery = "UPDATE accounts SET balance = balance - $amount WHERE id = 1";
                if ($conn->query($updateBalanceQuery) === TRUE) {
                    // Insert transaction into transactions table
                    $insertTransactionQuery = "INSERT INTO transactions (itemName, category, amount) VALUES ('$itemName', '$category', $amount)";
                    if ($conn->query($insertTransactionQuery) === TRUE) {
                        echo "Success: Transaction added.";
                    } else {
                        echo "Error adding transaction: " . $conn->error;
                    }
                } else {
                    echo "Error updating balance: " . $conn->error;
                }
            } else {
                echo "Error updating budget: " . $conn->error;
            }
        } else {
            echo "Error: Insufficient budget for the category.";
        }
    } else {
        echo "Error: Budget for the category not found.";
    }
} else {
    echo "Error: Invalid request.";
}

$conn->close();
?>
