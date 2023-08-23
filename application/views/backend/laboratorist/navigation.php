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
				<li>
					 <div class="sui-normal">
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
					<a href="<?php echo base_url(); ?>">
						<i class="fa fa-dashboard"></i>
						<span><?php echo get_phrase('tableau de bord'); ?></span>
					</a>                                       
				</li>
				<li class="<?php if ($page_name == 'manage_blood_bank') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>laboratorist/blood_bank">
						<i class="fa fa-tint"></i>
						<span><?php echo get_phrase('banque du sang'); ?></span>
					</a>
				</li>
				
				<li class="<?php if ($page_name == 'manage_blood_donor') echo 'active'; ?>">
					<a href="<?php echo base_url(); ?>laboratorist/blood_donor">
						<i class="fa fa-user"></i>
						<span><?php echo get_phrase('donneur de sang'); ?></span>
					</a>
				</li>
				
				<li class="<?php if ($page_name == 'edit_profile') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>laboratorist/profile">
						<i class="fa fa-tint"></i>
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