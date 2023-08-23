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
					<a href="<?php echo base_url(); ?>admin/dashboard">
					<i class="fa fa-dashboard"></i>
					<span><?php echo get_phrase('tableau de bord'); ?></span>
					</a>                                       
				</li>
				<li class="<?php if ($page_name == 'manage_doctor') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/doctor">
					<i class="fa fa-paint-brush"></i>
					<span><?php echo get_phrase('docteur'); ?></span>					
					</a>				   
				</li>								
				<li class="<?php if ($page_name == 'manage_patient') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/patient">
					<i class="fa fa-map-signs"></i>
					<span><?php echo get_phrase('patient'); ?></span>					
					</a>				   
				</li>							
				<li class="<?php if ($page_name == 'manage_nurse') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/nurse">
					<i class="fa fa-magic"></i>
					<span><?php echo get_phrase('infirmière'); ?></span>					
					</a>				   
				</li>						
				<li class="<?php if ($page_name == 'manage_pharmacist') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/pharmacist">
					<i class="fa fa-bell"></i>
					<span><?php echo get_phrase('pharmacien'); ?></span>					
					</a>				   
				</li>					
				<li class="<?php if ($page_name == 'manage_laboratorist') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/laboratorist">
					<i class="fa fa-bar-chart-o"></i>
					<span><?php echo get_phrase('laborantin'); ?></span>					
					</a>				   
				</li>					
				<!--<li class="</?php if ($page_name == 'manage_accountant') echo 'active'; ?> ">
					<a href="</?php echo base_url(); ?>admin/accountant">
					<i class="fa fa-paperclip"></i>
					<span></?php echo get_phrase('comptable'); ?></span>					
					</a>				   
				</li>-->
				<li class="<?php if ($page_name == 'manage_receptionist') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/receptionist">
					<i class="fa fa-check"></i>
					<span><?php echo get_phrase('receptionniste'); ?></span>					
					</a>				   
				</li>
				<!--<li class="has-children </?php if ($page_name == 'system_settings' || $page_name == 'manage_language' ||
                            $page_name == 'sms_settings' || $page_name == 'manage_slider' || $page_name == 'manage_openig_hours' || $page_name == 'manage_services') echo 'open active';?> ">
					<a href="#"><i class="fa fa-hospital-o" aria-hidden="true"></i> <span></?php echo get_phrase('actes médicaux'); ?></span><i class="fa fa-angle-right arrow"></i></a>
					<ul class="child-nav">					
						<li class="</?php if ($page_name == 'system_settings') echo 'active'; ?> ">
							<a href="</?php echo base_url(); ?>admin/actes">
							<i class="fa fa-plus-circle" aria-hidden="true"></i>
							<span></?php echo get_phrase('nouvel-acte-médical'); ?></span>					
							</a>				   
						</li>						
						<!-<li class="</?php if ($page_name == 'manage_language') echo 'active'; ?> ">
							<a href="</?php echo base_url(); ?>admin/manage_language">
							<i class="fa fa-camera"></i>
							<span></?php echo get_phrase('paramétre de langue'); ?></span>					
							</a>				   
						</li>
						<li class="</?php if ($page_name == 'manage_slider') echo 'active'; ?> ">
							<a href="</?php echo base_url(); ?>admin/slider">
							<i class="fa fa-camera"></i>
							<span></?php echo get_phrase('paramétre de slider'); ?></span>					
							</a>				   
						</li>
						<li class="</?php if ($page_name == 'manage_openig_hours') echo 'active'; ?> ">
							<a href="</?php echo base_url(); ?>admin/openig_hours">
							<i class="fa fa-bullseye"></i>
							<span></?php echo get_phrase("heures d'ouverture"); ?></span>					
							</a>				   
						</li>
						<li class="</?php if ($page_name == 'manage_services') echo 'active'; ?> ">
							<a href="</?php echo base_url(); ?>admin/services">
							<i class="fa fa-bullseye"></i>
							<span></?php echo get_phrase('services'); ?></span>					
							</a>				   
						</li>
					</ul>
				</li>-->
					
				<li class="has-children <?php if ($page_name == 'show_payment_history'   || $page_name == 'show_bed_allotment'
                            || $page_name == 'show_blood_bank'      || $page_name == 'show_blood_donor'
                            || $page_name == 'show_medicine'        || $page_name == 'show_operation_report' 
                            || $page_name == 'show_birth_report'    || $page_name == 'show_death_report') 
                        echo 'open active';?>">
					<a href="#"><i class="fa fa-bars"></i> <span><?php echo get_phrase("hospitalisation"); ?></span> <i class="fa fa-angle-right arrow"></i></a>
					<ul class="child-nav">
					  <li class="<?php if ($page_name == 'show_payment_history') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/payment_history">
							<i class="fa fa-bell-o"></i>
							<span><?php echo get_phrase('journal-paiements'); ?></span>			
							</a>				   
						</li>
						<li class="<?php if ($page_name == 'show_bed_allotment') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/bed_allotment">
							<i class="fa fa-info-circle"></i>
							<span><?php echo get_phrase('attribution de lit'); ?></span>	
							</a>				   
						</li>
						<li class="<?php if ($page_name == 'show_blood_bank') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/blood_bank">
							<i class="fa fa-pencil"></i>
							<span><?php echo get_phrase('banque du sang'); ?></span>					
							</a>				   
						</li>						
						<li class="<?php if ($page_name == 'show_blood_donor') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/blood_donor">
							<i class="fa fa-bullseye"></i>
							<span><?php echo get_phrase('don du sang'); ?></span>					
							</a>				   
						</li>						
						<li class="<?php if ($page_name == 'show_medicine') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/medicine">
							<i class="fa fa-bug"></i>
							<span><?php echo get_phrase('médicament'); ?></span>					
							</a>				   
						</li>												
						<li class="<?php if ($page_name == 'show_operation_report') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/operation_report">
							<i class="fa fa-plane"></i>
							<span><?php echo get_phrase("rapport de l'operation"); ?></span>					
							</a>				   
						</li>												
						<li class="<?php if ($page_name == 'show_birth_report') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/birth_report">
							<i class="fa fa-hand-o-right"></i>
							<span><?php echo get_phrase('rapport de naissance'); ?></span>				
							</a>				   
						</li>									
						<li class="<?php if ($page_name == 'show_death_report') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/death_report">
							<i class="fa fa-bug"></i>
							<span><?php echo get_phrase('rapport de décés'); ?></span>					
							</a>				   
						</li>
					</ul>
				</li>				
				<!--<li class="</?php if ($page_name == 'manage_notice') echo 'active'; ?> ">
					<a href="</?php echo base_url(); ?>admin/notice">
					<i class="fa fa-envelope"></i>
					<span></?php echo get_phrase("tableau d'affichage"); ?></span>					
					</a>				   
				</li>-->
				<!--debut de tables-->
                 <li class="has-children <?php if ($page_name == 'system_settings' || $page_name == 'manage_language' ||
                            $page_name == 'sms_settings' || $page_name == 'manage_slider' || $page_name == 'manage_openig_hours' || $page_name == 'manage_services') echo 'open active';?> ">
					<a href="#"><i class="fa fa-table" aria-hidden="true"></i> <span><?php echo get_phrase('tables'); ?></span><i class="fa fa-angle-right arrow"></i></a>
					<ul class="child-nav">					
						<li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/designation">
							<i class="fa fa-file-text-o" aria-hidden="true"></i>
							<span><?php echo get_phrase('désignation'); ?></span>					
							</a>				   
						</li>
						<li class="<?php if ($page_name == 'manage_department') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/department">
					<i class="fa fa-file-text"></i>
					<span><?php echo get_phrase('département'); ?></span>					
					</a>				   
				 </li>
				 <li class="<?php if ($page_name == 'manage_services') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/services">
							<i class="fa fa-bullseye"></i>
							<span><?php echo get_phrase('services'); ?></span>		
							</a>				   
				 </li>
					</ul>
				</li>
                       <!--fin de tables-->
				<li class="has-children <?php if ($page_name == 'system_settings' || $page_name == 'manage_language' ||
                            $page_name == 'sms_settings' || $page_name == 'manage_slider' || $page_name == 'manage_openig_hours' || $page_name == 'manage_services') echo 'open active';?> ">
					<a href="#"><i class="fa fa-key"></i> <span><?php echo get_phrase('paramétres'); ?></span> <i class="fa fa-angle-right arrow"></i></a>
					<ul class="child-nav">					
						<li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/system_settings">
							<i class="fa fa-signal"></i>
							<span><?php echo get_phrase('paramétre du système'); ?></span>					
							</a>				   
						</li>						
						<li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/manage_language">
							<i class="fa fa-camera"></i>
							<span><?php echo get_phrase('paramétre de langue'); ?></span>					
							</a>				   
						</li>
						<!--<li class="</?php if ($page_name == 'manage_slider') echo 'active'; ?> ">
							<a href="</?php echo base_url(); ?>admin/slider">
							<i class="fa fa-camera"></i>
							<span></?php echo get_phrase('paramétre de slider'); ?></span>					
							</a>				   
						</li>-->
						<li class="<?php if ($page_name == 'manage_openig_hours') echo 'active'; ?> ">
							<a href="<?php echo base_url(); ?>admin/openig_hours">
							<i class="fa fa-bullseye"></i>
							<span><?php echo get_phrase("heures d'ouverture"); ?></span>					
							</a>				   
						</li>
						
					</ul>
				</li>
			      
				<li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
					<a href="<?php echo base_url(); ?>admin/manage_profile">
					<i class="fa fa-pencil"></i>
					<span><?php echo get_phrase('compte'); ?></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php 
$output .= ob_get_clean();
echo $output;	