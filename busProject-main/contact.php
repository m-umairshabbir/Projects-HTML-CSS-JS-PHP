<!DOCTYPE html>
<html>
<head>
  <title>Contact Us - Bus Ticketing System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    
    .container label {
      display: block;
      font-weight: bold;
      margin-bottom: 10px;
    }
    
    .container input[type="text"],
    .container textarea,.container input[type="email"] {
      width: 93%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    
    .container textarea {
      resize: vertical;
      height: 100px;
    }
    
    .container input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    
    .container input[type="submit"]:hover {
      background-color: #45a049;
    }
    
    .container p {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Contact Us</h2>
    <form action="contactus.php" method="POST" >
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>
      
      <input type="submit" name="submit" value="Send Message">
    </form>
    <p>Thank you for contacting us! We will get back to you soon.</p>
  </div>
</body>
</html>
