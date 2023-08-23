<?php
/* 	
 * 	Tamplate: Modal
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2017
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $output = ''; ?>
<?php ob_start(); ?>

<script type="text/javascript">
    function patientAjoutAjaxModal()
    {       
        jQuery('#modal_patient .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');
        jQuery('#modal_patient').modal('show', {backdrop: 'true'});        
        $.ajax({
            url: url,
            success: function (response)
            {
                jQuery('#modal_patient .modal-body').html(response);
            }
        });
    }
</script>
<div id="modal_patient" class="modal fade col-md-8" tabindex="-1" style="margin-top: 5px;left: 360px; overflow: auto;">
             
        <div class="panel">
            <div class="panel-heading">
              <div class="panel-title" style="background-color:darkgray; padding-top: 20px;">
                <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('Nouveau_patient'); ?>
               </div>
            </div>
            <div style="clear:both;"></div><br>      
            <div class="panel-body p-5">        
           <form method="post" action="<?php echo base_url(); ?>receptionist/patient/create" class="p-5" id="form-validate" enctype="multipart/form-data">
                       
                  <div class="panel panel-heading panel-info">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('informations générales'); ?>
                    </div>
                    </div><br>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('code'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="patient_id"  data-validation="" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('civilité'); ?></label>
                            <select name="civilite" id="js-states" class="form-control">
                                    <optgroup >
                            <option value="M"><?php echo get_phrase('M'); ?></option>
                                <option value="Mlle"><?php echo get_phrase('Mlle'); ?></option>
                                <option value="Mme"><?php echo get_phrase('Mme'); ?></option>
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
                                <label for="prenom"><?php echo get_phrase('prénom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="prenom" name="prenom"  data-validation="required">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="birth_date"><?php echo get_phrase('date_de_naissance'); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"  data-validation="required" placeholder="dd-mm-yyyy">
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="age"><?php echo get_phrase('age'); ?><sup class="color-danger"></sup></label>
                                <input type="number" class="form-control" id="age" name="age" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('sexe'); ?><sup class="color-danger"></sup></label>
                                <select name="sex" class="form-control" id="js-states"  data-validation="">
                                    <optgroup> 
                                <option value="M" class="fa fa-male" aria-hidden="true"><?php echo get_phrase('masculin'); ?></option>
                                <option value="F" class="fa fa-male" aria-hidden="true"><?php echo get_phrase('feminin'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="name13"><?php echo get_phrase('situation_familiale'); ?><sup class="color-danger"></sup></label>
                                <select name="situation_famil" class="form-control" id="js-states"  data-validation="">
                                    <optgroup label="<?php echo get_phrase(''); ?>">
                                <option value="Celibataire"><?php echo get_phrase('Celibataire'); ?></option>
                            <option value="Marié"><?php echo get_phrase('Marié(e)'); ?></option>
                            <option value="Divorcé"><?php echo get_phrase('divorcé(e)'); ?></option>
                            <option value="Veuf(ve)"><?php echo get_phrase('Veuf(ve)'); ?></option>
                            </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="profession"><?php echo get_phrase('profession'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="profession" name="profession"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('groupe_sanguin'); ?></label>
                                <select name="blood_group" class="form-control" id="js-states"  data-validation="">
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
                                <label for="name13"><?php echo get_phrase('téléphone_patient'); ?></label>
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
                                <label for="name13"><?php echo get_phrase('personne_à_contacter'); ?></label>
                                <input type="text" class="form-control" id="js-states" name="personne_contacter"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('tél_personne_à_contacter'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="tel_contacter"  data-validation="">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('Médecin_traitant'); ?></label>
                                <select name="doctor_id" class="form-control" id="name13"  data-validation="">
                                    <optgroup>
                          <?php $doctors = $this->db->get('doctor')->result_array();
                            foreach ($doctors as $row2):?>
                                <option value="<?php echo $row2['doctor_id']; ?>">
                                    <?php echo $row2['name']; ?>
                                </option>
                            <?php endforeach; ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('services'); ?><sup class="color-danger"></sup></label>
                                <select name="service_id" class="form-control" id="name13"  data-validation="">
                                    <optgroup>   
                             <?php $services = $this->db->get('services')->result_array();
                            foreach ($services as $row2):?>
                                <option value="<?php echo $row2['service_id']; ?>">
                                <?php echo $row2['service_title']; ?>
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
                   </form>
                   </div>
                   <div class="modal-footer no-margin-top">
                 <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Fermer</button>
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

<script type="text/javascript">
    function ajoutInvoiceAjaxModal()
    {       
        jQuery('#modal_invoice .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');
        jQuery('#modal_invoice').modal('show', {backdrop: 'true'});        
        $.ajax({
            url: url,
            success: function (response)
            {
                jQuery('#modal_invoice .modal-body').html(response);
            }
        });
    }
</script>
<div id="modal_invoice" class="modal fade col-md-8" tabindex="-1" style="margin-top: 5px;left: 360px; overflow: auto;">
        <div class="panel panel-darkgray" data-collapsed="0">
            <div class="panel-heading">
              <div class="panel-title" style="background-color:darkgray; padding-top: 20px;">
                <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('Nouveau_reçu'); ?>
               </div>
            </div>
            <div style="clear:both;"></div><br>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>receptionist/invoice_add/create" class="p-20" id="form-validate" enctype="multipart/form-data">     
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('titre_de_reçu'); ?><sup class="color-danger"></sup></label>
                                <select name="title" class="form-control" id="name13"  data-validation="">
                                    <optgroup> 
                                    <option ><?php echo get_phrase("reçu_d'encaissement"); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('numéro_de_reçu'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="invoice_number"  data-validation="" value="<?php echo rand(10000, 100000); ?>" readonly >
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="patient_id"><?php echo get_phrase('patient'); ?><sup class="color-danger">*</sup></label>
                                <select name="patient_id" class="form-control" id="js-states"  data-validation="required">
                            <optgroup><?php $patients = $this->db->get('patient')->result_array();
                             foreach ($patients as $row2): ?>
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
                                <label for="name13"><?php echo get_phrase('date_de_creation'); ?><sup class="color-danger"></sup></label>
                             <input type="timestamp" class="form-control" id="name13" name="creation_timestamp"  data-validation="" value="<?php echo date("d/m/Y"); ?>" >
                            </div>
                        </div> 
                    
                        <!--<div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"></?php echo get_phrase('désignation'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="entry_description[]"  data-validation="required">
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('prestation'); ?><sup class="color-danger">*</sup></label>
                                <select name="entry_description_id" class="form-control" id="name13" data-validation="required">
                                    <optgroup>
                               <?php $descriptions = $this->db->get('designation')->result_array();
                            foreach ($descriptions as $row2):
                                ?>
                                <option value="<?php echo $row2['entry_description_id']; ?>">
                             <?php echo $row2['libelle']; ?>
                                </option>
                            <?php endforeach; ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('montant'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="amount">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('% remise'); ?><sup class="color-danger"></sup></label>
                                <input type="number" class="form-control" id="name13" name="discount_amount"  data-validation="">
                            </div>
                        </div>
                        <!--<div class="col-md-3">
                            <div class="form-group">
                                <label for="value_remise"></?php echo get_phrase('valeur_remise'); ?><sup class="color-danger"></sup></label>
                                <input type="number" class="form-control" id="value_remise" name="value_remise"  data-validation="" readonly>
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('montant_net'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="montant_chiffre[]" readonly>
                            </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('prise_en_charge'); ?></label>
                                <select class="form-control" id="name13" name="prise_en charge"  data-validation="">
                                    <optgroup>
                                        <option><?php echo get_phrase('Oui'); ?></option>
                                        <option><?php echo get_phrase('Non'); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('mode_paiement'); ?></label>
                                <select name="mode_paiement" class="form-control" id="js-states"  data-validation="">
                                    <optgroup>
                                    <option value="Espèce"><?php echo get_phrase('Espèce'); ?></option>
                                    <option value="Chèque"><?php echo get_phrase('Chèque'); ?></option>
                                    <option value="Carte-bancaire"><?php echo get_phrase('Carte_bancaire'); ?></option>
                                    <option value="Virement"><?php echo get_phrase('Virement'); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>                  
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="status"><?php echo get_phrase('statut'); ?><sup class="color-danger">*</sup></label>
                                <select name="status" class="form-control" id="js-states"  data-validation="required">
                                 <optgroup>
                                  <option value="payé"><?php echo get_phrase('payé'); ?></option>
                                    <option value="impayé"><?php echo get_phrase('impayé'); ?></option>
                                 </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                             <label for="name13"><?php echo get_phrase("date_d'échéance"); ?><sup class="color-danger"></sup></label>
                                <input type="date" class="form-control" id="name13" name="due_timestamp"  data-validation="" value="<?php echo date("d/m/Y"); ?>">
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-right:0px;bottom: 18px;">Note
                               <textarea name="note" form="form-group" class="form-control">
                                   <input type="text" name="note">
                               </textarea>
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
            <div class="modal-footer no-margin-top">
               <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Fermer</button>
            </div>              
        </div>              
    </div>

    <script type="text/javascript">
        // Montant initial de l'achat
let montant_chiffre = 100;

// Montant de la remise
let discount_amount = 10;

// Montant final à payer après la remise
let entry_amount = montant_chiffre - discount_amount;

// Afficher le montant final à payer
console.log("Le montant final à payer est de : " + entry_amount);

// inversement de l'ordre

// Récupérez vos données depuis la base de données
$data = $this->db->get('invoice')->result_array();

// Triez vos données par date dans l'ordre décroissant
usort($data, function($a, $b) {
    return strtotime($b['creation_timestamp']) - strtotime($a['creation_timestamp']);
});

// Inversez l'ordre de tri pour afficher la dernière ligne en premier
$data = array_reverse($data);

// Envoyez vos données triées à DataTables
$this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(['data' => $data]));

// Initialisez DataTables avec l'option d'ordre pour trier par date décroissante
$(document).ready(function() {
    $('#invoice_id').DataTable({
        "order": [[ 0, "desc" ]] // Tri par la première colonne (date) en ordre décroissant
    });
});

    </script>


<script type="text/javascript">
    function showAjaxModal(url)
    {       
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});        
        $.ajax({
            url: url,
            success: function (response)
            {
                jQuery('#modal_ajax .modal-body').html(response);
            }
        });
    }
</script>
<div id="modal_ajax" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    <?php echo $system_name; ?>
                </div>
            </div>	
            <?php if ($account_type == 'admin' && $page_name == 'invoice') { ?>
                <div class="modal-body " style="height:520px; overflow:auto;">
                <?php } else { ?>	
                    <div class="modal-body " style="height:500px; overflow:auto;">					
                    <?php } ?>

                </div>
                <div class="modal-footer no-margin-top">
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>Fermer</button>
                </div>
            </div>
        </div>
    </div>
    </div> 
    
    <script type="text/javascript">
        function confirm_modal(delete_url)
        {
            jQuery('#modal-4').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Êtes-vous sûr de vouloir supprimer ces informations ?</h4>
                </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link"><?php echo get_phrase('supprimer'); ?></a>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo get_phrase('Annuler'); ?></button>
                </div>
            </div>
        </div>
    </div>
	<?php 
	$output .= ob_get_clean();
	echo $output;	