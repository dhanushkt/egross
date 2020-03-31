<?php
include '../access/shopaccesscontrol.php';
$t_id = $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
		$sql="DELETE FROM itemmaster WHERE itmid=$id";
		$result = mysqli_query($con, $sql);
		if($result)
		{
			echo '<script> window.location="view-items.php"; </script>';
		}
		else
		{
			echo "Error!";
		}
  }
?>