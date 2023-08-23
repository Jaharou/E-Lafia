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
    <div class="col-md-12" style="left: 0px;">
		<div class="panel">
            <header>Nouvel acte médical</header>
             <a href="<?php echo base_url(); ?>admin/actes/create" class="btn btn-info btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>admin/actes/create" class="p-20" id="form-validate" enctype="multipart/form-data">
            <fieldset>
               <legend>Information générale</legend>			
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('patient'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('code'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="">
                            </div>
                        </div>
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('type'); ?><sup class="color-danger">*</sup></label>
                                <select name="type" class="js-states form-control" id="js-states"  data-validation="">
                                    <optgroup label="<?php echo get_phrase('libellé'); ?>">
                                    <option></option>  
                                <option value="Nébulisation"><?php echo get_phrase('nébulisation'); ?></option>
                                <option value="Echo 3D"><?php echo get_phrase('Echographie 3D'); ?></option>
                                <option value="IRM"><?php echo get_phrase('IRM'); ?></option>
                                <option value="scanner"><?php echo get_phrase('scanner'); ?></option>
                                    </optgroup>
                                <option value="Ablation"><?php echo get_phrase('ablation-fil'); ?></option>
                                    </optgroup>
                                <option value="ECG"><?php echo get_phrase('ECG'); ?></option>
                                    </optgroup>
                                    <option value="Radio"><?php echo get_phrase('radiographie(rayon x)'); ?></option>
                                    </optgroup>
                                  <option value="Echo"><?php echo get_phrase('Echographie'); ?></option>
                                  <option value="Consultation"><?php echo get_phrase('Consultation'); ?></option>
                                    </optgroup>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('statut'); ?><sup class="color-danger">*</sup></label>
                                <select name="sex" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('libellé'); ?>">
                                    <option></option>   
                                <option value="male"><?php echo get_phrase('en-attente'); ?></option>
                            <option value="female"><?php echo get_phrase('en-cours'); ?></option>
                             <option value="female"><?php echo get_phrase('terminer'); ?></option>
                                    </optgroup>
                            <option value="female"><?php echo get_phrase('annuler'); ?></option>
                                </select>  
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date-debut'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="birth_date"  data-validation="required" value="<?php echo date("m/d/Y"); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('date-fin'); ?><sup class="color-danger"></sup></label>
                                <input type="date" class="form-control" id="name13" name="birth_date"  data-validation="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('appareil'); ?><sup class="color-danger"></sup></label>
                                <select name="appareil" class="js-states form-control" id="js-states"  data-validation="">
                                <optgroup>   
                                <option></option>
                                <option value="female"><?php echo get_phrase('Echographie1'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('montant'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="age"  data-validation="">         
                              </div>
                             </div>
                             <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('description'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="age"  data-validation="">         
                              </div>
                             </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('infirmière'); ?><sup class="color-danger"></sup></label>
                                <input type="text" class="form-control" id="name13" name="address"  data-validation="">
                            </div>
                        </div>				
						<div class="col-md-12">
						    <div class="btn-group pull-right mt-10" role="group">
						        <button type="reset" class="btn btn-gray btn-wide" style="top:15px;"><i class="fa fa-times"></i>Annuler</button><br>
						        <button type="submit" class="btn btn-info btn-wide" style="margin-left:130px;bottom: 20px;"><i class="fa fa-check-circle" aria-hidden="true"></i>Ok</button>  
						    </div>
                            <div class="col-md-4" style="margin-right:10px;bottom: 18px;">Note
                               <textarea name="comment" form="form-group"></textarea>
                            </div>				  
						</div>
                    </fieldset>
       			 </form>	
			</div>				
		</div>				
	</div>				
</div>

<?php 
$output .= ob_get_clean();
echo $output;