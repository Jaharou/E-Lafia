<?php
/* 	
 * 	Tamplate: Manage Blood Donor
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
		<a href="<?php echo base_url(); ?>BloodDonorPrint/dhorla_fpdf" class="btn btn-primary pull-left">
				<?php echo get_phrase('exporter en pdf'); ?>
			</a>
			<button onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_blood_donor/');" 
					class="btn btn-primary pull-right">
						<?php echo get_phrase('ajouter un donneur de sang'); ?>
				</button>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th><?php echo get_phrase('nom'); ?></th>
								<th><?php echo get_phrase('age'); ?></th>
								<th><?php echo get_phrase('sexe'); ?></th>
								<th><?php echo get_phrase('groupe sanguin'); ?></th>
								<th><?php echo get_phrase('date du dernier don'); ?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						    <tbody>		
								<?php foreach ($blood_donor_info as $row): ?>   
									<tr>
										<td><?php echo $row['name'] ?></td>
										<td><?php echo $row['age'] ?></td>
										<td><?php echo $row['sex'] ?></td>
										<td><?php echo $row['blood_group'] ?></td>
										<td><?php echo date("m/d/Y", $row['last_donation_timestamp']) ?></td>
										<td>
											<a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_blood_donor/<?php echo $row['blood_donor_id']?>');" 
												class="btn btn-default btn-sm btn-icon icon-left">													
													<i class="fa fa-pencil"></i>
													Modifier
											</a>
											<a class="btn btn-danger btn-sm btn-icon icon-left" href="#" onclick="confirm_modal('<?php echo base_url(); ?>nurse/blood_donor/delete/<?php echo $row['blood_donor_id']; ?>');">
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