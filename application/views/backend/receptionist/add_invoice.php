<div class="row">
    <div class="col-md-8" style="margin-top: 0px;left: 170px;">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
              <div class="panel-title" >
                <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('Nouveau-reçu'); ?>
               </div>
            </div>
            <div style="clear:both;"></div><br>
            <a href="<?php echo base_url(); ?>receptionist/invoice_manage" class="btn bg-black btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>receptionist/invoice_add/create" class="p-20" id="form-validate" enctype="multipart/form-data">
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('titre-de-reçu'); ?><sup class="color-danger"></sup></label>
                                <select name="title" class="js-states form-control" id="name13"  data-validation="">
                                    <optgroup> 
                                    <option ><?php echo get_phrase("reçu-d'encaissement"); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('numéro de reçu'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="invoice_number"  data-validation="required" value="<?php echo rand(10000, 100000); ?>" readonly >
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="patient_id"><?php echo get_phrase('patient'); ?><sup class="color-danger">*</sup></label>
                                <select name="patient_id" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('sélectionner un patient'); ?>">   
                                         <?php
                            $patients = $this->db->get('patient')->result_array();
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
                                <label for="name13"><?php echo get_phrase('date de creation'); ?><sup class="color-danger"></sup></label>
                                <input type="timestamp" class="form-control" id="name13" name="creation_timestamp"  data-validation="" value="<?php echo date("d/m/Y"); ?>" >
                            </div>
                        </div>                   
                        
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase("date d'échéance"); ?><sup class="color-danger"></sup></label>
                                <input type="date_timestamp" class="form-control" id="name13" name="due_timestamp"  data-validation="">
                            </div>
                        </div>
                          <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('remise'); ?><sup class="color-danger">*</sup></label>
                                <input type="number" class="form-control" id="name13" name="discount_amount"  data-validation="required">
                            </div>
                        </div>
                    
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo get_phrase('statut'); ?><sup class="color-danger">*</sup></label>
                                <select name="status" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup>
                                        <option>-</option>
                                    <option value="payé"><?php echo get_phrase('payé'); ?></option>
                                    <option value="impayé"><?php echo get_phrase('impayé'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                     </div> 
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('prestation'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="entry_description[]"  data-validation="required">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="entry_amount"><?php echo get_phrase('montant'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="entry_amount" name="entry_amount[]" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('prise-en-charge'); ?><sup class="color-danger"></sup></label>
                                <select class="js-states form-control" id="js-states" name="prise_en_charge"  data-validation="">
                                    <optgroup>
                                        <option><?php echo get_phrase('Oui'); ?></option>
                                        <option><?php echo get_phrase('Non'); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('mode-de-paiement'); ?><sup class="color-danger"></sup></label>
                                <select name="mode_paiement" class="js-states form-control" id="js-states"  data-validation="">
                                    <optgroup> 
                                    <option value="Espèce"><?php echo get_phrase('Espèce'); ?></option>
                                    <option value="Chèque"><?php echo get_phrase('Chèque'); ?></option>
                                    <option value="Carte-bancaire"><?php echo get_phrase(''); ?></option>
                                    <option value="Virement"><?php echo get_phrase('Virement'); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('montant-en-chiffre'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="montant_chiffre"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('montant-en-lettre'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="montant_lettre"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-right:0px;bottom: 18px;">Note
                               <textarea name="note" form="form-group"></textarea>
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

<script>
    // Récupérez la liste déroulante et le champ de texte pour le montant
var dropdown = document.getElementById("id_designation");
var amountField = document.getElementById("entry_amount");

// Ajoutez un écouteur d'événements pour détecter les changements dans la liste déroulante
dropdown.addEventListener("change", function() {
  // Récupérez l'option sélectionnée et le montant associé à cette option
  var selectedOption = dropdown.options[dropdown.selectedIndex];
  var selectedAmount = selectedOption.value;
  
  // Affichez le montant sélectionné dans le champ de texte
  entry_amountField.value = selectedEntrymount;
});

// Ajoutez un écouteur d'événements pour détecter les changements dans le champ de texte
entry_amountField.addEventListener("change", function() {
  // Récupérez le montant saisi dans le champ de texte
  var enteredEntry_Amount = entry_amountField.value;
  
  // Parcourez toutes les options de la liste déroulante pour trouver l'option correspondante
  for (var i = 0; i < dropdown.options.length; i++) {
    var option = dropdown.options[i];
    var entry_amount = option.value;
    
    // Si l'option correspond au montant saisi, sélectionnez cette option et sortez de la boucle
    if (entry_amount === enteredEntry_amount) {
      dropdown.selectedIndex = i;
      break;
    }
  }
});

</script>