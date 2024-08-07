<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landingPage.css">
    <title>Landing Page</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to Personal Finance Manager</h1>
        <p>Your financial well-being starts here.</p>
        <button onclick="redirectToLogin()">Get Started</button>
    </div>

    <script>
        function redirectToLogin() {
            window.location.href = "dashboard.php"; // Redirect to login page
        }
    </script>
</body>
</html>
