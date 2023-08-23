<?php
/* 	
 * 	Tamplate: Show Medicine
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
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>							
								<th><?php echo get_phrase('nom'); ?></th>
								<th><?php echo get_phrase('catégorie de médicament'); ?></th>
								<th><?php echo get_phrase('DCI'); ?></th>
								<th><?php echo get_phrase('dosage'); ?></th>
								<th><?php echo get_phrase('forme'); ?></th>
								<th><?php echo get_phrase('prix'); ?></th>
								
								<th><?php echo get_phrase('statut'); ?></th>
							</tr>
						</thead>
						    <tbody>								
								<?php foreach ($medicine_info as $row): ?>   
									<tr>
										<td><?php echo $row['name'] ?></td>
										<td>
											<?php $name_categorie = $this->db->get_where('medicine_category' , array('medicine_category_id' => $row['medicine_category_id'] ))->row()->name_categorie;
												echo $name_categorie;?>
										</td>
										<td><?php echo $row['dci'] ?></td>
									    <td><?php echo $row['dosage'] ?></td>
									    <td><?php echo $row['forme'] ?></td>
										<td><?php echo $row['price'] ?></td>
										<td><?php echo $row['status'] ?></td>
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