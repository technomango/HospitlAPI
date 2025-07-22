<!DOCTYPE html>
<html dir="<?php echo ($front_setting->is_active_rtl) ? "rtl" : "ltr"; ?>" lang="<?php echo ($front_setting->is_active_rtl) ? "ar" : "es"; ?>">
    <head>
        <meta charset="utf-8">
		<meta content="X-Content-Type-Options: nosniff" http-equiv="Content-Type" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $page['title']; ?></title>
        <meta name="title" content="<?php echo $page['meta_title']; ?>">
        <meta name="keywords" content="<?php echo $page['meta_keyword']; ?>">
        <meta name="description" content="<?php echo $page['meta_description']; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url($front_setting->fav_icon); ?>" type="image/x-icon">
        <link href="<?php echo $base_assets_url; ?>css/all.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>fonts/awesome/free/css/all.css" rel="stylesheet">
		<link href="<?php echo $base_assets_url; ?>fonts/awesome/pro/css/all.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/style.css" rel="stylesheet">
		<link href="<?php echo $base_assets_url; ?>css/custom_site.css" rel="stylesheet">
        <script src="<?php echo $base_assets_url; ?>js/jquery.min.js"></script>
        <link rel="stylesheet" href="<?php echo $base_assets_url; ?>front/bootstrap-datetimepicker.min.css" />
        <script src="<?php echo $base_assets_url; ?>front/moment.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>front/jquery.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>front/bootstrap-datetimepicker.min.js"></script>

        <?php
        $this->load->view('layout/theme');

        if ($front_setting->is_active_rtl) {
            ?>
            <link href="<?php echo $base_assets_url; ?>rtl/bootstrap-rtl.min.css" rel="stylesheet">
            <link href="<?php echo $base_assets_url; ?>rtl/style-rtl.css" rel="stylesheet">
            <?php
        }
        ?>
        <?php echo $front_setting->google_analytics; ?>
    </head>
    <body>
        
        <?php echo $header; ?>
        <?php echo $slider; ?>
        <?php if (isset($featured_image) && $featured_image != "") {
           
        }
        ?>
        <div class="container spacet50 pt-70">
            <div class="row">
                <?php
                $page_colomn = "col-md-12";
                if ($page_side_bar) {
                    $page_colomn = "col-md-9 col-sm-9";
                }
                ?>
                <div class="<?php echo $page_colomn; ?>">
                    <?php echo $content; ?>
                </div>
                <?php
                if ($page_side_bar) {
                    ?>
                    <div class="col-md-3 col-sm-3">
                        <div class="sidebar">
                            <?php
                            if (in_array('news', json_decode($front_setting->sidebar_options))) {
                                ?>
                                <div class="catetab"><?php echo $this->lang->line('latest_news'); ?></div>
                                <div class="newscontent">
                                    <div class="tickercontainer"><div class="mask"><ul id="ticker01" class="newsticker" style="height: 666px; top: 124.54px;">
                                                <?php
                                                if (!empty($banner_notices)) {

                                                    foreach ($banner_notices as $banner_notice_key => $banner_notice_value) {
                                                        ?>
                                                        <li><a href="<?php echo site_url('read/' . $banner_notice_value['slug']) ?>"><div class="datenews"><?php echo date('d', strtotime($banner_notice_value['date'])); ?><span><?php echo date('F', strtotime($banner_notice_value['date'])); ?></span></div><?php echo $banner_notice_value['title']; ?>
                                                            </a></li>                                                            
                                                            
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!--./newscontent-->
                                <?php
                            }
                            ?>
                        </div><!--./sidebar-->
                    </div>
                    <?php
                }
                ?>
            </div><!--./row-->
        </div><!--./container-->
		<div class="col-md-12 col-sm-12 plr-0">
			<div class="overview-area">
				<div class="container">
<div class="row align-items-center">
<div class="col-lg-7">
<div class="section-title-warp"><span class="sub-title"><i class="fa-solid fa-hashtag"></i> Nuestros Doctores </span>

<h2>Nuestros Doctores Especializados y Experimentados</h2>
</div>
</div>

<div class="col-lg-5">
<div class="section-warp-btn"><a class="default-btn" href="https://dentista.soymanuel.com/page/dentistas">Ver Todos</a></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 col-md-6">
<div class="single-doctor"><a href="#"><img alt="image" class="overview-doctores-img" src="https://vue.hibootstrap.com/zrin/img/doctor-1.84d4e94e.jpg" /></a>

<div class="doctor-content">
<h3><a href="/#">Dr. Jorge Galindo </a></h3>
<span>Médico Cirujano</span>

<div class="share-link"><a href="https://www.facebook.com/" target="_blank"><i class="bx fa-brands fa-facebook-f"></i></a><a href="https://twitter.com/?lang=en" target="_blank"><i class="bx fa-brands fa-x-twitter"></i></a><a href="https://www.linkedin.com/" target="_blank"><i class="bx fa-brands fa-linkedin-in"></i></a><a href="https://www.instagram.com/" target="_blank"><i class="bx fa-brands fa-instagram"></i></a></div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6">
<div class="single-doctor"><a href="#"><img alt="image" class="overview-doctores-img" src="https://vue.hibootstrap.com/zrin/img/doctor-2.bf30f4b5.jpg" /></a>

<div class="doctor-content">
<h3><a href="#">Dra. Shandy Diaz </a></h3>
<span>Ginecología</span>

<div class="share-link"><a href="https://www.facebook.com/" target="_blank"><i class="bx fa-brands fa-facebook-f"></i></a><a href="https://twitter.com/?lang=en" target="_blank"><i class="bx fa-brands fa-x-twitter"></i></a><a href="https://www.linkedin.com/" target="_blank"><i class="bx fa-brands fa-linkedin-in"></i></a><a href="https://www.instagram.com/" target="_blank"><i class="bx fa-brands fa-instagram"></i></a></div>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
<div class="single-doctor"><a href="#"><img alt="image" class="overview-doctores-img" src="https://vue.hibootstrap.com/zrin/img/doctor-3.e3eb80a6.jpg" /></a>

<div class="doctor-content">
<h3><a href="#">Dr. Fernando Gamez </a></h3>
<span>Médico General</span>

<div class="share-link"><a href="https://www.facebook.com/" target="_blank"><i class="bx fa-brands fa-facebook-f"></i></a><a href="https://twitter.com/?lang=en" target="_blank"><i class="bx fa-brands fa-x-twitter"></i></a><a href="https://www.linkedin.com/" target="_blank"><i class="bx fa-brands fa-linkedin-in"></i></a><a href="https://www.instagram.com/" target="_blank"><i class="bx fa-brands fa-instagram"></i></a></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

        <?php echo $footer; ?>
        <script src="<?php echo $base_assets_url; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>js/ss-lightbox.js"></script>
        <script src="<?php echo $base_assets_url; ?>js/custom.js"></script>
    </body>
</html>