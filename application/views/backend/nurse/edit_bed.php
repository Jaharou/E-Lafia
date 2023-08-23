<?php
/* 	
 * 	Tamplate: Edit Bed
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
$single_bed_info = $this->db->get_where('bed', array('bed_id' => $param2))->result_array();
foreach ($single_bed_info as $row) :
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>nurse/bed/update/<?php echo $row['bed_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">   
                    <h5 class="mt-n"><?php echo get_phrase('modifier le lit'); ?></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('numéro de lit '); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="bed_number" data-validation="required" value="<?php echo $row['bed_number']; ?>">
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                            <div class="form-group">
                                <label for="type"><?php echo get_phrase('type'); ?><sup class="color-danger">*</sup></label>
                                <select name="type" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('sélectionner le type de lit'); ?>">   
	                               <option value="ward" <?php if ($row['type'] == 'ward')echo 'selected';?>>
									<?php echo get_phrase('salle'); ?>
								</option>
								<option value="cabin" <?php if ($row['type'] == 'cabin')echo 'selected';?>>
									<?php echo get_phrase('bloc'); ?>
								</option>
								<option value="icu" <?php if ($row['type'] == 'icu')echo 'selected';?>>
									<?php echo get_phrase('chambre'); ?>
								</option>
                                    </optgroup>
                                </select>  
                            </div>
                        </div> 
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('description'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name12" name="description" data-validation="required" value="<?php echo $row['description']; ?>">
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
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output; 