<?php
/* 	
 * 	Tamplate: Edit profile
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
$nurse_id          = $this->session->userdata('login_user_id');
$single_nurse_info = $this->db->get_where('nurse', array('nurse_id' => $nurse_id))->result_array();
foreach ($single_nurse_info as $row) :
?>    

    <div class="row">
    <div class="col-md-12">
		<div class="panel">
			<div style="clear:both;"></div>						
			<div class="panel-body p-20">
			<form method="post" action="<?php echo base_url(); ?>nurse/profile/update/<?php echo $row['nurse_id']; ?>" class="p-20" id="form-validate" enctype="multipart/form-data">				
                    <h5 class="mt-n"><?php echo get_phrase('informations de profil'); ?></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name"  data-validation="required" value="<?php echo $row['name']; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="email"  data-validation="email" value="<?php echo $row['email']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="address"  data-validation="required" value="<?php echo $row['address']; ?>">
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('téléphone'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="phone"  data-validation="required" value="<?php echo $row['phone']; ?>">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('image'); ?><img src="<?php echo $this->crud_model->get_image_url('nurse' , $nurse_id );?>" class="img-circle" width="20px" height="20px"></label>
                                <input type="file" class="form-control" id="name13" name="image">
                            </div>
                        </div>
                        <div class="col-md-4">
						    <div class="btn-group pull-right mt-10" role="group">
						        <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
						        <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Mise à jour</button>
						    </div>				  
						</div>
                     </div> 
       			 </form>	
			</div>				
		</div>				
	</div>				
</div>
<?php endforeach; ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>nurse/profile/change_password" class="p-20" id="form2-validate">             
                    <h5 class="mt-n"><?php echo get_phrase('changer le mot de passe'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('ancien mot de passe'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="old_password"  data-validation="required">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nouveau mot de passe'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="new_password"  data-validation="required">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('confirmer le nouveau mot de passe'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="confirm_new_password"  data-validation="required">
                            </div>
                        </div>                    
                        <div class="col-md-3">
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