<div class="content-wrapper">
	<section class="content-header">
        <h1><i class="fa-duotone fa-solid fa-desktop icono-menu-izquierda"></i>
             <?php echo $this->lang->line('dashboard'); ?></h1>  
			
			
			
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">  
            
                <?php if (ENVIRONMENT != 'production') { ?>
                <div class="alert alert-danger">
                    Environment set to <?php echo ENVIRONMENT ;?>! <br>
                    Don't forget to set back to production in the main index.php file after finishing your tests or <?php echo ENVIRONMENT ;?>. <br>
                    Please be aware that in <?php echo ENVIRONMENT ;?> mode you may see some errors and deprecation warnings, for this reason, it's always recommended to set the environment to "production" if you are not actually developing some features/modules or trying to test some code.
                </div>
                <?php } ?>
            
            
                <?php if ($mysqlVersion && $sqlMode && strpos($sqlMode->mode, 'ONLY_FULL_GROUP_BY') !== FALSE) { ?>
                <div class="alert alert-danger">
                    Smart Hospital may not work properly because ONLY_FULL_GROUP_BY is enabled, consult with your hosting provider to disable ONLY_FULL_GROUP_BY in sql_mode configuration.
                </div>
            <?php } 
                $show=false;
                $role          = $this->customlib->getStaffRole();
                $role_id= json_decode($role)->id;
                foreach ($notifications as $notice_key => $notice_value) {                    
                    if($role_id==7){
                    $show=true; 
                    }elseif(date($this->customlib->getHospitalDateFormat()) >= $this->customlib->YYYYMMDDTodateFormat($notice_value->publish_date) ){
                        $show=true;
                    } 
                    ?>
                    <div class="dashalert alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="alertclose close close_notice" data-dismiss="alert" aria-label="Close" data-noticeid="<?php echo $notice_value->id; ?>"><span aria-hidden="true">&times;</span></button>
                        <a href="<?php echo site_url('admin/notification') ?>"><?php echo $notice_value->title; ?></a>
                    </div>
                  <?php
                }
                ?>
            </div>
            <?php
            $currency_symbol = $this->customlib->getHospitalCurrencyFormat();
            ?>  
            <?php
            $div_col = 12;
            $div_rol = 12;

            if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
                $div_col = 9;
                $div_rol = 12;
            }

            $widget_col = array();
            
            if ($this->rbac->hasPrivilege('monthly_expense_widget', 'can_view')) {
                $widget_col[1] = 2;
                $div_rol = 3;
            }
           
            $div = sizeof($widget_col);

            if (!empty($widget_col)) {
                $widget = 12 / $div;
            } else {
                $widget = 12;
            }
            ?>          
        </div><!--./row-->
        <div class="row">
            <?php
            if ($this->module_lib->hasActive('opd')) {
                if ($this->rbac->hasPrivilege('opd_income_widget', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="info-box" title="<?php echo $this->lang->line('opd_income'); ?>">
                            <a href="<?php echo site_url('admin/patient/search') ?>">
								<div class="info-box-content">
                                <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-stethoscope"></i></span>
                                 </div>
								<div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('opd_income'); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                    <?php
                }
            }
            ?>
            <?php
            if ($this->module_lib->hasActive('ipd')) {
                if ($this->rbac->hasPrivilege('ipd_income_widget', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6" title="<?php echo $this->lang->line('ipd_income'); ?>">
                        <div class="info-box">
                            <a href="<?php echo site_url('admin/patient/ipdsearch') ?>">
								<div class="info-box-content">
                                	<span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-bed-pulse"></i></span>
								</div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('ipd_income'); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
                    <?php
                }
            }
            ?>
            <?php
            if ($this->module_lib->hasActive('pharmacy')) {
                if ($this->rbac->hasPrivilege('pharmacy_income_widget', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6" title="<?php echo $this->lang->line('pharmacy_income'); ?>">
                        <div class="info-box">
                            <a href="<?php echo site_url('admin/pharmacy/bill') ?>">
								<div class="info-box-content">
                                	<span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-prescription-bottle-pill"></i></span>
								</div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('pharmacy'); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
			
                    <?php
                }
            }
            if ($this->module_lib->hasActive('pathology')) {
                if ($this->rbac->hasPrivilege('pathology_income_widget', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6" title="<?php echo $this->lang->line('pathology'); ?>">
                        <div class="info-box">
                            <a href="<?php echo site_url('admin/pathology/gettestreportbatch') ?>">
								<div class="info-box-content">
                                	<span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-flask"></i></span>
								</div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('pathology'); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
			 <?php
                }
            }
            ?>
            <?php
            if ($this->module_lib->hasActive('radiology')) {
                if ($this->rbac->hasPrivilege('radiology_income_widget', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6" title="<?php echo $this->lang->line('radiology'); ?>">
                        <div class="info-box">
                            <a href="<?php echo site_url('admin/radio/gettestreportbatch') ?>">
								<div class="info-box-content">
                                	<span class="info-box-icon bg-gris"><i class="ffa-duotone fa-solid fa-x-ray"></i></span>
								</div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('radiology'); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
					<?php
                }
            }
            ?>           
            <?php
            if ($this->module_lib->hasActive('blood_bank')) {
                if ($this->rbac->hasPrivilege('blood_bank_income_widget', 'can_view')) {
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6" title="<?php echo $this->lang->line('blood_bank_income'); ?>">
                        <div class="info-box">
                            <a href="<?php echo site_url('admin/bloodbank/issue') ?>">
								<div class="info-box-content">
                                	<span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-droplet"></i></span>
								</div>
                                <div class="info-box-content">
                                    <h3 class="info-box-text-h3"><?php echo $this->lang->line('blood_bank'); ?></h3>
                                </div>
                            </a>
                        </div>
                    </div><!--./col-lg-2-->
				<?php
                }
            }
            ?>
           
<?php if ($this->module_lib->hasActive('income')) { 
     if ($this->rbac->hasPrivilege('general_income_widget', 'can_view')) {
    ?>
                <div class="col-lg-3 col-md-3 col-sm-6" title="<?php echo $this->lang->line('income'); ?>">
                    <div class="info-box">
                        <a href="<?php echo site_url('admin/income') ?>">
							<div class="info-box-content">
                            <span class="info-box-icon bg-gris"><i class="fa-duotone fa-solid fa-money-bill-transfer"></i></span>
							 </div>
                            <div class="info-box-content">
                                <h3 class="info-box-text-h3"><?php echo $this->lang->line('income'); ?></h3>
                            </div>
                        </a>
                    </div>
                </div><!--./col-lg-2-->
			 <?php }} ?>
<?php if ($this->module_lib->hasActive('expense')) { 
            if ($this->rbac->hasPrivilege('expenses_widget', 'can_view')) {
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6" title="<?php echo $this->lang->line('expenses'); ?>">
                    <div class="info-box">
                        <a href="<?php echo site_url('admin/expense') ?>">
							<div class="info-box-content">
                            	<span class="info-box-icon expenses-rojo"><i class="fa-duotone fa-solid fa-money-bills"></i></span>
							</div>
                            <div class="info-box-content">
                                <h3 class="info-box-text-h3"><?php echo $this->lang->line('expenses'); ?></h3>
                            </div>
                        </a>
                    </div>
                </div><!--./col-lg-2-->
<?php } } ?>
			
			</div>
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('yearly_income_expense_chart', 'can_view')) {
                ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col60">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $this->lang->line('yearly_income_expense'); ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart"> 
                                <canvas id="lineChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div><!--./col-lg-7-->
            <?php } ?>
            <?php
            if ($this->rbac->hasPrivilege('monthly_income_expense_chart', 'can_view')) {
                ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col40">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $this->lang->line('monthly_income_overview'); ?> </h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart"> 
                                <canvas id="pieChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div><!--./col-lg-5-->
<?php } ?>
        </div><!--./row-->
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col80">
                <?php
                if($this->module_lib->hasActive("calendar_to_do_list")){
                if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {
                    ?>
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $this->lang->line('calendar'); ?></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="chart"> 
                                <div id="calendar" ></div> 
                            </div>
                        </div>
                    </div>
            <?php } }?>
            </div><!--./col-lg-9-->
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
                ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col20">
                    <?php foreach ($roles as $key => $value) {
                        ?>
                        <div class="info-box">
                            <a href="<?php echo base_url() . "admin/staff/index/".$value['id'] ?>">
                                
                                <div class="info-box-content sin-flex">
									<span class="info-box-icon-users bg-yellow"><i class="fa-light fa-user-group-crown ftlayer-icono-centro"></i></span>
                                    <h3 class="info-box-text-h3-users"><?php echo $value['name']; ?></h3>
                                    <h2 class="info-box-number-h2-users"><?php echo $value['count']; ?></h2>
                                </div>
                            </a>
                        </div>
    <?php } ?>
                </div><!--./col-lg-3-->
<?php } ?>
        </div><!--./row-->  
    </section>
</div>
<div id="newEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa-light fa-xmark"></i></button>
                <h4 class="modal-title"><?php echo $this->lang->line("add_new_event"); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form role="form"  id="addevent_form" method="post" enctype="multipart/form-data" action="">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_title'); ?></label><span class="req"> *</span>
                            <input class="form-control" name="title" id="input-field"> 
                            <span class="text-danger"><?php echo form_error('title'); ?></span>
                        </div> 
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                            <textarea name="description" class="form-control" id="desc-field"></textarea></div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_from'); ?><small class="req"> *</small></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa-regular fa-calendars"></i>
                                </div>
                                <input type="text" autocomplete="off" name="event_from" class="form-control pull-right event_from datetime">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_to'); ?><small class="req"> *</small></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa-regular fa-calendars"></i>
                                </div>
                                <input type="text" autocomplete="off" name="event_to" class="form-control pull-right event_to datetime">
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_color'); ?></label>
                            <input type="hidden" name="eventcolor" autocomplete="off" id="eventcolor" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";

                                $i++;
                            }
                            echo '<div class="cpicker-wrapper">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_type'); ?></label>
                            <br/>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" value="public" id="public"><?php echo $this->lang->line('public'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" value="private" checked id="private"><?php echo $this->lang->line('private'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" value="sameforall" id="public"><?php echo $this->lang->line('all'); ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="event_type" value="protected" id="public"><?php echo $this->lang->line('protected'); ?>
                            </label> </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 modal-footer pb0">
                            <input type="submit" class="btn btn-primary submit_addevent pull-right" value="<?php echo $this->lang->line('save'); ?>"></div> </form>
                </div>
            </div>
        </div>
    </div>
</div>  
<div id="viewEventModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line("view_event"); ?></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form role="form" method="post" id="updateevent_form" enctype="multipart/form-data" action="">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_title') ?></label><span class="req"> *</span>
                            <input class="form-control" name="title" placeholder="<?php echo $this->lang->line('event_title') ?>" id="event_title"> 
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description') ?></label>
                            <textarea name="description" class="form-control" placeholder="<?php echo $this->lang->line('description') ?>" id="event_desc"></textarea></div>
                     
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_from'); ?><small class="req"> *</small></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" id="eventfrom" name="eventfrom" class="form-control pull-right event_from datetime">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_to'); ?><small class="req"> *</small></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" id="eventto" name="eventto" class="form-control pull-right event_to datetime">
                            </div>
                        </div>


                        <input type="hidden" name="eventid" id="eventid">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_color') ?></label>
                            <input type="hidden" name="eventcolor" autocomplete="off" placeholder="Event Color" id="event_color" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $colorid = trim($color, "#");
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div id=" . $colorid . " class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper selectevent">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event_type') ?> </label>
                            <label class="radio-inline">
                                <input type="radio" name="eventtype" value="public" id="public"><?php echo $this->lang->line('public') ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="eventtype" value="private" id="private"><?php echo $this->lang->line('private') ?> 
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="eventtype" value="sameforall" id="public"><?php echo $this->lang->line('all') ?> 
							</label>
                            <label class="radio-inline">
                                <input type="radio" name="eventtype" value="protected" id="public"><?php echo $this->lang->line('protected') ?> 
                            </label>
                        </div>
                        <div class="col-lg-12 modal-footer pb0">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary submit_update" value=""><i class="fa fa-print"></i> <?php echo $this->lang->line('save'); ?></button>
                                <?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) { ?>
                                    <input type="button" id="delete_event" class="btn btn-primary submit_delete " value="<?php echo $this->lang->line('delete'); ?>">
                                <?php } ?>
                            </div>   
                        </div>       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
<script src="<?php echo base_url() ?>backend/js/Chart.bundle.js"></script>
<script src="<?php echo base_url() ?>backend/js/utils.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $('#newEventModal,#viewEventModal').modal({
        backdrop: 'static',
        keyboard: false,
        show:false
        });
    });
</script>    
    
<script type="text/javascript">
    window.onload = function () {
        var dataPointss = [];
        var yearly_collection_array = <?php echo json_encode($yearly_collection) ?>;
        var yearly_expense_array = <?php echo json_encode($yearly_expense) ?>;
        var MONTHS = <?php echo json_encode($total_month) ?>;
        console.log(yearly_collection_array);
        console.log(yearly_expense_array);
		
        var config = {
            type: 'line',
            data: {
                labels: MONTHS,
                datasets: [

                    <?php if($this->module_lib->hasActive('income')){ ?>
                    {
                        label: '<?php echo $this->lang->line('income'); ?>',
                        fill: false,
                        backgroundColor: '#66aa18',
                        borderColor: '#66aa18',
                        data: yearly_collection_array,
                    },
                    <?php } ?>
                    <?php if($this->module_lib->hasActive('expense')){ ?>
                    {
                        label: '<?php echo $this->lang->line('expenses') ;?>',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: yearly_expense_array,
                        fill: false,
                    }
                <?php } ?>
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Chart Data'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: 'Value'
                            },

                        }]
                }
            }
        };
  <?php
            if ($this->rbac->hasPrivilege('yearly_income_expense_chart', 'can_view')) {
                ?>
        var ctx = document.getElementById('lineChart').getContext('2d');
        window.myLine = new Chart(ctx, config);
    <?php } ?>       

        /* Pie chart */
        var ph = "pharmacy";
        var dataPointss = [];
        var color = ['#f56954', '#0acf97', '#f39c12', '#2f4074', '#00c0ef', '#3c8dbc', '#d2d6de', '#b7b83f'];
        var datas = <?php echo json_encode($jsonarr) ?>;
		
        function addData(datap) {
            for (var i = 0; i < datap.value.length; i++) {
                lb = datap.label[i];

 
                dataPointss.push({
                    label: lb,
                    value: datap.value[i],
                    color: color[i],
                    highlight: color[i]
                });
            } 
        }
        addData(datas);
        /* donut chart */
        var config2 = {
            type: 'doughnut',
            data: {
                datasets: [{
                        data: datas.value,                         
                        backgroundColor: [
                            '#715d20',
                            window.chartColors.orange,
                            window.chartColors.yellow,
                            window.chartColors.green,
                            window.chartColors.purple,
                            window.chartColors.blue,
                            window.chartColors.grey,
                            '#42b782',
                            '#66aa18',
                        ],
                        label: 'Dataset 1'
                    }],
                labels: datas.label,
            },
            options: {
                responsive: true,
                circumference: Math.PI,
                rotation: -Math.PI,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Chart.js Doughnut Chart'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        }; 
 <?php
            if ($this->rbac->hasPrivilege('monthly_income_expense_chart', 'can_view')) {
                ?>
        var ctx2 = document.getElementById('pieChart').getContext('2d');
        window.myDoughnut = new Chart(ctx2, config2);
    <?php }?>
        
    }

    $(document).ready(function () {
        $(document).on('click', '.close_notice', function () {
            var data = $(this).data();
            $.ajax({
                type: "POST",
                url: base_url + "admin/notification/read",
                data: {'notice': data.noticeid},
                dataType: "json",
                success: function (data) {
                    if (data.status == "fail") {

                        errorMsg(data.msg);
                    } else {
                        successMsg(data.msg);
                    }

                }
            });
        });
    });
</script>