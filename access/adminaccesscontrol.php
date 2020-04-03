 <?php
include_once 'connection.php';
session_start();
if(!isset($_SESSION['adminid']))
{
    echo "<script>window.location.href='../access/403.php'; </script>";
}
else
{
    $globaladminid = $_SESSION['adminid'];
    $globaladminuname = $_SESSION['auname'];
}
?>