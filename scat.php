<?php
include './access/connection.php';

$smcid=$_POST[''];
$scname=$_POST['scname'];
$scactive=$_POST['scactive'];
$scdesc=$_POST['scdesc'];
$scimg=$_POST['scimg'];
$scimgdesc=$_POST['scimgdesc'];
$qry=mysqli_query($con,"SELECT scname FROM scat where scname='$scname'");
$count=mysqli_num_rows($qry);
if($count>0)
{
    $emsg="Item already Exists";
}
else
{
    $query=mysqli_query($con,"INSERT into scat (smcid,mcname,mcactive,mcdesc,mcimg,mcimgdesc) VALUES ('$smcid','$mcname','$mcactive','$mcdesc','$mcimg','$mcimgdesc')");
    if($query)
    {
        $msg="Category inserted";
    }
    else
    {
        echo mysqli_error($con);
    }
}
?>