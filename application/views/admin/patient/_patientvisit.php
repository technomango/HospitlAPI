<?php
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?>
<div class="box border0 clear around20" id="visit_report">
    <h3 class="mb0"><?= $this->lang->line("patient_visit_report"); ?></h3>
    <div class="table-responsive around20" style="padding-top: 0px;">        
        <div class="ptt10 hide" id="headreport">
            <?php if(!empty($patient_details['patient_name'])){
            echo composePatientName($patient_details['patient_name'],$patient_details['id']) .' '.$this->lang->line("visit_details"); } ?> 
        </div>
        <div class="download_label"><?php echo $this->lang->line('opd_report'); ?></div>
        <div class="">
            <a class="btn btn-default btns-detalles pull-right" id="print" onclick="printDiv()"><i class="fa-regular fa-print"></i></a> 
            <a class="btn btn-default btns-detalles pull-right" id="btnExport" onclick="tablesToExcel(array1, array2, array3, array4, array5, array6, array7, 'myfile.xls');"> <i class="fa-regular fa-file-xls"></i> </a>
        </div>
        <table class="table table-striped table-bordered table-hover allajaxlist" id="1">
            <caption><h4 class="bolds"><?= $this->lang->line("opd_details"); ?></h4></caption>
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('opd_no'); ?></th>
                    <th><?php echo $this->lang->line('case_id'); ?></th>
                    <th><?php echo $this->lang->line('date'); ?></th>
                    <th><?php echo $this->lang->line('checkup_id'); ?></th>
                    <th><?php echo $this->lang->line('doctor_name'); ?></th>
                    <th width="20%"><?php echo $this->lang->line('symptoms'); ?></th>
                    <th width="20%"><?php echo $this->lang->line('findings'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($opd_data)) {
                    foreach ($opd_data as  $value) {

                         if ($value['case_reference_id'] > 0) {
                            $case_id = $value['case_reference_id'];
                        } else {
                            $case_id = '';
                        }
                ?>
                        <tr>
                            <td><?php echo $this->customlib->getSessionPrefixByType('opd_no') . $value['id']; ?></td>
                            <td><?php echo $case_id ; ?></td>
                            <td><?php if($value['appointment_date']){ echo $this->customlib->YYYYMMDDTodateFormat($value['appointment_date']); } ?></td>
                            <td><?php echo $this->customlib->getSessionPrefixByType('checkup_id') . $value['visit_id']; ?></td>
                            <td><?php echo composeStaffNameByString($value['name'], $value['surname'], $value['employee_id']); ?></td>
                            <td><?php echo $value['symptoms']; ?></td>
                            <td><?php echo $value['finding_description']; ?></td>
                        </tr>
                       
                 <?php   }
                }
                ?>
            </tbody>
        </table>
    </div>
    
   
    <div class="table-responsive around20">
        <div class="download_label"><?php echo $this->lang->line('pathology_report'); ?></div>
        <table class="table table-striped table-bordered table-hover allajaxlist" id="4">
        <caption><h4 class="bolds"><?= $this->lang->line("pathology_details"); ?></h4></caption>
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('bill_no'); ?></th>
                    <th><?php echo $this->lang->line('case_id'); ?></th>
                    <th><?php echo $this->lang->line('date');  ?></th>
                    <th class="text-right"><?php echo $this->lang->line('discount') . " (" . $currency_symbol . ")";  ?></th>
                    <th class="text-right"><?php echo $this->lang->line('amount') . " (" . $currency_symbol . ")";  ?></th>
                    <th class="text-right"><?php echo $this->lang->line('paid_amount') . " (" . $currency_symbol . ")";  ?></th>
                    <th class="text-right"><?php echo $this->lang->line('balance_amount')."(".$currency_symbol.")"; ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (!empty($pathology_data)) {
                    $total_net= 0 ;$total_paid=0;$total_balance=0;$total_discount=0;$total_discount_percent=0;
                    foreach ($pathology_data as $value) {

                        $balance_amount = ($value['net_amount']) - ($value['paid_amount']);
                        $total_net+= $value['net_amount'];
                        $total_paid+= $value['paid_amount'];
                        $total_balance+= $balance_amount;
                        $total_discount+= $value['discount'];
                        $total_discount_percent+= $value['discount_percentage'];

                        if ($value['case_reference_id'] > 0) {
                            $case_id = $value['case_reference_id'];
                        } else {
                            $case_id = '';
                        }
                ?>
                        <tr>
                            <td><?php echo $this->customlib->getSessionPrefixByType('pathology_billing') . $value['id']; ?></td>
                            <td><?php echo $case_id ; ?></td>
                            <td><?php echo $this->customlib->YYYYMMDDHisTodateFormat($value['date'], $this->customlib->getHospitalTimeFormat()); ?></td>
                            <td class="text-right"><?php echo $value['discount'].' ('.$value['discount_percentage'].'%)'; ?></td>
                            <td class="text-right"><?php echo $value['net_amount']; ?></td>
                            <td class="text-right"><?php echo $value['paid_amount']; ?></td>
                            <td class="text-right"><?php echo number_format($balance_amount, 2); ?></td>
                            <td><div class='rowoptionview'><a href='javascript:void(0)'  data-loading-text=' ' data-record-id='<?php echo $value['id']; ?>' class='btn btn-default btn-xs view_detail' data-module-type="pathology"  data-toggle='tooltip' title='' ><i class='fa fa-reorder'></i></a></div></td>
                        </tr>                        
                <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-right"><b><?= $this->lang->line("total_discount"); ?>: </b><?php echo $currency_symbol.number_format($total_discount,2).' ('.number_format($total_discount_percent,2).'%)'; ?></td>
                        <td class="text-right"><b><?= $this->lang->line("total_amount"); ?>: </b><?php echo $currency_symbol.number_format($total_net,2); ?></td>
                        <td class="text-right"><b><?= $this->lang->line("total_paid"); ?>: </b><?php echo $currency_symbol.number_format($total_paid,2); ?></td>
                        <td class="text-right"><b><?= $this->lang->line("total_balance"); ?>: </b><?php echo  $currency_symbol.number_format($total_balance,2); ?></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

    

  
</div>
<script>  
    function viewDetailBill(id) {
        $.ajax({
            url: baseurl+'admin/patient/getBillDetails/' + id,
            type: "GET",
            data: {id: id},
            success: function (data) {
                $('#reportdata').html(data);
               
                holdModal('viewModalBill');
            },
        });
    }
</script>
<script>
   function viewDetail(id) {
       var view_modal=$('#viewModal');
       $.ajax({
            url: baseurl+'admin/patient/getpharmacybilldetails/',
            type: "GET",
            data: {'id': id},
            dataType:"JSON",
            beforeSend: function(){
               $('#reportdata,#edit_deletebill').html("");
           $('#viewModal').modal('show');
           view_modal.addClass('modal_loading');
           },
           complete: function(){
             view_modal.removeClass('modal_loading');
           },
            success: function (data) {
                $('#pharmacy_reportdata').html(data.page);               
                view_modal.removeClass('modal_loading');
            },
        });
    }
</script>