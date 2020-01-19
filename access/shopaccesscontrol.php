<?php
include_once 'access.php';
if(!isset($_SESSION['shopid']))
{
    echo "<script>window.location.href='403.php'; </script>";
}
else
{
    $globalshopid = $_SESSION['shopid'];
    $globalshopname = $_SESSION['suname'];
}
?>