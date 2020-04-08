<?php 
include 'access/useraccesscontrol.php';

if(isset($_POST) & !empty($_POST))
{
	$defaddrid = $_POST['id'];
	
	$getprevdefaddress=mysqli_query($con, "SELECT * FROM user_address WHERE auid=$globaluserid AND adefault='1'");
	$getprevdefdata=mysqli_fetch_assoc($getprevdefaddress);
	
	$getprevdefid = $getprevdefdata['uaddrid'];
	
    $updatedefquery=mysqli_query($con, "UPDATE user_address SET adefault='0' WHERE uaddrid='$getprevdefid'");
    
	$addnewdefquery=mysqli_query($con, "UPDATE user_address SET adefault='1' WHERE uaddrid='$defaddrid'");
	if($addnewdefquery)
	{
		echo "success";
	}
}
?>