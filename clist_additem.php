<?php
include_once("access/useraccesscontrol.php");

if (isset($_POST) & !empty($_POST)) {
    $citemid = $_POST['citemid'];
    $clistid = $_POST['clistid'];
    $clqty = $_POST['clqty'];

	$sql = "INSERT INTO custom_listitems (clistno,cl_itemid,cl_qty) VALUES ('$clistid','$citemid','$clqty')";
    $result = mysqli_query($con, $sql);
    
	if ($result) {
		echo "Added Successfully";
	}
}

?>