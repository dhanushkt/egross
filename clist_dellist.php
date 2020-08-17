<?php 
include 'access/useraccesscontrol.php';

if (isset($_POST) & !empty($_POST) ) {

    $listnumber = $_POST['id'];

    $deletelistitem = mysqli_query($con, "DELETE FROM custom_listitems WHERE clistno=$listnumber");
    $deletelist = mysqli_query($con, "DELETE FROM custom_list WHERE clistno=$listnumber");

    if ($deletelist) {
        echo "success";
    }
    
}



?>