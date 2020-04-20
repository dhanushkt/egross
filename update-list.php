<?php 
include 'access/useraccesscontrol.php';


if (isset($_POST) & !empty($_POST) ) {

    $listitem = $_POST['listitem'];
    $nqty = $_POST['nqty'];

    $updatecart = mysqli_query($con, "UPDATE user_listitems SET lqty='$nqty' WHERE listitem='$listitem'");

    if ($updatecart) {
        $getallitems = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE user_listitems.listno='$listno'");
    } else {
        echo mysqli_error($con);
    }
    
}



?>