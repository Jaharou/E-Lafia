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
        <div id="chart1" class="op-chart"></div>
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
								<th><?php echo get_phrase('publier');?></th>
								<th><?php echo get_phrase('fichier');?></th>
							</tr>
						</thead>
						    <tbody>							
								 <?php
								$notices   = $this->db->get('notice')->result_array();
								foreach ($notices as $row):
								?>
								<tr>
									<td><?php echo $title = $this->db->get_where('notice' , 
                                        array('notice_id' => $row['notice_id'] ))->row()->title;?></td>
									<td><?php echo date('Y', $row['start_timestamp']); ?> 
                                        <?php echo date('m', $row['start_timestamp']) - 1; ?> 
                                        <?php echo date('d', $row['start_timestamp']); ?></td>
									<td><a href="<?php echo base_url(); ?>uploads/notice/<?php echo $row['description']; ?>" class="btn btn-success btn-rounded icon-only"><?php echo get_phrase('télécharger'); ?></a></td>									
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