<?php
/* 	
 * 	Tamplate: Show Blood Bank
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
								<th><?php echo get_phrase('groupe sanguin'); ?></th>
								<th><?php echo get_phrase('statut'); ?></th>	
							</tr>
						</thead>
						    <tbody>								
								<?php foreach ($blood_bank_info as $row): ?>   
									<tr>
										<td><?php echo $row['blood_group'] ?></td>
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