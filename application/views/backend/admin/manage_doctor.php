<?php
/* 	
 * 	Tamplate: Manage Doctor
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
			<a href="<?php echo base_url(); ?>admin/doctor_crud/add" class="btn btn-info btn-wide pull-right"> <i class="fa fa-plus"></i>
				<?php echo get_phrase('ajouter un médecin'); ?>
			</a>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th><?php echo get_phrase('image');?></th>
								<th><?php echo get_phrase('nom');?></th>							
								<th><?php echo get_phrase('téléphone');?></th>
								<th><?php echo get_phrase('département');?></th>
								<th><?php echo get_phrase('profil');?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						    <tbody>
								 <?php foreach ($doctor_info as $row): ?>   
										<tr>																	
											<td>
												<center>
												<img src="<?php echo $this->crud_model->get_image_url('doctor' , $row['doctor_id']);?>" 
													 class="img-circle" width="40px" height="40px">
												</center>											
											</td>
											<td><?php echo $row['name']?></td>
											<td><?php echo $row['phone']?></td>
											<td>
												<?php $name = $this->db->get_where('department' , array('department_id' => $row['department_id'] ))->row()->name;
													echo $name;?>
											</td>
											<td><?php echo $row['profile']?></td>
											<td>
												<center>
												<a class="btn btn-primary btn-rounded icon-only btn-animated" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/view_doctor/<?php echo $row['doctor_id']?>');">
													<i class="fa fa-bars"></i>			
												</a> 
												<a href="<?php echo base_url(); ?>admin/doctor_crud/edit/<?php echo $row['doctor_id']; ?>" class="btn btn-success btn-rounded icon-only">
														<i class="fa fa-pencil"></i>
												</a> 
												
												<a class="btn btn-warning btn-rounded icon-only" href="<?php echo base_url(); ?>DoctorPrint/doctor_fdf/<?php echo $row['doctor_id']; ?>">
													<i class="fa fa-print"></i>			
												</a>                          
												<a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/doctor/delete/<?php echo $row['doctor_id']; ?>');">
													<i class="fa fa-trash-o"></i>
												</a> 
												</center>
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