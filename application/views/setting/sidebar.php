<style type="text/css">
   .scrtabs-tab-scroll-arrow {
    border: 1px solid #dddddd;
    border-top: none;
    color: #428bca;
    display: none;
    float: left;
    font-size: 12px;
    height: 55px;
    margin-bottom: -1px;
    padding-top: 20px;
    text-align: center;
    width: 20px;
}
	.scrtabs-tabs-fixed-container ul.nav-tabs > li a {
    color: #444;
    border: 0;
    padding: 15px 15px;
    font-size: 16px;
    font-family: 'Poppins';
    font-weight: 500;
}
	.tablists {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}
</style>
<div class="col-md-12">
    <div class="box border0">
		<div class="scrtabs-tab-container" style="visibility: visible;">
			<div class="scrtabs-tabs-fixed-container">
        <ul class="nav nav-tabs border-0 navlistscroll">          
            <?php if($this->rbac->hasPrivilege('general_setting', 'can_view')) { ?>
                <li class="<?php echo set_Innermenu('schsettings/index'); ?>"><a class="<?php echo set_Innermenu('schsettings/index'); ?>" href="<?php echo base_url(); ?>schsettings"><i class="fa-regular fa-gears"></i> <?php echo $this->lang->line('general_settings'); ?></a></li>
            <?php } if($this->rbac->hasPrivilege('attendance_setting', 'can_view')) { ?>			
                <li><a class="<?php echo set_Innermenu('schsettings/attendance'); ?>" href="<?php echo base_url(); ?>schsettings/attendance"><i class="fa-regular fa-calendar-users"></i> <?php echo $this->lang->line('attendance_setting'); ?></a></li>            
            <?php } if($this->rbac->hasPrivilege('notification_setting', 'can_view')) { ?>
                <li><a class="<?php echo set_Innermenu('notification/setting'); ?>" href="<?php echo base_url(); ?>admin/notification/setting"><i class="fa-regular fa-bullhorn"></i> <?php echo $this->lang->line('notification_setting'); ?></a></li>
            <?php } if($this->rbac->hasPrivilege('system_notification_setting', 'can_view')) { ?> 
                <li><a class="<?php echo set_Innermenu('notification/system_notification_setting'); ?>" href="<?php echo base_url(); ?>admin/notification/system_notification_setting"><i class="fa-regular fa-bell"></i> <?php echo $this->lang->line('system_notification_setting'); ?></a></li>  
            <?php } if($this->rbac->hasPrivilege('sms_setting', 'can_view')) { ?>
                <li><a class="<?php echo set_Innermenu('smsconfig/index'); ?>" href="<?php echo base_url(); ?>smsconfig"><i class="fa-regular fa-comment-sms"></i> <?php echo $this->lang->line('sms_setting'); ?></a></li> 
            <?php } if ($this->rbac->hasPrivilege('email_setting', 'can_view')) { ?>
                <li><a class="<?php echo set_Innermenu('emailconfig/index'); ?>" href="<?php echo base_url(); ?>emailconfig"><i class="fa-regular fa-envelope"></i> <?php echo $this->lang->line('email_setting'); ?></a></li>
            <?php } if ($this->rbac->hasPrivilege('payment_methods', 'can_view')) { ?>  
                <li><a class="<?php echo set_Innermenu('admin/paymentsettings'); ?>" href="<?php echo base_url(); ?>admin/paymentsettings"><i class="fa-regular fa-credit-card"></i> <?php echo $this->lang->line('payment_methods'); ?></a></li> 
            <?php }
            if ($this->module_lib->hasActive('front_cms')) {
             if ($this->rbac->hasPrivilege('front_cms_setting', 'can_view')) { ?>
                <li><a class="<?php echo set_Innermenu('admin/frontcms/index'); ?>" href="<?php echo base_url(); ?>admin/frontcms"><i class="fa-regular fa-display"></i> <?php echo $this->lang->line('front_cms_setting'); ?></a></li>        
            <?php } } ?>
                  <?php if ($this->rbac->hasPrivilege('prefix_setting', 'can_view')) { ?>
              <li class="<?php echo set_Innermenu('prefix/index'); ?>"><a class="<?php echo set_Innermenu('prefix/index'); ?>" href="<?php echo site_url('admin/prefix'); ?>"><i class="fa-regular fa-input-text"></i> <?php echo $this->lang->line('prefix_setting'); ?> </a></li>
            <?php } ?>
                  <?php if ($this->rbac->hasPrivilege('superadmin','')) { ?>                                                     
                <li><a class="<?php echo set_Innermenu('admin/roles'); ?>" href="<?php echo base_url(); ?>admin/roles"><i class="fa-regular fa-user-secret"></i> <?php echo $this->lang->line('roles_permissions'); ?></a></li> 
            <?php } ?>
            <li>
                <?php if ($this->rbac->hasPrivilege('backup', 'can_view')) { ?>
                <a class="<?php echo set_Innermenu('admin/backup'); ?>" href="<?php echo base_url(); ?>admin/admin/backup"><i class="fa-regular fa-download"></i> <?php echo $this->lang->line('backup_restore'); ?></a>
            <?php } ?>
            </li>  
            <?php if ($this->rbac->hasPrivilege('languages', 'can_view')) { ?>
                <li><a class="<?php echo set_Innermenu('language/index'); ?>" href="<?php echo base_url(); ?>admin/language"><i class="fa-regular fa-language"></i> <?php echo $this->lang->line('languages'); ?></a></li>
            <?php } ?>
            <?php if ($this->rbac->hasPrivilege('users','can_view')) { ?>
                <li ><a class="<?php echo set_Innermenu('users/index'); ?>" href="<?php echo base_url(); ?>admin/users"><i class="fa-regular fa-user-group-simple"></i> <?php echo $this->lang->line('users'); ?></a></li>
            <?php } ?>
            <?php if ($this->rbac->hasPrivilege('captcha_setting', 'can_view')) { ?>
                <li class="<?php echo set_Innermenu('admin/captcha'); ?>"><a class="<?php echo set_Innermenu('admin/captcha/index'); ?>" href="<?php echo base_url(); ?>admin/captcha"><i class="fa-regular fa-user-robot-xmarks"></i> <?php echo $this->lang->line('captcha_settings'); ?></a></li>
            <?php } ?>
            <?php
            if ($this->rbac->hasPrivilege('superadmin','')) { ?>
                <li class="<?php echo set_Innermenu('admin/module'); ?>"><a class="<?php echo set_Innermenu('admin/module'); ?>" href="<?php echo base_url(); ?>admin/module"><i class="fa-regular fa-cubes"></i> <?php echo $this->lang->line('modules'); ?></a></li>
            <?php } ?>
			<?php  if ($this->rbac->hasPrivilege('superadmin','')) {    ?> 
				                   
			<?php } ?>
        </ul>
			</div>
			</div>
    </div>
</div>