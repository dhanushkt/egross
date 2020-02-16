<?php
include_once 'connection.php';
session_start();
if(!isset($_SESSION['sid']))
{
    echo "<script>window.location.href='403.php'; </script>";
}
else
{
    $globalshopid = $_SESSION['sid'];
    $globalshopname = $_SESSION['sname'];
}
?>