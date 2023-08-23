<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
    <div id="invoice_print">
        <header>
            <td align="left" valign="top">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>            
                </td>
                <td width="50%"><img src="assets/images/logo.png" style="max-height:80px;"></td>
                <!--<td ><!-<img src="/logo.png" style="margin-left:450px;top: 30px;">->
               <img style="margin-left:450px;margin-bottom: 20px" src="</?php echo base_url(); ?>assets/images/logo.png" alt="logo" class="logo">
                </td>-->
        </header>
        <table width="80%" border="1">
            <tr>
                <td align="left">
                    <span><?php echo get_phrase('numéro-de-reçu'); ?> : <?php echo $row['invoice_number'];?></span><br>
                    <span><?php echo get_phrase("date-d'émission"); ?> :<?php echo $row['creation_timestamp'];?></span><br>
                    <span><?php echo get_phrase("date-d'échéance"); ?> : <?php echo $row['due_timestamp']; ?></span><br>
                    <span><?php echo get_phrase('statut'); ?> : <?php echo $row['status']; ?></span>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="1">    
            <tr>
                <td align="left"><p><?php echo get_phrase('information-de-patient'); ?></p></td>
                <!--<td align="right"><h4></?php echo get_phrase('patient'); ?> </h4></td>-->
            </tr>

            <tr>
                <td align="left" valign="top">
                    <?php echo get_phrase('nom'); ?>: <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name; ?><br>
                    <?php echo get_phrase('adresse'); ?>:
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->address; ?><br>
                    <?php echo get_phrase('téléphone');?>:
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->phone; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <h4><?php echo get_phrase('journal-de-reçu'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th width="60%"><?php echo get_phrase('entrée'); ?></th>
                    <th><?php echo get_phrase('prix'); ?></th>
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
                <?php
                $currency_symbol = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;
               // $currency_symbol    = $this->db->get_where('currency', array('currency_id' => $system_currency_id))->row()->currency_symbol;
                $total_amount       = 0;
                $invoice_entries    = json_decode($row['invoice_entries']);
                $i = 1;
                foreach ($invoice_entries as $invoice_entry)
                {
                    $total_amount += $invoice_entry->amount; ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td>
                            <?php echo $invoice_entry->description; ?>
                        </td>
                        <td class="text-right">
                            <?php echo $invoice_entry->amount . '&nbsp'. 'FCFA'; ?>
                        </td>
                    </tr>
                <?php } 
                $grand_total = $this->crud_model->calculate_invoice_total_amount($row['invoice_number']); ?>
            </div>
            <!-- INVOICE ENTRY ENDS HERE-->
            </tbody>
        </table>
        <table width="100%" border="1">    
            <tr>
                <td align="left" width="80%"><?php echo get_phrase('sous-total'); ?> </td>
                <td align="left"><?php echo $total_amount . '&nbsp'. 'FCFA'; ?></td>
            </tr>
            <tr>
                <td align="left" width="80%"><?php echo get_phrase('tva%'); ?> </td>
                <td align="right"><?php echo $row['vat_percentage']; ?>% </td>
            </tr>
            <tr>
                <td align="left" width="80%"><?php echo get_phrase('remise'); ?> </td>
                <td align="right"><?php echo $row['discount_amount'] . '&nbsp'. 'FCFA'; ?> </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="left" width="80%"><h4><?php echo get_phrase('total'); ?> </h4></td>
                <td align="left"><h4><?php echo $grand_total . '&nbsp'. 'FCFA'; ?> </h4></td>
            </tr>
        </table>

        <!-- payment history -->
        <h4><?php echo get_phrase('historique-de-paiement'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><?php echo get_phrase('date'); ?></th>
                    <th><?php echo get_phrase('montant'); ?></th>
                    <th><?php echo get_phrase('mode'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_history = $this->db->get_where('payment', array('invoice_number' => $row['invoice_number']))->result_array();
                foreach ($payment_history as $row2):
                    ?>
                    <tr>
                        <td><?php echo $row2['timestamp']; ?></td>
                        <td><?php echo $row2['amount']; ?></td>
                        <td><?php echo $row2['payment_method']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>
    </div>
    <br>

    <a onClick="PrintElem('invoice_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Imprimer le reçu
        <i class="entypo-doc-text"></i>
    </a>


<?php endforeach; ?>




<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());       
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>