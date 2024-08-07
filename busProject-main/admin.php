<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    
    .container {
      width: 300px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .container h2 {
      text-align: center;
    }
    
    .container input[type="text"],
    .container input[type="password"] {
      width: 93%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    .container input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    
    .container input[type="submit"]:hover {
      background-color: #45a049;
    }
    
    .container p {
      text-align: center;
      margin-top: 10px;
    }
    
    .container p a {
      text-decoration: none;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="adminn.php" method="POST">
      <input type="text" name="username"  placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" name="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="check.php">cancel</a></p>
  </div>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin login</title>
</head>
<body>
  <div class="container">
    <form action="adminn.php" method="POST">
      <label for="username">Enter User name</label>
      <input type="text" name="username" id="username">
      <label for="password">Enter Password</label>
      <input type="password" name="password" id="password">
      <button type="submit" name="submit">Login</button>
    </form>
  </div>

</body>
</html> -->