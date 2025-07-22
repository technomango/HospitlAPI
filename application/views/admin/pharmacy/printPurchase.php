<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $this->lang->line('bill'); ?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/sh-print.css">
    </head>
    <div id="html-2-pdfwrapper" class="p-1">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="">
					<div class="row around20">
					<div class="col-md-6">
						<h3 class="text-left rtl-text-left receta-h3"><span class="text-muted"><?php echo $this->lang->line('purchase_no'); ?>:</span> <?php echo $this->customlib->getSessionPrefixByType('purchase_no').$result["id"] ?></h3>
						<div class="text-left rtl-text-left receta-com"><span class=""><?php echo $this->lang->line('bill_no'); ?>:</span> <?php echo $result["invoice_no"] ?></div>
						<div class="text-left rtl-text-left receta-com"><span class=""><?php echo $this->lang->line('purchase_date')?>:</span> <?php echo $this->customlib->YYYYMMDDHisTodateFormat($result['date'], $this->customlib->getHospitalTimeFormat());?></div>
						
					</div>
					<div class="col-md-6">
							<div class="text-right rtl-text-left">
                    			<span class="logo-receta-d text-right"><img src="https://puerta.soymanuel.com/uploads/hospital_content/logo/1.png?1732077421" alt="Mango Hospital" style="height: 60px;"></span>
                			</div>
							<div class="text-right rtl-text-left">
							<span class="receta-com"><?php echo $this->customlib->getHospitalAddress(); ?></span><br>
							<span class="receta-com"><?php echo $this->customlib->getHospitalEmail(); ?></span>
                            </div>
						</div>
					<div class="col-md-12">
                    <div class="table-responsive pt20">
						<div class="text-left rtl-text-left receta-h3 pb10"><span class=""><?php echo $this->lang->line('supplier_details'); ?>:</span></div>
                        <table class="printablea4" cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td class="td-proveedor" width="30%"><b><?php echo $this->lang->line('supplier'); ?>:</b> <?php echo $result["supplier"]; ?></td>
								<td class="td-proveedor text-right" width="70%"><b><?php echo $this->lang->line('drug_license_number'); ?>:</b> <?php echo $result["supplier_drug_licence"]; ?></td>
                            </tr>
                            <tr>
                                <td class="td-proveedor" width="30%"><b><?php echo $this->lang->line('contact_person'); ?>:</b> <?php echo $result["supplier_person"]; ?></td>                    
                            </tr>
							<tr>
                                <td class="td-proveedor" width="30%"><b><?php echo $this->lang->line('contact_person_phone'); ?>:</b> <?php echo $result["supplier_person_contact"]; ?></td>                     
                            </tr>
                            <tr>
                                <td class="td-proveedor" width="30%"><b><?php echo $this->lang->line('address'); ?>:</b> <?php echo $result['address']; ?></td>
								<td class="td-proveedor" width="70%"></td>
                            </tr> 
                        </table>
                     </div>   
						</div>
						</div>
                     <div class="mtb-20"></div>
                    <div class="table-responsive around20">
                       <table id="testreport" width="100%" cellspacing="5">
                       <tr>
                            <th class="white-space-nowrap pe-10"><?php echo $this->lang->line('medicine_category'); ?></th> 
                            <th class="white-space-nowrap pe-10"><?php echo $this->lang->line('medicine_name'); ?></th>
                            <th class="white-space-nowrap pe-10"><?php echo $this->lang->line('batch_no'); ?></th>
                            <th class="white-space-nowrap pe-10"><?php echo $this->lang->line('expiry_date'); ?></th>
                            <th class="text-right white-space-nowrap" style="padding-left:1rem;"><?php echo $this->lang->line('sale_price'); ?></th>
                            <th class="text-right pe-10"><?php echo $this->lang->line('quantity'); ?></th>
                            <th class="text-right pe-10"><?php echo $this->lang->line('tax'); ?> (%)</th>
                            <th class="text-right pe-10"><?php echo $this->lang->line('purchase_price'); ?></th>
                            <th class="text-right pe-10 rtl-text-left"><?php echo $this->lang->line('sub_total'); ?></th>
                        </tr>
                        <?php
                        $j = 0;
                        foreach ($detail as $bill) {
                            ?>
                            <tr class="white-space-nowrap">
                                <td class="vertical-align-middle"><?php echo $bill["medicine_category"]; ?></td>
                                <td class="vertical-align-middle"><?php echo $bill["medicine_name"]; ?></td>
                                <td class="vertical-align-middle"><?php echo $bill["batch_no"]; ?></td>
                                <td class="vertical-align-middle"><?php echo $this->customlib->getMedicine_expire_month($bill['expiry']); ?></td>
                                <td class="text-right white-space-nowrap pb5" style="width:80px;">
                                <input type="text" name="salerate[]" id="salerate" class="form-control" style="margin-left:1rem;width:100px;border: 0px solid #ccc;"
                                 value="<?php echo $currency_symbol.number_format($bill['sale_rate'], 2, '.', ''); ?>">
                                <input type="hidden" name="id[]" id="id" value="<?php echo $bill["id"]; ?>">
                                </td>
                                <td class="text-right vertical-align-middle"><?php echo $bill["quantity"]; ?></td>
                                <td class="text-right vertical-align-middle"><?php echo $currency_symbol.number_format($bill["tax"], 2, '.', ''); ?></td>
                                <td class="text-right vertical-align-middle"><?php echo $currency_symbol.number_format($bill['purchase_price'], 2, '.', ''); ?></td>
                                <td class="text-right vertical-align-middle"><?php echo $currency_symbol.number_format($bill["amount"], 2, '.', ''); ?></td>
                            </tr>
                            <?php
                            $j++;
                        }
                        ?>
                    </table> 
                </div>
                <div class="mtb-20"></div>
                    <table id="testreport" width="100%">
                    <tr>
                        <td>                            
                            <?php if (!empty($result["note"])) { ?>
                            <p><label><?php echo $this->lang->line('note') ?></label> : <?php echo  $result["note"]; ?></p>
                        <?php } ?>
                        <p>
                            <label><?php echo $this->lang->line('payment_mode');?> </label> : 
                            <?php echo $this->lang->line(strtolower($result["payment_mode"]));  ?>
                        </p>
                        <?php 
                            if($result['payment_mode'] == "Cheque"){ ?>
                            <p><label><?php echo $this->lang->line('cheque_no');?> </label> : <?php echo $result["cheque_no"]; ?> <?php if($print == 'no'){ ?><span><a href="<?php echo site_url('admin/pharmacy/downloadcheque/'.$result["id"]); ?>" class='btn btn-default btn-xs' data-toggle='tooltip' title='<?php echo $this->lang->line("download"); ?>'><i class="fa fa-download"></i></a></span><?php } ?></p>
                            <p><label><?php echo $this->lang->line('date');?> </label> : <?php echo $this->customlib->YYYYMMDDTodateFormat($result["cheque_date"]); ?></p>
                        <?php } ?>
                        <?php  
                        if($result["payment_note"] != ""){ ?>
                        <p><label> <?php echo $this->lang->line('payment_note');?> </label>: <?php echo $result["payment_note"] ?></p>
                        <?php } ?>   
                          <?php   
                         if (!empty($result["attachment"])) { ?>    
                            <p><label> <?php echo $this->lang->line('attach_document');?></label> : <span><a class="defaults-c text-right" title="" href="<?php echo base_url().$result["attachment"]; ?>" data-original-title="<?php echo $this->lang->line('download'); ?>" download><i class="fa fa-download"></i></a></span>  </p>           
                         <?php } ?>                      
                        </td>
                        <td width="32%">
                        <table class="" width="100%" style="float:right;"> 
                        <?php if (!empty($result["total"])) { ?>
                            <tr>
                                <th width="35%"><?php echo $this->lang->line('total'); ?></th>
                                <td class="text-right rtl-text-left" width="65%"><?php echo $currency_symbol.number_format($result["total"], 2, '.', '') ; ?></td>
                            </tr>
                        <?php } ?>
                        <?php if (!empty($result["discount"])) { ?>
                            <tr>
                                <th><?php  echo $this->lang->line('discount') . " (" .  ($result["discount"]*100)/$result["total"] . "%)";   ?></th>
                                <td class="text-right rtl-text-left"><?php echo $currency_symbol.number_format($result["discount"], 2, '.', '') ; ?></td>
							</tr>
                        <?php } ?>
                        <?php if (!empty($result["tax"])) { ?>
                            <tr>
                                <th><?php  echo $this->lang->line('tax'); ?></th>
                                <td class="text-right rtl-text-left"><?php echo $currency_symbol.number_format($result['tax'], 2, '.', ''); ?></td>
                            </tr>
                        <?php } ?>
                        <?php
                        if ((!empty($result["discount"])) || (!empty($result["tax"]))) {
                            if (!empty($result["net_amount"])) {
                                ?>
                                <tr>
                                    <th><?php
                                        echo $this->lang->line('net_amount');
                                        ;
                                        ?></th>
                                    <td class="text-right rtl-text-left"><?php echo $currency_symbol.number_format($result["net_amount"], 2, '.', ''); ?></td>
                                </tr>
                                <?php
                            }
                        }   ?>                  
                       
                        </table>                    
                        </td>
                        </tr>
                    </table>                  
                    <div class="divider"></div> 
                    <div class="footer-fixed printfooter"> 
                        <p><?php
                            if (!empty($print_details[0]['print_footer'])) {
                                echo $print_details[0]['print_footer'];
                            }
                            ?></p>
                    </div>        
                </div>
            </div>
            <!--/.col (left) -->
        </div>
    </div>
</html>