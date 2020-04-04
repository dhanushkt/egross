<?php
include_once("access/useraccesscontrol.php");

if (isset($_POST) & !empty($_POST)) {
    $id = $_POST['id'];
    $qty = $_POST['qty'];

    //get item info
    $getitminfo = mysqli_query($con, "SELECT * FROM itemmaster WHERE itmid=$id");
    $itminfo = mysqli_fetch_assoc($getitminfo);

    $total = $itminfo['iprice'] * $qty;

	$sql = "INSERT INTO user_cart (cuid,citmid,cqty,ctotal) VALUES ('$globaluserid','$id','$qty','$total')";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "Added Successfully";
		//echo '<script> window.location="edit.php?id="; </script>';
	} else {
		echo "Error!";
	}
}
