<?php
/* 	
 * 	Tamplate: Manage Apointment
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
		<button onclick="showAjaxModal('<?php echo base_url();?>modal/popup/apply_for_appointment');" 
			class="btn btn-primary pull-right">
				<?php echo get_phrase('postuler pour un rendez-vous'); ?>
		</button>
		<div style="clear:both;"></div>		
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
								<?php foreach ($appointment_info as $row): ?>   
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
								  <?php endforeach ?>
						  </tbody>
						</table>
							</div>				
					</div>				
				</div>				
			</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">		
				<div class="panel-body p-20">
						<table id="example-two" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>		
								<th><?php echo get_phrase('titre');?></th>
								<th><?php echo get_phrase('début');?></th>
							</tr>
						</thead>
						    <tbody>							
								 <?php
								foreach ($appointment_info as $row):
								?>
								<tr>
									<td><?php  $name = $this->db->get_where('doctor' , 
                                                array('doctor_id' => $row['doctor_id'] ))->row()->name;
                                            echo $name;?></td>
									<td><?php echo date('Y', $row['timestamp']); ?>
                                        <?php echo date('m', $row['timestamp']) - 1; ?>
                                        <?php echo date('d', $row['timestamp']); ?>
                                        <?php echo date('H', $row['timestamp']); ?></td>									
								</tr>
								  <?php endforeach ?>
						  </tbody>
						</table>						
			</div>				
		</div>				
	</div>				
</div>
<?php 
$output .= ob_get_clean();
echo $output;