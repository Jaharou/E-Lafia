<?php
/* 	
 * 	Tamplate: Manage Department
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
			<a href="<?php echo base_url(); ?>admin/department_crud/add" class="btn btn-info btn-wide pull-right"> <i class="fa fa-plus"></i>
				<?php echo get_phrase('ajouter un département'); ?>
			</a>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th><?php echo get_phrase('nom'); ?></th>
								<th><?php echo get_phrase('description'); ?></th>
								<th><?php echo get_phrase('options'); ?></th>
							</tr>
						</thead>
						    <tbody>
								 <?php foreach ($department_info as $row): ?>   
										<tr>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['description'] ?></td>
											<td>
												<a href="<?php echo base_url(); ?>admin/department_crud/edit/<?php echo $row['department_id']; ?>" 
													class="btn btn-default btn-sm btn-icon icon-left">
													<i class="fa fa-user-md"></i>
													modifier
												</a>                                 
												<a class="btn btn-danger btn-sm btn-icon icon-left" href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/department/delete/<?php echo $row['department_id']; ?>');">
													<i class="fa fa-user-md"></i>
													supprimer
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