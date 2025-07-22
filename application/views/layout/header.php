<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->customlib->getAppName(); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="theme-color" content="#5190fd" />
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
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/jquery.mCustomScrollbar.min.css">
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
       
        <?php } ?>        
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/all.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/fonts/awesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/iCheck/flat/blue.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/custom_style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>backend/datepicker/css/bootstrap-datetimepicker.css">
        
        <!--file sweetalert2-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/sweetalert2/dist/sweetalert2.min.css">
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
        <script src="<?php echo base_url(); ?>backend/plugins/colorpicker/bootstrap-colorpicker.js"></script>
        <script src="<?php echo base_url(); ?>backend/datepicker/date.js"></script>
        <script src="<?php echo base_url(); ?>backend/dist/js/jquery-ui.min.js"></script>	
		

		 
        <script src="<?php echo base_url(); ?>backend/js/hospital-custom.js"></script>
		 
		
        <!-- fullCalendar -->
        <link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>backend/fullcalendar/dist/fullcalendar.print.min.css" media="print">
        <link rel="stylesheet" href="<?php echo base_url() ?>backend/plugins/select2/select2.min.css">        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/backend/dist/css/bootstrap-select.min.css">
    </head>
	


    <script type="text/javascript">
        var baseurl = "<?php echo base_url(); ?>";
        var chk_validate = "<?php echo $this->config->item('SHLK') ?>";
    </script>
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

            function capitalizeFirstLetter(string) {
                  return string.charAt(0).toUpperCase() + string.slice(1);
            }
            
        </script>
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
        <div class="wrapper">
            <header class="main-header" id="alert">
                <a href="<?php echo base_url(); ?>admin/admin/dashboard" class="logo">
                    <span class="logo-mini"><img height="50" src="<?php echo $mini_logo.img_time(); ?>" alt="<?php echo $this->customlib->getAppName() ?>" /></span>
                    <span class="logo-lg"><img src="<?php echo $logo_image.img_time(); ?>" alt="<?php echo $this->customlib->getAppName() ?>" /></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
					
                    <a href="#"  onclick="collapseSidebar()"  class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
						<i class="fa-duotone fa-solid fa-align-right" style="--fa-primary-color: #4c86f1; --fa-secondary-color: #4c86f1; font-size: 18px;"></i>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
						
						
                    <div class="col-lg-5 col-md-4 col-sm-2 col-xs-1">
						
						
						
                        <span href="#" class="sidebar-session">
                           <?php if (($this->rbac->hasPrivilege('patient', 'can_view'))) {?>
                                <form class="navbar-form navbar-left search-form" role="search"  action="<?php echo site_url('admin/admin/search'); ?>" method="POST">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="input-group" style="padding-top:3px;">
                                        <input type="text" name="search_text" class="form-control search-form search-form3" placeholder="<?php echo $this->lang->line('search_by_name'); ?>">
                                        <span class="input-group-btn">
                                            <button type="submit" name="search" id="search-btn" style="padding: 12px 12px !important;border-radius: 0px 12px 12px 0px; background: #f4f5fb;" class="btn btn-flat"><i class="fa-duotone fa-solid fa-magnifying-glass" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4; font-size: 16px;"></i></button>
                                        </span>
                                    </div>
                                </form>
                            <?php }?>
                        </span>
                    </div>
                    <div class="col-lg-7 col-md-8 col-sm-10 col-xs-11">
                        <div class="pull-right">
                           
                            <div class="navbar-custom-menu">
                                 <?php if ($this->rbac->hasPrivilege('language_switcher', 'can_view')) {
    ?>
                                    <div class="langdiv" data-placement="bottom" data-toggle="tooltip" title=""><select class="languageselectpicker" onchange="set_languages(this.value)"  type="text" id="languageSwitcher" >

                                           <?php $this->load->view('admin/language/languageSwitcher')?>

                                        </select></div>
                                    <?php
}?> 
                                <ul class="nav navbar-nav headertopmenu">
                                         <?php 
                                    if ($this->rbac->hasPrivilege('notification_center', 'can_view')) {
                                            $systemnotifications = $this->notification_model->getCountUnreadNotification();

                                             ?>
                                            <li class="cal15">
                                                
                                                <a data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('notifications'); ?>" href="<?php echo base_url() . "admin/systemnotification" ?>">
                                                    <i class="fa-duotone fa-solid fa-bell" style="--fa-primary-color: #4c86f1; --fa-secondary-color: #4c86f1; font-size: 20px;"></i>
                                                    <?php echo ($systemnotifications->count > 0) ? "<span class='label label-warning'>".$systemnotifications->count."</span>" : "";  ?>
                                                </a>
                                            </li>
                                    <?php 
                                }
                                ?>
                                    
                                    <?php if ($this->rbac->hasPrivilege('bed_status', 'can_view')) {?>
                                        <li class="">
                                            <a data-target="modal" data-placement="bottom" data-toggle="tooltip" href="#" id='beddata' data-original-title="<?php echo $this->lang->line('bed_status'); ?>" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo $this->lang->line('loading'); ?>" onclick="getbedstatus()">
                                               <i class="fa-duotone fa-solid fa-bed" style="--fa-primary-color: #2e37a4; --fa-secondary-color: #2e37a4; font-size: 20px;"></i>                                                
                                            </a>
                                    </li>
                                       
                                    <?php } if ($this->module_lib->hasActive('chat') && $this->rbac->hasPrivilege('chat', 'can_view')) { ?>
                                     <li class="cal15">
                                        <a data-placement="bottom" data-toggle="tooltip" title="" href="<?php echo site_url('admin/chat')?>" data-original-title="<?php echo $this->lang->line('chat'); ?>" class="todoicon"><i class="fa-duotone fa-solid fa-comments" style="--fa-primary-color: #4c86f1; --fa-secondary-color: #4c86f1; font-size: 20px;"></i>  <?php  echo chat_couter() > 0 ? "<span class='label label-warning chat-label-noti'>".chat_couter()."</span>": "" ?></a>
                                    </li> 
                                    <?php
                                }

if ($this->module_lib->hasActive('calendar_to_do_list')) {
    if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {
        ?>
                                            <li class="cal15"><a href="<?php echo base_url() ?>admin/calendar/events" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $this->lang->line('calendar') ?>"><i class="fa-duotone fa-solid fa-calendars" style="--fa-primary-color: #4c86f1; --fa-secondary-color: #4c86f1; font-size: 20px;"></i></a></li>
                                            <?php
}
}
?>
                                    <?php
if ($this->module_lib->hasActive('calendar_to_do_list')) {
    if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {
        ?>
                                            <li class="dropdown">
                                                <a href="#"  title="<?php echo $this->lang->line('task') ?>" class="dropdown-toggle todoicon" data-toggle="dropdown">
                                                    <i class="fa-duotone fa-solid fa-list-check" style="--fa-primary-color: #4c86f1; --fa-secondary-color: #4c86f1; font-size: 20px;"></i>
                                                    <?php
$userdata = $this->customlib->getUserData();

        $count = $this->customlib->countincompleteTask($userdata["id"]);
        if ($count > 0) {
            ?>

                                                        <span class="todo-indicator"><?php echo $count ?></span>
                                                    <?php }?>
                                                </a>
                                                <ul class="dropdown-menu menuboxshadow widthMo250">

                                                    <li class="todoview plr10 ssnoti"><?php echo $this->lang->line('today_you_have'); ?> <?php echo $count; ?> <?php echo $this->lang->line('pending_task'); ?><a href="<?php echo base_url() ?>admin/calendar/events" class="pull-right pt0"><?php echo $this->lang->line('view_all'); ?></a></li>
                                                    <li>
                                                        <ul class="todolist">
                                                            <?php
$tasklist = $this->customlib->getincompleteTask($userdata["id"]);
        foreach ($tasklist as $key => $value) {
            ?>
                                                                <li><div class="checkbox">
                                                                        <label><input type="checkbox" id="newcheck<?php echo $value["id"] ?>" onclick="markc('<?php echo $value["id"] ?>')" name="eventcheck"  value="<?php echo $value["id"]; ?>"><?php echo $value["event_title"] ?></label>
                                                                    </div></li>
                                                            <?php }?>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <?php
}
}
?>

                                    <?php
$file   = "";
$result = $this->customlib->getUserData();

$image = $result["image"];
$role  = $result["user_type"];
$id    = $result["id"];
if (!empty($image)) {
    $file = "uploads/staff_images/" . $image;
} else {
    $file = "uploads/staff_images/no_image.png";
}
?>
                                    <li class="dropdown user-menu">
                                        <a class="dropdown-toggle background-user-menu" data-toggle="dropdown" href="#" aria-expanded="false" style="padding: 0px 0px; padding-left: 8px;">
                                            <img src="<?php echo base_url() . $file.img_time(); ?>" class="topuser-image" alt="User Image">
											<div class="sstopuser-test">
                                                        <h4 style="text-transform: capitalize;"><?php echo $this->customlib->getAdminSessionUserName(); ?></h4>
                                                        <h5 class="user-role-menu"><?php echo $role; ?></h5>
                                                    </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user menuboxshadow">
                                            <li>
                                                <div class="sstopuser">
                                                    <div class="ssuserleft">
                                                        <a href="<?php echo base_url() . "admin/staff/profile/" . $id ?>"><img src="<?php echo base_url() . $file.img_time(); ?>" alt="User Image"></a>
                                                    </div>
                                                    <div class="sstopuser-test" style="
    margin: 10px auto;
">
                                                        <h4 style="text-transform: capitalize;"><?php echo $this->customlib->getAdminSessionUserName(); ?></h4>
                                                        <h5 class="user-role-menu"><?php echo $role; ?></h5>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <div class="sspass">
                                                        <a href="<?php echo base_url() . "admin/staff/profile/" . $id ?>" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('my_profile'); ?>"><i class="fa-regular fa-user" style="color: #4c86f1;"></i><?php echo $this->lang->line('profile'); ?></a>
                                                        <a class="pl25" href="<?php echo base_url(); ?>admin/admin/changepass" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('change_password') ?>"><i class="fa-regular fa-lock" style="color: #74C0FC;"></i><?php echo $this->lang->line('password'); ?></a> <a class="pull-right" href="<?php echo base_url(); ?>site/logout"><i class="fa-regular fa-arrow-right-from-bracket" style="color: #ffa200;"></i><?php echo $this->lang->line('logout'); ?></a>
                                                    </div>
                                                </div><!--./sstopuser-->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
			
<script>
    function defoult(id){
      var defoult=  $('#languageSwitcher').val();
        $.ajax({
            type: "POST",
            url: base_url + "admin/language/defoult_language/"+id,
            data: {},
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
            url: base_url + "admin/language/user_language/"+lang_id,
            data: {},
            success: function (data) {
                successMsg("<?php echo $this->lang->line('status_change_successfully'); ?>");
                 window.location.reload('true');
            }
        });
    }
</script>
            <?php $this->load->view('layout/sidebar');?>