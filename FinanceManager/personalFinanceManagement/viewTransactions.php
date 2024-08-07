<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Transactions</title>
    <link rel="stylesheet" href="viewTransaction.css">
</head>
<body>
    <div class="container">
        <h1>All Transactions</h1>
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

        $sql = "SELECT itemName, category, amount FROM transactions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Item Name</th><th>Category</th><th>Amount</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["itemName"]. "</td><td>" . $row["category"]. "</td><td>" . $row["amount"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No transactions found";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
