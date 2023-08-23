<?php
/* 	
 * 	Tamplate: Manage Nurse
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
			<a href="<?php echo base_url(); ?>admin/nurse_crud/add" class="btn btn-info btn-wide pull-right"> <i class="fa fa-plus"></i>
				<?php echo get_phrase('ajouter une infirmière'); ?>
			</a>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>							
								<th><?php echo get_phrase('image');?></th>
								<th><?php echo get_phrase('nom');?></th>
								<th><?php echo get_phrase('email');?></th>
								<th><?php echo get_phrase('adresse');?></th>
								<th><?php echo get_phrase('téléphone');?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						    <tbody>							
								<?php foreach ($nurse_info as $row): ?>   
									<tr>
										<td><img src="<?php echo $this->crud_model->get_image_url('nurse' , $row['nurse_id']);?>" class="img-circle" width="40px" height="40px"></td>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['email']?></td>
										<td><?php echo $row['address']?></td>
										<td><?php echo $row['phone']?></td>
										<td>

										<a href="<?php echo base_url(); ?>admin/nurse_crud/edit/<?php echo $row['nurse_id']; ?>" class="btn btn-success btn-rounded icon-only">
														<i class="fa fa-pencil"></i>
												</a> 
												
												<a class="btn btn-warning btn-rounded icon-only" href="<?php echo base_url(); ?>NursePrint/nurse_fpdf/<?php echo $row['nurse_id']; ?>">
													<i class="fa fa-print"></i>			
												</a>                          
												<a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/nurse/delete/<?php echo $row['nurse_id']; ?>');">
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