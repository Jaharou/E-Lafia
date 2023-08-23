<?php
/* 	
 * 	Tamplate: Manage Prescription
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
    <div class="col-md-12"><h5>Liste des ordonnances</h5>
		<div class="panel">
		<?php if($menu_check == 'from_prescription') : ?>
		<a href="<?php echo base_url(); ?>doctor/prescription_crud/add" class="btn bg-black btn-wide pull-right"> <i class="fa fa-paperclip"></i>
				<?php echo get_phrase('ajouter'); ?>
			</a>
				<div style="clear:both;"></div>	
			<?php endif ;?>				
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							    <th><?php echo get_phrase('code');?></th>
							    <th><?php echo get_phrase('date');?></th>
								<th><?php echo get_phrase('patient');?></th>
								<th><?php echo get_phrase('médicament');?></th>
								<th><?php echo get_phrase('note');?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						<tbody>							
						<?php foreach ( $prescription_info as $row ): ?>  
							 <tr>
							  <td><?php echo $row['prescription_id']; ?></td>
						<td><?php echo $row['date_ordo']; ?></td>
							  <td><?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
								  echo $name; ?>
							</td>
							  
				 <td><?php
				    $medicine_query = $this->db->get_where('medicine', array('medicine_id' => $row['medicine_id']));
				    
				    if ($medicine_query->num_rows() > 0) {
				        $medicine = $medicine_query->row();
				        $name = $medicine->name;
				        echo $name;
				    } else {
				        echo "médicament non trouvé";
				    }
				    ?></td>

                      <td><?php echo $row['note'];?></td>

								<td><?php if($menu_check == 'from_prescription'): ?><a href="<?php echo base_url(); ?>doctor/prescription_crud/edit/<?php echo $row['prescription_id']; ?>/<?php echo $menu_check; ?>" class="btn btn-success btn-rounded icon-only">
								<i class="fa fa-pencil"></i>
								</a> 
								<?php endif; ?>
							<a class="btn btn-primary btn-rounded icon-only btn-animated" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/show_prescription/<?php echo $row['prescription_id']?>');"><i class="fa fa-bars"></i></a> 

						<a class="btn btn-warning btn-rounded icon-only btn-animated" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/manage_diagnosis_report/<?php echo $row['prescription_id']?>/<?php echo $row['doctor_id']; ?>');"><i class="fa fa-bars"></i>	 </a> 
								<?php if($menu_check == 'from_prescription'): ?>
							<a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>doctor/prescription/delete/<?php echo $row['prescription_id']; ?>/from_prescription');">
							  <i class="fa fa-trash-o"></i>
							 </a> 		
							<?php endif; ?>
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