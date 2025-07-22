<!DOCTYPE html>
<html <?php echo $this->customlib->getRTL(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->customlib->getAppName(); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="theme-color" content="#424242" />
		
         <?php 
            $logoresult = $this->customlib->getLogoImage();
            if (!empty($logoresult['mini_logo'])) {
                $mini_logo = base_url() . 'uploads/hospital_content/logo/' . $logoresult['mini_logo']; 
            }else{
                $mini_logo = base_url() . 'backend/images/s-favican.png';
            }
         ?>
        <link href="<?php echo $mini_logo; ?>" rel="shortcut icon" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/style-main.css">

        <?php
$this->load->view('layout/theme');
?>
        <?php
if ($this->customlib->getRTL() == "yes") {
    ?>
            <!-- Bootstrap 3.3.5 RTL -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/bootstrap-rtl/css/bootstrap-rtl.min.css"/>
            <!-- Theme RTL style -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/AdminLTE-rtl.min.css" />
            <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/ss-rtlmain.css">
            <link rel="stylesheet" href="<?php echo base_url(); ?>backend/rtl/dist/css/skins/_all-skins-rtl.min.css" />

            <?php
} else {

}
?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/all.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/fonts/awesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/sweet-alert/sweetalert2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/custom_style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/custom_patiente_style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/datepicker/css/bootstrap-datetimepicker.css">
        <!--file dropify-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/dropify.min.css">
        <!--file nprogress-->
        <link href="<?php echo base_url(); ?>backend/dist/css/nprogress.css" rel="stylesheet">
        <!--print table-->
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <!--print table mobile support-->
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/responsive.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>backend/dist/datatables/css/rowReorder.dataTables.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>backend/custom/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>backend/datepicker/date.js"></script>
        <script src="<?php echo base_url(); ?>backend/dist/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>backend/js/hospital-custom.js"></script>
        <script src="<?php echo base_url(); ?>backend/dist/js/moment.min.js"></script>
        <!-- fullCalendar -->
        <link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!--language css-->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/backend/dist/css/bootstrap-select.min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/bootstrap-select.min.js"></script>

 <script type="text/javascript">
    $(function(){
      $('.languageselectpicker').selectpicker();
   });
</script>
        <script type="text/javascript">
            var baseurl = "<?php echo base_url(); ?>";
            var chk_validate = "";
        </script>
    </head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <script type="text/javascript">
            function collapseSidebar() {

                if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                    sessionStorage.setItem('sidebar-toggle-collapsed', '');
                } else {
                    sessionStorage.setItem('sidebar-toggle-collapsed', '1');
                }
            }

            function checksidebar() {
                if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
                    var body = document.getElementsByTagName('body')[0];
                    body.className = body.className + ' sidebar-collapse';
                }
            }
            checksidebar();
        </script>
        <div class="wrapper">
            <header class="main-header" id="alert">
                <?php
if ($_SESSION['patient']['patient_type'] == "Outpatient") {
    $url = 'patient/dashboard/profile';
} else {

    $url = 'patient/dashboard/ipdprofile';
}
?>
                <?php
$logoresult = $this->customlib->getLogoImage();
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

                
				<a href="<?php echo base_url(); ?>patient/dashboard" class="logo">
                    <span class="logo-mini"><img height="31" src="<?php echo $mini_logo.img_time(); ?>" alt="<?php echo $this->customlib->getAppName() ?>" /></span>
                    <span class="logo-lg"><img src="<?php echo $logo_image.img_time(); ?>" alt="<?php echo $this->customlib->getAppName() ?>" /></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                     <a href="#"  onclick="collapseSidebar()"  class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
						<i class="fa-duotone fa-solid fa-align-right" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4; font-size: 18px;"></i>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        
                    </div>
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <div class="pull-right">
                            <div class="navbar-custom-menu">
                                 <div class="langdiv" data-placement="bottom" data-toggle="tooltip" title="<?php echo $this->lang->line('language') ?>">
                                        <select class="languageselectpicker" onchange="set_languages(this.value)"  type="text" id="languageSwitcher" class="form-control search-form search-form3 langselect"  >
                                           <?php $this->load->view('patient/languageSwitcher')?>
                                        </select>
                                </div>
                                <ul class="nav navbar-nav headertopmenu">
                                    <?php 
                                    if ($this->module_lib->hasActive('chat')) {
                                    if ($this->module_lib->hasPatientActive('chat')) { ?>
                                      <li class="cal15">
										  
										 
										  
										  <a data-placement="bottom" data-toggle="tooltip" title="" href="<?php echo site_url('patient/chat')?>" data-original-title="<?php echo $this->lang->line('chat');?>" class="todoicon"><i class="fa-duotone fa-solid fa-comments" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4; font-size: 20px;"></i> <?php  echo chat_couter() > 0 ? "<span class='label label-warning chat-label-noti'>".chat_couter()."</span>": "" ?></a></li> 
                                    <?php } } ?>
                                    <?php

                                        $systemnotifications = $this->notification_model->getPatientUnreadNotification();
                                        ?>
                                       
                                        <?php if (sizeof($systemnotifications) > 0) { ?>
                                            <li class="cal15">
												
												<a data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('notifications'); ?>" href="<?php echo base_url() . "patient/systemnotifications" ?>"><i class="fa-duotone fa-solid fa-bell" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4; font-size: 20px;"></i>
                                            <span class="label label-warning"><?php echo sizeof($systemnotifications); ?></span></a></li>
                                       <?php }else{ ?>
                                            <li class="cal15"><a href="<?php echo base_url() . "patient/systemnotifications" ?>"><i class="fa-duotone fa-solid fa-bell" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4; font-size: 20px;"></i>
                                            </a></li>
                                       <?php }?>


                                       <?php 
                                       if ($this->module_lib->hasActive('calendar_to_do_list')) {
                                       if ($this->module_lib->hasPatientActive('calendar_to_do_list')) { ?>
                                            <li class="cal15"><a data-placement="bottom" data-toggle="tooltip" title=""  data-original-title="<?php echo $this->lang->line('calendar');?>" class="todoicon" href="<?php echo base_url() ?>user/calendar/"><i class="fa-duotone fa-solid fa-calendars" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4; font-size: 20px;"></i></a></li>
                                       <?php } } ?>
                                    <?php
$image = $this->patient_data["image"];
if (!empty($image)) {

    $file = $image;
} else {

    $file = "uploads/patient_images/no_image.png";
}
?>
                                   
									
									
									
									<li class="dropdown user-menu">
                                        <a class="dropdown-toggle background-user-menu" data-toggle="dropdown" href="#" aria-expanded="false" style="padding: 0px 0px; padding-left: 8px;">
                                            <img src="<?php echo base_url() . $file.img_time(); ?>" class="topuser-image" alt="User Image">
											<div class="sstopuser-test">
                                                        <h4 style="text-transform: capitalize;"><?php echo $this->customlib->getPatientSessionUserName(); ?></h4>
                                                        <h5 class="user-role-menu"><?php echo $this->lang->line('patient'); ?></h5>
                                                    </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user menuboxshadow">
                                            <li>
                                                <div class="sstopuser">
                                                    <div class="ssuserleft">
                                                        <a href="<?php echo base_url() . "patient/dashboard/appointment" ?>"><img src="<?php echo base_url() . $file.img_time(); ?>" alt="User Image"></a>
                                                    </div>
                                                    <div class="sstopuser-test" style="margin: 10px auto;">
                                                        <h4 style="text-transform: capitalize;"><?php echo $this->customlib->getPatientSessionUserName(); ?></h4>
                                                        <h5 class="user-role-menu"><?php echo $this->lang->line('patient'); ?></h5>
                                                        <!--p>demo</p-->
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="sspass">
                                                        <a class="" href="<?php echo base_url(); ?>user/user/changepass"><i class="fa-regular fa-lock" style="color: #74C0FC;"></i> <?php echo $this->lang->line('change_password'); ?></a> <a class="pull-right" href="<?php echo base_url(); ?>site/logout"><i class="fa-regular fa-arrow-right-from-bracket" style="color: #ffa200;"></i> <?php echo $this->lang->line('logout'); ?></a>
                                                    </div>
                                                </div><!--./sstopuser--></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar" id="alert2">
                <section class="sidebar" id="sibe-box">
                    <ul class="sidebar-menu verttop2">
                        <?php if ($_SESSION['patient'] == true) { ?>
                            <li class="treeview <?php echo set_Topmenu('dashboard'); ?>">
                                <a href="<?php echo base_url(); ?>patient/dashboard">
                                    <i class="fa-duotone fa-solid fa-desktop icono-menu-izquierda"></i>  <?php echo $this->lang->line('dashboard'); ?>
                               </a>
                           </li>
<?php  if ($this->module_lib->hasActive('appointment')) { 
            if ($this->module_lib->hasPatientActive('my_appointments')) {
  
?>
                                   <li class="treeview <?php echo set_Topmenu('myprofile'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/appointment"> <i class="fa-duotone fa-solid fa-calendars icono-menu-izquierda"></i><?php echo $this->lang->line('my_appointments'); ?>
                                        </a>
                                    </li>
                                <?php
} } 
    if ($this->module_lib->hasActive('opd')) {
        if ($this->module_lib->hasPatientActive('opd')) {
        ?>

                                    <li class="treeview <?php echo set_Topmenu('profile'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/profile">
                                            <i class="fa-duotone fa-solid fa-stethoscope icono-menu-izquierda"></i> <?php echo $this->lang->line('opd_out_patient'); ?>
                                        </a>

                                    </li> 
                                <?php
    } }
    if ($this->module_lib->hasActive('ipd')) {
        if ($this->module_lib->hasPatientActive('ipd')) {
        ?>

                                    <li class="treeview <?php echo set_Topmenu('ipdprofile'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/ipdprofile">
                                            <i class="fa-duotone fa-solid fa-bed-pulse icono-menu-izquierda"></i> <?php echo $this->lang->line('ipd_in_patient'); ?>
                                        </a>

                                    </li>
                                <?php
        } }
         if ($this->module_lib->hasActive('pharmacy')) {
        if ($this->module_lib->hasPatientActive('pharmacy')) {
        ?>

                                    <li class="treeview <?php echo set_Topmenu('pharmacy'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/bill">
                                            <i class="fa-duotone fa-solid fa-prescription-bottle-pill icono-menu-izquierda"></i> <?php echo $this->lang->line('pharmacy'); ?>
                                        </a>

                                    </li>
                                <?php
         } } 
          if ($this->module_lib->hasActive('pathology')) {
         if ($this->module_lib->hasPatientActive('pathology')) {
        ?>
                                    <li class="treeview <?php echo set_Topmenu('pathology'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/search">
                                            <i class="fa-duotone fa-solid fa-flask icono-menu-izquierda"></i> <?php echo $this->lang->line('pathology'); ?>
                                        </a>

                                    </li>
                                <?php
         }  }
         if ($this->module_lib->hasActive('radiology')) {
         if ($this->module_lib->hasPatientActive('radiology')) {
        ?>

                                    <li class="treeview <?php echo set_Topmenu('radiology'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/radioreport">
                                            <i class="fa-duotone fa-solid fa-x-ray icono-menu-izquierda"></i> <?php echo $this->lang->line('radiology'); ?>
                                        </a>

                                    </li>
<?php
         }  }
          if ($this->module_lib->hasActive('ambulance')) {
            if ($this->module_lib->hasPatientActive('ambulance')) {
        ?>
                                    <li class="treeview <?php echo set_Topmenu('ambulance'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/ambulance">
                                            <i class="fa-duotone fa-regular fa-truck-medical icono-menu-izquierda"></i> <span> <?php echo $this->lang->line('ambulance'); ?></span>
                                        </a>

                                    </li>
                                <?php
            }   }
             if ($this->module_lib->hasActive('blood_bank')) {
            if ($this->module_lib->hasPatientActive('blood_bank')) {
        ?>
                                    <li class="treeview <?php echo set_Topmenu('blood_bank'); ?>">
                                        <a href="<?php echo base_url(); ?>patient/dashboard/bloodbank">
                                           <i class="fa-duotone fa-solid fa-droplet icono-menu-izquierda"></i> <?php echo $this->lang->line('blood_bank'); ?>
                                        </a>

                                    </li>
 <?php
            }   }
             if ($this->module_lib->hasActive('live_consultation')) {
            if ($this->module_lib->hasPatientActive('live_consultation')) {
        ?>
                                <li class="treeview <?php echo set_Topmenu('live_consult'); ?>">
                                    <a href="<?php echo base_url(); ?>patient/dashboard/liveconsult">
                                    <i class="fa fa-video-camera" aria-hidden="true"></i> <span> <?php echo $this->lang->line('live_consultation'); ?></span>
                                    </a>

                                </li>
                                <?php
             } }
			 if ($this->module_lib->hasActive('download_center')) {
           if ($this->module_lib->hasPatientActive('download_center')) {
        ?>
                                <li class="treeview <?php echo set_Topmenu('content_list'); ?>">
                                    <a href="<?php echo base_url(); ?>patient/dashboard/contentlist">
                                    <i class="fa-duotone fa-solid fa-cloud-arrow-down icono-menu-izquierda"></i> <?php echo $this->lang->line('download_center'); ?>
                                    </a>

                                </li>
                                <?php
            }
			}

}
?>
                          
                    </ul>
                </section>
            </aside>
            <script>
    var base_url="<?php echo base_url(); ?>";
     function defoult(id){
      var defoult=  $('#languageSwitcher').val();
        $.ajax({
            type: "POST",
            url: base_url + "patient/defoult_language/"+id,
            data: {},
            //dataType: "json",
            success: function (data) {
                successMsg("<?php echo $this->lang->line('status_change_successfully'); ?>");
              $('#languageSwitcher').html(data);

            }
        });

        window.location.reload('true');
    }

    function set_languages(lang_id){
        $.ajax({
            type: "POST",
            url: base_url + "patient/dashboard/user_language/"+lang_id,
            data: {},
            success: function (data) {
                successMsg("<?php echo $this->lang->line('status_change_successfully'); ?>");
                window.location.reload('true');
            }
        });
    }
            </script>