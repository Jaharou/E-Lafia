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
			<form method="post" action="<?php echo base_url(); ?>doctor/prescription/update/<?php echo $row['prescription_id']; ?>/<?php echo $menu_check; ?>/<?php echo $row['patient_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('information de prescription'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="patient_id"><?php echo get_phrase('patient'); ?></label>
                                <select name="patient_id" class="js-states form-control" id="js-states"  data-validation="">
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
         <label for="medicine_id"><?php echo get_phrase('patient'); ?></label>
         <select name="medicine_id" class="js-states form-control" id="js-states"  data-validation="">
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
            <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date'); ?></label>
                                <input type="text" class="form-control" id="name13" name="date_timestamp"  data-validation="required" value="<?php echo date("d M, Y", $row['timestamp']); ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('heure'); ?></label>
                                <input type="text" class="form-control" id="name13" name="time_timestamp"  data-validation="" value="<?php echo date("H", $row['timestamp']); ?>">
                            </div>
                        </div>
                    
                    	<div class="col-md-3">
                        <div class="form-group">
                                <label for="name13"><?php echo get_phrase('posologie'); ?></label>
                                 <input name="posologie" class="form-control" data-validation=""<?php echo $row['posologie']; ?>>	
                            </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                                <label for="name13"><?php echo get_phrase("nbre_d'unité"); ?></label>
                                 <input name="nbr_unite" class="form-control" data-validation=""<?php echo $row['nbr_unite']; ?>>   
                            </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                                <label for="name13"><?php echo get_phrase('QSP'); ?></label>
                                 <input name="qsp" class="form-control" data-validation=""<?php echo $row['qsp']; ?>></div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('note'); ?></label>
                                 <input name="note" class="form-control" data-validation=""<?php echo $row['note']; ?>>	
                         </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
						    <div class="btn-group pull-right mt-10" role="group">
						        <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
						        <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Sauvegarder</button>
						    </div>				  
						</div>
                     </div> 
       			 </form>	
			</div>				
		</div>				
	</div>				
</div>
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;