<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
$logo = $this->customlib->getLogoImage();
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
<!-- <div class="print-area"> -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $this->lang->line('prescription'); ?></title>
    </head>
    <div id="html-2-pdfwrapper">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12" style="padding: 15px;">
				
				<div class="row">
					<div class="col-md-6">
						<div class="pprinta4">
                			<?php  if (!empty($print_details['print_header'])) { ?>
                    			<span class="logo-receta"><img src="<?php echo base_url(); ?>uploads/hospital_content/logo/1.png?1732077421" alt="Mango Hospital"></span>
                			<?php }?>
							<div class="text-left rtl-text-left"><span class=""><b><?php echo $this->lang->line('address'); ?>:</b></span> <br>
							<span class=""><?php echo $this->customlib->getHospitalAddress(); ?></span>
                            </div>
                    
                </div> 
					</div>
					<div class="col-md-6">
						<?php
                    $date = $result->presdate;
                    ?>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line('prescription'); ?>:</span> <?php echo $this->customlib->getSessionPrefixByType('ipd_prescription').$result->prescription_id; ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line('date'); ?>:</span> <?php
                                if (!empty($result->presdate)) {
                                    echo $this->customlib->YYYYMMDDTodateFormat($date);
                                }
                                ?>
                            </div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("patient_name"); ?>:</span> <?php echo $result->patient_name; ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("phone"); ?>:</span> <?php echo $result->mobileno; ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted">Email:</span> <?php echo $result->email; ?></div>
						
						
					</div>
					<div class="col-md-12">
						<br>
					</div>
					
				</div>
			
                <div>
                    <table width="100%" class="printablea4">                      

                                              
                        <?php                                                              
                                                            if (!empty($fields_prescription)) {
                                                                $display_field = '';
                                                                foreach ($fields_prescription as $fields_key => $fields_value) {
                                                                
                                                                ?>
                                                                    <tr>
                                                                        <th><?php echo $fields_value->name; ?></th>
                                                                        <td colspan="3"><?php echo $result->{"$fields_value->name"};?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                            }                                                       
                        
                        ?>                        
                    </table>
                    <hr> 
                    <?php if($result->is_finding_print=='yes'){ $colspan = 6 ; $width = '50%'; }else{ $colspan = 12; $width = '100%';                    
                    } ?>
 <?php
                    if($result->symptoms !='' && trim($result->finding_description) != ''){
                        
$width = '50%';
                    }else{
                        
$width = '100%';
                    }

                    ?>
                    <table width="100%" class="printablea4a">
                        <tr>
                            <?php if($result->symptoms !=''){ ?>
                                <td width="<?php echo $width; ?>">
                                    <b><?php echo $this->lang->line("symptoms"); ?></b>:<br><?php echo nl2br($result->symptoms)  ?>
                                </td>
                            <?php } ?>

                            <?php if(trim($result->finding_description) != ''){ ?>
                           
                           <td width="<?php echo $width; ?>">                   
                                <b><?php echo $this->lang->line("finding"); ?></b>:<br>
                                <?php echo nl2br($result->finding_description); ?>
                            </td>
                            <?php 
                        }
                         ?>
                        </tr>
                    </table>  
                    
                    <?php if(trim($result->finding_description) !='' || $result->symptoms !=''){ ?>
                        <div class="divider mt-10 mb-10" style="margin-bottom: 5px; margin-top: 25px;"></div>
                    <?php } ?>

                    <table width="100%" class="printablea4">
                        <tr>
                            <td style="margin-bottom: 0;"><?php echo $result->header_note ?></td>
                        </tr>
                    </table>

                    <?php if(!empty($result->medicines)){ ?>
               
                    <h4><?php echo $this->lang->line("medicaments"); ?></h4>

                    <table class="table table-striped table-hover">                        
                            <tr>
                                <th width="2%" class="text text-left th-meds-receta">#</th>
                                <th width="11%" class="text text-center th-meds-receta"><?php echo $this->lang->line("medicine"); ?></th> 
                                <th width="13%" class="text text-center th-meds-receta"><?php echo $this->lang->line("dosage"); ?></th>
                                <th width="13%" class="text text-center th-meds-receta"><?php echo $this->lang->line("interval"); ?></th>
                                <th width="13%" class="text text-center th-meds-receta"><?php echo $this->lang->line("duration"); ?></th> 
                                <th width="20%" class="text text-center th-meds-receta"><?php echo $this->lang->line("instructions"); ?></th> 
                            </tr>

                        <?php $medsl =''; foreach ($result->medicines as $pkey => $pvalue) { $medsl++;
                              ?>
                            <tr>
                                <td class="text text-left td-meds-receta"><?php echo $medsl; ?></td>
                                <td class="text text-center td-meds-receta"><?php echo $pvalue->medicine_name; ?></td>
                                <td class="text text-center td-meds-receta"><?php echo $pvalue->dosage." ".$pvalue->unit; ?></td>
                                <td class="text text-center td-meds-receta"><?php echo $pvalue->dose_interval_name; ?></td>
                                <td class="text text-center td-meds-receta"><?php echo $pvalue->dose_duration_name; ?></td>
                                <td class="text text-center td-meds-receta"><?php echo $pvalue->instruction; ?></td>
                            </tr>  
                        <?php } ?>
                    </table>
                <?php } ?>
                    
                    <?php if(!empty($result->tests)){ 
                        $r=$p=0;
                        foreach ($result->tests as $test_key => $test_value) {
                            if($test_value->test_name != ""){
                                $p=1;
                            }
                        }
                        foreach ($result->tests as $test_key => $test_value) {
                            if($test_value->test_name == ""){
                                $r=1;
                            }
                        }
                    ?>    
                    <table class="table table-striped" width="100%">
                        <tr>
                            <?php 
                            if($p==1){
                                ?>
                                <th><h4><?php echo $this->lang->line("pathology_test");  ?></h4></th>
                                <?php
                            }
                            ?>
                            <?php 
                            if($r==1){
                                ?>
                                <th><h4><?php echo $this->lang->line("radiology_test"); ?></h4></th>
                                <?php
                            }
                            ?>
                           
                        </tr>
                        <tr>
                            <?php 
                            if($p==1){
                                ?>
                            <td ><?php $sl=''; foreach ($result->tests as $test_key => $test_value) {  ?>
                                <table >   
                                    <?php if($test_value->test_name != ""){ $sl++;?> <tr>
                                    <td><?php echo $sl.'. '.$test_value->test_name." (".$test_value->short_name.")"; ?></td>   </tr>        
                                    <?php } ?>                             
                                </table>    
                                <?php } ?>
                            </td>
                             <?php }
                            if($r==1){
                                ?>
                            <td><?php $slradiology=''; foreach ($result->tests as $test_key => $test_value) {  ?>
                                <table>   
                                    <?php if($test_value->test_name == ""){ $slradiology++; ?> <tr>
                                    <td><?php echo $slradiology.'. '.$test_value->radio_test_name." (".$test_value->radio_short_name.")"; ?></td> </tr>                                 
                                    <?php } ?>                             
                                </table>   
                                <?php } ?>
                            </td>
                        <?php } ?>
                        </tr>
                    </table>
                    <?php } ?>     
					<div class="divider mt-10 mb-10" style="margin-bottom: 5px; margin-top: 25px;"></div>
					
					<div class="row">
					
					<div class="col-md-6">
						<div class="receta-det"><span class="text-muted"><?php echo $this->lang->line("prescribe_by"); ?>:</span> <?php echo composeStaffNameByString($result->priscribe_by_name,$result->priscribe_by_surname,$result->priscribe_by_employee_id); ?></div>
					</div>
					<div class="col-md-6">
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("generated_by"); ?>:</span> <?php echo composeStaffNameByString($result->staff_name,$result->staff_surname,$result->staff_employee_id); ?></div>
					</div>
					<div class="col-md-12">
						<?php if($result->attachment!=""){ ?>
						<div class="text-left rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line('document'); ?>:</span> <a href="<?php echo site_url('admin/prescription/downloadprescription/'.$result->prescription_id);  ?>" class='btn btn-default btn-xs'  title="<?php echo $this->lang->line('download') ?>"><i class='fa-regular fa-download'></i></a></div>
						<?php } ?> 
					</div>
				</div>
					
					<div class="divider mt-10 mb-10" style="margin-bottom: 5px; margin-top: 25px;"></div>
                    
                    <table width="100%" class="printablea4">
                        <tr>
                            <td><?php echo $result->footer_note; ?></td>
                        </tr>
                    </table>

                    
                        <div class="footer-fixed printfooter">                
                            <?php
                                if (!empty($print_details['print_footer'])) {
                                    echo $print_details['print_footer'];
                                }
                                ?>
                        </div>        
                </div>
            </div>
            <!--/.col (left) -->
        </div>
    </div>
</html>