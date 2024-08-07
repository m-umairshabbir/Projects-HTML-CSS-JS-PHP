<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flat Booking</title>
    <style>
      a{
        text-decoration: none;
      }
        body {
            font-family: Arial, sans-serif;
        }

        .my-5 {
            margin-top: 2.5rem;
            margin-bottom: 2.5rem;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-center {
            justify-content: center;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th {
            font-weight: bold;
            background-color: #f8f9fa;
            color: #495057;
        }

        .table td {
            vertical-align: middle;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
            border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            text-decoration: none;
        }

        .btn-primary {
            color: white;
            background-image: linear-gradient(to right, #20002c, #cbb4d4);
            border-color: #007bff;
            text-decoration: none;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            text-decoration: none;
        }

        .text-light {
            color: #fff;
        }

        .containar {
            text-align: center;
        }
        h1{
          font-family: cursive;
        }
    </style>
</head>
<body>
    <h1 class="my-5 d-flex align-items-center justify-content-center">Flat Booking</h1>
    <table class="table my-5">
        <thead>
            <tr>
                <th scope="col">SL no.</th>
                <th scope="col">CNIC</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Check_In</th>
                <th scope="col">Check_out</th>
                <th scope="col">Room_Type</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include 'connection.php';
            $sql = "SELECT * FROM bookings";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Invalid query: " . mysqli_error($conn));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['cnic']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['check_in']}</td>
                    <td>{$row['check_out']}</td>
                    <td>{$row['room_type']}</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='update.php?id={$row['id']}'>Update</a>
                  
                        <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
</td>

                    </td>
                </tr>
                ";
            }
            ?>

        </tbody>
    </table>

    <div class="container">
        <button class="btn btn-primary my-5"><a href="landingPage.php" class="text-light">Log out</a></button>
    </div>

</body>
</html>
