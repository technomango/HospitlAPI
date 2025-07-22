<header>
	<div class="toparea">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <ul class="social">
                            <?php $this->view('/themes/sky_blue/social_media'); ?>
                        </ul>
                    </div><!--./col-md-3-->
                    
                    <?php if($patientpanel == 'enabled'){ ?>
                    <div class="col-lg-9 col-md-8 col-sm-6">
						
                        <ul class="header-extras">
                    <li>
							<div class="icon-bx-wraper style-5">
							<div class="icon-bx">
								<span class="icon-cell">
									<img src="https://www.cemedpuertadelsol.com/uploads/hospital_front/1752843861-1757389605687a4655675dc!icon2.svg" alt="" style="height: 35px;">
								</span>
							</div>
							<div class="icon-content">
								<h2 class="dz-title text-primary">Escríbenos</h2>
								<p><a href="mailto:email@domain.com" class="text-secondary">info@cemedpuertadelsol.com</a></p>
							</div>
						</div>
							</li>
                    <li>
						<div class="icon-bx-wraper style-5">
							<div class="icon-bx">
								<span class="icon-cell">
									<img src="https://www.cemedpuertadelsol.com/uploads/hospital_front/1752844014-1364322091687a46eea949b!icon1.svg" alt="" style="height: 35px;">
								</span>
							</div>
							<div class="icon-content">
								<h2 class="dz-title text-primary">Llamanos</h2>
								<p><a href="tel:+50238363962" class="text-secondary">+502 3836 3962</a></p>
							</div>
						</div>
							
							</li>
                    <li><div class="icon-bx-wraper style-5">
							<div class="icon-bx">
								<span class="icon-cell">
									<img src="https://www.cemedpuertadelsol.com/uploads/hospital_front/1752844953-579345410687a4a9980758!icon3.png" alt="" style="height: 35px;">
								</span>
							</div>
							<div class="icon-content">
								<h2 class="dz-title text-primary">Quejas</h2>
								<p><a href="https://www.cemedpuertadelsol.com/page/complain" class="text-secondary">Escribenos</a></p>
							</div>
						</div>
                    </li>
                </ul>
                    </div><!--./col-md-5-->
                    <?php } ?>
                    
                </div>
            </div>
        </div><!--./toparea-->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <a class="logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url($front_setting->logo); ?>" alt="" style="height: 65px;"></a>
            </div><!--./col-md-4-->
            <div class="col-md-6 col-sm-12">
				<div class="cs_nav">
				<nav class="navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
                        <span class="sr-only"><?php echo $this->lang->line('toggle_navigation'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-3">
                    <ul class="nav navbar-nav">
                        <?php
                        foreach ($main_menus as $menu_key => $menu_value) {
                            $submenus = false;
                            $cls_menu_dropdown = "";
                            $menu_selected = "";
                            if ($menu_value['page_slug'] == $active_menu) {
                                $menu_selected = "active";
                            }
                            if (!empty($menu_value['submenus'])) {
                                $submenus = true;
                                $cls_menu_dropdown = "dropdown";
                            }
                            if ($menu_value['menu'] == $active_menu) {
                                $menu_selected = "active";
                            }
                            ?>

                            <li class="<?php echo $menu_selected . " " . $cls_menu_dropdown; ?>" >
                                <?php
                                if (!$submenus) {
                                    $top_new_tab = '';
                                    $url = '#';
                                    if ($menu_value['open_new_tab']) {
                                        $top_new_tab = "target='_blank'";
                                    }
                                    if ($menu_value['ext_url']) {
                                        $url = $menu_value['ext_url_link'];
                                    } else {
                                        $url = site_url($menu_value['page_url']);
                                    }
                                    ?>

                                    <a href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>><?php echo $menu_value['menu']; ?></a>

                                    <?php
                                } else {
                                    $child_new_tab = '';
                                    $url = '#';
                                    ?>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $menu_value['menu']; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        foreach ($menu_value['submenus'] as $submenu_key => $submenu_value) {
                                            if ($submenu_value['open_new_tab']) {
                                                $child_new_tab = "target='_blank'";
                                            }
                                            if ($submenu_value['ext_url']) {
                                                $url = $submenu_value['ext_url_link'];
                                            } else {
                                                $url = site_url($submenu_value['page_url']);
                                            }
                                            ?>
                                            <li><a href="<?php echo $url; ?>" <?php echo $child_new_tab; ?> ><?php echo $submenu_value['menu'] ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav><!-- /.navbar -->
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
				<ul class="top-right">
                            <li><a href="<?php echo site_url('site/userlogin') ?>"><i class="fa-regular fa-right-to-bracket"></i>Ingresar</a></li>
                        </ul>
                
            </div><!--./col-md-8-->
        </div><!--./row-->
    </div><!--./container-->
</header>
