<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#424242" />
        <?php
        $titleresult = $this->customlib->getTitleName();
        $logoresult = $this->customlib->getLogoImage();
        if (!empty($titleresult["name"])) {
            $title_name = $titleresult["name"];
        } else {
            $title_name = "Hospital Name Title";
        }
        ?>
        <title><?php echo $title_name; ?></title>
        <!--favican-->
        <link href="<?php echo base_url() . "uploads/hospital_content/logo/1mini_logo.png" . $logoresult["mini_logo"] ?>" rel="shortcut icon" type="image/x-icon">
        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
		<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/fonts/awesome/css/all.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/custom_style_login.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/usertemplate/assets/css/style.css">
        <style type="text/css">
			@import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
            .col-md-offset-3 { margin-left: 29%;}
            .loginbg {
                background: #39f;
                max-height: 480px;
                box-shadow:0 10px 18px 0 rgba(62, 57, 107, 0.2);
                border-radius: 4px;
            }
            .bgwhite{ background: #e4e5e7;
                      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);overflow: auto;border-radius: 6px;}
            .llpb20{padding-bottom: 20px;}
            .around40{padding: 40px;}
            .formbottom2{text-align: left;border: 1px solid #e4e4e4;}
            button.btn:hover {opacity: 100 !important; color: #fff;background: #2E37A4;}
            .form-top2 {text-align: left;}
            .img2{width: 100%}
            .spacingmb30{margin-bottom: 30px;}
            .borderR{border-right: 1px solid rgba(66, 66, 66, 0.16);padding: 0px 40px;}
            input[type="text"], input[type="password"], textarea, textarea.form-control {
                height: 40px;border: 1px solid #999;}
            input[type="text"]:focus, input[type="password"]:focus, textarea:focus, textarea.form-control:focus {
                border: 1px solid #424242;}
            button.btn {height: 40px;line-height: 40px;}
            .ispace{ padding-right:5px;}
            .font-white{color: #fff;}
             a.forgot {padding-top:0px;}
            a.forgot {
				color: #555;
				font-size: 14px;
				font-weight: 400;
				margin-left: auto;
				font-family: 'Poppins';
			}
            a:hover.forgot {padding-top:0px; color: #6facaf; text-decoration: none;}
            .text-danger {font-size: 13px;}
            .text-danger p {margin-bottom: 0;margin-top: 10px;}
            button.btn {
                margin: 0;
				vertical-align: middle;
				border: 0;
				font-family: 'Poppins', sans-serif;
				font-weight: 400;
				color: #fff;
				-moz-border-radius: 4px;
				-webkit-border-radius: 4px;
				border-radius: 4px;
				text-shadow: none;
				-moz-box-shadow: none;
				-webkit-box-shadow: none;
				box-shadow: none;
				-o-transition: all .3s;
				-moz-transition: all .3s;
				-webkit-transition: all .3s;
				-ms-transition: all .3s;
				transition: all .3s;
				background: linear-gradient(92.39deg, #4E57CD 1.86%, #4E57CD 100%);
				border-radius: 12px;
				font-size: 16px;
				padding: 10px 15px;
				line-height: 25px;
				height: 45px;
            }
            button.btn:hover {background: linear-gradient(92.39deg, #2E37A4 1.86%, #2E37A4 100%);
    border: 1px solid #2E37A4;}
            @media (max-width: 767px){.col-md-offset-3 {margin-left: 0;}}
        </style>
    </head>
    <body>
		<div class="main-wrapper login-body">
			<div class="container-fluid px-0">
				<div class="row">
					
					<div class="col-lg-6 login-wrap">
						<div class="login-sec">
							<div class="log-img">
								<img class="img-fluid" src="<?php echo base_url(); ?>uploads/hospital_content/background/login-bg-01.png">
							</div>
						</div>
					</div>
					
					<div class="col-lg-6 login-wrap-bg">
					<!-- Top content -->
						<div class="login-wrapper">
							<div class="loginbox">								
								<div class="login-right">
       
                            <div class="login-right-wrap"> 
								<div class="form-top">
                                    <?php
                                   
                                    if (!empty($logoresult["image"])) {
                                        $logo_image = base_url() . "uploads/hospital_content/logo/" . $logoresult["image"];
                                    } else {
                                        $logo_image = base_url() . "uploads/hospital_content/logo/s_logo.png";
                                    }
                                    if (!empty($logoresult["mini_logo"])) {
                                        $mini_logo = base_url() . "uploads/hospital_content/logo/" . $logoresult["mini_logo"];
                                    } else {
                                        $mini_logo = base_url() . "uploads/hospital_content/logo/smalllogo.png";
                                    }
                                    ?>
                                    <div class="form-top-left account-logo" style="width: 250px;">
                                        <img src="<?php echo $logo_image.img_time(); ?>">    
                                    </div>
                                </div>
                            <div class="form-bottom">
								<h3 class="bolds"><?php echo $this->lang->line('forgot_password'); ?></h3>
                                <?php
                                if (isset($error_message)) {
                                    echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                }
                                ?>
                                <form action="<?php echo site_url('site/forgotpassword') ?>" method="post">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username"><?php echo $this->lang->line('email'); ?></label>
                                        <input type="text" name="email" placeholder="<?php echo $this->lang->line('email'); ?>" class="form-username form-control" id="form-username">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                    <button type="submit" class="btn"><?php echo $this->lang->line('submit'); ?></button>
                                </form>
                                <br>
                                    <p><a href="<?php echo site_url('site/login') ?>" class="forgot"><i class="fa-duotone fa-solid fa-right-to-bracket" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4;"></i> <?php echo $this->lang->line('admin_login'); ?></a></p>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
					</div>
				</div>
			</div>
					
        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>backend/usertemplate/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>backend/usertemplate/assets/js/jquery.backstretch.min.js"></script>      
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        var base_url = '<?php echo base_url(); ?>';
        $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function () {
            $(this).removeClass('input-error');
        });
        $('.login-form').on('submit', function (e) {
            $(this).find('input[type="text"], input[type="password"], textarea').each(function () {
                if ($(this).val() == "") {
                    e.preventDefault();
                    $(this).addClass('input-error');
                } else {
                    $(this).removeClass('input-error');
                }
            });
        });
    });
</script>