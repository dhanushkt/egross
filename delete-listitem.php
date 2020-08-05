<?php 
include 'access/useraccesscontrol.php';

if (isset($_POST) & !empty($_POST) ) {

    $listnumber = $_POST['id'];

    //new logic to check if all items are removed
    $getlistnoquery = mysqli_query($con, "SELECT listno FROM user_listitems WHERE listitem=$listnumber");
    $getlistno = mysqli_fetch_assoc($getlistnoquery);
    $listno = $getlistno['listno'];

    //get number of items in the same list
    $itemsinlistquery = mysqli_query($con, "SELECT * FROM user_listitems WHERE listno='$listno'");
    $itemsinlist = mysqli_num_rows($itemsinlistquery);

    $deletelistitem = mysqli_query($con, "DELETE FROM user_listitems WHERE listitem=$listnumber");

    if($itemsinlist == 1){
        $deletelist = mysqli_query($con, "DELETE FROM user_list WHERE listno=$listno");
        $listno = 0;
    }

    echo json_encode(array("listno"=>$listno));

}


?>