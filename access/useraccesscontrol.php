<?php
include_once 'connection.php';
session_start();
if(isset($_SESSION['userid']))
{
    $globaluserid = $_SESSION['userid'];
    $globaluname = $_SESSION['uname'];
    $userlogin = true;
}
else
{
    $userlogin = false;
}
?>