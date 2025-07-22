<div class="row flex-column-sm grid_div <?php echo ($grid_view) ? "displayblock" : "displaynone" ?>">
    <div class="col-lg-12 col-md-12 col-sm-12  order-2 order-lg-1">
        <div class="row">

       
			
			
	<?php		
	function get_icon_path($file_type, $real_name) {
    $CI =& get_instance(); // Obtener instancia de CodeIgniter
    $file_validate = $CI->config->item('file_validate');

    // Íconos asociados a las extensiones
    $icons = [
        'xls'  => 'backend/images/iconoxls.png',
        'xlsx' => 'backend/images/iconoxls.png',
        'ppt'  => 'backend/images/iconoppt.png',
        'pptx' => 'backend/images/iconoppt.png',
        'doc'  => 'backend/images/iconodoc.png',
        'docx' => 'backend/images/iconodoc.png',
        'pdf'  => 'backend/images/iconopdf.png',
        'txt'  => 'backend/images/iconotxt.png',
        'csv'  => 'backend/images/iconocsv.png',
        'zip'  => 'backend/images/iconozip.png',
		'mp4'  => 'backend/images/iconomp4.png',
        'rar'  => 'backend/images/iconorar.png',
    ];
	

    // Determinar la extensión del archivo
    $extension = strtolower(pathinfo($real_name, PATHINFO_EXTENSION));

    // Si es una imagen, verifica que esté dentro de las imágenes permitidas
    if (in_array($file_type, $file_validate['allowed_mime_type']) && in_array($extension, $file_validate['allowed_extension'])) {
        if (strpos($file_type, 'image/') === 0) {
            return 'thumbs/' . $real_name; // Ruta para miniaturas
        }
    }

    // Verificar si hay un ícono asociado para la extensión
    if (isset($icons[$extension])) {
        return $icons[$extension];
    }

    // Ícono por defecto para otros tipos de archivo
    return 'backend/images/docsicon.png';
}
				?>
			
			
			 <?php
        if (!empty($all_contents)) {
            foreach ($all_contents as $content_key => $content_value) {      
        ?>
			
        
            <div class="col-lg-4 col-sm-12 col-md-6 top_list_div p-column-des" data-record-id="<?php echo $content_value->id; ?>" data-real_name="<?php echo $content_value->real_name; ?>" data-short_name="<?php echo $this->media_storage->fileview($content_value->img_name); ?>" data-type-id="<?php echo $content_value->content_type_id; ?>"  data-file-type="<?php echo $content_value->file_type; ?>"  data-name="<?php echo ($content_value->file_type == "video") ? $content_value->vid_url: $content_value->img_name; ?>"  data-path="<?php echo $content_value->dir_path; ?>">
                <article class="card card-product-list">
                    <div>
                        
							
                        <a href="javascript:void(0);" class="img-wrap image_content">
							
                        <?php if ($content_value->file_type == 'xls' || $content_value->file_type == 'xlsx') {  ?> 
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
                        
						<?php } 
						elseif ($content_value->file_type == 'ppt' || $content_value->file_type == 'pptx') {   ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
                        
						<?php } 
						elseif ($content_value->file_type == 'doc' || $content_value->file_type == 'docx') {  ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
                        
						<?php } 
						elseif ($content_value->file_type == 'csv') {   ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
                        
                        <?php } 
						elseif ($content_value->file_type == 'pdf') {   ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
                        
                        <?php } 
						elseif ($content_value->file_type == 'txt') {  ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
                        
                        <?php } 
						elseif ($content_value->file_type == 'zip') {   ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
						
						<?php } 
						elseif ($content_value->file_type == 'rar') {   ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL(get_icon_path($content_value->file_type, $content_value->real_name)); ?>);">
							</div>
                        
                        <?php } 
						elseif ($content_value->file_type == 'video' || $content_value->file_type == 'gif' || $content_value->file_type == 'jpeg' || $content_value->file_type == 'jpg' || $content_value->file_type == 'jpe' || $content_value->file_type == 'jp2' || $content_value->file_type == 'j2k' || $content_value->file_type == 'jpf' || $content_value->file_type == 'jpg2' || $content_value->file_type == 'jpx' || $content_value->file_type == 'jpm' || $content_value->file_type == 'mj2' || $content_value->file_type == 'mjp2' || $content_value->file_type == 'png' || $content_value->file_type == 'tiff' || $content_value->file_type == 'tif' ) { ?>
                        	<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL($content_value->thumb_path . $content_value->thumb_name); ?>);">
							</div>
                            
                        <?php } 
						elseif ( $content_value->file_type == '3g2' || $content_value->file_type == '3gp' || $content_value->file_type == 'mp4'  || $content_value->file_type == 'm4a' || $content_value->file_type == 'f4v' || $content_value->file_type == 'flv' || $content_value->file_type == 'webm') {  ?>
							<div class="billingbox bg-media img-cover-media div_image" style="background-image: url(<?php echo $this->media_storage->getImageURL('backend/images/iconomp4.png'); ?>);">
							</div>
                        
                            
                        <?php }else { ?>
                        
                            <img class='' src="<?php echo $this->media_storage->getImageURL('backend/images/docsicon.png'); ?>">
                            
                        <?php } ?>                        
                        </a> 
                        
                        <!-- col.// -->
                        <div class="img-wrap-fix-right content_list" >
                            <div class="content-card-body relative flex-column">
                                <div class="form-check radio-title">
                                    <input type="checkbox" name="share_checkbox[]" data-real_name="<?php echo $content_value->real_name; ?>" value="<?php echo $content_value->id; ?>" data-name="<?php echo $content_value->img_name; ?> " class="form-check-input float-end share_checkbox relative z-index-1" <?php echo make_selected($content_value->id, $selected_content) ? "checked" : "";?>>
									<span><?php echo ($content_value->file_type == "video") ? $content_value->vid_title : $content_value->real_name; ?></span>
                               
                                </div>                                  <!-- price-dewrap // -->
                                
                                <!-- price-dewrap // -->                                
                            </div>                            
                            <div class="d-flex justify-content-between content-footer-bottom">
                                <div>
                                    <span class="price h6 fecha-subida"> <?php echo $this->customlib->dateyyyymmddToDateTimeformat($content_value->created_at); ?> </span>
                                </div>
                                <div class="inline-anchor">
                                      <a href="<?php echo site_url('admin/content/download_content/'.$content_value->id) ?>" class="btn-archivos text-default download_file pr-05" data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>"><i class="fa-regular fa-download"></i></a>
										<?php if($this->rbac->hasPrivilege('upload_share_content', 'can_delete')){ ?>
											<a href="#" class="btn-archivos text-danger delete_file" data-record-id="<?php echo $content_value->id; ?>" data-name="<?php echo ($content_value->file_type == "video") ? $content_value->vid_title : $content_value->real_name; ?>" data-toggle="modal" data-target="#single-delete" style="background: #f9d4cf;"><span class="display-inline-block" data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>"><i class="fa-regular fa-trash-can"></i></span></a>
										<?php } ?>
                                </div>
                            </div>
                            <!-- card-body .// -->
                        </div>
                        <!-- col.// -->
                    </div>
                    <!-- row.// -->
                </article>
            </div>
            <?php
            }
        } else {
        ?>
            <div class="col-12 col-sm-6 col-md-12">
                <div class="alert alert-info">
                    <?php echo $this->lang->line('no_record_found'); ?>
                </div>
            </div>
        <?php }
        ?>
        </div>
    </div>
</div>

<!-- //================list view============ -->
<div class="row list_div <?php echo (!$grid_view) ? "displayblock" : "displaynone" ?>">
	
	<?php		
	function get_icon_paths($file_type, $real_name) {
    $icons = [
        'xls'  => 'backend/images/excel-ico.png',
        'xlsx' => 'backend/images/excel-ico.png',
        'ppt'  => 'backend/images/ppt-ico.png',
        'pptx' => 'backend/images/ppt-ico.png',
        'doc'  => 'backend/images/word-ico.png',
        'docx' => 'backend/images/word-ico.png',
        'pdf'  => 'backend/images/pdf-ico.png',
        'txt'  => 'backend/images/txt-ico.png',
        'csv'  => 'backend/images/csv-ico.png',
        'zip'  => 'backend/images/zip-ico.png',
        'rar'  => 'backend/images/rar-ico.png',
        'mp4'  => 'backend/images/video-ico.png',
		'png'  => 'backend/images/png-ico.png',
		'jpg'  => 'backend/images/jpg-ico.png',
		'jpeg'  => 'backend/images/jpg-ico.png',
		'video'  => 'backend/images/youtube-ico.png',
    ];

    // Determinar la extensión del archivo
    $extension = strtolower(pathinfo($real_name, PATHINFO_EXTENSION));

    // Verificar si la extensión tiene un ícono asociado
    if (isset($icons[$extension])) {
        return $icons[$extension];
    }

    // Ícono por defecto para otros tipos de archivo
    
}
				?>
	
	
<?php
    if (!empty($all_contents)) {
?>

    <div class="col-lg-12">
      <div class="table-responsive">
         <table class="table table-bordered table_contents">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo $this->lang->line('document'); ?></th>
                    <th><?php echo $this->lang->line('type'); ?></th>
                    <th><?php echo $this->lang->line('size'); ?></th>
                    <th><?php echo $this->lang->line('upload_by'); ?></th>
                    <th class="text-right text-rtl-left"><?php echo $this->lang->line('date'); ?></th>    
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($all_contents as $content_key => $content_value) {
                ?>                
                <tr data-record-id="<?php echo $content_value->id; ?>" data-real_name="<?php echo $content_value->real_name; ?>" data-short_name="<?php echo $this->media_storage->fileview($content_value->img_name); ?>" data-type-id="<?php echo $content_value->content_type_id; ?>"  data-file-type="<?php echo $content_value->file_type; ?>"  data-name="<?php echo ($content_value->file_type == "video") ? $content_value->vid_url: $content_value->img_name; ?>"  data-path="<?php echo $content_value->dir_path; ?>">
                    <td><input type="checkbox" name="share_checkbox[]" data-real_name="<?php echo $content_value->real_name; ?>" value="<?php echo $content_value->id; ?>" data-name="<?php echo $content_value->img_name; ?> " class="share_checkbox_list" <?php echo make_selected($content_value->id, $selected_content) ? "checked" : "";?>>
                    
                    <input type="hidden" name="image_display" value="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name)); ?>">
                    </td>
                    <td>
						
						<?php
                      $image = $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?>
                   <?php if ($content_value->file_type == 'xls' || $content_value->file_type == 'xlsx') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
					
					
                   <?php }
					elseif ($content_value->file_type == 'ppt' || $content_value->file_type == 'pptx') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
					<?php }
					elseif ($content_value->file_type == 'doc' || $content_value->file_type == 'docx') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
						
					<?php }
					elseif ($content_value->file_type == 'csv') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
						
					<?php }
					elseif ($content_value->file_type == 'pdf') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
						
					<?php }
					elseif ($content_value->file_type == 'txt') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
					
					<?php }
					elseif ($content_value->file_type == 'zip') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
					
					<?php }
					elseif ($content_value->file_type == 'mp4') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
					
					<?php }
					elseif ($content_value->file_type == 'png') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
						
					<?php }
					elseif ($content_value->file_type == 'jpg' || $content_value->file_type == 'jpeg') {  ?> 
							<img src="<?php echo $this->media_storage->getImageURL(get_icon_paths($content_value->file_type, $content_value->real_name));?> ?>" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px;">
						
					<?php }
                    elseif ($content_value->file_type == 'video' || $content_value->file_type == 'gif' || $content_value->file_type == 'tiff' || $content_value->file_type == 'tif' ) { ?>
           				
						<img src="https://puerta.soymanuel.com/backend/images/youtube-ico.png" class="file-icon" alt="<?php echo $content_value->real_name?>" style="width: 30px">
						
                        	
					<?php	

                    } elseif ( $content_value->file_type == '3g2'  || $content_value->file_type == '3gp'  || $content_value->file_type == 'mp4'  || $content_value->file_type == 'm4a'  || $content_value->file_type == 'f4v'  || $content_value->file_type == 'flv'  || $content_value->file_type == 'webm'  ) {  
           
                        $image= $this->media_storage->getImageURL('backend/images/video-ico.png');

                    }
            ?>
						
                         <?php echo $content_value->real_name; ?>
                    </td>
                    <td><?php echo $content_value->content_type; ?></td>
                    <td><?php echo ($content_value->file_type == "video") ? $this->lang->line('n_a') : format_file_size($content_value->file_size); ?></td>
                    <td><?php echo $content_value->staff_name; ?> <?php echo $content_value->surname; ?></td>                
                    <td  class="pull-right"><?php echo $this->customlib->dateyyyymmddToDateTimeformat($content_value->created_at); ?></td>
                </tr>
                <?php }   ?>
            </tbody>
         </table>
      </div>
   </div>
<?php
} else {
    ?>
    <div class="col-12 col-sm-6 col-md-12">
        <div class="alert alert-info">
            <?php echo $this->lang->line('no_record_found'); ?>
        </div>
    </div>
<?php
}
?>
</div>


<?php
function make_selected($find, $selected_content)
{
    if (!empty($selected_content)) {
        if (in_array($find, $selected_content)) {
            return true;
        }
    }
    return false;
}

 

?>