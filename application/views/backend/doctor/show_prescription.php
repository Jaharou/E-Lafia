<?php
$edit_data      = $this->db->get_where('prescription', array('prescription_id' => $param2))->result_array();
foreach ($edit_data as $row):
$patient_info   = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->result_array();
?>
    <div id="prescription_print">
        <table width="100%" border="0">
            <tr>
                <td align="left" valign="top">
                    <?php foreach ($patient_info as $row2){ ?>
                        <?php echo 'Patient: '.$row2['name'].' '.$row2['prenom']; ?><br>
                        <?php echo 'Age: '.$row2['age']; ?><br>
                        <?php echo 'Sexe: '.$row2['sex']; ?><br>
                    <?php } ?>
                </td>
                <td align="right" valign="top">
                    <?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;
                          echo 'Docteur: '.$name;?><br>
                    <?php echo 'Date: '.$row['date_ordo']; ?><br>
                </td>
            </tr>
        </table>
        <hr>
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">
                        
                    <div class="panel-body">
                            
                        <b><?php echo get_phrase('historique de cas'); ?> :</b>
                        
                        <p><?php echo $row['posologie']; ?></p>
                        
                        <hr>
                            
                        <b><?php echo get_phrase('médicament'); ?> :</b>
                        
                        <p><?php echo $row['medicine_id']; ?></p>
                        
                        <hr>
                        
                        <b><?php echo get_phrase('note'); ?> :</b>
                        
                        <p><?php echo $row['note']; ?></p>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <br>

    <a onClick="PrintElem('#prescription_print')" class="btn btn-primary btn-icon icon-left hidden-print">
        Imprimer l'ordonnance
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
        var mywindow = window.open('', 'prescription', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Prescription</title>');
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