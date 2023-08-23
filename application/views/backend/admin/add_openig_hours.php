<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <a href="<?php echo base_url(); ?>admin/openig_hours" class="btn btn-info btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>admin/openig_hours/create" class="p-20" id="form-validate" enctype="multipart/form-data">   
                    <h5 class="mt-n"><?php echo get_phrase("information pour les horaires d'ouverture"); ?></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('jours ouvrables'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="open_day" data-validation="required" placeholder="Sunday-Friday">
                            </div>
                        </div>    
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase("heure d'ouverture"); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name12" name="open_time" data-validation="required" placeholder="9am-9pm">
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
            </div>              
        </div>              
    </div>              
</div>