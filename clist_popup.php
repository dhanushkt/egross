<?php


?>

<!--MODAL-->
<div class="custom-model-main">
    <div class="custom-model-inner">
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <div class="form-group">
                    Selected Item : <label id="getitemname"></label>
                    <form method="GET">
                        <input type="hidden" name="Thisitmid" value="" id="getItemId">
                    </form>
                    <span>
                        <input type="text" class="searchs form-control" placeholder="What you looking for?">
                    </span>
                </div>
                <div id="loadcList">

                </div>
            </div>
            <div class="button-container">
                <hr>
                <input class="btn btn-primary closebtn" style="margin-bottom: 10px;" type="submit" name="" value="Save Changes" />
            </div>

        </div>

    </div>
    <div class="bg-overlay"></div>
</div>
<!--MODAL END-->