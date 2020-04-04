<?php
include_once("access/useraccesscontrol.php");

if (isset($_POST) & !empty($_POST)) {
	$id = $_POST['id'];
	$sql = "INSERT INTO user_wishlist (wuid,witmid) VALUES ('$globaluserid','$id')";
	$result = mysqli_query($con, $sql);
	if ($result) {
		echo "Added Successfully";
		//echo '<script> window.location="edit.php?id="; </script>';
	} else {
		echo "Error!";
	}
}
?>