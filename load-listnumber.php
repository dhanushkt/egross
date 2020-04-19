<?php
include_once('access/useraccesscontrol.php');

$header_getcart = mysqli_query($con, "SELECT *  FROM user_list WHERE user_list.luid = '$globaluserid'");
$count = mysqli_num_rows($header_getcart);

echo '<p class="count-total-shopping absolute text-center" style="padding-top: 1px; padding-bottom: 1px; padding-left: 5px; padding-right: 5px; text-align: center;">'.$count.'</p>';
?>