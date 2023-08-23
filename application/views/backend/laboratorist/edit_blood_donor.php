<?php
/* 	
 * 	Tamplate: Add Bed
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
$single_blood_donor_info = $this->db->get_where('blood_donor', array('blood_donor_id' => $param2))->result_array();
foreach ($single_blood_donor_info as $row):
?>
<div class="row">
    <div class="col-md-12">
		<div class="panel">
             <a href="<?php echo base_url(); ?>laboratorist/blood_donor" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>laboratorist/blood_donor/update/<?php echo $row['blood_donor_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('informations sur les donneurs de sang'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="required" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="email"  data-validation="email" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="address"  data-validation="required" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                          <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('téléphone'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="required" value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>
                     </div>
                     <div class="row">                      
                    
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="sex"><?php echo get_phrase('sexe'); ?><sup class="color-danger">*</sup></label>
                                <select name="sex" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('sélectionner le sexe'); ?>"> 
                               <option value="male" <?php if ($row['sex'] == 'male')echo 'selected';?>>
								<?php echo get_phrase('masculin'); ?>
							</option>
							<option value="female" <?php if ($row['sex'] == 'female')echo 'selected';?>>
								<?php echo get_phrase('feminin'); ?>
							</option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>   
                   
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('age'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="age"  data-validation="required" value="<?php echo $row['age']; ?>">
                            </div>
                        </div>
                    	 <div class="col-md-3">
                            <div class="form-group">
                                <label for="blood_group"><?php echo get_phrase('groupe sanguin'); ?><sup class="color-danger">*</sup></label>
                                <select name="blood_group" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('sélectionner le groupe sanguin'); ?>"> 
                               	<option value="A+" <?php if ($row['blood_group'] == 'A+')echo 'selected';?>>A+</option>
							<option value="A-" <?php if ($row['blood_group'] == 'A-')echo 'selected';?>>A-</option>
							<option value="B+" <?php if ($row['blood_group'] == 'B+')echo 'selected';?>>B+</option>
							<option value="B-" <?php if ($row['blood_group'] == 'B-')echo 'selected';?>>B-</option>
							<option value="AB+" <?php if ($row['blood_group'] == 'AB+')echo 'selected';?>>AB+</option>
							<option value="AB-" <?php if ($row['blood_group'] == 'AB-')echo 'selected';?>>AB-</option>
							<option value="O+" <?php if ($row['blood_group'] == 'O+')echo 'selected';?>>O+</option>
							<option value="O-" <?php if ($row['blood_group'] == 'O-')echo 'selected';?>>O-</option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('horodatage du dernier don'); ?> <sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="last_donation_timestamp" data-validation="required" value="<?php echo date("m/d/Y", $row['last_donation_timestamp']); ?>">
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