<?php 
include 'access/useraccesscontrol.php';

if (isset($_POST) & !empty($_POST) ) {

    $listnumber = $_POST['id'];

    $deletelistitem = mysqli_query($con, "DELETE FROM user_listitems WHERE listitem=$listnumber");

    if ($deletelist) {
        echo "success";
    }
    
}


?>