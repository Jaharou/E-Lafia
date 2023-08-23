<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>accountant/invoice_add/create" class="p-20" id="form-validate" enctype="multipart/form-data">                
                    <h5 class="mt-n"><?php echo get_phrase('ajouter une facture'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('titre de la facture'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="title"  data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('numéro de facture'); ?><sup class="color-danger">*</sup></label>
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
                                <label for="name13"><?php echo get_phrase('date de creation'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="creation_timestamp"  data-validation="required" value="<?php echo date("m/d/Y"); ?>" >
                            </div>
                        </div>                   
                        
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase("date d'échéance"); ?><sup class="color-danger">*</sup></label>
                                <input type="date" class="form-control" id="name13" name="due_timestamp"  data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('pourcentage de tva'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="vat_percentage"  data-validation="required">
                            </div>
                        </div>

                          <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('montant de la remise'); ?><sup class="color-danger">*</sup></label>
                                <input type="number" class="form-control" id="name13" name="discount_amount"  data-validation="required">
                            </div>
                        </div>
                    
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="status"><?php echo get_phrase('statut'); ?><sup class="color-danger">*</sup></label>
                                <select name="status" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('selectionner le statut'); ?>"> 
                                    <option value="paid"><?php echo get_phrase('payé'); ?></option>
                                    <option value="unpaid"><?php echo get_phrase('impayé'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                     </div> 
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('saisir la facture'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="entry_description[]"  data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('montant'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="entry_amount[]"  data-validation="required">
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