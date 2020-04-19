<?php
include 'access/useraccesscontrol.php';
date_default_timezone_set('Asia/Kolkata');
$date=date("l, d-m-Y  h:i A");

if (isset($_POST) & !empty($_POST) ) {
	$itemid = $_POST['itmid'];
    $shopid = $_POST['shopid'];
    $qty = $_POST['qty'];

    //check if list of shop is created
    $checkshop = mysqli_query($con, "SELECT * FROM user_list WHERE luid='$globaluserid' AND lsid='$shopid'");
    if(mysqli_num_rows($checkshop)>=1){
        $shoplist = true;
        $getlistdata = mysqli_fetch_assoc($checkshop);
        $listno = $getlistdata['listno'];
    } else {
        $shoplist = false;
    }

    if($shoplist){
        //if list of shop exist
        $insertnewitem = mysqli_query($con, "INSERT INTO user_listitems (listno, litmid, lqty) VALUES ('$listno','$itemid','$qty')");
        if($insertnewitem)
            echo "success";
        
    } else {
        //create a new list
        $getlistno = mysqli_query($con, "SELECT listno FROM user_list");
		$getlistnofetch = mysqli_fetch_assoc($getlistno);
		do {
			$generatedlistno = random_int(1000, 9999);
        } while ($getlistnofetch['listno'] == $generatedlistno);
        
        $createnewlist = mysqli_query($con, "INSERT INTO user_list (listno,luid,lsid,ltimestamp) VALUES ('$generatedlistno','$globaluserid','$shopid','$date')");

        //add item to user_listitem
        $additemtolist = mysqli_query($con, "INSERT INTO user_listitems (listno, litmid, lqty) VALUES ('$generatedlistno','$itemid','$qty')");

        if($additemtolist)
            echo "success";
    }

}
?>