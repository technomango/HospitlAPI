<script src="<?php echo base_url(); ?>backend/plugins/ckeditor/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('banner_images'); ?></h3>
                        <?php
if ($this->rbac->hasPrivilege('banner_images', 'can_add')) {
    ?>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary btn-sm gallery_image" id="gallery_images"><i class="fa fa-plus"></i>  <?php echo $this->lang->line('add_images'); ?>
                                </button>
                            </div>
                        <?php }?>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body">
                        <div class="mediarow">
                            <div class="row">
                                <div class="gallery_content">
                                    <?php
if (isset($banner_images) && !empty($banner_images)) {
    foreach ($banner_images as $banner_image_key => $banner_image_value) {
        ?>
                                            <div class='col-sm-3 col-md-2 col-xs-6 img_div_modal gallery_img div_record_<?php echo $banner_image_value->id ?>'>
                                                <div class='fadeoverlay'>
                                                     <?php
if ($this->rbac->hasPrivilege('banner_images', 'can_view')) {
            ?>
                                                    <img class='img-responsive' data-fid='<?php echo $banner_image_value->id ?>' data-content_name='<?php echo $banner_image_value->img_name; ?>' data-img='<?php echo base_url($banner_image_value->thumb_path . $banner_image_value->img_name) ?>' src='<?php echo base_url($banner_image_value->thumb_path . $banner_image_value->img_name.img_time()) ?>'>
                                                    <?php }
        if ($this->rbac->hasPrivilege('banner_images', 'can_delete')) {
            ?>
                                                        <div class='overlay3'>
                                                            <a href='#' title="<?php echo $this->lang->line('delete'); ?>"  class='uploadclosebtn delete_gallery_img' data-record_id='<?php echo $banner_image_value->id ?>' data-toggle='modal' data-target='#confirm-delete'><i class=' fa-regular fa-trash-can'></i></a>
                                                            <p class='processing'>Processing...</p>
                                                        </div>
                                                    <?php }?>
                                                    <p class=''><?php echo $banner_image_value->img_name; ?></p>
                                                </div>
                                            </div>

                                            <?php
}
}else{
?>
        <div class="col-md-12">
         <div class="alert alert-danger"><?php echo $this->lang->line('no_record_found'); ?></div>
        </div>

<?php } ?>

                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (right) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function () {
        var baseurl = '<?php echo base_url(); ?>';
        var popup_target = 'gallery_image';
        var date_format = '<?php echo $result = strtr($this->customlib->getHospitalDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';
        $('.date').datepicker({
            format: date_format,
            autoclose: true
        });

        $('#mediaModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

        $(document).on('click', '.gallery_image', function (event) {
            $("#mediaModal").modal('toggle', $(this));
        });

        $('#mediaModal').on('show.bs.modal', function (event) {
            var a = $(event.relatedTarget) // Button that triggered the modal
            popup_target = a[0].id;
            var button = $(event.relatedTarget) // Button that triggered the modal

            var $modalDiv = $(event.delegateTarget);
            $('.modal-media-body').html("");
            $.ajax({
                type: "POST",
                url: baseurl + "admin/front/media/getMedia",
                dataType: 'text',
                data: {},
                beforeSend: function () {
                    $modalDiv.addClass('modal_loading');
                },
                success: function (data) {
                    $('.modal-media-body').html(data);
                },
                error: function (xhr) { // if error occured
                    $modalDiv.removeClass('modal_loading');
                },
                complete: function () {
                    $modalDiv.removeClass('modal_loading');
                },
            });
        });

        $(document).on('click', '.img_div_modal', function (event) {
            $('.img_div_modal div.fadeoverlay').removeClass('active');
            $(this).closest('.img_div_modal').find('.fadeoverlay').addClass('active');
        });

        $(document).on('click', '.add_media', function (event) {
            var content_html = $('div#media_div').find('.fadeoverlay.active').find('img').data('img');
            var content_id = $('div#media_div').find('.fadeoverlay.active').find('img').data('fid');
            var is_image = $('div#media_div').find('.fadeoverlay.active').find('img').data('is_image');
            var content_type = $('div#media_div').find('.fadeoverlay.active').find('img').data('content_type');
            var content_name = $('div#media_div').find('.fadeoverlay.active').find('img').data('content_name');
            var content = "";
            if (popup_target === "gallery_images") {
                if (content_type === "image/gif" || content_type === "image/jpeg" || content_type === "image/png") {
                    $.ajax({
                        type: "POST",
                        url: baseurl + "admin/front/banner/add",
                        dataType: 'json',
                        data: {'content_id': content_id},
                        beforeSend: function () {

                        },
                        success: function (data) {
                            if (data.status == 1) {                               
                                successMsg(data.msg);
                                window.location.reload();
                            }
                        },
                        error: function (xhr) { // if error occured

                        },
                        complete: function () {
                            $('#mediaModal').modal('hide');

                        },
                    });
                }
            }
        });
    });    

    $(document).on('click', '.delete_gallery_img', function (e) {
        var content_id = $(this).data('record_id');
        if(confirm('<?php echo $this->lang->line('are_you_sure'); ?>')){
        $.ajax({
            type: "POST",
            url: baseurl + "admin/front/banner/remove",
            dataType: 'json',
            data: {'content_id': content_id},
            beforeSend: function () {
            },
            success: function (data) {

                if (data.status == 1) {
                    $(e.target).closest('.gallery_img').remove();
                    successMsg(data.msg);
                } else {
                    errorMsg(data.msg);
                }
            },
            error: function (xhr) { // if error occured

            },
            complete: function () {

            },
        });
        }
    });

</script>

<!-- Modal -->
<div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog pup100" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title modal-media-title" id="myModalLabel"><?php echo $this->lang->line('media_manager'); ?></h4>
            </div>
            <div class="modal-body modal-media-body pupscroll">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <button type="button" class="btn btn-primary add_media"><?php echo $this->lang->line('add'); ?></button>
            </div>
        </div>
    </div>
</div>