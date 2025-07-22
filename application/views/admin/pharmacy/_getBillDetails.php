
<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<div id="html-2-pdfwrapper" class="p-1">
    <div class="row">
        <!-- left column -->
		<div class="col-md-9" style="padding: 20px;">	
			<div class="fixed-print-header">
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
			<div class="logo-receta">
                <img src="<?php echo $logo_image.img_time(); ?>" alt="<?php echo $this->customlib->getAppName() ?>" />
            </div>
				<div class="text-left rtl-text-left"><span class=""><b><?php echo $this->lang->line('address'); ?>:</b></span> <br>
							<span class=""><?php echo $this->customlib->getHospitalAddress(); ?></span>
                            </div>
			</div>  
		</div>
		<div class="col-md-3" style="padding: 20px;">
			<div class="text-left rtl-text-left receta-far"><span class="">
                    <b><?php echo $this->lang->line('bill_no') ?>:</b></span> # <?php echo $this->customlib->getSessionPrefixByType('pharmacy_billing') . $result["id"] ?>
            </div>
            <div class="text-left rtl-text-left receta-far"><span class="">
                     <b><?php echo $this->lang->line('date') . " : "; ?></b></span><?php echo date($this->customlib->getHospitalDateFormat(true, true), strtotime($result['date'])) ?>
            </div>
			<div class="text-left rtl-text-left receta-far"><span class=""><b><?php echo $this->lang->line('name'); ?>:</b></span> <?php echo $result["patient_name"] . " (" . $result["patient_unique_id"] . ")"; ?></div>
			<div class="text-left rtl-text-left receta-far"><span class=""><b><?php echo $this->lang->line('address'); ?>:</b></span> <?php echo $result["address"]; ?></div>
			<div class="text-left rtl-text-left receta-far"><span class=""><b><?php echo $this->lang->line('phone'); ?>:</b></span> <?php echo $result["mobileno"]; ?></div>
		</div>
		</div>
	</div>
		
<table class="table-print-full" width="100%">
    <thead>
        <tr>
            <td><div class="header-space">&nbsp;</div></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
      <div class="content-body">
<div id="html-2-pdfwrapper" class="p-1">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="">
				<h4 class="modal-title">Detalles:</h4>
               
                <div class="divider-2 mb-10 mt-10"></div>
                <table id="testreport" width="100%">
                    <tr>
                        <th class="th-factura-detalles" width="20%"><?php echo $this->lang->line('medicine_name'); ?></th>
                        <th class="th-factura-detalles" width="10%"><?php echo $this->lang->line('unit'); ?></th>
                        <th class="th-factura-detalles" width="15%"><?php echo $this->lang->line('expire'); ?></th>
                        <th class="th-factura-detalles" width="10%"><?php echo $this->lang->line('quantity'); ?></th>
                        <th class="text-right rtl-text-left th-factura-detalles" width="15%"><?php echo $this->lang->line('tax'); ?></th>
                        <th class="text-right rtl-text-left th-factura-detalles" width="15%"><?php echo $this->lang->line('sub_total'); ?></th>
                    </tr>
                    <?php
                    $j = $total_tax = 0;
					
                    foreach ($detail as $bill) {
						 
                        if ($bill['tax'] > 0) {
                            $tax = ((($bill["sale_price"] - (($bill["sale_price"]*$result["discount_percentage"]) / 100))* $bill['tax'])/100)*$bill["quantity"] ;
                        } else {
                            $tax = 0;
                        }

                        $total_tax += $tax;
                    ?>
                        <tr>
                            <td class="td-factura-detalles"><?php echo $bill["medicine_name"]; ?></td>
                            <td class="td-factura-detalles"><?php echo $bill["unit_name"]; ?></td>
                            <td class="td-factura-detalles"><?php echo $this->customlib->getMedicine_expire_month($bill['expiry']); ?></td>
                            <td class="td-factura-detalles"><?php echo $bill["quantity"]; ?></td>
                            <td class="text-right rtl-text-left td-factura-detalles"><?php echo $bill['tax'] . "%";	?></td>
                            <td class="text-right rtl-text-left td-factura-detalles"><?php echo $currency_symbol.number_format(amountFormat($bill["sale_price"] * $bill["quantity"])); ?></td>
                        </tr>
                    <?php
                        $j++;
                    }
                    ?>
                </table>
                <div class="row">
                    <div class="col-sm-7">
                        <table class="printablea4" width="100%">
                            <?php if (!empty($result["note"])) { ?>
                                <tr>
                                    <th class="td-factura" width="30%"><b><?php echo $this->lang->line('note'); ?>:</b></th>
                                    <td class="td-factura-detalles" width="70%"><?php echo $result["note"]; ?></td>
                                </tr>
                            <?php }

                            if (!$print) {
                            ?>
                                <tr id="generated_by">
                                    <th class="td-factura" width="30%"><b><?php echo $this->lang->line('collected_by'); ?>:</b></th>
                                    <td class="td-factura-detalles" width="70%"><?php echo composeStaffNameByString($result['name'], $result['surname'], $result['employee_id']); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-sm-5">  
                        <table class="printablea4" width="100%" cellpadding="0" cellspacing="0"> 
                            <?php if (!empty($result["total"])) { ?>
                                <tr>
                                    <th width="70%" class="text-right rtl-text-left  th-factura-detalles"><?php echo $this->lang->line('total'); ?></th>
                                    <td width="30%" class="text-right rtl-text-left td-factura-detalles"><?php echo $currency_symbol.number_format(amountFormat($result["total"])); ?></td>
                                </tr>
                            <?php } ?>
                            <?php if (!empty($result["discount"])) {
                            ?>
                                <tr>
                                    <th class="text-right rtl-text-left  th-factura-detalles"><?php echo $this->lang->line('discount') . " (" . $result["discount_percentage"] ."%)"; ?></th>
                                    <td class="text-right rtl-text-left td-factura-detalles"><?php echo amountFormat($result["discount"]); ?></td> 

                                </tr>
                            <?php } ?>
                            <?php if (!empty($total_tax)) {
                            ?>
                                <tr>
                                    <th class="text-right rtl-text-left th-factura-detalles"><?php  echo $this->lang->line('tax'); ?></th>
                                    <td class="text-right rtl-text-left td-factura-detalles"><?php echo $currency_symbol.number_format(amountFormat($total_tax)); ?></td>
                                </tr>
                            <?php } ?>

                            <?php
                            if ((!empty($result["discount"])) && (!empty($result["tax"]))) {
                                if (!empty($result["net_amount"])) {
                            ?>
                                    <tr>
                                        <th class="text-right rtl-text-left th-factura-detalles"><?php  echo $this->lang->line('net_amount');  ?></th>
                                        <td class="text-right rtl-text-left td-factura-detalles"><?php echo $currency_symbol.number_format(amountFormat($result["net_amount"])); ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <th class="text-right rtl-text-left th-factura-detalles"><?php echo $this->lang->line('paid_amount');  ?></th>
                                <td class="text-right rtl-text-left td-factura-detalles"><?php echo $currency_symbol.number_format(amountFormat($result["paid_amount"])); ?></td>
                            </tr>
                            <tr>
                                <th class="text-right rtl-text-left th-factura-detalles"><?php echo $this->lang->line('refund_amount');  ?></th>
                                <td class="text-right rtl-text-left td-factura-detalles"><?php echo $currency_symbol.number_format(amountFormat($result["refund_amount"])); ?></td>
                            </tr>
                            <tr>
                                <th class="text-right rtl-text-left th-factura-detalles"><?php echo $this->lang->line('due_amount'); ?></th>
                                <td class="text-right rtl-text-left td-factura-detalles"><?php echo $currency_symbol.number_format(amountFormat(($result["net_amount"] + $result["refund_amount"]) - $result['paid_amount']));  ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="divider mb-10 mt-10"></div>
                    
                </div>
        </div>
        <!--/.col (left) -->
    </div>
</div>
</div>
</td></tr></tbody>
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