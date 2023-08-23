<?php
/* 	
 * 	Tamplate: Add Doctor
 * 	@author : Raju Ahmed
 * 	Date	: 20 August, 2021
 */
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php $department_info = $this->db->get('department')->result_array(); ?>
<div class="row">
    <div class="col-md-12">
		<div class="panel">
             <a href="<?php echo base_url(); ?>admin/doctor" class="btn btn-info btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>admin/doctor/create" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('information de docteur'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="required">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="email"  data-validation="email">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('mot de passe'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="password"  data-validation="required">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="address"  data-validation="required">
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('téléphone'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="required">
                            </div>
                        </div>
                    
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('département'); ?><sup class="color-danger">*</sup></label>
                                <select name="department_id" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('selectionner le département'); ?>">   
                                         <?php foreach ($department_info as $row) { ?>
	                                    <option value="<?php echo $row['department_id']; ?>"><?php echo $row['name']; ?></option>
	                                <?php } ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>   
                   
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('profil'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="profile"  data-validation="required">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('image'); ?></label>
                                <input type="file" class="form-control" id="name13" name="image">
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