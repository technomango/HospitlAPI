<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box border0">
                    <ul class="tablists">
                        <li><a href="<?php echo site_url('admin/visitorspurpose') ?>"><?php echo $this->lang->line('purpose'); ?></a></li>
                        <li><a href="<?php echo site_url('admin/complainttype') ?>" class="active"><?php echo $this->lang->line('complain_type'); ?></a></li>
                        <li><a href="<?php echo site_url('admin/source') ?>"><?php echo $this->lang->line('source'); ?></a></li>                        
                    </ul>
                </div>
            </div><!--./col-md-3-->

            <div class="col-md-9">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('complaint_type_list'); ?></h3>
                        <div class="box-tools pull-right">
                            <?php if ($this->rbac->hasPrivilege('setup_front_office', 'can_add')) {?>
                            <a onclick="addModal()"  class="btn btn-primary complain_type"><i class="fa fa-plus"></i>  <?php echo $this->lang->line('add_complaint_type'); ?></a> <?php }?>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('complaint_type_list'); ?></div>
                        <div class="table-responsive mailbox-messages overflow-visible">
                            <table class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('complain_type'); ?></th>
                                        <th><?php echo $this->lang->line('description'); ?></th>
                                        <th class="text-right noExport"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
if (empty($complaint_type_list)) {
    ?>
                                        <?php
} else {
    foreach ($complaint_type_list as $key => $value) {
        ?>
                                            <tr>
                                                <td><?php echo $value['complaint_type'] ?></td>
                                                <td><?php echo $value['description']; ?></td>
                                                <td class="mailbox-date pull-right">
                                                    <?php if ($this->rbac->hasPrivilege('setup_front_office', 'can_edit')) {?>
                                                        <a data-target="#editmyModal" onclick="get(<?php echo $value['id']; ?>)" class="btn btn-default btn-xs" data-toggle="tooltip" title="" data-original-title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php }if ($this->rbac->hasPrivilege('setup_front_office', 'can_delete')) {?>
                                                        <a  class="btn btn-default btn-xs" data-toggle="tooltip" title="" onclick="delete_complainttype('<?php echo $value['id']; ?>')" data-original-title="<?php echo $this->lang->line('delete') ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                            <?php
}
}
?>
                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- add multiple data modal -->
<div class="modal fade" id="addmultiplerow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-mid" role="document">
        <div class="modal-content modal-media-content mx-2">
            <div class="modal-header modal-media-header overflow-hidden">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('add_complaint_type') ;?></h4> 
            </div>            
                <form id="form_add_multiple" action="<?php echo site_url('admin/complainttype/add_multiple_complaint_type') ?>"  class="ptt10"  method="post" accept-charset="utf-8">
                   <div class="modal-body pt0">
                        <div class="row">
                            <div class="col-md-12">    
                                <div class="table-responsive overflow-visible mb0">
                                    <table class="table table-striped mb0 table-bordered table-hover  tablefull12 tblProducts " id="tableID_vitals">
                                        <thead>
                                            <tr class="font13 white-space-nowrap">
                                                <th width="30"><?php echo $this->lang->line('complain_type'); ?><small class="req" style="color:red;"> *</small></th>
                                                <th width="60%"><?php echo $this->lang->line('description'); ?></th>
                                                <th width="10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody  id="set_row">                                       
                                        </tbody>
                                    </table>                                
                                    <a class="btn btn-info addplus-xs" onclick="addrow()" data-added="0"><i class="fa fa-plus"></i> <?php echo $this->lang->line('add')?></a>
                                </div>                         
                            </div>
                        </div> 
                    </div>         
                    <div class="modal-footer">
                        <div class="pull-right">
                            <button type="submit" id="formadd_multiple_btn" data-loading-text="<?php echo $this->lang->line('processing'); ?>" class="btn btn-info"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </div>  
                </form>                                                 
        </div>
    </div>
</div>
<!-- add multiple data modal -->

<div class="modal fade" id="editmyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-mid" role="document">
        <div class="modal-content modal-media-content mx-2">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $this->lang->line('edit_complaint_type'); ?></h4>
            </div>
            <form id="editformadd" action="<?php echo site_url('admin/complainttype/edit') ?>" name="employeeform" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                <div class="modal-body pt0 pb0">
                    <div class="ptt10">
                        <div class="form-group">
                            <label for="pwd"><?php echo $this->lang->line('complain_type'); ?></label><small class="req"> *</small>
                            <input class="form-control" id="complaint_type" name="complaint_type"  value="<?php echo set_value('complaint_type'); ?>"/>
                            <span class="text-danger"><?php echo form_error('complaint_type'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd"><?php echo $this->lang->line('description'); ?></label>
                            <textarea class="form-control" id="description1" name="description"rows="3"><?php echo set_value('description'); ?></textarea>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                </div><!--./modal-body-->
                <div class="modal-footer">
                    <button type="submit" data-loading-text="<?php echo $this->lang->line('processing'); ?>" id="editformaddbtn" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> <?php echo $this->lang->line('save'); ?></button>
                </div>
            </form>
        </div><!--./row-->
    </div>
</div>
<script>
   
    function get(id) {
        $('#editmyModal').modal('show');
        $.ajax({
            dataType: 'json',
            url: '<?php echo base_url(); ?>admin/complainttype/get_data/' + id,
            success: function (result) {
                $('#id').val(result.id);
                $('#complaint_type').val(result.complaint_type);
                $('#description1').val(result.description);
            }
        });
    }

    $(document).ready(function (e) {
        $('#editformadd').on('submit', (function (e) {
            $("#editformaddbtn").button('loading');
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    } else {
                        successMsg(data.message);
                        window.location.reload(true);
                    }
                    $("#editformaddbtn").button('reset');

                },
                error: function () {

                }
            });
        }));
    });
</script>
<script>

    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });

$(".complain_type").click(function(){
    $('#formadd').trigger("reset");
});

    $(document).ready(function (e) {
        $('#myModal,#editmyModal').modal({
            backdrop: 'static',
            keyboard: false,
            show:false
        });
    });

    function delete_complainttype(id){
        delete_recordByIdReload('admin/complainttype/delete/'+id, '<?php echo $this->lang->line('delete_confirm') ?>')
    }
</script>
<script>
var total_rows=0;
addrow();
function addrow(){
    var id = total_rows+1;    
    var div = "<tr id='name_row_"+id+"'><td><input class='form-control' name='id_"+id+"' id='id_"+id+"' value='' type='hidden' /><input type='hidden' name='total_rows[]' value='" + id + "'><input name='complaint_type_"+id+"' id='complaint_type_"+id+"'  type='text' class='form-control'  /></td><td><input name='description_"+id+"' id='description_"+id+"'  type='text' class='form-control'/></td><td><button type='button' data-rowid='"+id+"' class='closebtn delete_row'><i class='fa fa-remove'></i></button></td></tr>";
    $('#set_row').append(div);   
    total_rows++;      
}
    
$(document).on('click','.delete_row',function(e){
    if(confirm("<?php echo $this->lang->line('are_you_sure_to_delete_this'); ?>")){
        var modal_=$(e.target).closest('div.modal');
        var del_row_id=$(this).data('rowid');
        $("#name_row_" + del_row_id).remove();             
    }        
});

$(document).ready(function (e) {
        $('#form_add_multiple').on('submit', (function (e) {
            $("#formadd_multiple_btn").button('loading');
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.status == "fail") {
                        var message = "";
                        $.each(data.error, function (index, value) {
                            message += value;
                        });
                        errorMsg(message);
                    }else if(data.status==2){

                        errorMsg(data.error);
                    } else {
                        successMsg(data.message);
                        window.location.reload(true);
                    }
                    $("#formadd_multiple_btn").button('reset');
                },
                error: function () {

                }
            });
        }));
    });

  function addModal(){
        $('#addmultiplerow').modal('show');
        $('#form_add_multiple').trigger("reset");
        $('#set_row').html('');
        addrow();
    }

</script>