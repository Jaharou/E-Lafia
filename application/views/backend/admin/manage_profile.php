<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <?php foreach($edit_data as $row):?>
            <form method="post" action="<?php echo base_url(); ?>admin/manage_profile/update_profile_info" class="p-20" id="form-validate" enctype="multipart/form-data">
                         
                    <h5 class="underline mt-n"><?php echo get_phrase('modifier le profil'); ?></h5>
                     <div class="row">                         
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="name" data-validation="required" value="<?php echo $row['name'];?>">
                            </div>
                        </div>  
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="email" data-validation="required" value="<?php echo $row['email'];?>">
                            </div>
                        </div>   
                         <div class="col-md-4">
                            <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
                                <button type="submit" class="btn btn-info btn-wide"><i class="fa fa-arrow-right"></i>Sauvegarder</button>
                            </div>                
                        </div>                                                           
                    </div>
                 </form>    
             <?php endforeach; ?>
            </div>              
        </div>              
    </div>              
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <?php foreach($edit_data as $row):?>
            <form method="post" action="<?php echo base_url(); ?>admin/manage_profile/change_password" class="p-20" id="form2-validate" enctype="multipart/form-data">
                         
                    <h5 class="underline mt-n"><?php echo get_phrase('changer le mot de passe'); ?></h5>
                     <div class="row">                         
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('mot de passe'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="password" data-validation="required">
                            </div>
                        </div>  
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nouveau mot de passe'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="new_password" data-validation="required" >
                            </div>
                        </div>  
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('confirmer le nouveau mot de
                                passe'); ?><sup class="color-danger">*</sup></label>
                                <input type="password" class="form-control" id="name13" name="confirm_new_password" data-validation="required">
                            </div>
                        </div>    
                         <div class="col-md-3">
                            <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Annuler</button>
                                <button type="submit" class="btn btn-info btn-wide"><i class="fa fa-arrow-right"></i>Sauvegarder</button>
                            </div>                
                        </div>                                                           
                    </div>
                 </form>    
             <?php endforeach; ?>
            </div>              
        </div>              
    </div>              
</div>