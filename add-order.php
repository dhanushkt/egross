<?php
include 'access/useraccesscontrol.php';
date_default_timezone_set('Asia/Kolkata');
$date=date("l, d-m-Y  h:i A");
if (isset($_POST) & !empty($_POST) ) {
	$addrid = $_POST['id'];
	$notes = $_POST['notes'];
	$totrate = $_POST['totamt'];

	//getshop 
	$getitemswithsameshop = mysqli_query($con, "SELECT itemmaster.isid FROM user_cart JOIN itemmaster ON user_cart.citmid=itemmaster.itmid WHERE cuid='$globaluserid'");
	foreach ($getitemswithsameshop as $key1 => $getitemswithsameshop) {
		//getshopid
		$shopid = $getitemswithsameshop['isid'];

		$getorderno = mysqli_query($con, "SELECT orderno FROM orders");
		$getordernofetch = mysqli_fetch_assoc($getorderno);
		do {
			$generateorderno = random_int(1000, 9999);
		} while ($getordernofetch['orderno'] == $generateorderno);

		// insert into orders
		$insertintoorder = mysqli_query($con, "INSERT INTO orders (orderno,ouid,oaddrid,onote,otimestamp,ototalamt) VALUES ('$generateorderno','$globaluserid','$addrid','$notes','$date','$totrate')");

		// insert into order_items
		$getallcartitems = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid=itemmaster.itmid WHERE itemmaster.isid='$shopid' AND cuid='$globaluserid'");
		foreach ($getallcartitems as $key => $getallcartdata) {
			$prodid = $getallcartdata['citmid'];
			$orderqty = $getallcartdata['cqty'];
			$cartid = $getallcartdata['cartid'];

			$sql = "INSERT INTO order_items (orderno,oitmid,oqty) VALUES ('$generateorderno','$prodid','$orderqty')";
			$result = mysqli_query($con, $sql);

			if ($result) {
				$deleteallcartitems = mysqli_query($con, "DELETE FROM user_cart WHERE cartid='$cartid' AND cuid='$globaluserid'");
				if($deleteallcartitems){
					$getitemswithsameshop = mysqli_query($con, "SELECT itemmaster.isid FROM user_cart JOIN itemmaster ON user_cart.citmid=itemmaster.itmid WHERE cuid='$globaluserid'");
				}
			}
		}
	}

}
?>