<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <a href="<?php echo base_url(); ?>admin/slider" class="btn btn-info btn-wide pull-left"><i class="fa fa-arrow-left"></i> <?php echo get_phrase('retour'); ?></a>
            <div style="clear:both;"></div>                     
            <div class="panel-body p-20">
            <form method="post" action="<?php echo base_url(); ?>admin/slider/create" class="p-20" id="form-validate" enctype="multipart/form-data">   
                    <h5 class="mt-n"><?php echo get_phrase('information de slider'); ?></h5>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('titre'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="title" data-validation="required">
                            </div>
                        </div>    
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name12"><?php echo get_phrase('contenu'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name12" name="content" data-validation="required">
                            </div>
                        </div>                                               
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('image'); ?>(1980px X 1080px)</label>
                                <input type="file" class="form-control" id="name13" name="image">
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
            </div>              
        </div>              
    </div>              
</div>