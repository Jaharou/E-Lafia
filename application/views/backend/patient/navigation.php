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
				<li>  <div class="sui-normal">
							<a href="#" class="user-link">
								<img src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>" alt="" class="img-circle" style="height:44px;">

								<span><?php echo get_phrase('Bienvenue'); ?>,</span>
								<strong><?php
									echo $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type') . '_id' =>
										$this->session->userdata('login_user_id')))->row()->name;
									?>
								</strong>
							</a>
						</div>		
				</li>
				<li class="<?php if ($page_name == 'dashboard') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>patient">
						<i class="fa fa-dashboard"></i>
						<span><?php echo get_phrase('tableau de bord'); ?></span>
					</a>                                       
				</li>
				<li class="has-children <?php if ($page_name == 'show_appointment' || $page_name == 'show_pending_appointment') echo 'open active'; ?> ">
					<a href="#">
						 <i class="fa fa-edit"></i>
						<span><?php echo get_phrase('rendez-vous'); ?></span>
						<i class="fa fa-angle-right arrow"></i>
					</a>
					<ul class="child-nav">
						<li class="<?php if ($page_name == 'show_appointment') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>patient/appointment">
								<i class="fa fa-hdd-o"></i>
								<span><?php echo get_phrase('liste de rendez-vous'); ?></span>
							</a>
						</li>
						<li class="<?php if ($page_name == 'show_pending_appointment') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>patient/appointment_pending">
								<i class="fa fa-wrench"></i>
								<span><?php echo get_phrase('prendre un rendez-vous'); ?></span>
							</a>
						</li>
					</ul>
				</li>
				  <li class="<?php if ($page_name == 'show_all_prescription') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>patient/prescription">
						<i class="fa fa-hospital-o"></i>
						<span><?php echo get_phrase('prescription'); ?></span>
					</a>
				</li>				
				<li class="<?php if ($page_name == 'show_doctor') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>patient/doctor">
						<i class="fa fa-user"></i>
						<span><?php echo get_phrase('docteur'); ?></span>
					</a>
				</li>
				<li class="<?php if ($page_name == 'show_blood_bank') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>patient/blood_bank">
						<i class="fa fa-tint"></i>
						<span><?php echo get_phrase('banque du sang'); ?></span>
					</a>
				</li>
				
				<li class="<?php if ($page_name == 'show_admit_history') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>patient/admit_history">
						<i class="fa fa-hdd-o"></i>
						<span><?php echo get_phrase("historique d'admettre"); ?></span>
					</a>
				</li>
				
				<li class="<?php if ($page_name == 'show_operation_history') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>patient/operation_history">
						<i class="fa fa-hospital-o"></i>
						<span><?php echo get_phrase("historique de l'opération"); ?></span>
					</a>
				</li>
				
				<li class="<?php if ($page_name == 'show_all_invoice') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>patient/invoice">
						<i class="fa fa-credit-card"></i>
						<span><?php echo get_phrase('facture'); ?></span>
					</a>
				</li>
				<li class="<?php if ($page_name == 'edit_profile') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>patient/profile">
						<i class="fa fa-user"></i>
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