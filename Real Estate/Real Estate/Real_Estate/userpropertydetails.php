<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="overall">
        <div class="data">
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

            // Initialize variable to store search query
            $searchQuery = "";

            // Check if search query is submitted
            if(isset($_GET['search'])) {
                $searchQuery = $_GET['search'];
            }

            // Fetch property data based on search query
            $sql = "SELECT id, title, price, description, image FROM properties WHERE title LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
            $result = $conn->query($sql);

            $properties = [];
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    $properties[] = $row;
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
            <header>
                <div class="containerproperty">
                    <h1>Property Details</h1>
                </div>
            </header>

            <!-- Search Form -->
            <form method="GET" class="searchform" action="">
                <input class="srch" type="text" name="search" placeholder="Search...">
                <button class="sbtn" type="submit">Search</button>
            </form>

            <section id="property-listings">
                <div class="containerlisting">
                    <?php if (!empty($properties)): ?>
                        <?php foreach ($properties as $property): ?>
                            <div class="property-card" id="property-<?php echo $property['id']; ?>">
                                <img class="dbimg" src="<?php echo htmlspecialchars($property['image']); ?>" alt="Property Image">
                                <h2><?php echo htmlspecialchars($property['title']); ?></h2>
                                <p>Price: $<?php echo htmlspecialchars($property['price']); ?></p>
                                <p><?php echo htmlspecialchars($property['description']); ?></p>
                                <!-- <button class="delete-button" data-id="<?php echo $property['id']; ?>">Delete</button> -->
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No properties found.</p>
                    <?php endif; ?>
                </div>
            </section>
        </div>

    </div>

    
</body>
</html>
