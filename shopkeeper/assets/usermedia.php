<?php
//get shop logo
$global_shoplogoquery=mysqli_query($con, "SELECT slogo from shopkeeper WHERE sid='$globalshopid'");
$global_shoplogofecth = mysqli_fetch_assoc($global_shoplogoquery);
$global_shoplogo = $global_shoplogofecth['slogo'];

?>
<div class="sidebar-user media">
    <img src="../uploads/slogo/<?php echo $global_shoplogo; ?>" class="rounded-circle img-thumbnail mb-1">
    <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
    <div class="media-body align-item-center">
        <h5><?php echo $globalshopname; ?></h5>
        <ul class="list-unstyled list-inline mb-0 mt-2" style="text-align: left;">
            <li class="list-inline-item text-center">
                <a href="profile.php" class=""><i class="mdi mdi-account"></i></a>
            </li>
            <!-- <li class="list-inline-item">
                <a href="javascript: void(0);" class=""><i class="mdi mdi-settings"></i></a>
            </li> -->
            <li class="list-inline-item text-center">
                <a href="../access/logout.php" class=""><i class="mdi mdi-power"></i></a>
            </li>
        </ul>
    </div>
</div>