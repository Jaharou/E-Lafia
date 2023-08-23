<?php
/* 	
 * 	Tamplate: Edit Appointment
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
$patient_info = $this->db->get('patient')->result_array();
$single_appointment_info = $this->db->get_where('appointment', array('appointment_id' => $param2))->result_array();
foreach ($single_appointment_info as $row):
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('modifier le rendez-vous'); ?></h3>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>doctor/appointment/update/<?php echo $row['appointment_id']; ?>" method="post" enctype="multipart/form-data" >
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('date'); ?></span>
						<input name="date_timestamp" type="date" value="<?php echo date("D, d M Y", $row['timestamp']); ?>" class="form-control" placeholder="" aria-describedby="basic-addon5">
					</div>
					<div class="input-group mb-20">
						<span class="input-group-addon" id="basic-addon5"><?php echo get_phrase('heure'); ?></span>
						<input name="time_timestamp" type="time" value="<?php echo date("H:i", $row['timestamp']); ?>" class="form-control" placeholder="" aria-describedby="basic-addon5">
					</div>						
					<div class="col-md-3">
                        <div class="form-group">
                        <label for="patient_id"><?php echo get_phrase('patient'); ?><sup class="color-danger">*</sup></label>
                        <select name="patient_id" class="form-control select2" id="js-states" data-validation="required">
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

                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <input name="submit" type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
		<div class="panel">
             <a href="<?php echo base_url(); ?>doctor/appointment" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>doctor/appointment/create" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('information de rendez-vous'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date'); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="name13" name="date_timestamp"  data-validation="required" value="<?php echo date("D, d M Y", $row['timestamp']); ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('heure'); ?><sup class="color-danger">*</sup></label>
                                <input type="time" class="form-control" id="name13" name="time_timestamp"  data-validation="required">
                            </div>
                        </div>
                    
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="patient_id"><?php echo get_phrase('patient'); ?><sup class="color-danger">*</sup></label>
                                <select name="patient_id" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('selectionner le patient'); ?>">   
                                         <?php foreach ( $patient_info as $row): ?>
									<option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>
										<?php endforeach; ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div> 
                        <div class="col-md-3">
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