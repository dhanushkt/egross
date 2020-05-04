<?php
include 'access/useraccesscontrol.php';
date_default_timezone_set('Asia/Kolkata');
$date=date("l, d-m-Y  h:i A");
$totrate = 0;

if (isset($_POST) & !empty($_POST) ) {

    $id = $_POST['id'];
    $type = $_POST['type'];
    $onote = $_POST['notes'];

    //get number of items in list items
    $getlistitems = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE listno=$id");
    while($listitems = mysqli_fetch_assoc($getlistitems)){

        $listid = $listitems['listitem'];
        $listitmid = $listitems['litmid'];
        $listqty = $listitems['lqty'];

        //calculate total 
		$itmtot = $listitems['iprice'] * $listqty;
		$totrate = $totrate + $itmtot;

        $inserttoorder = mysqli_query($con, "INSERT INTO order_items (orderno,oitmid,oqty) VALUES ('$id','$listitmid','$listqty')");

        if ($inserttoorder) {
            $deletelistitem = mysqli_query($con, "DELETE FROM user_listitems WHERE listitem='$listid'");
        }

    }

    //fetch list info
    $getlistinfo = mysqli_query($con, "SELECT * FROM user_list WHERE listno=$id");
    $listinfo = mysqli_fetch_assoc($getlistinfo);

    $shopid = $listinfo['lsid'];

    //get default address
    if($type == 'online'){
        $getaddrinfo = mysqli_query($con, "SELECT * FROM user_address WHERE adefault=1 AND auid=$globaluserid");
        $addrinfo = mysqli_fetch_assoc($getaddrinfo);
        $addrid = $addrinfo['uaddrid'];
    } else if($type == 'offline') {
        $addrid = 0;
    }

    $order = mysqli_query($con, "INSERT INTO orders (orderno,ouid,osid,otype,oaddrid,onote,otimestamp,ototalamt) VALUES ('$id','$globaluserid','$shopid','$type','$addrid','$onote','$date','$totrate')");

    if($order){
        $deletelist = mysqli_query($con, "DELETE FROM user_list WHERE listno='$id'");
        echo "Success"; 
    }

}

?>