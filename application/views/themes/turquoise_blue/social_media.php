<?php
if ($front_setting->fb_url != "") {
    ?>

    <li><a href="<?php echo $front_setting->fb_url; ?>" target="_blank"><i class="fa-brands fa-square-facebook"></i></a></li>
    <?php
}
if ($front_setting->twitter_url != "") {
    ?>

    <li><a href="<?php echo $front_setting->twitter_url; ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
    <?php
}
if ($front_setting->youtube_url != "") {
    ?>

    <li><a href="<?php echo $front_setting->youtube_url; ?>" target="_blank"><i class="fa-brands fa-square-youtube"></i></a></li>
    <?php
}
if ($front_setting->google_plus != "") {
    ?>

    <li><a href="<?php echo $front_setting->google_plus; ?>" target="_blank"><i class="fa-regular fa-google-plus"></i></a></li>
    <?php
}

if ($front_setting->linkedin_url != "") {
    ?>

    <li><a href="<?php echo $front_setting->linkedin_url; ?>" target="_blank"><i class="fa-regular fa-linkedin"></i></a></li>
    <?php
}
if ($front_setting->instagram_url != "") {
    ?>

    <li><a href="<?php echo $front_setting->instagram_url; ?>" target="_blank"><i class="fa-brands fa-square-instagram"></i></a></li>
    <?php
}
if ($front_setting->pinterest_url != "") {
    ?>

    <li><a href="<?php echo $front_setting->pinterest_url; ?>" target="_blank"><i class="fa-regular fa-pinterest"></i></a></li>
    <?php
}
?>