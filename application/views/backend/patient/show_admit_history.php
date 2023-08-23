<?php
/* 	
 * 	Tamplate: Show Admit History
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
<?php
$patient_id         = $this->session->userdata('login_user_id');
$admit_history_info = $this->db->get_where('bed_allotment', array('patient_id' => $patient_id))->result_array();
?>
		<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th><?php echo get_phrase('numéro de lit');?></th>
					<th><?php echo get_phrase('type de lit');?></th>
					<th><?php echo get_phrase("heure d'attribution");?></th>
					<th><?php echo get_phrase('heure de décharge');?></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($admit_history_info as $row): ?>   
					<tr>
						<td>
							<?php $bed_number = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->bed_number;
								echo $bed_number;?>
						</td>
						<td>
							<?php $type = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->type;
								echo $type;?>
						</td>
						<td><?php echo date("m/d/Y", $row['allotment_timestamp']); ?></td>
						<td><?php echo date("m/d/Y", $row['discharge_timestamp']); ?></td>
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