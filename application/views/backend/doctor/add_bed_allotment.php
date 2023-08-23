<?php
/* 	
 * 	Tamplate: Add Bed Allotment
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
$bed_info = $this->db->get('bed')->result_array();
$patient_info = $this->db->get('patient')->result_array(); 
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div style="clear:both;"></div>
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('nouvelle attribution'); ?></h3>
                </div>
            </div>          
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>doctor/bed_allotment/create" class="p-20" id="form-validate" enctype="multipart/form-data">   
            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bed_id"><?php echo get_phrase('numéro de lit'); ?><sup class="color-danger">*</sup></label>
                                <select name="bed_id" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('selectionner le numéro de lit'); ?>">   
                                        <?php foreach ($bed_info as $row) { ?>
								<option value="<?php echo $row['bed_id']; ?>"><?php echo $row['bed_number'] .' - '.$row['type'] ; ?></option>
								<?php } ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div> 
                    </div> 
                    <div class="row">    
                    <div class="col-md-12">
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
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase("heure d'attribution"); ?><sup class="color-danger">*</sup></label>
        					<input type="date" class="form-control" id="name13" name="allotment_timestamp" data-validation="required">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('temps de décharge'); ?><sup class="color-danger">*</sup></label>
							<input type="date" class="form-control" id="name12" name="discharge_timestamp" data-validation="required">
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