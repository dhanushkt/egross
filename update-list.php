<?php
include 'access/useraccesscontrol.php';


if (isset($_POST) & !empty($_POST)) {

    $listitem = $_POST['listitem'];
    $nqty = $_POST['nqty'];

    $updatecart = mysqli_query($con, "UPDATE user_listitems SET lqty='$nqty' WHERE listitem='$listitem'");

    if ($updatecart) {
        $getlistnoquery = mysqli_query($con, "SELECT listno FROM user_listitems WHERE listitem=$listitem");
        $getlistno = mysqli_fetch_assoc($getlistnoquery);
        $listno = $getlistno['listno'];
    } else {
        $listno = 0;
    }
    echo json_encode(array("listno"=>$listno));
}
?>