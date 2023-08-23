
<section class="slice sct-color-1 relative b-xs-bottom department-section">
    <div class="container">
        <div class="section-title section-title--style-1 text-center mb-4">
            <h3 class="section-title-inner text-normal">
                <span> <?php echo get_phrase('departments') ?></span>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>

        <span class="clearfix"></span>

        <span class="space-xs-xl"></span>
        
        <div class="row-wrapper">
            <div class="row">
              
              <?php foreach($department as $dept_info): ?>
                <div class="col-lg-3">
                        <div class="department-small-view">
                            <div class="block-icon text-center">
                                <img src="<?php echo $this->crud_model->get_image_url('department' , $dept_info['department_id']);?>" alt=""
                                    width="60">
                                <h5><?php echo $dept_info['name']; ?></h5>
                            </div>
                        </div>                   
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        
    </div>
</section>