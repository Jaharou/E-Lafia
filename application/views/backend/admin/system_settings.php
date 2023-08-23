<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>admin/system_settings/do_update" class="p-20" id="form-validate" enctype="multipart/form-data">
                         
                    <h5 class="underline mt-n"><?php echo get_phrase('paramétres du système'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('nom du système'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="system_name" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('titre du système'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="system_title" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'system_title'))->row()->description; ?>">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('adresse'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="address" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?>">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('téléphone'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="phone" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?>">
                            </div>
                        </div>                                                  
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('Email Paypal'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="paypal_email" data-validation="email" value="<?php echo $this->db->get_where('settings', array('type' => 'paypal_email'))->row()->description; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('devise'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="currency" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?>">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('e-mail système'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="system_email" data-validation="email" value="<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?>">
                            </div>
                        </div>                         
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="blood_group"><?php echo get_phrase('langue'); ?><sup class="color-danger">*</sup></label>
                                <select name="language" class="js-states form-control" id="js-states"  data-validation="required">
                                    <optgroup label="language">   
                                       <?php
                                        $fields = $this->db->list_fields('language');
                                        foreach ($fields as $field) {
                                            if ($field == 'phrase_id' || $field == 'phrase')
                                                continue;

                                            $current_default_language = $this->db->get_where('settings', array('type' => 'language'))->row()->description;
                                            ?>
                                            <option value="<?php echo $field; ?>"
                                                    <?php if ($current_default_language == $field) echo 'selected'; ?>> <?php echo $field; ?> </option>
                                                    <?php
                                                }
                                                ?>   
                                    </optgroup>
                                </select>  
                            </div>
                        </div>                                                     
                    </div>
                     <div class="row">                         
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('logo'); ?><img src="<?php echo base_url(); ?>uploads/logo.jpeg" class="img-circle" width="110px" height="110px"> (1080px X 809px)</label>
                                <input type="file" class="form-control" id="name13" name="userfile" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('image du message de bienvenue'); ?><img src="<?php echo base_url(); ?>uploads/fronted/welcome.png" class="img-circle" width="20px" height="20px"> (1080px X 547px)</label>
                                <input type="file" class="form-control" id="name13" name="welcome_message_image" >
                            </div>
                        </div>    
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('message de bienvenue'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="welcome_message" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'welcome_message'))->row()->description; ?>">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('message court de service'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="service_short_text" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'service_short_text'))->row()->description; ?>">
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('facebook'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="facebook" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'facebook'))->row()->description; ?>">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('twitter'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="twitter" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'twitter'))->row()->description; ?>">
                            </div>
                        </div>  
                          <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('instagram'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="instagram" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'instagram'))->row()->description; ?>">
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('youtube'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="youtube" data-validation="required" value="<?php echo $this->db->get_where('settings', array('type' => 'youtube'))->row()->description; ?>">
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="recaptcha_active"><?php echo get_phrase('paramétres de recaptcha'); ?><sup class="color-danger">*</sup></label>
                                 <label for="recaptcha_active"><?php echo get_phrase('active'); ?></label>
                                 <input type="radio" class="form-control" id="recaptcha_active" name="recaptcha_status" data-validation="required" value="1" <?php if(get_frontend_settings('recaptcha_status') == 1) echo 'checked'; ?>>
                               
                                <label for="recaptcha_inactive"><?php echo get_phrase('inactive'); ?></label>
                                <input type="radio" class="form-control" id="name13" name="recaptcha_status" data-validation="required" value="0" <?php if(get_frontend_settings('recaptcha_status') == 0) echo 'checked'; ?>> 
                                
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('clé de site de recaptcha(v2)'); ?></label>
                                <input type="text" class="form-control" id="name13" name="recaptcha_sitekey"  value="<?php echo get_frontend_settings('recaptcha_sitekey');  ?>">
                            </div>
                        </div>  
                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('clef secrète de recaptcha(v2)'); ?></label>
                                <input type="text" class="form-control" id="name13" name="recaptcha_secretkey" value="<?php echo get_frontend_settings('recaptcha_secretkey');  ?>">
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