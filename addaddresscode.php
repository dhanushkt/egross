<?php
if(isset($_POST['add']))
{
    $auid=$_POST['auid'];
    $afullname=$_POST['afullname'];
    $addrline1=$_POST['addrline1'];
    $addrline2=$_POST['addrline2'];
    $acity=$_POST['acity'];
    $adistrict=$_POST['adistrict'];
    $astate=$_POST['astate'];
    $apin=$_POST['apin'];
    $arphone=$_POST['arphone'];
    $aaphone=$_POST['aaphone'];
    $aemail=$_POST['aemail'];
    $adefault=$_POST['adefault'];
    $equery=mysqli_query($con,"select * from user_address where addrline1='$addrline1' and addrline2='$addrline2'");
    $count=mysqli_fetch_row($equery);
    if($count>0)
    {
        $emsg="Address already registered";
    }
    else
    {
        $query=mysqli_query($con,"INSERT into user_address (auid,afullname,addrline1,addrline2,acity,adistrict,astate,apin,arphone,aaphone,aemail,adefault) values('$auid','$afullname','$addrline1','$addrline2','$acity','$adistrict','$astate','$apin','$arphone','$aaphone','$aemail','$adefault')");
        if($query)
        {
            $msg="Record Inserted";
        }
        else
        {
            echo mysqli_error($con);
        }
    }
}
?>