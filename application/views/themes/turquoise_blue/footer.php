<footer>
    <div class="container">
        <div class="row plr50">
            <div class="col-md-4 col-sm-6">
                <h4 class="fo-title">Links</h4>
                <ul class="f1-list">
                    <?php
                    foreach ($footer_menus as $footer_menu_key => $footer_menu_value) {
                        $cls_menu_dropdown = "";
                        if (!empty($footer_menu_value['submenus'])) {
                            $cls_menu_dropdown = "dropdown";
                        }
                        ?>
                        <li class="<?php echo $cls_menu_dropdown; ?>">
                            <?php
                            $top_new_tab = '';
                            $url = '#';
                            if ($footer_menu_value['open_new_tab']) {
                                $top_new_tab = "target='_blank'";
                            }
                            if ($footer_menu_value['ext_url']) {
                                $url = $footer_menu_value['ext_url_link'];
                            } else {
                                $url = site_url($footer_menu_value['page_url']);
                            }
                            ?>
                            <a href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>><?php echo $footer_menu_value['menu']; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div><!--./col-md-3-->
            <div class="col-md-4 col-sm-6">
                <h4 class="fo-title">Siguenos</h4>
                <ul class="social">
                            <?php $this->view('/themes/turquoise_blue/social_media'); ?>
                        </ul>
            </div><!--./col-md-3-->
            <div class="col-md-4 col-sm-6">
                <h4 class="fo-title"><?php echo $this->lang->line('contact'); ?></h4>
                <ul class="co-list">
                    <li><i class="fa-regular fa-envelope"></i>
                        <a href="mailto:<?php echo $school_setting->email; ?>"><?php echo $school_setting->email; ?></a></li>
                    <li><i class="fa-regular fa-phone"></i><?php echo $school_setting->phone; ?></li>
                    <li><i class="fa-regular fa-map-marker"></i><?php echo $school_setting->address; ?></li>
                </ul>
            </div><!--./col-md-3-->
            <div class="col-md-3 col-sm-6">
                <a class="twitter-timeline" data-tweet-limit="1" href="#"></a>
            </div><!--./col-md-3-->   
        </div><!--./row-->
    </div><!--./container-->
    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <p><?php echo $front_setting->footer_text; ?></p>
                </div>
            </div><!--./row-->
        </div><!--./container-->
    </div><!--./copy-right-->
</footer>