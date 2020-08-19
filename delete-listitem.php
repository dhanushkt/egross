<?php 
include 'access/useraccesscontrol.php';

if (isset($_POST) & !empty($_POST) ) {

    $listnumber = $_POST['id'];

    $getlistnoquery = mysqli_query($con, "SELECT clistno FROM custom_listitems WHERE cl_listid=$listnumber");
    $getlistno = mysqli_fetch_assoc($getlistnoquery);
    $listno = $getlistno['clistno'];


    $deletelistitem = mysqli_query($con, "DELETE FROM custom_listitems WHERE cl_listid=$listnumber");


    echo json_encode(array("listno"=>$listno));

}


?>