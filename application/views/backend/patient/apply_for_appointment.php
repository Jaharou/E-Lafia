<?php
/* 	
 * 	Tamplate: Apply for Appointment
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<?php $doctor_info = $this->db->get('doctor')->result_array(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">            
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>patient/appointment_pending/create" class="p-20" id="form-validate">   
                    <h5 class="mt-n"><?php echo get_phrase('postuler pour un rendez-vous'); ?></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date'); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="name13" name="date_timestamp" data-validation="required">
                            </div>
                        </div>   
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('heure'); ?><sup class="color-danger">*</sup></label>
                                <input type="time" class="form-control" id="name12" name="time_timestamp" data-validation="required">
                            </div>
                        </div>   
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="doctor_id"><?php echo get_phrase('docteur'); ?><sup class="color-danger">*</sup></label>
                                <select name="doctor_id" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('sélectionner un docteur'); ?>">   
                                         <?php foreach ($doctor_info as $row): ?>
                                        <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php endforeach; ?>
                                    </optgroup>
                                </select>  
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