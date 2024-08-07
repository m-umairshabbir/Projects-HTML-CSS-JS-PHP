<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="addEvent.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #ff6f61;
    color: #fff;
    padding: 10px 20px;
    text-align: center;
}

main {
    padding: 20px;
}

form {
    max-width: 600px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="time"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

button {
    background-color: #ff6f61;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

button:hover {
    background-color: #ff6f61;
}

    </style>
</head>

<body>
    <header>
        <h1>Add Event</h1>
    </header>
    <main>
        <form id="addEventForm" action="addEvent.php" method="POST" enctype="multipart/form-data">
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" required><br>

            <label for="eventDate">Event Date:</label>
            <input type="date" id="eventDate" name="eventDate" required><br>

            <label for="eventTime">Event Time:</label>
            <input type="time" id="eventTime" name="eventTime" required><br>

            <label for="eventLocation">Event Location:</label>
            <input type="text" id="eventLocation" name="eventLocation" required><br>

            <label for="eventDescription">Event Description:</label><br>
            <textarea id="eventDescription" name="eventDescription" rows="4" cols="50" required></textarea><br>

            <label for="ticketPrice">Ticket Price:</label>
            <input type="number" id="ticketPrice" name="ticketPrice" min="0" step="0.01" required><br>

            <label for="totalTickets">Total Tickets:</label>
            <input type="number" id="totalTickets" name="totalTickets" min="0" required><br>

            <label for="eventPoster">Event Poster:</label>
            <input type="file" id="eventPoster" name="eventPoster" accept="image/*" required><br>

            <button type="submit" name="submit">Add Event</button>
        </form>
    </main>
</body>

</html>
