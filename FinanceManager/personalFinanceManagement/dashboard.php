<?php
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="dashboard.css">
    <style>
        .navbar .container {
        
            border-radius: 30px 0px;
        
        }
        
    </style>
    
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container ok">
                <a href="#" class="navbar-brand">Personal Finance Manager</a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" onclick="checkLoginAndRedirect('addBudget.html')" class="nav-link">Add Budget</a></li>
                    <li class="nav-item"><a href="#" onclick="checkLoginAndRedirect('transaction.html')" class="nav-link">Transactions</a></li>
                    <li class="nav-item"><a href="#" onclick="checkLoginAndRedirect('dashboard.php')" class="nav-link">Dashboard</a></li>
                </ul>
                <?php if ($loggedIn): ?>
                    <a href="logout.php" class="nav-button">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="nav-button">Login</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="welcome-container">
            <h1>Welcome to Your Personal Finance Manager</h1>
            <div class="total-balance">
                <h2 class="total-balance">Total Balance</h2>
                <p id="totalBalance">
                    <?php
                    if ($loggedIn) {
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "finance_manager";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT balance FROM accounts WHERE id = 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['balance'];
                        } else {
                            echo "0";
                        }

                        $conn->close();
                    } else {
                        echo "Please log in to view your total balance.";
                    }
                    ?>
                </p>
                
            </div>
        </div>
        
        
        <p>Your financial well-being starts here.</p>
        
        <h2>Current Budgets</h2>
        <table id="budgetTable">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($loggedIn): ?>
                    <?php
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

                    $sql = "SELECT category, amount FROM budgets";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['category'] . "</td><td>" . $row['amount'] . "</td></tr>";
                    }

                    $conn->close();
                    ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">Please log in to view your budget details.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <h2>Last 5 Transactions</h2>
        <table id="transactionTable">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($loggedIn): ?>
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT itemName, category, amount, transactionDate FROM transactions ORDER BY transactionDate DESC LIMIT 5";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['itemName'] . "</td><td>" . $row['category'] . "</td><td>" . $row['amount'] . "</td><td>" . $row['transactionDate'] . "</td></tr>";
                    }

                    $conn->close();
                    ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Please log in to view your recent transactions.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
        function checkLoginAndRedirect(url) {
            // Check if the user is logged in
            <?php if ($loggedIn): ?>
                window.location.href = url;
            <?php else: ?>
                alert("Please log in first.");
            <?php endif; ?>
        }
    </script>
</body>
</html>
