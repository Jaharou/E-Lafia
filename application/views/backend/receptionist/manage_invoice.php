<?php
/* 	
 * 	Tamplate: Manage Invoice
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
		  <header style="color: dark; font-size: 23px;">Reçus</header>
			
         <a class="btn bg-black btn-wide icon-only pull-right" onclick="ajoutInvoiceAjaxModal('<?php echo base_url(); ?>modal/popup/receptionist/invoice_add/add');">
		  <i class="fa fa-plus" aria-hidden="true"></i>
		  <?php echo get_phrase('ajouter'); ?>
		 </a>

				<div style="clear:both;"></div>	
			<div class="panel-body p-20">
					<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><?php echo get_phrase('numéro de reçu'); ?></th>
            <th><?php echo get_phrase('patient'); ?></th>
            <th><?php echo get_phrase('date_de_creation'); ?></th>
            <th><?php echo get_phrase('titre_de_reçu'); ?></th>
            <th><?php echo get_phrase('prestation'); ?></th>
            <th><?php echo get_phrase('statut'); ?></th>
            <th><?php echo get_phrase("date d'échéance"); ?></th>	
            <th class="col-md-2"><?php echo get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($invoice_info as $row): ?>
            <tr>
                <td><?php echo $row['invoice_id'] ?></td>
                <td>
                    <?php
                    $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                    echo $name;
                    ?>
                </td>
                <td><?php echo $row['creation_timestamp'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td> 
                    <?php
                    $invoice_entries = json_decode($row['invoice_entries']);
                    foreach ($invoice_entries as $invoice_entry) {
                        echo $invoice_entry->description;
                        echo " ";
                    }
                    ?>
                </td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['due_timestamp'] ?></td>
                <td>
                    <a onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_invoice/<?php echo $row['invoice_id'] ?>');" 
                        class="btn btn-success btn-rounded icon-only">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-warning btn-rounded icon-only" href="<?php echo base_url(); ?>Invoice/invoice_print/<?php echo $row['invoice_id']; ?>">
                        <i class="fa fa-print"></i>	
                    </a>                   
                    <a class="btn btn-danger btn-rounded icon-only" href="#" onclick="confirm_modal('<?php echo base_url(); ?>receptionist/invoice_manage/delete/<?php echo $row['invoice_id']; ?>');">
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
<footer>
    
</footer>				
</div>

<script>
    // Inverser l'ordre des lignes du tableau après le chargement de la page
    document.addEventListener("DOMContentLoaded", function () {
        var table = document.getElementById("example");
        var tbody = table.getElementsByTagName("tbody")[0];
        var rows = Array.from(tbody.getElementsByTagName("tr")).reverse();
        rows.forEach(function (row) {
            tbody.appendChild(row);
        });
    });
</script>



<?php 
$output .= ob_get_clean();
echo $output;




