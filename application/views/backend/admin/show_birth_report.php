<?php
/* 	
 * 	Tamplate: Show Birth Report
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
								<th><?php echo get_phrase('description'); ?></th>
								<th><?php echo get_phrase('date'); ?></th>
								<th><?php echo get_phrase('patient'); ?></th>
								<th><?php echo get_phrase('docteur'); ?></th>
							</tr>
						</thead>
						    <tbody>										
								<?php
								$report_info = $this->db->get_where('report', array('type' => 'birth'))->result_array();
								foreach ($report_info as $row): ?>   
									<tr>
										<td><?php echo $row['description'] ?></td>
										<td><?php echo date("m/d/Y", $row['timestamp']) ?></td>
										<td>
											<?php
											$name = $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name;
											echo $name;
											?>
										</td>
										<td>
											<?php
											$name = $this->db->get_where('doctor', array('doctor_id' => $row['doctor_id']))->row()->name;
											echo $name;
											?>
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