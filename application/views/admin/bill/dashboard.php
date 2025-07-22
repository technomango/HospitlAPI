<link rel="stylesheet" href="<?php echo base_url();?>backend\dist\css\jquery-ui.css">
<div class="content-wrapper">
	<section class="content-header">
        <h1><i class="fa-duotone fa-file-invoice icono-menu-izquierda"></i>
             <?php echo $this->lang->line('billing'); ?></h1>  
            <span class="mlr-10">
                <a href="<?php echo site_url('admin/bill/dashboard') ?>"> 
                    <i class="fa-light fa-file-invoice-dollar"></i>
                </a> 
            </span> 
            <span class="bread-span"> <?php echo $this->lang->line('single_module_billing'); ?> </span>
			
    </section>
    <section class="content">
        <div class="row row-equal">
        	<div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('single_module_billing'); ?></h3>
                    </div>
                    <div class="box-body pb0">
                        <div class="row">
                            <?php if ($this->rbac->hasPrivilege('appointment_billing', 'can_view')) {?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/bill/appointment');?>">
                                        <div class="billingbox-icon icono-bill-dash"><i class="fa-duotone fa-solid fa-calendar-circle-user"></i></div> 
                                        <p class="p-bill-dash"><?php echo $this->lang->line('appointment'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->
                        <?php } if ($this->rbac->hasPrivilege('opd_billing', 'can_view')) {?> 
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/bill/opd');?>">
                                        <div class="billingbox-icon  icono-bill-dash"><i class="fa-duotone fa-solid fa-stethoscope"></i></div>
                                        <p class="p-bill-dash"><?php echo $this->lang->line('opd'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->
							 <?php } if ($this->rbac->hasPrivilege('ipd_billing', 'can_view')) {?> 
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/patient/ipdsearch');?>">
                                        <div class="billingbox-icon  icono-bill-dash"><i class="fa-duotone fa-solid fa-bed-pulse"></i></div>
                                        <p class="p-bill-dash"><?php echo $this->lang->line('ipd'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->
                        <?php } if ($this->rbac->hasPrivilege('pathology_billing', 'can_view')) {?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/bill/pathology');?>">
                                        <div class="billingbox-icon icono-bill-dash"><i class="fa-duotone fa-solid fa-flask"></i></div> 
                                        <p class="p-bill-dash"><?php echo $this->lang->line('pathology'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->
                        <?php } if ($this->rbac->hasPrivilege('radiology_billing', 'can_view')) {?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/bill/radiology');?>">
                                        <div class="billingbox-icon icono-bill-dash"><i class="fa-duotone fa-solid fa-x-ray"></i></div>
                                        <p class="p-bill-dash"><?php echo $this->lang->line('radiology'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->
                            <?php } if ($this->rbac->hasPrivilege('blood_bank_billing', 'can_view')) {?>
                            <!--<div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/bill/issueblood');?>">
                                        <div class="billingbox-icon icono-bill-dash"><i class="fa-duotone fa-solid fa-droplet"></i></div>
                                        <p class="p-bill-dash"><?php echo $this->lang->line('blood'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->
							
							<?php } if ($this->rbac->hasPrivilege('ambulance_billing', 'can_view')) {?>
                            <!--<div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/vehicle/getcallambulance');?>">
                                        <div class="billingbox-icon icono-bill-dash"><i class="fa-duotone fa-solid fa-truck-medical"></i></div>
                                        <p class="p-bill-dash"><?php echo $this->lang->line('ambulance'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->

                            <!--<div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="billingbox">
                                    <a href="<?php echo base_url('admin/pharmacy/bill');?>">
                                        <div class="billingbox-icon icono-bill-dash"><i class="fa-duotone fa-solid fa-prescription-bottle-pill"></i></div> 
                                        <p class="p-bill-dash"><?php echo $this->lang->line('pharmacy'); ?></p>
                                    </a>
                                </div>
                            </div><!--./col-lg-4-->
                        <?php } ?>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('opd_ipd_billing'); ?></h3>
                    </div>
                    <div class="box-body min-h-4">
                        <form action="<?php echo base_url()?>admin/bill/dashboard" accept-charset="utf-8" method="post" class="form-inline ">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                    <div class="form-group align-top">
                                        
                                            <label><?php echo $this->lang->line('case_id'); ?></label><small class="req"> *</small>
										
                                            <input type="text" name="case_id" class="form-control" id="case_id" value="<?php echo set_value('case_id');?>" placeholder="<?php echo $this->lang->line('enter_case_id'); ?>">
                                            <span class="text-danger"><?php echo form_error('case_id'); ?></span>
                                         
                                    </div>
                                    <div class="form-group">
                                            <button type="submit" id="serach_btn"  value="search_filter" class="btn btn-primary checkbox-toggle pull-right"><i class="fa-solid fa-magnifying-glass"></i> <?php echo $this->lang->line('search'); ?></button>   
                                           
                                    </div> 
                                    <?php 
                                    if(!empty($error_message)){
                                        ?>
                                        <div class="box-body">
                                    <div class="alert alert-danger"><?php echo $error_message;?></div>                               

                                    </div>
                                        <?php
                                    }
                                    ?>
                                                                        
                            </form> 
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
     $(document).ready(function() {

        $("#case_id").autocomplete({

            source:function(request, response) {

                $.ajax({

                    type:"GET",

                    url: base_url+'admin/bill/getcaseid',

                    data: { caseid: $("#case_id").val() },

                    dataType:"json",

                    contentType:"application/json; charset=utf-8",

                    success:function(data) {
                        response($.map(data, function (item) {
                            return {
                                label: item.id,
                                value: item.id
                            };
                        }));

                    },

                    error:function(data) {

                        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");

                    }

                });

            }

        });

    });
</script>


<!-- //========datatable end===== -->