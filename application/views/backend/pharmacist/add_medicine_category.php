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
            <form method="post" action="<?php echo base_url(); ?>pharmacist/medicine_category/create" class="p-20" id="form-validate">   
                    <h5 class="mt-n"><?php echo get_phrase('nouvelle catégorie'); ?></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name_categorie" data-validation="required">
                            </div>
                        </div>    
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('description'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name12" name="description" data-validation="">
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