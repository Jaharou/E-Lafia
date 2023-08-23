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
					<a href="<?php echo base_url(); ?>nurse">
						<i class="fa fa-dashboard"></i>
						<span><?php echo get_phrase('tableau de bord'); ?></span>
					</a>                                       
				</li>
				<li class="<?php if ($page_name == 'manage_patient') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>nurse/patient">
						<i class="fa fa-file-text"></i>
						<span><?php echo get_phrase('patient'); ?></span>
					</a>
				</li>
				<li class="has-children <?php if ($page_name == 'manage_bed' || $page_name == 'manage_bed_allotment') echo 'open active'; ?> ">
					<a href="#">
						<i class="fa fa-hdd-o"></i>
						<span><?php echo get_phrase('lit'); ?></span>
						<i class="fa fa-angle-right arrow"></i>
					</a>
					<ul class="child-nav">
						<li class="<?php if ($page_name == 'manage_bed') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>nurse/bed">
								<i class="fa fa-hdd-o"></i>
								<span><?php echo get_phrase('gestion de lit'); ?></span>
							</a>
						</li>
						<li class="<?php if ($page_name == 'manage_bed_allotment') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>nurse/bed_allotment">
								<i class="fa fa-wrench"></i>
								<span><?php echo get_phrase('attribution de lit'); ?></span>
							</a>
						</li>
					</ul>
				</li>
				 <li class="has-children <?php if ($page_name == 'manage_blood_bank' || $page_name == 'manage_blood_donor') echo 'open active'; ?> ">
					<a href="#">
						<i class="fa fa-tint"></i>
						<span><?php echo get_phrase('banque du sang'); ?></span>
						<i class="fa fa-angle-right arrow"></i>
					</a>
					<ul class="child-nav">
						<li class="<?php if ($page_name == 'manage_blood_bank') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>nurse/blood_bank">
								<i class="fa fa-tint"></i>
								<span><?php echo get_phrase('gestion de banque du sang'); ?></span>
							</a>
						</li>
						<li class="<?php if ($page_name == 'manage_blood_donor') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>nurse/blood_donor">
								<i class="fa fa-user"></i>
								<span><?php echo get_phrase('donneur de sang'); ?></span>
							</a>
						</li>
					</ul>
				</li>
				  <li class="<?php if ($page_name == 'manage_report') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>nurse/report">
						<i class="fa fa-hospital-o"></i>
						<span><?php echo get_phrase('rapport'); ?></span>
					</a>
				</li>				
				<li class="<?php if ($page_name == 'edit_profile') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>nurse/profile">
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