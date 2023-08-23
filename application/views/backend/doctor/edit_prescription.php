<?php
/* 	
 * 	Tamplate: Edit Prescription
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<?php
$menu_check                 = $param3;
$patient_info               = $this->db->get('patient')->result_array();
$single_prescription_info   = $this->db->get_where('prescription', array('prescription_id' => $param2))->result_array();
foreach ($single_prescription_info as $row):
?>
<div class="row">
    <div class="col-md-12">
		<div class="panel">
             <a href="<?php echo base_url(); ?>doctor/prescription" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>doctor/prescription/update/<?php echo $row['prescription_id']; ?>/<?php echo $menu_check; ?>/<?php echo $row['patient_id']; ?>" class="p-20" id="form-validate"enctype="multipart/form-data">				
                    <h5 class="mt-n panel panel-primary"><?php echo get_phrase('modifier'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="patient_id"><?php echo get_phrase('patient'); ?></label>
                                <select name="patient_id" class="form-control" id="js-states"  data-validation="">
                            <optgroup>
                        <option>Sélectionner le patient</option>
                        <?php
                        $patients = $this->db->get('patient')->result_array();
                        $patients = array_reverse($patients); // Inverser l'ordre des patients
                        foreach ($patients as $row2):
                            ?>
                       <option value="<?php echo $row2['patient_id']; ?>" <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>
                        <?php echo $row2['name']; ?>
                  </option>
                <?php endforeach; ?>
            </optgroup>
            </select>  
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="form-group">
         <label for="medicine_id"><?php echo get_phrase('medicine'); ?></label>
         <select name="medicine_id" class=" form-control" id="js-states"  data-validation="">
                    <optgroup>
                      <option>Sélectionner le médicament</option>
                        <?php
                        $medicines = $this->db->get('medicine')->result_array();
                        $medicines = array_reverse($medicines); // Inverser l'ordre des medicine
                        foreach ($medicines as $row2):
                            ?>
                       <option value="<?php echo $row2['medicine_id']; ?>" <?php if ($row['medicine_id'] == $row2['medicine_id']) echo 'selected'; ?>>
                        <?php echo $row2['name']; ?>
                  </option>
                <?php endforeach; ?>
            </optgroup>
            </select>  
        </div>
    </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="name13"><?php echo get_phrase('date'); ?></label>
                <input type="date" class="form-control" id="name13" name="date_ordo"  data-validation="" value="<?php echo $row['date_ordo']; ?>">
              </div>
            </div>
                         
              <div class="col-md-3">
                <div class="form-group">
                        <label for="name13"><?php echo get_phrase('posologie'); ?></label>
                         <input name="posologie" class="form-control" data-validation=""value="<?php echo $row['posologie']; ?>">	
                    </div>
                </div>

                <div class="col-md-3">
                        <div class="form-group">
                        <label for="name13"><?php echo get_phrase("nbre_d'unité"); ?></label>
                         <input type="text" name="nbr_unite" class="form-control" data-validation=""value="<?php echo $row['nbr_unite']; ?>">   
                    </div>
                </div>

                        <div class="col-md-3">
                          <div class="form-group">
                        <label for="name13"><?php echo get_phrase('QSP'); ?></label>
                         <input type="text" name="qsp" class="form-control" data-validation=""value="<?php echo $row['qsp']; ?>"></div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('note'); ?></label>
                                 <input type="text" name="note" class="form-control" data-validation="" value="<?php echo $row['note']; ?>">	
                          </div>
                     </div>
                    </div>

                    <hr>
                    <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
                        <?php
                        $medicines = $this->db->get('prescription')->result_array();
                        //$invoice_entries = json_decode($row['invoice_entries']);
                            foreach ($medicines as $row2):  ?>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">
                               <?php echo get_phrase('prestation'); ?></label>
                                <div class="col-sm-5">
                                 <input type="text" class="form-control" name="medicine_id"  
        value="<?php echo $row2['medicine_id']; ?>" <?php  echo 'selected'; ?> >

                                </div>
                                
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- INVOICE ENTRY ENDS HERE-->

                    <!-- TEMPORARY INVOICE ENTRY STARTS HERE-->
                    <div id="invoice_entry_temp">
                         <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class=" control-label"><?php echo get_phrase('ajouter'); ?></label>
    
                            <select name="medicine_id[]" class="form-control select2" id="js-states">
                                
                                <?php
                                $medicines = $this->db->get('medicine')->result_array();
                                foreach ($medicines as $row2):
                                    ?>
                                    <option value="<?php echo $row2['name']; ?>"  
                                    <?php if ($row2['name'] == $row2['name']) echo 'selected'; ?> >
                                    <?php echo $row2['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                          </div>
                        </div>
                    
                    <!-- TEMPORARY INVOICE ENTRY ENDS HERE-->
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo get_phrase('mettre_à_jour_le_reçu'); ?></button>
                            <span id="preloader-form"></span>
                        </div>
                    </div> 
       			 </form>	
			</div>				
		</div>				
	</div>				
</div>

<script>  

    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry_temp').html();
        $('#invoice_entry_temp').remove();
    });

    function add_entry()
    {
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>

<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;