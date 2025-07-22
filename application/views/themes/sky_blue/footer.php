<footer class="site-footer style-1 overlay-primary-light" style="background-image: url(https://www.cemedpuertadelsol.com/uploads/hospital_front/1752959744-352919633687c0b00c8b13!footer_bk.webp)">
	
	<div class="footer-head">
			<div class="container">
				<div class="fh-inner">
					<div class="row g-3 align-items-center">
						<div class="col-xl-3 col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
							<h3 class="title" style="margin-top: 0px;">Ponte en Contacto</h3>
							<p class="text">Contactanos por sus necesidades de atención médica</p>
						</div>
						<div class="col-xl-3 col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.4s; animation-name: fadeInUp;">
							<div class="icon-bx-wraper style-1">
								<div class="icon-bx bg-secondary">
									<span class="icon-cell">
										<i class="fa-regular fa-phone"></i>
									</span>
								</div>
								<div class="icon-content">
									<h5 class="dz-title">Llamanos</h5>
									<p><a href="tel:+50238363962" class="text-body">+502 3836 3962</a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInUp;">
							<div class="icon-bx-wraper style-1">
								<div class="icon-bx bg-secondary">
									<span class="icon-cell">
										<i class="fa-regular fa-envelope"></i>
									</span>
								</div>
								<div class="icon-content">
									<h5 class="dz-title">Escribenos</h5>
									<p><a href="mailto:info@cemepuertadelsol.com" class="text-body">info@cemepuertadelsol.com</a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.8s" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.8s; animation-name: fadeInUp;">
							<div class="icon-bx-wraper style-1">
								<div class="icon-bx bg-secondary">
									<span class="icon-cell">
										<i class="fa-regular fa-clock"></i>
									</span>
								</div>
								<div class="icon-content">
									<h5 class="dz-title">Horario</h5>
									<p>Lun - Vie: 7:00 - 17:00</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<div class="footer-top">
    <div class="container">
        <div class="row">
			<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
						<div class="widget widget_about me-2">
							<div class="footer-logo logo-white">
								<a href="#"><img src="https://www.cemedpuertadelsol.com/uploads/hospital_front/1752963625-1580131753687c1a2989e76!logo-web.png" alt=""></a> 
							</div>
							<p>En nuestro centro médico, la salud va de la mano con el trato humano. Cada paciente recibe atención personalizada, basada en respeto, empatía y profesionalismo.</p>
							
						</div>
					</div>
			<div class="col-md-3 col-sm-6">
				<div class="widget widget_services">
							<h2 class="footer-title">Nuestros Servicios </h2>
							<ul class="list-hover1">
								<li><a href="service-detail.html"><span>Medicina General</span></a></li>
								<li><a href="service-detail.html"><span>Pediatría</span></a></li>
								<li><a href="service-detail.html"><span>Ginecología</span></a></li>
								<li><a href="service-detail.html"><span>Cirugías</span></a></li>
								<li><a href="service-detail.html"><span>Emergencias 24/7</span></a></li>
							</ul>   
						</div>
				</div>
			
            <div class="col-md-2 col-sm-6">
				<div class="widget widget_services">
                <h2 class="footer-title">Links de Interes</h2>
                <ul class="list-hover1">
                    <?php
                    foreach ($footer_menus as $footer_menu_key => $footer_menu_value) {
                        $cls_menu_dropdown = "";
                        if (!empty($footer_menu_value['submenus'])) {
                            $cls_menu_dropdown = "dropdown";
                        }
                        ?>
                        <li class="<?php echo $cls_menu_dropdown; ?>">
                            <?php
                            $top_new_tab = '';
                            $url = '#';
                            if ($footer_menu_value['open_new_tab']) {
                                $top_new_tab = "target='_blank'";
                            }
                            if ($footer_menu_value['ext_url']) {
                                $url = $footer_menu_value['ext_url_link'];
                            } else {
                                $url = site_url($footer_menu_value['page_url']);
                            }
                            ?>
                            <a href="<?php echo $url; ?>" <?php echo $top_new_tab; ?>><?php echo $footer_menu_value['menu']; ?></a>
                            <?php
                            ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div><!--./col-md-3-->
				</div>
			<div class="col-md-3 col-sm-6">
				<div class="widget widget_services">
							<h2 class="footer-title">Politicas y Condiciones </h2>
							<ul class="list-hover1">
								<li><a href="service-detail.html"><span>Política de Privacidad</span></a></li>
								<li><a href="service-detail.html"><span>Términos y Condiciones</span></a></li>
								<li><a href="service-detail.html"><span>Politicas de Cookies</span></a></li>
								<li><a href="service-detail.html"><span>Protección de datos</span></a></li>
							</ul>   
						</div>
				</div>
			
			
            
            <div class="col-md-3 col-sm-6">
                <a class="twitter-timeline" data-tweet-limit="1" href="#"></a>
            </div><!--./col-md-3-->   
        </div><!--./row-->
    </div><!--./container-->
		</div>
    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <p><?php echo $front_setting->footer_text; ?></p>
                </div>
				<div class="col-md-12 col-sm-12">
				<div class="widget widget_services">
							<ul class="social">
                    <?php $this->view('/themes/turquoise_blue/social_media'); ?>        
                </ul>
						</div>
				</div>
				
            </div><!--./row-->
        </div><!--./container-->
    </div><!--./copy-right-->
</footer>