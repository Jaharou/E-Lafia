<?php
/* 	
 * 	Tamplate: Show Payment History
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>

<<?php  function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $row)
            return $row[$field];
        //return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	
    }

function calculate_total_amount($net_amount)
    {
        $total_amount           = 0;
        $invoice                = $this->db->get_where('invoice', array('net_amount' => $net_amount))->result_array();
        foreach ($invoice as $row)
        {
            $invoice_entries    = json_decode($row['invoice_entries']);
            foreach ($invoice_entries as $invoice_entry)
                $total_amount  += $net_amount;
        }

        return $total_amount;
    }
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="dashboard-stat bg-primary" href="#">
        <span class="number counter"><?php echo $this->db->count_all('invoice'); ?></span>
        <span class="name"><?php echo get_phrase('montant total') ?></span>
        <span class="bg-icon"><i class="fa fa-user-md"></i></span>
    </a>
  </div>


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
								
								
								<th><?php echo get_phrase('montant_net'); ?></th>
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
									<td><?php  $row['creation_timestamp']; ?>
									</td>
									<td><?php echo date("d, M, Y -  H:i", $row['due_timestamp']); ?>
									</td>
									
									<td><?php echo $row['net_amount'] ?></td>
									<td><?php echo $row['status'] ?></td>
									<td>
										<a  href="<?php echo base_url(); ?>Invoice/invoice_print/<?php echo $row['invoice_id']; ?>" 
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