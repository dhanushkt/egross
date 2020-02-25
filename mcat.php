<?php
include './access/connection.php';

$mcname=$_POST['mcname'];
$mcactive=$_POST['mcactive'];
$mcdesc=$_POST['mcdesc'];
$mcimg=$_POST['mcimg'];
$mcimgdesc=$_POST['mcimgdesc'];
$qry=mysqli_query($con,"SELECT mcname FROM mcat where mcname='$mcname'");
$count=mysqli_num_rows($qry);
if($count>0)
{
    $emsg="Item already Exists";
}
else
{
    $query=mysqli_query($con,"INSERT into mcat (mcname,mcactive,mcdesc,mcimg,mcimgdesc) VALUES ('$mcname','$mcactive','$mcdesc','$mcimg','$mcimgdesc')");
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