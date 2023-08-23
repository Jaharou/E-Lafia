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
				 <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>accountant">
						<i class="fa fa-desktop"></i>
						<span><?php echo get_phrase('tableau de bord'); ?></span>
					</a>
				</li>
				
				<li class="has-children <?php if ($page_name == 'add_invoice' || $page_name == 'manage_invoice') echo 'open active'; ?> ">
					<a href="#">
						<i class="fa fa-list-alt"></i>
						<span><?php echo get_phrase('facture'); ?></span>
						<i class="fa fa-angle-right arrow"></i>
					</a>
					<ul class="child-nav">
						<li class="<?php if ($page_name == 'add_invoice') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>accountant/invoice_add">
								<i class="fa fa-plus"></i>
								<span><?php echo get_phrase('ajouter une facture'); ?></span>
							</a>
						</li>
						<li class="<?php if ($page_name == 'manage_invoice') echo 'active'; ?>">
							<a href="<?php echo base_url(); ?>accountant/invoice_manage">
								<i class="fa fa-align-justify"></i>
								<span><?php echo get_phrase('gérer la facture'); ?></span>
							</a>
						</li>
					</ul>
				</li>				
				<li class="<?php if ($page_name == 'edit_profile') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>accountant/profile">
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