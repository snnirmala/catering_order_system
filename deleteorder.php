<?php

session_start();

$link = mysqli_connect("localhost", "root", "", "cateringphp");
                                     
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $deleteQuery="DELETE FROM sh_order where id=$id"; 
    mysqli_query($link, $deleteQuery);

    echo "<script>window.location = 'dashboard.php';</script>";
} else {
    echo "ERR!";
}

?>