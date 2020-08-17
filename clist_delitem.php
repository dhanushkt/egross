<?php
include_once("access/useraccesscontrol.php");

if (isset($_POST) & !empty($_POST)) {
    $citemid = $_POST['citemid'];
    $clistid = $_POST['clistid'];

	$sql = "DELETE FROM custom_listitems WHERE clistno='$clistid' AND cl_itemid='$citemid'";
    $result = mysqli_query($con, $sql);
    
	if ($result) {
		echo "Removed Successfully";
	}
}

?>