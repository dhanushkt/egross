<?php
include_once 'access.php';
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location.href='403.php'; </script>";
}
else
{
    $globaladminid = $_SESSION['adminid'];
    $globaladminuname = $_SESSION['auname'];
}
?>