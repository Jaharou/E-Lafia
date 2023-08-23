<?php
/* 	
 * 	Tamplate: Manage Patient
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel">
		<a href="<?php echo base_url(); ?>PatientPrint/patient_fpdf" class="btn btn-primary pull-left">
				<?php echo get_phrase('exporter en pdf'); ?>
			</a>
			<button onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_patient/');" 
					class="btn btn-primary pull-right">
						<?php echo get_phrase('ajouter un patient'); ?>
				</button>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>							
								<th><?php echo get_phrase('photo');?></th>
								<th><?php echo get_phrase('nom');?></th>
								<th><?php echo get_phrase('email');?></th>
								<th><?php echo get_phrase('adresse');?></th>
								<th><?php echo get_phrase('téléphone');?></th>
								<th><?php echo get_phrase('sexe');?></th>
								<th><?php echo get_phrase('date de naissance');?></th>
								<th><?php echo get_phrase('age');?></th>
								<th><?php echo get_phrase('groupe sanguin');?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						    <tbody>							
								<?php foreach ($patient_info as $row): ?>   
									<tr>
										<td><img src="<?php echo $this->crud_model->get_image_url('patient' , $row['patient_id']);?>" class="img-circle" width="40px" height="40px"></td>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['email']?></td>
										<td><?php echo $row['address']?></td>
										<td><?php echo $row['phone']?></td>
										<td><?php echo $row['sex']?></td>
										<td><?php echo date('d/m/Y', $row['birth_date']); ?></td>
										<td><?php echo $row['age']?></td>
										<td><?php echo $row['blood_group']?></td>
										<td>
											<a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_patient/<?php echo $row['patient_id']?>');" 
													class="btn btn-default btn-sm btn-icon icon-left">
														<i class="fa fa-user-md"></i>
														Modifier
												</a>                          
												<a class="btn btn-danger btn-sm btn-icon icon-left" href="#" onclick="confirm_modal('<?php echo base_url(); ?>doctor/patient/delete/<?php echo $row['patient_id']; ?>');">
													<i class="fa fa-user-md"></i>
													Supprimer
												</a> 
										</td>
									</tr>
								<?php endforeach; ?>
						  </tbody>
						</table>				
			</div>				
		</div>				
	</div>				
</div>
<?php 
$output .= ob_get_clean();
echo $output;