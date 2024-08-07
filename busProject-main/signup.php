<!DOCTYPE html>
<html>
<head>
  <title>Signup Page</title>
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
    .container input[type="email"],
    .container input[type="password"],
    .container input[type="number"] {
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
    <h2>Signup</h2>
    <form action="signupp.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="number" name="age" placeholder="Age" required>
      <input type="submit" name="submit" value="Sign up">
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </div>
</body>
</html>




  <!-- <div class="container">
    <form action="signupp.php" method="POST">
      <label for="username">Enter User name</label>
      <input type="text" name="username" id="username">
      <label for="email">Enter Email</label>
      <input type="email" name="email" id="email">
      <label for="password">Enter Password</label>
      <input type="password" name="password" id="password">
      <label for="age">Enter Age</label>
      <input type="number" name="age" id="age">
      <button type="submit" name="submit">Sign UP</button>
      <a href="login.php">Login</a>
    </form>
  </div> -->