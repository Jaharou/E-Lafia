<?php
/* 	
 * 	Tamplate: Manage Bed Allotment
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
			<button onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_bed_allotment/');" 
					class="btn btn-primary pull-right">
						<?php echo get_phrase('ajouter une attribution de lit'); ?>
				</button>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>							
								<th><?php echo get_phrase('numéro de lit');?></th>
								<th><?php echo get_phrase('type de lit');?></th>
								<th><?php echo get_phrase('patient');?></th>
								<th><?php echo get_phrase("heure d'attribution");?></th>
								<th><?php echo get_phrase('heure de décharge');?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						    <tbody>	
								<?php foreach ($bed_allotment_info as $row): ?>   
								<tr>
									<td>
										<?php $bed_number = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->bed_number;
											echo $bed_number;?>
									</td>
									<td>
										<?php $type = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->type;
											echo $type;?>
									</td>
									<td>
										<?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
											echo $name;?>
									</td>
									<td><?php echo date("m/d/Y", $row['allotment_timestamp']); ?></td>
									<td><?php echo date("m/d/Y", $row['discharge_timestamp']); ?></td>
									<td>
										<a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_bed_allotment/<?php echo $row['bed_allotment_id']?>');" 
											class="btn btn-success btn-rounded icon-only">
												<i class="fa fa-pencil"></i>
										</a>
										<a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>nurse/bed_allotment/delete/<?php echo $row['bed_allotment_id']; ?>');">
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