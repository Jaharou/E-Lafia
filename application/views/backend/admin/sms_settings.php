<?php echo form_open(base_url() . 'admin/sms_settings/do_update', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top'));
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" >

            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('paramètres SMS'); ?>
                </div>
            </div>

            <div class="panel-body">

                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('cliquez sur un utilisateur'); ?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="clickatell_user" 
                            value="<?php echo $this->db->get_where('settings', array('type' => 'clickatell_user'))->row()->description; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase('cliquez sur le mot de passe'); ?></label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="clickatell_password" 
                            value="<?php echo $this->db->get_where('settings', array('type' => 'clickatell_password'))->row()->description; ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label  class="col-sm-3 control-label"><?php echo get_phrase("cliquez sur un identifiant d'API"); ?></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="clickatell_api_id" 
                            value="<?php echo $this->db->get_where('settings', array('type' => 'clickatell_api_id'))->row()->description; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('sauvegarder'); ?></button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


</form>