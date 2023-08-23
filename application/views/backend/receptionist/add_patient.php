<?php
/* 	
 * 	Tamplate: Add Patient
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>
<div class="row">
    <div class="col-md-8" style="left: 180px;">
		<div class="panel">
            <header>Nouveau patient</header><br>
             <a href="<?php echo base_url(); ?>receptionist/patient" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-5">
			<form method="post" action="<?php echo base_url(); ?>receptionist/patient/create" class="p-5" id="form-validate" enctype="multipart/form-data">
                <div class="row panel panel-primary">       
                  <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('informations générales'); ?>
                    </div>
                    </div><br>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('code'); ?></label>
                                <input type="text" class="form-control" id="name13" name="patient_id"  data-validation="" readonly>
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
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('prénom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="prenom"  data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="birth_date"><?php echo get_phrase('date-de-naissance'); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"  data-validation="required" placeholder="dd-mm-yyyy">
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="age"><?php echo get_phrase('age'); ?></label>
                                <input type="number" class="form-control" id="age" name="age" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('sexe'); ?></label>
                                <select name="sex" class="js-states form-control" id="js-states"  data-validation="">
                                    <optgroup>
                                    <option>-</option>  
                                <option class="fa fa-male" aria-hidden="true"><?php echo get_phrase('masculin'); ?></option>
                                <option class="fa fa-male" aria-hidden="true"><?php echo get_phrase('feminin'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('situation_famil'); ?><</label>
                                <select name="situation_famil" class="js-states form-control" id="js-states"  data-validation="">
                                    <optgroup label="<?php echo get_phrase(''); ?>">
                                      
                                <option value="celiba"><?php echo get_phrase('celibataire'); ?></option>
                                <option value="Marié"><?php echo get_phrase('Marié(e)'); ?></option>
                                <option value="divorce"><?php echo get_phrase('divorcé(e)'); ?></option>
                                <option value="Veuf(ve)"><?php echo get_phrase('Veuf(ve)'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('profession'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="profession"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('groupe_sanguin'); ?></label>
                                <select name="blood_group" class="js-states form-control" id="js-states"  data-validation="">
                               <optgroup label="<?php echo get_phrase('sélectionner_un_groupe_sanguin'); ?>">  
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('photo'); ?></label>
                                <input type="file" class="form-control" id="name13" name="image">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('personne_à_contacter'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="personne_contacter"  data-validation="">
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
                                <label for="name13"><?php echo get_phrase('téléphone-patient'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="address"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="email"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('tél-à-contacter'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="">
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
                                <label for="name13"><?php echo get_phrase('Médecin_traitant'); ?><sup class="color-danger"></sup></label>
                                <select name="doctor" class="js-states form-control" id="js-states"  data-validation="">
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
                                <label for="name13"><?php echo get_phrase('services'); ?><sup class="color-danger"></sup></label>
                                <select name="services" class="js-states form-control" id="js-states"  data-validation="">
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
                        </div> 					
						<div class="col-md-12">
						    <div class="btn-group pull-right mt-10" role="group">
						        <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
						        <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Sauvegarder</button>
						    </div>				  
						</div>
       			 </form>
                </div>	
			</div>				
		</div>				
	</div>				

<script>
    //Obtenez l'élément de formulaire de la date de naissance et d'âge
        var birth_dateInput = document.getElementById("birth_date");
        var ageInput = document.getElementById("age");
        // Ajouter un écouteur d'événements pour la modification de la date de naissance
        birth_dateInput.addEventListener("change", function() {
            // Obtenez la date de naissance à partir de l'élément de formulaire
            var birth_date = new Date(birth_dateInput.value);

            // Obtenez l'année actuelle
            var anneeActuelle = new Date().getFullYear();

            // Calculez l'âge en soustrayant l'année de naissance de l'année actuelle
            var age = anneeActuelle - birth_date.getFullYear();
            // Mettre à jour automatiquement le champ d'âge
            ageInput.value = age;
        });
</script>

<?php 
$output .= ob_get_clean();
echo $output;


