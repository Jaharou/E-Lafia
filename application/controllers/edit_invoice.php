<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo get_phrase('modifier-le-reçu'); ?>
                    </div>
                </div>
                <div class="panel-body">

                 <?php echo form_open('receptionist/invoice_manage/update/' . $param2, array('class' => 'form-horizontal form-groups validate invoice-edit', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('titre_de_reçu'); ?></label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="title" id="title" data-validate="required" 
                                   data-message-required="<?php echo get_phrase('valeur_requise'); ?>" 
                                   value="<?php echo $row['title']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('numéro_de_reçu'); ?></label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="invoice_number"  value="<?php echo $row['invoice_number']; ?>"  readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('patient'); ?></label>

                        <div class="col-sm-8">
                            <select name="patient_id" class="js-states form-control select2" id="js-states">
                                
                                <?php
                                $patients = $this->db->get('patient')->result_array();
                                foreach ($patients as $row2):
                                    ?>
                                    <option value="<?php echo $row2['patient_id']; ?>"	
                                        <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('date_de_creation'); ?></label>

                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="creation_timestamp"  
                                value="<?php echo $row['creation_timestamp']; ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase("date_d'échéance"); ?></label>

                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="due_timestamp"  
                                    value="<?php echo $row['due_timestamp']; ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('montant_de_la_remise'); ?></label>

                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                                <input type="text" class="form-control" name="discount_amount"  
                                       value="<?php echo $row['discount_amount']; ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('prise_en_charge'); ?></label>
                        <div class="col-sm-8">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                                <select class="js-states form-control select2" id="js-states" name="prise_en_charge"  data-validation="">
                                    <optgroup>
                                        <option><?php echo get_phrase('Oui'); ?></option>
                                        <option><?php echo get_phrase('Non'); ?></option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('statut_de_paiement'); ?></label>
                        <div class="col-sm-8">
                            <select name="status" class="js-states form-control selectboxit" id="js-states">
                                
                                <option value="payé" <?php if ($row['status'] == 'payé') echo 'selected'; ?> >
                                    <?php echo get_phrase('payé'); ?>
                                </option>
                                <option value="impayé"<?php if ($row['status'] == 'impayé') echo 'selected'; ?>>
                                    <?php echo get_phrase('impayé'); ?>
                                </option>
                            </select>
                        </div>
                    </div>

                <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('mode-de-paiement'); ?></label>
                              <div class="col-sm-8">
                                <select name="mode_paiement" class="js-states form-control select2" id="js-states">
                                    <optgroup>
                                        
                                        <option value="Espèce" <?php if ($row['mode_paiement'] == 'Espèce') echo 'selected'; ?> >
                                    <?php echo get_phrase('Espèce'); ?>
                                </option>
                                    <option value="Chèque" <?php if ($row['mode_paiement'] == 'Chèque') echo 'selected'; ?> >
                                    <?php echo get_phrase('Chèque'); ?>
                                </option>
                                    <option value="Carte-bancaire" <?php if ($row['mode_paiement'] == 'Carte_bancaire') echo 'selected'; ?> >
                                     <?php echo get_phrase('Carte_bancaire'); ?>
                                    </option>
                                  <option value="Virement" <?php if ($row['mode_paiement'] == 'Virement') echo 'selected'; ?> >
                                    <?php echo get_phrase('Virement'); ?>
                                </option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                    <hr>
                    <!-- INVOICE ENTRY STARTS HERE-->
                    <div id="invoice_entry">
                        <?php
                        $invoice_entries = json_decode($row['invoice_entries']);
                        foreach ($invoice_entries as $invoice_entry) {
                            ?>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">
                                <?php echo get_phrase('prestation'); ?></label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="entry_description[]"  
                                           value="<?php echo $invoice_entry->description; ?>" 
                                           placeholder="<?php echo get_phrase('prestation'); ?>" >
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="entry_amount[]"  
                                           value="<?php echo $invoice_entry->amount; ?>" 
                                           placeholder="<?php echo get_phrase('montant'); ?>" >
                                </div>
                                <!--<div class="col-sm-2">
                                    <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                        <i class="entypo-trash"></i>
                                    </button>
                                </div>-->

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- INVOICE ENTRY ENDS HERE-->

                    <!-- TEMPORARY INVOICE ENTRY STARTS HERE-->
                    <div id="invoice_entry_temp">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('prestation'); ?></label>

                            <div class="col-sm-5">
                                
                            <select name="entry_description_id" class="js-states form-control select2" id="js-states">
                                
                                <?php
                                $designations = $this->db->get('designation')->result_array();
                                foreach ($designations as $row2):
                                    ?>
                                    <option value="<?php echo $row2['entry_description_id']; ?>"  
                                    <?php if ($row2['libelle'] == $row2['libelle']) echo 'selected'; ?> >
                                    <?php echo $row2['libelle']; ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="entry_amount[]"  value="" 
                                placeholder="<?php echo get_phrase('montant'); ?>" >
                            </div>
                            <!--<div class="col-sm-2">
                                <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                                    <i class="entypo-trash"></i>
                                </button>
                            </div>-->

                        </div>
                    </div>
                    <!-- TEMPORARY INVOICE ENTRY ENDS HERE-->


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="button" class="btn btn-default btn-sm btn-icon icon-left"
                                    onClick="add_entry()">
                                        <?php echo get_phrase('ajouter_un_nouveau_reçu'); ?>
                                <i class="entypo-plus"></i>
                            </button>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo get_phrase('mettre_à_jour_le_reçu'); ?></button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>	



<script>

    // CREATING BLANK INVOICE ENTRY
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry_temp').html();
        $('#invoice_entry_temp').remove();
    });

    function add_entry()
    {
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // REMOVING INVOICE ENTRY
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>
