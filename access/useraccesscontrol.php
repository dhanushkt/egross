<?php
include_once 'connection.php';
session_start();
if(isset($_SESSION['userid']))
{
    $globaluserid = $_SESSION['adminid'];
    $globaladminuname = $_SESSION['auname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
?>