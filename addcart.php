<?php
include './access/connection.php';

$cuid=$_POST[''];
$cprodno=$_POST[''];
$cqty=$_POST['cqty'];
$ctotal=$_POST['ctotal'];
$query=mysqli_query($con,"INSERT INTO user_cart (cuid,cprodno,cqty,ctotal) VALUES ('$cuid','$cprodno','$cqty','$ctotal')");
if($query)
{
    $msg="Item added to cart";
}
else
{
    echo mysqli_error($con);
}
?>