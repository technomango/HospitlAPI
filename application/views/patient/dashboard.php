<script src="<?php echo base_url('/') ?>backend/js/Chart.bundle.js"></script>
<script src="<?php echo base_url('/') ?>backend/js/utils.js"></script>

<div class="content-wrapper">
	<section class="content-header">
        <h1><i class="fa-duotone fa-solid fa-desktop icono-menu-izquierda"></i>
             <?php echo $this->lang->line('dashboard'); ?></h1>  		
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php 
            if(!IsNullOrEmptyString($insurance_validity) && strtotime(date('Y-m-d')) > strtotime($insurance_validity)){
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="alert alert-danger">
                <?php echo $this->customlib->YYYYMMDDTodateFormat($insurance_validity);?> <?php echo $this->lang->line('was_your_tpa_validity_date_which_is_expired_now_please_renew_your_tpa_and_update_its_status_with_us'); ?>
                </div>
                </div>
                <?php
            }
            ?>
        </div>
		
		<div class="box box-info">
		<div class="row" id="patient_details"></div>
		</div>
		
      <div class="row">
                <?php if ($this->module_lib->hasPatientActive('opd')) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('patient_visits'); ?>">
                            <a href="<?php echo site_url('patient/dashboard/profile'); ?>">
                                <div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-stethoscope"></i></span>
                                 </div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('patient_visits'); ?></h3>
									<h2 class="info-box-number-h2"><?php echo $total_visits['total_visit']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                <?php } ?>
                <?php  if ($this->module_lib->hasPatientActive('ipd')) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('patient_visits'); ?>">
                            <a href="<?php echo site_url('patient/dashboard/ipdprofile'); ?>">
                                <div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-bed-pulse"></i></span>
                                 </div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('patient_visits'); ?></h3>
									<h2 class="info-box-number-h2"><?php echo $total_ipd['total']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                <?php } ?>
                <?php if ($this->module_lib->hasPatientActive('pharmacy')) { ?>
                     <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('pharmacy'); ?>">
                            <a href="<?php echo site_url('patient/dashboard/bill'); ?>">
                                <div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-prescription-bottle-pill"></i></span>
                                 </div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('purchases'); ?> en <?php echo $this->lang->line('pharmacy'); ?></h3>
									<h2 class="info-box-number-h2"><?php echo $total_pharmacy['total']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                <?php } ?>
                <?php if ($this->module_lib->hasPatientActive('pathology')) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('pathology_tests'); ?>">
                            <a href="<?php echo site_url('patient/dashboard/search'); ?>">
                                <div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-flask"></i></span>
                                 </div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('pathology_tests'); ?></h3>
                                    <h2 class="info-box-number-h2"><?php echo $total_pathology['total']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                <?php } ?>
                <?php if ($this->module_lib->hasPatientActive('radiology')) { ?>
                   <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('radiology_tests'); ?>">
                            <a href="<?php echo site_url('patient/dashboard/radioreport'); ?>">
                                <div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-x-ray"></i></span>
                                 </div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('radiology_tests'); ?></h3>
                                    <h2 class="info-box-number-h2"><?php echo $total_radiology['total']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                <?php } ?>
                <?php if ($this->module_lib->hasPatientActive('blood_bank')) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('blood_bank'); ?>">
                            <a href="<?php echo site_url('patient/dashboard/bloodbank'); ?>">
                                <div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-droplet"></i></span>
                                 </div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('blood_bank'); ?></h3>
                                    <h2 class="info-box-number-h2"><?php echo $total_blood_issue['total']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                <?php } ?>
                <?php if ($this->module_lib->hasPatientActive('ambulance')) { ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('ambulance_services'); ?>">
                            <a href="<?php echo site_url('patient/dashboard/ambulance'); ?>">
                                <div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-truck-medical"></i></span>
                                 </div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('ambulance_services'); ?></h3>
                                    <h2 class="info-box-number-h2"><?php echo $total_ambulance['total']; ?></h2>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                <?php } ?>
        </div>
        
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="box box-info">
						<div class="box-header">
                            <h3 class="box-title"><?php echo $this->lang->line('top_ten_findings'); ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart"> 
                              <canvas id="finding-bar-chart"  height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div><!--./col-lg-7-->       
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="box box-info">
						<div class="box-header">
                            <h3 class="box-title"><?php echo $this->lang->line('top_ten_symptoms'); ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart"> 
                              <canvas id="symptom-bar-chart"  height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div><!--./col-lg-7-->
        </div>
		<div class="row">
        	      <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="box box-info">  
						<div class="box-header">
                            <h3 class="box-title"><?php echo $this->lang->line('medical_history'); ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart"> 
                                <canvas id="medical-history-chart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div><!--./col-lg-7-->
        </div>
    </section>
</div>
 
<script type="text/javascript">
    $(document).ready(function(){
     $.ajax({
    url: baseurl +"patient/dashboard/yearchart",
    type: 'POST',
    data: {},
    dataType: 'json',
    beforeSend: function() {
    
    },
    success: function(data) {
      var ctx = document.getElementById("medical-history-chart").getContext("2d");

        new Chart(ctx, {
  type: 'line',
  data: {
    labels:data.labels,
    datasets: data.dataset,
  },
  options: {
    title: {
      display: false,
      text: "<?php echo $this->lang->line('medical_history'); ?>"
    }
  }
});

    },
    error: function(xhr) { // if error occured
        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
      
    },
    complete: function() {
      
    }

});

$.ajax({
    url: baseurl +"patient/dashboard/findingchart",
    type: 'POST',
    data: {},
    dataType: 'json',
    beforeSend: function() {
    
    },
    success: function(data) {
      var ctx_1 = document.getElementById("finding-bar-chart").getContext("2d");

new Chart(ctx_1, {
  type: 'bar',
  data: {
    labels:data.labels,
    datasets: data.dataset,
  },
    options: {
      legend: { display: false },
      title: {
        display: false,
        text: "<?php echo $this->lang->line('top_ten_findings'); ?>"
      }
    }
});

    },
    error: function(xhr) { // if error occured
        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
      
    },
    complete: function() {
      
    }

});

$.ajax({
    url: baseurl +"patient/dashboard/symptomchart",
    type: 'POST',
    data: {},
    dataType: 'json',
    beforeSend: function() {
    
    },
    success: function(data) {
      var ctx_2 = document.getElementById("symptom-bar-chart").getContext("2d");

new Chart(ctx_2, {
  type: 'pie',
  data: {
    labels:data.labels,
    datasets: data.dataset,
  },
    options: {
      legend: { display: true },
      title: {
        display: false,
        text: "<?php echo $this->lang->line('top_ten_symptoms'); ?>"
      }
    }
});

    },
    error: function(xhr) { // if error occured
        alert("<?php echo $this->lang->line('error_occurred_please_try_again'); ?>");
      
    },
    complete: function() {
      
    }

});
    });
</script>

<script>
get_patientdetails();

    function get_patientdetails(){
        $.ajax({
            url: '<?php echo base_url("patient/pay/getPatientDetail/$case_reference_id"); ?>',
            type: "POST",
            success: function (data) {
                $("#patient_details").html(data);
            },
            error: function () {
                
            }
        });
    }
</script>