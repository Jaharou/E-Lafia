<?php
/* 	
 * 	Tamplate: Show doctor
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
								<th><?php echo get_phrase('image');?></th>
								<th><?php echo get_phrase('nom');?></th>
								<th><?php echo get_phrase('département');?></th>
							</tr>
						</thead>
						    <tbody>	 
									  <?php foreach ($doctor_info as $row): ?>   
									<tr>
										<td>
											<img src="<?php echo $this->crud_model->get_image_url('doctor' , $row['doctor_id']);?>" 
												 class="img-circle" width="40px" height="40px">
										</td>
										<td><?php echo $row['name']?></td>
										<td>
											<?php $name = $this->db->get_where('department' , array('department_id' => $row['department_id'] ))->row()->name;
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