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
                                <button class="delete-button" data-id="<?php echo $property['id']; ?>">Delete</button>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No properties found.</p>
                    <?php endif; ?>
                </div>
            </section>
        </div>
        <div class="form-container">
            <button id="addPropertyButton">Add Property</button>
            <div id="addPropertyModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Add Property</h2>
                    <form id="addPropertyForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                        </div>
                        <button id="addPropertyFormSubmit" type="button">Add Property</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal
        var modal = document.getElementById('addPropertyModal');
        var btn = document.getElementById("addPropertyButton");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Add Property Form Submission
        document.getElementById('addPropertyFormSubmit').addEventListener('click', function() {
            var formData = new FormData(document.getElementById('addPropertyForm'));

            fetch('add_property.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    window.location.reload();
                } else {
                    console.log(data);
                    alert('Failed to add property.');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        // Delete Property Button Click
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const propertyId = this.getAttribute('data-id');
                const propertyCard = document.getElementById('property-' + propertyId);

                fetch('delete_property.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: propertyId })
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        propertyCard.remove();
                    } else {
                        alert('Failed to delete property.');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
</body>
</html>
