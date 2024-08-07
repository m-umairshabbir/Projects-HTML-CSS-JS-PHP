<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    session_start();
    
?>
<body>
    <form action="mainpage.php" method="POST">
        <input type="text" name="search"><button name="searchbtn">Search</button>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ROLE</th>
                <th>Action</th>
            </tr>
            <tr>
                <?php

                ?>
            </tr>
        </table>
    </form>
</body>
</html>