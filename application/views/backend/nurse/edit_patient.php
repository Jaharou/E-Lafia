<?php
/* 	
 * 	Tamplate: Edit Patient
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
$single_patient_info = $this->db->get_where('patient', array('patient_id' => $param2))->result_array();
foreach ($single_patient_info as $row):
?>
<div class="row">
    <div class="col-md-12">
		<div class="panel">
             <a href="<?php echo base_url(); ?>nurse/patient" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>nurse/patient/update/<?php echo $row['patient_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('information de patient'); ?></h5>
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
                                <label for="name13"><?php echo get_phrase('mot de passe'); ?></label>
                                <input type="password" class="form-control" id="name13" name="password" >
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="address"  data-validation="required" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('téléphone'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="required" value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>
                    
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('sexe'); ?><sup class="color-danger">*</sup></label>
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
                                <label for="name13"><?php echo get_phrase('date de naissance'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="birth_date"  data-validation="required" value="<?php echo date('y-m-d',$row['birth_date']); ?>" >
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('age'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="age"  data-validation="required" value="<?php echo $row['age']; ?>">
                            </div>
                        </div>                   
                       
                     </div> 
                     <div class="row">
                     	 <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('groupe sanguin'); ?><sup class="color-danger">*</sup></label>
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
						 <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('image'); ?><img src="<?php echo $this->crud_model->get_image_url('patient' , $row['patient_id']);?>" class="img-circle" width="20px" height="20px"></label>
                                <input type="file" class="form-control" id="name13" name="image">
                            </div>
                        </div>					
						<div class="col-md-4">
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