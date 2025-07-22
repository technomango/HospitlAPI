<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<header>
	  <div class="row gy-3">
		<div class="col-md-12 text-center">
		  <h2 class="text-4"><?php echo $this->lang->line("appointment"); ?></h4>
		</div>
		  <?php if (!empty($print_details[0]['print_header'])) { ?>
		<div class="col-md-3">
		  <img src="<?php
              if (!empty($print_details[0]['print_header'])) {
                 echo base_url() . $print_details[0]['print_header'] . img_time(); }?>" class="" style="height:100px;">
		</div>
		  <?php } ?>
		<div class="col-md-7">
		  <h4 class="text-4 mb-1"></h4>
		  <p class="lh-base mb-0"></p>
		</div>
		<div class="col-md-2">
			<strong><?php echo $this->lang->line("appointment_no"); ?>:</strong> <span id="appointmentno"><?php echo $result['appointment_no'] ?></span>
		</div>
	  </div>
  </header>
  <main>
	  <div class="content-body">                
		<div class="print-area">
			<div class="row gy-3">
				<div class="col-md-12">
               
                <div class="card">
                    <div class="card-body">
						  <div class="row gy-3">
							<div class="col-sm-4">
								<p class="mb-1"><strong><?php echo $this->lang->line("appointment_date"); ?>:</strong><?php echo $result["date"]; ?></p>
								<p class="mb-1"><strong><?php echo $this->lang->line('shift'); ?>:</strong> <span id='patient_name_view'><?php echo $result['global_shift_name'] ?></span></p>
								<p class="mb-1"><strong><?php echo $this->lang->line('slot'); ?>:</strong> <span id="appointmentno"><?php echo $result['doctor_shift_name'] ?></span></p>
								<p><strong><?php echo $this->lang->line('status'); ?>:</strong> <?php echo $this->lang->line($result['appointment_status']); ?></p>
							</div>
							<div class="col-sm-4"> <strong><?php echo $this->lang->line("patient_details"); ?>:</strong>
							  <p class="mb-1"><?php echo $this->lang->line("patient_name"); ?>: <span id='patient_name_view'><?php echo $result['patients_name'] ?></span></p>
							  <p class="mb-1"><?php echo $this->lang->line("email"); ?>: <span id='emails_view'><?php echo $result['patient_email'] ?></span></p>
							  <p class="mb-1"><?php echo $this->lang->line("phone"); ?>: <span id="phones_view"><?php echo $result['patient_mobileno'] ?></span></p>
							  <p class="mb-1"><?php echo $this->lang->line("age"); ?>: <?php echo $this->customlib->getPatientAge($result['age'], $result['month'], $result['day']); ?></p>
							  <p class="mb-1"><?php echo $this->lang->line("gender"); ?>: <span id="genders"><?php echo $this->lang->line(strtolower($result['patients_gender'])) ?></span></p>
							</div>
							<div class="col-sm-4"> <strong><?php echo $this->lang->line("doctor"); ?>:</strong>
							  <p class="mb-1"><?php echo $this->lang->line("name"); ?>: <?php echo composeStaffNameByString($result['name'], $result['surname'], $result['employee_id']); ?></p>
							  <p class="mb-1"><?php echo $this->lang->line("speciality"); ?>: <?php echo composeStaffNameByString($result['name'], $result['surname'], $result['employee_id']); ?></p>
							</div>
						  </div>
						<div class="col-lg-12">
                                <div class="divider"></div>
			<h4 class="text-4 mb-1"><?php echo $this->lang->line("payment_details"); ?></h4>
		<table class="print-table">
			<thead>
			  <tr class="bg-light">
				<td class="col-2"><strong><?php echo $this->lang->line("date"); ?></strong></td>
				<td class="col-2 text-center"><strong><?php echo $this->lang->line("payment_mode"); ?></strong></td>
				<td class="col-3 text-center"><strong><?php echo $this->lang->line("payment_note"); ?></strong></td>
				<td class="col-2 text-end"><strong><?php echo $this->lang->line("amount"); ?></strong></td>
			  </tr>
			</thead>
			<tbody>
				<tr>
				  <td class="col-2">
					<?php echo $result["date"]; ?>
				  </td>
				  <td class="col-2 text-center"><?php if ($result['payment_mode']) {
                                                echo $this->lang->line(strtolower($result['payment_mode']));
                                            } ?></td>
				  <td class="col-3 text-center"><?php echo $result['payment_note']; ?></td>
				  
				  <td class="col-2 text-end"><?php if ($result['standard_amount'] != "") {
                                                                            echo  $currency_symbol . $result['standard_amount'];
                                                                        } else {
                                                                            echo $currency_symbol . '0.00';
                                                                        } ?></td>
				</tr>
			</tbody>
		</table>
		</div>
			<div class="col-lg-12">
                                <div class="divider"></div>		
			<table class="print-table">
				<tr class="bg-light">
				  <td class="text-end"><strong><?php echo $this->lang->line('net_amount'); ?>:</strong></td>
				  <td class="col-sm-2 text-end"><?php if ($result['standard_amount'] != "") {
                                                        echo  $currency_symbol . $result['standard_amount'];
                                                    } else {
                                                        echo $currency_symbol . '0.00';
                                                    }
                                                    ?></td>
				</tr>
				<tr class="bg-light">
				  <td class="text-end"><strong><?php echo $this->lang->line('discount_percentage')." (".$result["discount_percentage"]." %)";?>:</strong></td>
				  <td class="col-sm-2 text-end"><?php echo  $currency_symbol.calculatePercent($result["standard_amount"], $result["discount_percentage"]); ?></td>
				</tr>
				<tr class="bg-light">
				  <td class="text-end"><strong><?php echo $this->lang->line('paid_amount');?>:</strong></td>
				  <td class="col-sm-2 text-end"><?php echo $currency_symbol.$result["paid_amount"]; ?></td>
				</tr>
			</table>
		</div>
		<footer class="mt-5">
  				<div class="text-end mb-4">
		  
				  <div class="lh-1 text-black-50">¡Gracias!</div>
				  <div class="lh-1 text-black-50 text-0"><small>Por confiar en nosotros</small></div>
				</div>
  
				  <p class="text-0 mb-0"><strong>Returns Policy:</strong> At Koice we try to deliver perfectly each and every time. But in the off-chance that you need to return the item, please do so with the original Brand box/price 
				tag, original packing and invoice without which it will be really difficult for us to act on your request. Please help us in helping you. Terms and conditions apply.</p>
				<hr class="my-2">
				  <div class="text-center">
					<div class="btn-group btn-group-sm d-print-none"> </div>
				  </div>
  </footer>
						</div>
					</div>
					</div>
				</div>
			</div>
		  </div>
	   <?php
                    if (!empty($print_details[0]['print_footer'])) {
                        ?>
       <div class="footer-space">&nbsp;</div>
  <?php
}
?>
  </main>

   
  <?php
                    if (!empty($print_details[0]['print_footer'])) {
                        ?>
  <div class="footer-fixed">
  
  <?php   echo $print_details[0]['print_footer'];?>
                
  </div>
  <?php
}
?>    