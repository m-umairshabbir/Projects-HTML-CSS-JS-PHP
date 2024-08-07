<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM bookings WHERE id = $id";
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location: delete.php");
        echo " deleted ";
        exit();
    } else {
        echo "Error deleting the record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. No record specified.";
}
?>
