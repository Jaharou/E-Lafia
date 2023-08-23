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
			<a href="<?php echo base_url(); ?>laboratorist/blood_donor_crud/add" class="btn bg-black btn-wide pull-right"> <i class="fa fa-paperclip"></i>
				<?php echo get_phrase('ajouter un donneur de sang'); ?>
			</a>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th><?php echo get_phrase('nom');?></th>
								<th><?php echo get_phrase('groupe sanguin'); ?></th>
								<th><?php echo get_phrase('age');?></th>
								<th><?php echo get_phrase('date du dernier don'); ?></th>
								<th><?php echo get_phrase('téléphone');?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						    <tbody>							
								<?php foreach ($blood_donor_info as $row): ?>   
									<tr>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['blood_group'] ?></td>
										<td><?php echo $row['age'] ?></td>
										<td><?php echo date("m/d/Y", $row['last_donation_timestamp']) ?></td>
										<td><?php echo $row['phone']?></td>
										<td>
											<a href="<?php echo base_url(); ?>laboratorist/blood_donor_crud/edit/<?php echo $row['blood_donor_id']; ?>" class="btn btn-success btn-rounded icon-only">
														<i class="fa fa-pencil"></i>
												</a> 
												
												<a class="btn btn-warning btn-rounded icon-only" href="<?php echo base_url(); ?>BloodDonorPrint/dhorla_fpdf/<?php echo $row['blood_donor_id']; ?>">
													<i class="fa fa-print"></i>			
												</a>                          
												<a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>laboratorist/blood_donor/delete/<?php echo $row['blood_donor_id']; ?>');">
													<i class="fa fa-trash-o"></i>
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