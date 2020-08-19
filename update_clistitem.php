<?php
include 'access/useraccesscontrol.php';


if (isset($_POST) & !empty($_POST)) {

    $clistno = $_POST['clistno'];
    $nqty = $_POST['nqty'];

    $updatecart = mysqli_query($con, "UPDATE custom_listitems SET cl_qty='$nqty' WHERE cl_listid='$clistno'");

    if ($updatecart) {
        $getlistnoquery = mysqli_query($con, "SELECT clistno FROM custom_listitems WHERE cl_listid=$clistno");
        $getlistno = mysqli_fetch_assoc($getlistnoquery);
        $listno = $getlistno['clistno'];
    }
    
    echo json_encode(array("listno"=>$listno));
}
?>