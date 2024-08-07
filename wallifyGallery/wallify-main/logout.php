<?php
session_start();
if(isset($_SESSION['username']))
{session_destroy();
session_unset();
session_abort();
header('location: index.php');}else{
    echo "not loggedin";
}
?>