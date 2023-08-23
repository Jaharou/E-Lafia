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
    <div class="col-md-8" style="left: 180px;">
		<div class="panel">
             <a href="<?php echo base_url(); ?>receptionist/patient" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>receptionist/patient/update/<?php echo $row['patient_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <div class="row panel panel-primary" data-collapsed="0">       
                  <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('informations générales'); ?>
                    </div>
                    </div><br>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('référence'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="patient_id"  data-validation="" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('civilité'); ?></label>
                                <select name="civilite" id="js-states" class=" js-states form-control">
                                    <optgroup >
                                    <option>-</option>  
                                <option value="M"><?php echo get_phrase('M'); ?></option>
                                <option value="Mme"><?php echo get_phrase('Mme'); ?></option>
                                <option value="Mlle"><?php echo get_phrase('Mlle'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="required" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('prénom'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="prenom"  data-validation="" value="<?php echo $row['prenom']; ?>">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('sexe'); ?><sup class="color-danger"></sup></label>
                                <select name="sex" class="js-states form-control" id="js-states"  data-validation="">
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
                                <label for="name13"><?php echo get_phrase('situation_famil'); ?><sup class="color-danger"></sup></label>
                                <select name="situation_famil" class="js-states form-control" id="js-states"  data-validation="">
                                    <optgroup label="<?php echo get_phrase(''); ?>">
                                    <option>-</option>  
                                <option value="celiba"><?php echo get_phrase('celibataire'); ?></option>
                                <option value="Marié"><?php echo get_phrase('Marié(e)'); ?></option>
                                <option value="divorce"><?php echo get_phrase('divorcé(e)'); ?></option>
                                <option value="Veuf(ve)"><?php echo get_phrase('Veuf(ve)'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                       </div>
                       <div class="row panel panel-primary" data-collapsed="0">
                        <div class="panel-heading">
                         <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('contacts'); ?>
                    </div>
                    </div><br>
                    <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('téléphone'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="required" value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="address_patient"  data-validation="" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="email"  data-validation="" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                     </div>
                     <div class="row panel panel-primary" data-collapsed="0">
                      <div class="panel-heading">
                       <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('affectation'); ?>
                    </div>
                    </div><br>
                    <div class="col-md-3">
                            <div class="form-group">
                                <label for="personne_contacter"><?php echo get_phrase('personne_à_contacter'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="personne_contacter" name="personne_contacter"  data-validation="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tel_contacter"><?php echo get_phrase('tél_à_contacter'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="tel_contacter" name="tel_contacter"  data-validation="">
                            </div>
                         </div>
                        
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="doctor_id"><?php echo get_phrase('Médecin_traitant'); ?><sup class="color-danger"></sup></label>
                                <select name="doctor_id" class="form-control" id="doctor_id"  data-validation="">
                                    <optgroup>
                                    <option>-</option>   
                                         <?php
                            $doctor = $this->db->get('doctor')->result_array();
                            foreach ($doctor as $row2):
                                ?>
                                <option value="<?php echo $row2['doctor_id']; ?>">
                                    <?php echo $row2['name']; ?>
                                </option>
                            <?php endforeach; ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('profession'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="profession" name="profession"  data-validation="">
                            </div>
                        </div>   
                     
                     	 <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('groupe_sanguin'); ?><sup class="color-danger">*</sup></label>
                                <select name="blood_group" class="form-control" id="js-states"  data-validation="required">
                               <optgroup>  
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
                                <label for="name13"><?php echo get_phrase('services'); ?><sup class="color-danger"></sup></label>
                                <select name="services" class="form-control" id="js-states"  data-validation="">
                                    <optgroup>
                                    <option>-</option>   
                                         <?php
                            $services = $this->db->get('services')->result_array();
                            foreach ($services as $row2):
                                ?>
                                <option value="<?php echo $row2['service_id']; ?>">
                                    <?php echo $row2['service_title']; ?>
                                </option>
                            <?php endforeach; ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>  
						 <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('photo'); ?><img src="<?php echo $this->crud_model->get_image_url('patient' , $row['patient_id']);?>" class="img-circle" width="20px" height="20px"></label>
                                <input type="file" class="form-control" id="name13" name="image">
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
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;