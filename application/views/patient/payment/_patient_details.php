<?php 
$currency_symbol = $this->customlib->getHospitalCurrencyFormat();
?> 

<div class="box-body pb0">
	<div class="row">
     <div class="col-lg-5 col-md-5 col-md-12">
			<div class="row">
    <div class="col-lg-5 col-md-6 col-md-12">
		<div class="box-body box-profile mt15 pt10">
        <?php
        $image = $result['image'];
        if (!empty($image)) {
            $file = $result['image'];
        } else {
            $file = "uploads/patient_images/no_image.png";
        }
        ?> 
 
        <img width="115" height="115" class="profile-user-img img-responsive img-circle" src="<?php echo base_url() . $file.img_time() ?>" alt="No Image">
        <div class="editviewdelete-icon pt8">           
            
        </div>  
			</div> 
    </div>
				<div class="col-lg-7 col-md-6 col-md-12">
					<div class="singlelist24bold pb10 pt100">
						<span><?php echo $result['patient_name']; ?></span>
						<h5 class="bmedium mb5"><?php echo $this->lang->line('id'); ?>:
							<span><?php echo $result['patient_id']; ?></span>
						</h5>
						<h5 class="bmedium mb5">
							<i class="fa-regular fa-envelope iconos-paciente" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $this->lang->line('email'); ?>"></i>
							<span><?php echo $result['email']; ?></span>
						</h5>
						<h5 class="bmedium mb5">
							<i class="fa-regular fa-phone iconos-paciente" data-toggle="tooltip" data-placement="top" title="<?php echo $this->lang->line('phone'); ?>"></i>
							<span><?php echo $result['mobileno']; ?></span>
						</h5>
					</div>
				
				</div>
				</div>
		 </div>
    <div class="col-lg-7 col-md-7 col-sm-12">
		
		<ul class="billing-item overflow-hidden row-billing">
                                

                                <li class="col-bill-5">
                                    <h5><?php echo $this->lang->line('marital_status'); ?></h5>
                                    <a class="text-aqua"><?php echo $result['marital_status']; ?></a>
                                </li>

                                <li class="col-bill-5">
                                    <h5><?php echo $this->lang->line('age'); ?></h5>
                                    <a class="text-aqua"><?php                                 
                               echo $this->customlib->getPatientAge($result['age'],$result['month'],$result['day']);
                            ?> </a>
                                </li>

                                <li class="col-bill-5">
                                    <h5><?php echo $this->lang->line('gender'); ?></h5>
                                    <a class="text-aqua"><?php echo $this->lang->line(strtolower($result['gender'])); ?></a>
                                </li>
                                
                                
                                <li class="col-bill-5">
                                    <h5><?php echo $this->lang->line('address'); ?></h5>
                                    <a class="text-aqua"><?php echo $result['address']; ?></a>
                                </li>
                               
                                 <li class="col-bill-5">
                                    <h5><?php echo $this->lang->line('known_allergies'); ?></h5>
                                    <a class="text-aqua"><?php echo $result['known_allergies']; ?></a>
                                </li>
								<li class="col-bill-5">
                                    <h5><?php echo $this->lang->line('guardian'); ?></h5>
                                    <a class="text-aqua"><?php echo $result['guardian_name']; ?></a>
                                </li>
                            </ul>
		
        
    </div>   
				
</div>


</div>