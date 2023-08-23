<?php
/* 	
 * 	Tamplate: Show Admit History
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
					<th><?php echo get_phrase('numéro de facture'); ?></th>
					<th><?php echo get_phrase('titre'); ?></th>
					<th><?php echo get_phrase('patient'); ?></th>
					<th><?php echo get_phrase('date de creation'); ?></th>
					<th><?php echo get_phrase("date d'échéance"); ?></th>
					<th><?php echo get_phrase('pourcentage de tva'); ?></th>
					<th><?php echo get_phrase('montant de la remise'); ?></th>
					<th><?php echo get_phrase('statut'); ?></th>
					<th><?php echo get_phrase('options'); ?></th>
				</tr>
			</thead>

			<tbody> 
				<?php foreach ($invoice_info as $row): ?>   
					<tr>
						<td><?php echo $row['invoice_number'] ?></td>
						<td><?php echo $row['title'] ?></td>
						<td>
							<?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
								echo $name;?>
						</td>
						<td><?php echo $row['creation_timestamp'] ?></td>
						<td><?php echo $row['due_timestamp'] ?></td>
						<td><?php echo $row['vat_percentage'] ?></td>
						<td><?php echo $row['discount_amount'] ?></td>
						<td><?php echo $row['status'] ?></td>
						<td>
							<a  onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/show_invoice_details/<?php echo $row['invoice_id'] ?>');" 
								class="btn btn-default btn-sm btn-icon icon-left">								
								<i class="fa fa-pencil"></i>
								Voir la facture
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