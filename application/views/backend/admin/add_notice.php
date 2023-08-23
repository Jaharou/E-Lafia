<?php
/* 	
 * 	Tamplate: Add Notice
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
            <a href="<?php echo base_url(); ?>admin/notice" class="btn btn-info btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>admin/notice/create" class="p-20" id="form-validate" enctype="multipart/form-data">   
                    <h5 class="mt-n"><?php echo get_phrase('information'); ?></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('titre'); ?><sup class="color-danger">*</sup></label>
        						<input type="text" class="form-control" id="name13" name="title" data-validation="required">
                            </div>
                        </div> 
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('date de publication'); ?><sup class="color-danger">*</sup></label>
								<input type="text" class="form-control" id="name12" name="start_timestamp" data-validation="required" value="<?php echo date("m/d/Y"); ?>">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('fichier'); ?><sup class="color-danger">*</sup></label>
                                <input type="file" class="form-control" id="name13" name="notice">
                            </div>
                        </div>
                         
                    </div>                                              
                   <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
                                <button type="submit" class="btn btn-info btn-wide"><i class="fa fa-arrow-right"></i>Sauvegarder</button>
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