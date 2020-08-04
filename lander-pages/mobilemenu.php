<div class="menu-mobile-left-content">
    <ul>
        <?php
        $mmenu_mcat = mysqli_query($con, "SELECT * FROM mcat");
        foreach ($mmenu_mcat as $key => $mmenu_mcat) {
        ?>
            <li>
                <a href="view-category.php?id=<?php echo $mmenu_mcat['mcid']; ?>">
                    <p><?php echo $mmenu_mcat['mcname']; ?></p>
                </a>
            </li>
        <?php } ?>

    </ul>
</div>