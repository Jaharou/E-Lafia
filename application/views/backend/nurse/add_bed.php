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
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>nurse/bed/create" class="p-20" id="form-validate" enctype="multipart/form-data">   
                    <h5 class="mt-n"><?php echo get_phrase('ajouter un lit'); ?></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('numéro de lit'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="bed_number" data-validation="required">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                            <div class="form-group">
                                <label for="type"><?php echo get_phrase('type'); ?><sup class="color-danger">*</sup></label>
                                <select name="type" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('sélectionner le type'); ?>">   
	                                <option value="ward"><?php echo get_phrase('salle'); ?></option>
									<option value="cabin"><?php echo get_phrase('bloc'); ?></option>
									<option value="icu"><?php echo get_phrase('chambre'); ?></option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div> 
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('description'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name12" name="description" data-validation="required">
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
<?php 
$output .= ob_get_clean();
echo $output;