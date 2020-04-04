<?php
include_once('access/useraccesscontrol.php');

$header_getcart = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid = itemmaster.itmid WHERE user_cart.cuid = '$globaluserid'");
$count = mysqli_num_rows($header_getcart);

echo '<p class="count-total-shopping absolute text-center" style="padding-top: 1px; padding-bottom: 1px; padding-left: 5px; padding-right: 5px; text-align: center;">'.$count.'</p>';
?>