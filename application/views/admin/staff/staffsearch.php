<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
$userdata = $this->customlib->getUserData();
$logged_in_User = $this->customlib->getLoggedInUserData();
$logged_in_User_Role = json_decode($this->customlib->getStaffRole());
$superadmin_rest = $this->session->userdata['hospitaladmin']['superadmin_restriction'];
?>
<div class="content-wrapper"> 
	<section class="content-header">
        <h1><i class="fa-duotone fa-solid fa-users icono-menu-izquierda"></i>
             <?php echo $this->lang->line('human_resource'); ?></h1>  
            <span class="content-header-esconder mlr-10">
                <a href="<?php echo site_url('admin/staff') ?>"> 
                    <i class="fa-light fa-sitemap"></i>
                </a> 
            </span> 
            <span class="content-header-esconder bread-span"> <?php echo $this->lang->line('staff_directory'); ?> </span>
            <span style="right: 40px; position: absolute;">
				
				<?php if ($this->rbac->hasPrivilege('staff', 'can_add')) { ?>
                                <div class="btn-group">
									<?php if ($this->rbac->hasPrivilege('disable_staff', 'can_view')) { ?>
                                        <button type="button" style="border-left: 1px solid #2e70ec;border-top-right-radius: 0px;border-bottom-right-radius: 0px; background-color: #2e70ec;" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?php echo base_url('admin/staff/disablestafflist'); ?>" >
                                                    <?php echo $this->lang->line('staff_disabled_staff'); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                    <a href="<?php echo site_url('admin/staff/create'); ?>" style="border-radius:0px 4px 4px 0px" class="btn btn-primary btnMDb2"><i class="fa-regular fa-user-plus"></i><span class="content-header-esconder"><?php echo $this->lang->line('add_staff'); ?></span></a>
                                    
                                </div>
                            <?php } ?>  
				<?php if ($this->rbac->hasPrivilege('staff_attendance', 'can_view')) { ?>
                                <a href="<?php echo base_url(); ?>admin/staffattendance" class="btn btn-secondary btnMDb2">
                                    <i class="fa-regular fa-calendar-clock"></i><span class="content-header-esconder"> <?php echo $this->lang->line('staff_attendance'); ?></span>
                                </a>                                
                            <?php } ?>
                            <?php if ($this->rbac->hasPrivilege('staff_payroll', 'can_view')) { ?>
                                <a href="<?php echo base_url(); ?>admin/payroll" class="btn btn-primary">
                                    <i class="fa-regular fa-credit-card-front"></i> <span class="content-header-esconder"><?php echo $this->lang->line('staff_payroll'); ?></span>
                                </a>
                            <?php } ?>
                            <?php if ($this->rbac->hasPrivilege('apply_leave', 'can_view')) { ?>
                                <a href="<?php echo base_url(); ?>admin/staff/leaverequest" class="btn btn-primary">
                                    <i class="fa-regular fa-calendar-users"></i> <span class="content-header-esconder"><?php echo $this->lang->line('staff_leaves'); ?></span>
                                </a>
                            <?php } ?>                   
            </span>
        
        
     
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary around20">
                    <div class="box-header">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('staff_directory'); ?></h3> 
                        
                    </div>
                        <?php  if ($this->session->flashdata('msg')) { ?> <div>  <?php echo $this->session->flashdata('msg') ?> </div> <?php $this->session->unset_userdata('msg'); }   ?>
                        <div class="box">  
                            <div class="box-header"></div> 
                            <div class="nav-tabs-custom border0">
								<div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/staff') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-9">
                                            <div class="form-group"> 
                                                <label><?php echo $this->lang->line("staff_role"); ?></label><small class="req"> *</small>
                                                <select name="role" class="form-control">
                                                    <option value=""><?php echo $this->lang->line("select"); ?></option>
                                                    <?php foreach ($role as $key => $role_value) {
                                                        ?>
                                                        <option <?php
                                                        if ($role_id == $role_value["id"]) {
                                                            echo "selected";
                                                        }
                                                        ?> value="<?php echo $role_value['id'] ?>"><?php echo $role_value['type'] ?></option>
                                                        <?php }
                                                        ?>
                                                </select>
                                                <span class="text-danger"><?php echo form_error('role'); ?></span>
                                            </div>  
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary pull-right checkbox-toggle margen-center"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <form role="form" action="<?php echo site_url('admin/staff') ?>" method="post" class="">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search_by_keyword'); ?></label>
                                                <input type="text" name="search_text" class="form-control" value="<?php echo set_value('search_text'); ?>" placeholder="<?php echo $this->lang->line('search_by_staff'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-secondary pull-right checkbox-toggle margen-center"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
							<div class="col-md-2">
								<?php
                    if (isset($resultlist)) {
                        ?>
								<div class="nav-tabs-custom border0">
								<ul class="nav nav-tabs pull-right pr-20" style="margin: 17% auto;">
                                    <li class="singlePanel active" data-toggle="tooltip" data-placement="top" title data-original-title="<?php echo $this->lang->line('card_view'); ?>"><a href="#tab_1" class="btn btn-default btn-sm" data-toggle="tab" data-original-title="<?php echo $this->lang->line('card_view'); ?>" aria-expanded="false"><i class="fa-regular fa-grid-2"></i> </a></li>
                                    <li class="singlePanel " data-toggle="tooltip" data-placement="top" title data-original-title="<?php echo $this->lang->line('list_view'); ?>"><a href="#tab_2" class="btn btn-default btn-sm" data-toggle="tab" data-original-title="<?php echo $this->lang->line('list_view'); ?>" aria-expanded="true"><i class="fa-regular fa-list"></i></a></li>
                                </ul>
								<script type="text/javascript">
									$('.singlePanel').tooltip();
  								</script>
								</div>
							</div>
                        </div>
                                
                                <div class="tab-content">
                                    <div class="download_label"><?php echo $title; ?></div>
                                    <div class="tab-pane table-responsive no-padding" id="tab_2">
                                        <table class="table table-striped table-bordered table-hover example" id="" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $this->lang->line('staff_id'); ?></th>
                                                    <th><?php echo $this->lang->line('staff_name'); ?></th>
                                                    <th><?php echo $this->lang->line('staff_role'); ?></th>
                                                    <th><?php echo $this->lang->line('staff_department'); ?></th>
                                                    <th><?php echo $this->lang->line('staff_designation'); ?></th>
                                                    <th><?php echo $this->lang->line('staff_mobile_number'); ?></th>
                                                     <?php 
                                                        if (!empty($fields)) {
                                                            foreach ($fields as $fields_key => $fields_value) {
                                                                ?>
                                                                <th><?php echo $fields_value->name; ?></th>
                                                                <?php
                                                            } 
                                                        }
                                                    ?> 
                                                    <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php foreach ($resultlist as $key => $staff) {
                                                    if($staff["user_type"]!='Super Admin' || $superadmin_rest != 'disabled' ){ ?>
                                                     <tr>
                                                        <td><?php echo $staff["employee_id"] ?></td>
                                                        <td><?php echo $staff["name"] . " " . $staff["surname"] ?></td>
                                                        <td><?php echo $staff["user_type"] ?></td>
                                                        <td><?php echo $staff["department"] ?></td>
                                                        <td><?php echo $staff["designation"] ?></td>
                                                        <td><?php echo $staff["contact_no"] ?></td>
                                                      <?php
                                                           foreach ($fields as $fields_key => $fields_value) {
                                                                $custom_name   = $fields_value->name;
                                                                $display_field = $staff["$fields_value->name"] ;
                                                                if ($fields_value->type == "link") {
                                                                    $display_field = "<a href=" . $staff["$fields_value->name"] . " target='_blank'>" . $staff["$fields_value->name"] . "</a>";
                                                                }
                                                               ?>
                                                               <td><?php echo $display_field ;?></td>
                                                            <?php }
                                                        ?>                                                           
                                                        <td class="pull-right noExport">                                                        
                                                    <?php if (($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) || ($userdata["id"] == $staff["id"])) { ?>
                                                            <a href="<?php echo base_url() . "admin/staff/profile/" . $staff['id'] ?>"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('show'); ?>">
                                                                <i class="fa-regular fa-eye"></i>
                                                            </a>
                                                        <?php } ?> 
                                                            <?php 
                                                            $a = 0 ;
                                                $staff["user_type"];
                                                if(($staff["user_type"] == "Super Admin") && $userdata["id"] == $staff["id"]){                                                   
                                                     $a = 1 ;  
                                                }elseif(($this->rbac->hasPrivilege('staff', 'can_edit')) && ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view') && $staff["user_type"] != "Super Admin")){
                                                     $a = 1;                                                   
                                                }
                                                if($a == 1){
                                                ?>                                           <a href="<?php echo base_url() . "admin/staff/edit/" . $staff['id'] ?>"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                                    </a> 
                                                                    <?php } ?>                                                        
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                                   <?php  }
                                                    ?>                                                   
                                            </tbody>
                                        </table>
                                    </div>                           
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="mediarow">   
                                            <div class="row row-flex align-content-center">  
                                                <?php if (empty($resultlist)) {
                                                    ?>                                                
                                                <div class="col-md-12">
                                                    <div class="alert alert-info"><?php echo $this->lang->line('no_record_found'); ?></div>
                                                </div>
                                                    <?php
                                                } else {
                                                    $count = 1;
                                                    foreach ($resultlist as $staff) {
                                                         if($staff["user_type"]!='Super Admin' || $superadmin_rest != 'disabled' ){ ?>                                                      
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 img_div_modal">
                                                            <div class="staffinfo-box">
                                                                <div class="staffleft-box">
                                                                    <?php
                                                                    if (!empty($staff["image"])) {
                                                                        $image = $staff["image"];
                                                                    } else {
                                                                        $image = "no_image.png";
                                                                    }
                                                                    ?>
                                                                    <img  src="<?php echo base_url("uploads/staff_images/" . $image.img_time()) ; ?>" />
                                                                </div>
                                                                <div class="staffleft-content">
                                                                    <h5><span data-toggle="tooltip" title="<?php echo $this->lang->line('name'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["name"] . " " . $staff["surname"]; ?></span></h5>
																	<p><font data-toggle="tooltip" title="<?php echo "Employee Id"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["email"] ?></font></p>
                                                                    
                                                                    <p><font data-toggle="tooltip" title="<?php echo "Contact Number"; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["contact_no"] ?></font></p>
                                                                    <p><font data-toggle="tooltip" title="<?php echo 'Location'; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php
                                                                        if (!empty($staff["location"])) {
                                                                            echo $staff["location"] . ",";
                                                                        }
                                                                        ?></font><font data-toggle="tooltip" title="<?php echo 'Department'; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $staff["department"]; ?></font></p>
                                                                    <div class="staffsub" >
                                                                        <?php if (!empty($staff["user_type"])) { ?>
                                                                            <span class="col-md-6 usuario-card-izq" data-toggle="tooltip" title="<?php echo $this->lang->line('role'); ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["user_type"] ?></span>
                                                                        <?php } ?>
                                                                        <?php if (!empty($staff["designation"])) { ?>          
                                                                            <span class="col-md-6 usuario-card-der linea-staff" data-toggle="tooltip" title="<?php echo 'Designation'; ?>" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo $staff["designation"] ?></span>
																		<?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="overlay3">
                                                                    <div class="stafficons">
                                                                          <?php              
             if (($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) || ($userdata["id"] == $staff["id"])) { ?>
                                                                            <a title="<?php echo $this->lang->line('show') ?>"  href="<?php echo base_url() . "admin/staff/profile/" . $staff["id"] ?>"><i class="fa-regular fa-circle-ellipsis-vertical"></i></a>
                                                                       <?php } 
                                                            $a = 0 ;
                                                $staff["user_type"];
                                                if(($staff["user_type"] == "Super Admin") && $userdata["id"] == $staff["id"]){
                                                $a = 1 ;  
                                                }elseif( ($this->rbac->hasPrivilege('staff', 'can_edit')) && ($this->rbac->hasPrivilege('can_see_other_users_profile', 'can_view')) && $staff["user_type"] != "Super Admin"  ){
                                                $a = 1;
                                                }
                                                if($a == 1){

                                                ?> 
                                                                            <a title="<?php echo $this->lang->line('edit') ?>"  href="<?php echo base_url() . "admin/staff/edit/" . $staff["id"] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                                                        <?php } ?>                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--./col-md-3-->
                                                        <?php
                                                         }
                                                    }
                                                }
                                                ?>
                                            </div><!--./col-md-3-->
                                        </div><!--./row-->  
                                    </div><!--./mediarow-->
                                </div>                                                          
                            </div>  
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>  
</section>
</div>