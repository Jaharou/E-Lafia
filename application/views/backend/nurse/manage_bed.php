<?php
/* 	
 * 	Tamplate: Manage Bed
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
			<button onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/add_bed/');" 
					class="btn bg-black btn-wide pull-right"><i class="fa fa-paperclip"></i>
						<?php echo get_phrase('ajouter un lit'); ?>
				</button>
				<div style="clear:both;"></div>			
			<div class="panel-body p-20">
				  <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>							
								<th><?php echo get_phrase('numéro de lit');?></th>
								<th><?php echo get_phrase('type de lit');?></th>
								<th><?php echo get_phrase('description');?></th>
								<th><?php echo get_phrase('options');?></th>
							</tr>
						</thead>
						    <tbody>								
								<?php foreach ($bed_info as $row): ?>   
									<tr>
										<td><?php echo $row['bed_number'] ?></td>
										<td><?php echo $row['type'] ?></td>
										<td><?php echo $row['description'] ?></td>
										<td>
											<a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/edit_bed/<?php echo $row['bed_id']?>');" 
												class="btn btn-success btn-rounded icon-only">
													<i class="fa fa-pencil"></i>
											</a>
												<a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>nurse/bed/delete/<?php echo $row['bed_id']; ?>');">
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