<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<div class="content-wrapper">
	<section class="content-header">
        <h1><i class="fa-duotone fa-solid fa-users icono-menu-izquierda"></i>
             <?php echo $this->lang->line('human_resource'); ?></h1>  
            <span class="mlr-10">
                <a href="<?php echo site_url('admin/payroll') ?>"> 
                    <i class="fa-light fa-money-check-dollar"></i>
                </a> 
            </span> 
            <span class="bread-span"> <?php echo $this->lang->line('staff_generate_payroll'); ?> </span>
            <span style="right: 40px; position: absolute;">
                       <a href="<?php echo base_url() ?>admin/payroll" type="button" class="btn btn-primary btn-xs">
                                        <i class="fa fa-arrow-left"></i></a>  
                                   
            </span>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary around20">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="box-title"><?php echo $this->lang->line('generate_payroll_for'); ?> : <?php echo $this->lang->line(strtolower($month)); ?></h3>
                            </div>  
                            
                        </div>  
                    </div><!--./box-header-->    
                    <div class="box-body pt-0">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="">  
                                    <div class="col-lg-2 col-md-3 col-sm-12">
                                        <div class="row">
                                            <?php
                                            $image = $result['image'];
                                            if (!empty($image)) {
                                                $file = $result['image'];
                                            } else {
                                                $file = "no_image.png";
                                            }
                                            ?>
                                            <img width="80" height="80" class="profile-user-img-payroll img-responsive" src="<?php echo base_url("uploads/staff_images/" . $file.img_time()); ?>" alt="No Image">
                                        </div>
                                    </div> 
                                    <div class="col-lg-10 col-md-9 col-sm-12">
                                        <div class="row">
                                            <table class="table mb0 font13">
                                                <tbody>
                                                    <tr>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line("staff_name"); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["name"] . " " . $result["surname"] ?></td>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line('staff_id'); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["employee_id"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line('staff_phone'); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["contact_no"] ?></td>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line('staff_email'); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["email"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line('staff_epf_no'); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["epf_no"] ?></td>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line('staff_role'); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["user_type"] ?></td>                                  
                                                    </tr>
                                                    <tr>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line('staff_department'); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["department"] ?></td>
                                                        <th class="bozero pth-payroll"><?php echo $this->lang->line('staff_designation'); ?></th>
                                                        <td class="bozero pth-payroll"><?php echo $result["designation"] ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div></div><!--./col-md-8-->
                            <div class="col-md-4 col-sm-12">
                                <div class="relative overvisible"> 
                                    <div class="letest">
                                        <div class="rotatetest"><?php echo $this->lang->line("attendance") ?></div>
                                    </div> 
                                    <div class="padd-en-rtl33"> 
                                        <table class="table mb0 font13">
                                            <tr>
                                                <th class="bozero pth-payroll"><?php echo $this->lang->line('month'); ?></th>
                                                <?php  
                                                foreach ($attendanceType as $key => $value) {
                                                    $lang = strtolower($value["type"]);
                                                    ?>
                                                    <th class="bozero pth-payroll"><span data-toggle="tooltip" title="<?php echo $this->lang->line($lang); ?>"><?php echo strip_tags($value["key_value"]); ?></span></th>  
                                                <?php }
                                                ?>
                                                <th class="bozero pth-payroll"><span data-toggle="tooltip" title="<?php echo $this->lang->line('approved_leave'); ?>">V</span></th>
                                            </tr>
                                            <?php
                                            foreach ($monthAttendance as $attendence_key => $attendence_value) {
                                                ?><tr>
                                                    <td class="bozero pth-payroll"><?php echo $this->lang->line(strtolower(date("F", strtotime($attendence_key)))); ?></td>
                                                    <td class="bozero pth-payroll"><?php echo $attendence_value['present'] ?></td>
                                                    <td class="bozero pth-payroll"><?php echo $attendence_value['late']; ?></td> 
                                                    <td class="bozero pth-payroll"><?php echo $attendence_value['absent']; ?></td> 
                                                    <td class="bozero pth-payroll"><?php echo $attendence_value['half_day']; ?></td> 
                                                    <td class="bozero pth-payroll"><?php echo $attendence_value['holiday']; ?></td>
                                                    <td class="bozero pth-payroll"><?php echo $monthLeaves[date("m", strtotime($attendence_key))]; ?></td>                                   
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <tr>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div><!--./col-md-8-->   
                            <div class="col-md-12">
                                <div class=""></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <form class="form-horizontal" action="<?php echo site_url('admin/payroll/payslip') ?>" method="post"  id="employeeform">
                        <input type="hidden" name="role" value="<?php echo $result["user_type"] ?>">
                        <div class="box-header">
                            <div class="row display-flex">
                                <div class="col-md-3 col-sm-3">
                                    <h3 class="box-title"><?php echo $this->lang->line('xtra'); ?></h3>
                                    <button type="button" onclick="add_more()" class="plusign"><i class="fa-regular fa-plus"></i></button>
                                    <div class="sameheight overflow-x-auto">
                                        <div class="feebox">
                                            <table class="table3" id="tableID">
                                                <tr id="row0">
                                                    <td>
														<input type="text" class="form-control" id="allowance_type" name="allowance_type[]" placeholder="<?php echo $this->lang->line('type'); ?>"></td>
                                                    <td>
														<div class="input-group">
															<span class="input-group-addon curr-payr-e"> <?php echo $currency_symbol ?></span>
														<input type="text" id="allowance_amount" name="allowance_amount[]" class="form-control" value="0">
														</div> 	
													</td>
<td><button type="button" onclick="delete_row(0)" class="closebtn" autocomplete="off"><i class="fa-regular fa-remove"></i></button></td>
                                                </tr>
                                            </table>
                                        </div>  
                                    </div>
                                </div><!--./col-md-4-->
                                <div class="col-md-3 col-sm-3">
                                    <h3 class="box-title"><?php echo $this->lang->line('deduction'); ?></h3>
                                    <button type="button" onclick="add_more_deduction()" class="plusign"><i class="fa-regular fa-plus"></i></button>
                                    <div class="sameheight overflow-x-auto">
                                        <div class="feebox">
                                            <table class="table3" id="tableID2">
                                                <tr id="deduction_row0">
                                                    <td><input type="text" id="deduction_type" name="deduction_type[]" class="form-control" placeholder="<?php echo $this->lang->line('type'); ?>"></td>
                                                    <td>
														<div class="input-group">
															<span class="input-group-addon curr-payr-e"> <?php echo $currency_symbol ?></span>
														<input type="text" id="deduction_amount" name="deduction_amount[]" class="form-control" value="0">
														</div> 	
													</td>
<td><button type="button" onclick="delete_deduction_row(0)" class="closebtn" autocomplete="off"><i class="fa-regular fa-remove"></i></button></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>  
                                </div><!--./col-md-4--> 
                                <div class="col-md-4 col-sm-4">
                                    <h3 class="box-title"><?php echo $this->lang->line('payroll_summary'); ?></h3>
                                    <button type="button" onclick="add_allowance()" class="btn btn-primary btn-xs plusign"><i class="fa-regular fa-calculator"></i> <?php echo $this->lang->line('calculate'); ?></button>
                                    <div class="sameheight">
                                        <div class="payrollbox feebox">
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label"><?php echo $this->lang->line('basic_salary'); ?></label>
                                                <div class="col-sm-7">
													<div class="input-group">
															<span class="input-group-addon curr-payr"> <?php echo $currency_symbol ?></span>
                                                    <input class="form-control" name="basic" value="<?php
                                                    if (!empty($result["basic_salary"])) {
                                                        echo $result["basic_salary"];
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>" id="basic"  type="text" />
                                                </div>
													</div>
                                                 <span class="text-danger" id="err"><?php echo form_error('basic'); ?></span>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label"><?php echo $this->lang->line('xtra'); ?></label>
                                                <div class="col-sm-7">
													<div class="input-group">
															<span class="input-group-addon curr-payr"> <?php echo $currency_symbol ?></span>
                                                    <input class="form-control" name="total_allowance" id="total_allowance"  type="text" />
                                                </div>
													</div>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label"><?php echo $this->lang->line('deduction'); ?></label>
                                                <div class="col-sm-7 deductiondred">
													<div class="input-group">
															<span class="input-group-addon curr-payr"> <?php echo $currency_symbol ?></span>
                                                    <input class="form-control" name="total_deduction" id="total_deduction" type="text" style="color:#f50000" />
                                                </div>
													</div>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label"><?php echo $this->lang->line('gross_salary'); ?></label>
                                                <div class="col-sm-7">
													<div class="input-group">
															<span class="input-group-addon curr-payr"> <?php echo $currency_symbol ?></span>
                                                    <input class="form-control" name="gross_salary" id="gross_salary" value="0" type="text" />
                                                </div>
													</div>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label"><?php echo $this->lang->line('tax'); ?></label>
                                                <div class="col-sm-7 deductiondred">
													<div class="input-group">
															<span class="input-group-addon curr-payr"> %</span>
                                                    <input class="form-control" name="tax_percent" id="tax_percent" value="0" type="text" />
                                                </div>
													</div>
                                            </div><!--./form-group-->
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label"><?php echo $this->lang->line('tax'); ?></label>
                                                <div class="col-sm-7 deductiondred">
													<div class="input-group">
															<span class="input-group-addon curr-payr"> <?php echo $currency_symbol ?></span>
                                                    <input class="form-control" name="tax" id="tax" value="0" type="text" />
                                                </div>
													</div>
                                            </div><!--./form-group-->
                                            <hr/>
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label"><?php echo $this->lang->line('net_salary'); ?></label>
                                                <div class="col-sm-7 net_green">
													<div class="input-group">
															<span class="input-group-addon curr-payr"> <?php echo $currency_symbol ?></span>
                                                    <input class="form-control greentest"  name="net_salary" id="net_salary" type="text" />
                                                    <span class="text-danger" id="err"><?php echo form_error('net_salary'); ?></span>
                                                    <input class="form-control" name="staff_id" value="<?php echo $result["id"]; ?>" type="hidden" />
                                                    <input class="form-control" name="month" value="<?php echo $month; ?>" type="hidden" />
                                                    <input class="form-control" name="year" value="<?php echo $year; ?>"  type="hidden" />
                                                    <input class="form-control" name="status" value="generated"  type="hidden" />
                                                </div>
													</div>
                                            </div><!--./form-group-->
                                        </div>
                                    </div> 
                                </div><!--./col-md-4--> 
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" id="contact_submit" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?></button>
                                </div><!--./col-md-12--> 
                                </form>
                            </div><!--./row-->  
                        </div><!--./box-header-->  
                </div>
            </div>
            <!--/.col (left) -->
        </div>
    </section>
</div>

<script type="text/javascript">
    function add_allowance() {
        var basic_pay = $("#basic").val();
        var allowance_type = document.getElementsByName('allowance_type[]');
        var allowance_amount = document.getElementsByName('allowance_amount[]');
        var total_allowance = 0;
        var deduction_type = document.getElementsByName('deduction_type[]');
        var deduction_amount = document.getElementsByName('deduction_amount[]');
        var total_deduction = 0;
        for (var i = 0; i < allowance_amount.length; i++) {
            var inp = allowance_amount[i];
            if (inp.value == '') {
                var inpvalue = 0;
            } else {
                var inpvalue = inp.value;
            }

            total_allowance += parseFloat(inpvalue);
        }

        for (var j = 0; j < deduction_amount.length; j++) {
            var inpd = deduction_amount[j];
            if (inpd.value == '') {
                var inpdvalue = 0;
            } else {
                var inpdvalue = inpd.value;
            }
            total_deduction += parseFloat(inpdvalue);
        }
        var tax_percent = $("#tax_percent").val();

        var gross_salary = parseFloat(basic_pay) + parseFloat(total_allowance) - parseFloat(total_deduction);

        if (tax_percent != '0') {
            var tax = (gross_salary * tax_percent) / 100;
            $("#tax").val(tax.toFixed(2));
        } else {
            var tax = $("#tax").val();
        }

        var net_salary = parseFloat(basic_pay) + parseFloat(total_allowance) - parseFloat(total_deduction) - parseFloat(tax);
        $("#total_allowance").val(total_allowance.toFixed(2));
        $("#total_deduction").val(total_deduction.toFixed(2));
        $("#total_allow").html(total_allowance.toFixed(2));
        $("#total_deduc").html(total_deduction.toFixed(2));
        $("#gross_salary").val(gross_salary.toFixed(2));
        $("#net_salary").val(net_salary.toFixed(2));
    }

    function add_more() {
        var table = document.getElementById("tableID");
        var table_len = (table.rows.length);
        var id = parseInt(table_len);
        var row = table.insertRow(table_len).outerHTML = "<tr id='row" + id + "'><td><input type='text' class='form-control' id='allowance_type' name='allowance_type[]' placeholder='<?php echo $this->lang->line("type"); ?>'></td><td><div class='input-group'><span class='input-group-addon curr-payr-e'> <?php echo $currency_symbol ?></span><input type='text' class='form-control' id='allowance_amount' name='allowance_amount[]'  value='0'></div></td><td><button type='button' onclick='delete_row(" + id + ")' class='closebtn'><i class='fa-regular fa-remove'></i></button></td></tr>";
    }

    function delete_row(id) {
        var table = document.getElementById("tableID");
        var rowCount = table.rows.length;
        $("#row" + id).remove("");
    }

    function add_more_deduction() {
        var table = document.getElementById("tableID2");
        var table_len = (table.rows.length);
        var id = parseInt(table_len);
        var row = table.insertRow(table_len).outerHTML = "<tr id='deduction_row" + id + "'><td><input type='text' class='form-control' id='deduction_type' name='deduction_type[]' placeholder='<?php echo $this->lang->line("type"); ?>'></td><td><div class='input-group'><span class='input-group-addon curr-payr-e'> <?php echo $currency_symbol ?></span><input type='text' id='deduction_amount' name='deduction_amount[]' class='form-control' value='0'></div></td><td><button type='button' onclick='delete_deduction_row(" + id + ")' class='closebtn'><i class='fa-regular fa-remove'></i></button></td></tr>";
    } 

    function delete_deduction_row(id) {
        var table = document.getElementById("tableID2");
        var rowCount = table.rows.length;
        $("#deduction_row" + id).html("");
    }
</script>