<?php 
include 'access/useraccesscontrol.php';

if (isset($_POST) & !empty($_POST) ) {

    $listnumber = $_POST['id'];

    $deletelistitem = mysqli_query($con, "DELETE FROM user_listitems WHERE listno=$listnumber");
    $deletelist = mysqli_query($con, "DELETE FROM user_list WHERE listno=$listnumber");

    if ($deletelist) {
        echo "success";
    }
    
}



?>