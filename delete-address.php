<?php
include_once("access/useraccesscontrol.php");

if (isset($_POST) & !empty($_POST)) {
    $id = $_POST['id'];    
	$delete = mysqli_query($con, "DELETE FROM user_address WHERE uaddrid=$id");
    if($delete)
		{
            echo 'Deleted Successfully'
			//echo '<script> window.location="view-address.php"; </ script>';
		}
		else
		{
			echo "Error!";
		}
}

