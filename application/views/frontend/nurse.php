
<!--<section class="slice slice--arrow bg-base-1">
    <div class="sct-inner container">
        <div class="section-title section-title-inverse section-title--style-1 text-center">
            <h3 class="section-title-inner">
                <span> </?php echo get_phrase('our_professionals_nurses') ?></span>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>
    </div>
</section>
<section class="slice sct-color-1 relative">
    <div class="container">

        <span class="clearfix"></span>

        <div class="row-wrapper">
            <div class="row department-doctor-list">
                 </?php foreach($nurse as $nurse_info): ?>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="block block--style-4 list doctor-list">
                        <div class="block-image">
                            <div class="view view-fifth">
                                <img src="</?php echo $this->crud_model->get_image_url('nurse' , $nurse_info['nurse_id']);?>" class="img-circle" width="300px" height="300px">
                                <div class="mask">
                                    <div class="view-buttons">
                                        <span class="view-buttons-inner text-center appointment-btn">                                          
                                                  <a href="</?php echo base_url();?>home/nurse/</?php echo $nurse_info['nurse_id']?>" class="btn btn-styled btn-base-1 btn-outline btn-icon-left ">
                                                   </?php echo get_phrase('view_details') ?>        
                                                </a> 
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content w-100">
                            <div class="block-body py-2 px-0">                              
                                <h3 class="heading heading-5 strong-500">
                                        </?php echo $nurse_info['name']; ?> 
                                </h3>
                            </div>
                            <div class="block-footer block-footer-fixed-bottom b-xs-top">
                            </div>
                        </div>
                    </div>
                </div>
            </?php endforeach; ?>    
            </div>
        </div>
    </div>
</section>