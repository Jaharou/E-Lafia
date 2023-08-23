<?php
/* 	
 * 	Tamplate: Add Prescription
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<?php $patient_info = $this->db->get('patient')->result_array(); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-primary">
             <a href="<?php echo base_url(); ?>doctor/prescription" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>doctor/prescription/create" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n panel panel-primary"><?php echo get_phrase('Les informations'); ?></h5>
                    <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="patient_id"><?php echo get_phrase('patient'); ?><sup class="color-danger">*</sup></label>
                        <select name="patient_id" class="form-control select2" id="js-states" data-validation="required">
                       <optgroup>
                        <?php
                        $patients = $this->db->get('patient')->result_array();
                        $patients = array_reverse($patients); // Inverser l'ordre des patients
                        foreach ($patients as $row2):
                            ?>
                       <option value="<?php echo $row2['patient_id']; ?>">
                        <?php echo $row2['name']; ?>
                    </option>
                <?php endforeach; ?>
            </optgroup>
        </select>
    </div>
</div>
                    <div class="col-md-3">
                        <div class="form-group">
                        <label for="medicine_id"><?php echo get_phrase('médicament'); ?><sup class="color-danger">*</sup>
                        </label>
                        <select name="medicine_id[]" class="form-control select2" id="js-states" data-validation="required" >

                       <optgroup>
                        <?php
                        $medicines = $this->db->get('medicine')->result_array();
                        $medicines = array_reverse($medicines); // Inverser l'ordre des patients
                        foreach ($medicines as $row2):
                            ?>
                        <option></option>
                       <option value="<?php echo $row2['medicine_id']; ?>">
                        <?php echo $row2['name']; ?>
                    </option>
                <?php endforeach; ?>
            </optgroup>
        </select>
    </div>
    <script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Sélectionnez un ou plusieurs médicaments",
            allowClear: true,
        });
    });
</script>

</div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="date_prescript"  data-validation="" value="<?php echo gmdate("d m Y h:i:s"); ?>" readonly >
                            </div>
                        </div>
                    
                    	<div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('posologie'); ?></label>
                           <input type="text" class="form-control" id="name13" name="posologie" data-validation="">	
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                             <label for="name13"><?php echo get_phrase("nbres_d'unité"); ?></label>
                            <input type="text" class="form-control" id="name13" name="nbr_unite" data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="name13"><?php echo get_phrase('QSP'); ?></label>
                          <input type="text" class="form-control" id="name13" name="qsp" data-validation="">
                            </div>
                        </div>
                       <div class="col-md-6">
                            <div class="form-group">
                              <label for="name13"><?php echo get_phrase('note'); ?></label>
                          <input type="text" class="form-control" id="name13" name="note" data-validation="">
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
<?php 
$output .= ob_get_clean();
echo $output;