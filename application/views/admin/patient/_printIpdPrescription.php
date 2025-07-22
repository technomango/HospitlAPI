<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
    <div class="fixed-print-header"> 
		<div class="row" style="padding-top: 35px;">
					<div class="col-md-6">
                			<?php  if (!empty($print_details['print_header'])) { ?>
                    			<span class="logo-receta"><img src="<?php echo base_url(); ?>uploads/hospital_content/logo/1.png?1732077421" alt="Mango Hospital" style="height: 60px;"></span>
                			<?php }?>
							<div class="text-left rtl-text-left"><span class=""><b><?php echo $this->lang->line('address'); ?>:</b></span> <br>
							<span class=""><?php echo $this->customlib->getHospitalAddress(); ?></span>
                            </div>
							<div class="">
                            <span class=""><b><?php echo $this->lang->line('prescription'); ?>:</b></span> 
								<span class=""><?php echo $this->customlib->getSessionPrefixByType('ipd_prescription').$result->prescription_id; ?></span>
                        	</div>
							<?php
                    $date = $result->presdate;
                    ?>
							<div class="">
								<span class=""><b><?php echo $this->lang->line('date'); ?> :</b></span> 
								
								<span class=""><?php
                                if (!empty($result->presdate)) {
                                    echo $this->customlib->YYYYMMDDTodateFormat($date);
                                }
                                ?></span>
                           
                        </div>
					</div>
					<div class="col-md-6">
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("patient_name"); ?>:</span> <?php echo $result->patient_name; ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("gender"); ?>:</span> <?php echo $this->lang->line(strtolower($result->gender)) ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("phone"); ?>:</span> <?php echo $result->mobileno; ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted">Email:</span> <?php echo $result->email; ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("age"); ?>:</span> <?php
                                echo $this->customlib->getPatientAge($result->age,$result->month,$result->day);
                                ?></div>
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("blood_group"); ?>:</span> <?php echo $result->blood_group_name; ?></div>
						
					</div>
			</div>
			
    </div> 
    <table class="table-print-full" width="100%" style="margin-bottom: 5px; padding-top: 35px;">
    <thead>
        <tr>
            <td><div class="header-space">&nbsp;</div></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
      <div class="content-body">
<div class="print-area p-1">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                
                <div>
                    <table class="noborder_table mb-0">
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
                    <?php if($result->is_finding_print=='yes'){ $colspan = 6 ; $width = '50%'; }else{ $colspan = 12; $width = '100%';
                    
                    } ?>
                    <table width="100%" class="mb-10">
                        <tr>
						<?php if($result->symptoms !=''){ ?>
                            <td colspan="<?php echo $colspan; ?>" width="<?php echo $width; ?>"><?php echo $this->lang->line("symptoms"); ?>:<br><?php echo nl2br($result->symptoms)  ?></td>
						<?php } ?>
						
                        <?php if($result->is_finding_print=='yes' && trim($result->finding_description) != ''){ ?> <td>                      
                            <?php echo $this->lang->line("finding"); ?>:<br>
                            <?php echo nl2br($result->finding_description)  ?></td>
                        <?php }  ?>
                        </tr>
                    </table>       
                    <?php if($result->symptoms != '' || trim($result->finding_description) != ''){
                          if($result->is_finding_print == 'yes'){ ?>
					<?php } } ?>
                    <table width="100%" class="mt-10 mb-10">
                        <tr><td><?php echo $result->header_note ?></td></tr>
                    </table>

                    <?php if($result->medicines){ ?>
                    <h4 class="heading-title"><?php echo $this->lang->line("medicaments"); ?></h4>
                    <table>                        
                            <tr>
                                <th width="2%" class="text text-left th-meds-receta">#</th>
                                <th width="11%" class="text text-center th-meds-receta"><?php echo $this->lang->line("medicine"); ?></th> 
                                <th width="13%" class="text text-center th-meds-receta"><?php echo $this->lang->line("dosage"); ?></th>
                                <th width="13%" class="text text-center th-meds-receta"><?php echo $this->lang->line("interval"); ?></th>
                                <th width="13%" class="text text-center th-meds-receta"><?php echo $this->lang->line("duration"); ?></th> 
                                <th width="35%" class="text text-center th-meds-receta"><?php echo $this->lang->line("instructions"); ?></th> 
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
                            if($test_value->radio_test_name != ""){
                                $r=1;
                            }
                        }

                        ?>    
                    <table width="100%" class="mt-10">
                        <tr>
                           <?php 
                            if($p==1){  ?>
                                <th><h4 class="heading-title"><?php echo $this->lang->line("pathology_test");  ?></h4></th>
                                <?php  }   ?>
                            <?php  if($r==1){  ?>
                                <th><h4 class="heading-title"><?php echo $this->lang->line("radiology_test"); ?></h4></th>
                                <?php   }  ?>
                        </tr>
                        <tr> 
                            <td width="50%"><?php $sl=''; foreach ($result->tests as $test_key => $test_value) {  ?>
                                <table >   
                                    <?php if($test_value->test_name != ""){ $sl++;?> <tr>
                                    <td><?php echo $sl.'. '.$test_value->test_name." (".$test_value->short_name.")"; ?></td>   </tr>        
                                    <?php } ?>                             
                                </table>    
                                <?php } ?>
                            </td> 
                            <td><?php $slradiology=''; foreach ($result->tests as $test_key => $test_value) {  ?>
                                <table>   
                                    <?php if($test_value->test_name == ""){ $slradiology++;?> <tr>
                                    <td><?php echo $slradiology.'. '.$test_value->radio_test_name." (".$test_value->radio_short_name.")"; ?></td> </tr>                                 
                                    <?php } ?>                             
                                </table>   
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                    <?php } ?>       
					
					<div class="divider mt-10 mb-10" style="margin-bottom: 5px; margin-top: 45px;"></div>
					
					<div class="row">
					
					<div class="col-md-6">
						<div class="receta-det"><span class="text-muted"><?php echo $this->lang->line("prescribe_by"); ?>:</span> <?php echo composeStaffNameByString($result->priscribe_by_name,$result->priscribe_by_surname,$result->priscribe_by_employee_id); ?></div>
					</div>
					<div class="col-md-6">
						<div class="text-right rtl-text-left receta-det"><span class="text-muted"><?php echo $this->lang->line("generated_by"); ?>:</span> <?php echo composeStaffNameByString($result->staff_name,$result->staff_surname,$result->staff_employee_id); ?></div>
					</div>
				</div>
					
					
                    <table width="100%">
                        <tr>
                            <td><?php echo $result->footer_note; ?></td>
                        </tr>
                    </table>
                  
                </div>
            </div>
        </div>
        </div>
    <tfoot><tr><td>

<?php
                if (!empty($print_details[0]['print_footer'])) {
                    ?>
   <div class="footer-space">&nbsp;</div>
<?php
}
?>



</td></tr></tfoot>
</table>
<?php
                if (!empty($print_details[0]['print_footer'])) {
                    ?>
<div class="footer-fixed">

<?php   echo $print_details[0]['print_footer'];?>
            
</div>
<?php
}
?>    