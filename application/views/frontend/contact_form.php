<section class="slice slice--arrow bg-base-1">
    <div class="sct-inner container">
        <div class="section-title section-title-inverse section-title--style-1 text-center">
            <h3 class="section-title-inner">
                <span> <?php echo get_phrase('contact_us_with_our_professionals') ?></span>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>
    </div>
</section>

<section class="slice">
    <div class="container">
        <div class="row-wrapper">            
            <form method="post" action="<?php echo base_url(); ?>home/contact_us/create" id="form-validate" enctype="multipart/form-data"> 
            <div class="row">
                 <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('email'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="email" data-validation="email">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name13"><?php echo get_phrase('subject'); ?><sup class="color-danger">*</sup></label>
                                <input type="text" class="form-control" id="name13" name="subject" data-validation="required">
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                             <div class="form-group">
                                <label for="textarea"><?php echo get_phrase('message'); ?><sup class="color-danger">*</sup></label>
                               
                                    <textarea name="message" data-validation="required" class="form-control" id="textarea" rows="5"></textarea>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-content">
                             <div class="btn-group pull-right mt-10" role="group">
                                <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Cancel</button>
                                <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>contact</button>
                            </div> 
                        </div>
                    </div>
                </div>                   
            </div>
        </form>  
        </div>
    </div>
</section>
