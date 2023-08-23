<?php
/* 	
 * 	Tamplate: Edit Doctor
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
$department_info = $this->db->get('department')->result_array();
$single_doctor_info = $this->db->get_where('doctor', array('doctor_id' => $param2))->result_array();
foreach ($single_doctor_info as $row):
?>
<div class="row">
    <div class="col-md-12">
		<div class="panel">
             <a href="<?php echo base_url(); ?>admin/doctor/" class="btn btn-info btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>admin/doctor/update/<?php echo $row['doctor_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('information de docteur'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="required" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="email"  data-validation="email" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('mot de passe'); ?></label>
                                <input type="password" class="form-control" id="name13" name="password">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="address"  data-validation="required" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('téléphone'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="required" value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>
                    
                      <div class="col-md-3">
                            <div class="form-group">
                                <label for="department_id"><?php echo get_phrase('département'); ?><sup class="color-danger">*</sup></label>
                                <select name="department_id" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="<?php echo get_phrase('selectionner le département'); ?>">   
                                        <?php foreach ($department_info as $row2): ?>
                                        <option value="<?php echo $row2['department_id']; ?>" <?php if ($row['department_id'] == $row2['department_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </optgroup>
                                </select>  
                            </div>
                        </div>   
                   
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('profil'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="profile"  data-validation="required" value="<?php echo $row['profile']; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('image'); ?><img src="<?php echo $this->crud_model->get_image_url('doctor' , $row['doctor_id']);?>" class="img-circle" width="20px" height="20px"></label>
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
<?php endforeach; ?>
<?php 
$output .= ob_get_clean();
echo $output;