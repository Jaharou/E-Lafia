<?php
/* 	
 * 	Tamplate: Show Pending Apoinment
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
								<th><?php echo get_phrase('date');?></th>
								<th><?php echo get_phrase('patient');?></th>
								<th><?php echo get_phrase('docteur');?></th>
							</tr>
						</thead>
						    <tbody>							
									 <?php foreach ($pending_appointment_info as $row): ?>   
									<tr>
										<td><?php echo date("d M, Y -  H:i", $row['timestamp']); ?></td>
										<td>
											<?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
												echo $name;?>
										</td>
										<td>
											<?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;
												echo $name;?>
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