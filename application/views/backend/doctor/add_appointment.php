<?php
/* 	
 * 	Tamplate: Add Appointment
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
		<div class="panel">
             <a href="<?php echo base_url(); ?>doctor/appointment" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>doctor/appointment/create" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('information de rendez-vous'); ?></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date'); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="name13" name="date_timestamp"  data-validation="required">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('heure'); ?><sup class="color-danger">*</sup></label>
                                <input type="time" class="form-control" id="name13" name="time_timestamp"  data-validation="required">
                            </div>
                        </div>
                    
                      <div class="col-md-4">
                        <div class="form-group">
                        <label for="patient_id"><?php echo get_phrase('patient'); ?><sup class="color-danger">*</sup></label>
                        <select name="patient_id" class="form-control select2" id="js-states" data-validation="required">
                       <optgroup>
                        <option>Sélectionner le patient</option>
                        <?php
                        $patients = $this->db->get('patient')->result_array();
                        $patients = array_reverse($patients); // Inverser l'ordre des patients
                        foreach ($patients as $row):
                            ?>
                       <option value="<?php echo $row['patient_id']; ?>">
                        <?php echo $row['name']; ?>
                    </option>
                <?php endforeach; ?>
            </optgroup>
        </select>
    </div>
</div> 
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