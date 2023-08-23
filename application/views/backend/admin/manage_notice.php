<?php
/* 	
 * 	Tamplate: Manage Notice
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
			<a href="<?php echo base_url(); ?>admin/motice_crud/add" class="btn btn-info btn-wide pull-right"> <i class="fa fa-plus"></i>
				<?php echo get_phrase('ajouter une remarque'); ?>
			</a>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>											
								<th><?php echo get_phrase('titre'); ?></th>								
								<th><?php echo get_phrase('date de debut'); ?></th>
								<th><?php echo get_phrase('fichier'); ?></th>
								<th><?php echo get_phrase('options'); ?></th>
							</tr>
						</thead>
						    <tbody>										
								<?php foreach ( $notice_info as $row ): ?>									
										<tr>
											<td><?php echo $row['title'] ?></td>	
											<td><?php echo date('d M,Y', $row['start_timestamp']); ?></td>	
											<td>												
												<a href="<?php echo base_url(); ?>uploads/notice/<?php echo $row['description']; ?>" class="btn btn-success btn-rounded icon-only"><?php echo get_phrase('télecharger'); ?></a>
											</td>			
											<td>                  
										<a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/notice/delete/<?php echo $row['notice_id']; ?>');">
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