<?php
include 'access/useraccesscontrol.php';
date_default_timezone_set('Asia/Kolkata');
$date=date("l, d-m-Y  h:i A");
if (isset($_POST) & !empty($_POST) ) {
	$addrid = $_POST['id'];
	$notes = $_POST['notes'];
	//$totrate = $_POST['totamt'];

	//getshop 
	$getitemswithsameshop = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid=itemmaster.itmid WHERE cuid='$globaluserid'");
	while ($getshopdata = mysqli_fetch_assoc($getitemswithsameshop)) {
		//getshopid
		$shopid = $getshopdata['isid'];

		$getorderno = mysqli_query($con, "SELECT orderno FROM orders");
		$getordernofetch = mysqli_fetch_assoc($getorderno);
		do {
			$generateorderno = random_int(1000, 9999);
		} while ($getordernofetch['orderno'] == $generateorderno);

		$totrate = 0;
		// insert into order_items
		$getallcartitems = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid=itemmaster.itmid WHERE itemmaster.isid='$shopid' AND cuid='$globaluserid'");
		foreach ($getallcartitems as $key => $getallcartdata) {
			$prodid = $getallcartdata['citmid'];
			$orderqty = $getallcartdata['cqty'];
			$cartid = $getallcartdata['cartid'];

			//calculate total 
			$itmtot = $getallcartdata['iprice'] * $orderqty;
			$totrate = $totrate + $itmtot;

			$sql = "INSERT INTO order_items (orderno,oitmid,oqty) VALUES ('$generateorderno','$prodid','$orderqty')";
			$result = mysqli_query($con, $sql);

			if ($result) {
				$deleteallcartitems = mysqli_query($con, "DELETE FROM user_cart WHERE cartid='$cartid' AND cuid='$globaluserid'");
			}
		}
		
		$getitemswithsameshop = mysqli_query($con, "SELECT itemmaster.isid FROM user_cart JOIN itemmaster ON user_cart.citmid=itemmaster.itmid WHERE cuid='$globaluserid'");
		
		// insert into orders
		$insertintoorder = mysqli_query($con, "INSERT INTO orders (orderno,ouid,osid,oaddrid,onote,otimestamp,ototalamt) VALUES ('$generateorderno','$globaluserid','$shopid','$addrid','$notes','$date','$totrate')");
	}
}
?>