<?php
/* 	
* 	Tamplate: Navigation
* 	@author : Raju Ahmed
* 	Date	: 20 August, 2021
*/
if ( ! defined( 'BASEPATH' ) ) {
exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<div class="left-sidebar bg-black-300 box-shadow ">
	<div class="sidebar-content">
		<div class="sidebar-nav">
			<ul class="side-nav color-gray">
				<li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>doctor">
					<i class="fa fa-dashboard"></i>
					<span><?php echo get_phrase('tableau de bord'); ?></span>
					</a>                                       
				</li>
				<li class="has-children <?php if ($page_name == 'manage_appointment' || $page_name == 'manage_requested_appointment') 
            echo 'open active';?>">
					<a href="#"><i class="fa fa-bars"></i> <span><?php echo get_phrase('rendez-vous'); ?></span> <i class="fa fa-angle-right arrow"></i></a>
					<ul class="child-nav">					
						<li class="<?php if ($page_name == 'manage_appointment') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>doctor/appointment">
							<i class="fa fa-signal"></i>
							<span><?php echo get_phrase('gestion-de-rendez-vous'); ?></span>					
							</a>				   
						</li>											
						<li class="<?php if ($page_name == 'manage_requested_appointment') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>doctor/appointment_requested">
							<i class="fa fa-signal"></i>
							<span><?php echo get_phrase('liste-de-rendez-vous'); ?></span>					
							</a>				   
						</li>
					</ul>
				</li>
				<li class="<?php if ($page_name == 'manage_prescription' && $menu_check == 'from_prescription') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>doctor/prescription">
					<i class="fa fa-file-text"></i>
					<span><?php echo get_phrase('ordonnance'); ?></span>					
					</a>				   
				</li>				
				<li class="<?php if ($page_name == 'manage_patient' ||
            ($page_name == 'manage_prescription' && $menu_check == 'from_patient')) echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>doctor/bed_allotment">
					<i class="fa fa-file-text"></i>
					<span><?php echo get_phrase('attribution de lit'); ?></span>					
					</a>				   
				</li>								
				<li class="<?php if ($page_name == 'show_blood_bank') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>doctor/blood_bank">
					<i class="fa fa-file-text"></i>
					<span><?php echo get_phrase('banque du sang'); ?></span>					
					</a>				   
				</li>												
				<li class="<?php if ($page_name == 'manage_report') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>doctor/report">
					<i class="fa fa-file-text"></i>
					<span><?php echo get_phrase('rapport'); ?></span>					
					</a>				   
				</li>																			
				<li class="<?php if ($page_name == 'edit_profile') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>doctor/profile">
					<i class="fa fa-file-text"></i>
					<span><?php echo get_phrase('profil'); ?></span>					
					</a>				   
				</li>
			</ul>
		</div>
	</div>
</div>
<?php 
$output .= ob_get_clean();
echo $output;