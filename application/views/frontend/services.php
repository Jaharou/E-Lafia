
<!--<section class="slice slice--arrow bg-base-1">
    <div class="sct-inner container">
        <div class="section-title section-title-inverse section-title--style-1 text-center">
            <h3 class="section-title-inner">
                <span>Our World Class Services</span>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>

        <div class="fluid-paragraph fluid-paragraph-sm text-center">
        </?php echo $this->db->get_where('settings', array('type' => 'service_short_text'))->row()->description; ?>         </div>
    </div>
</section>

<section class="slice-xl sct-color-1 b-xs-bottom">
    <div class="container">
        <div class="row-wrapper">
            <div class="row">
                 </?php foreach ($services as $services_info): ?>  
                <div class="col-lg-6 col-md-12 col-sm-12 col-12"
                    style="margin-top: 10px;">
                    <div class="icon-block icon-block--style-1-v2 block-icon-right block-icon-sm">
                        <div class="block-icon">
                                 <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="block-content">
                            <h3 class="heading heading-5 strong-500">
                                 </?php echo $services_info['service_title']; ?>    </h3>
                            <p>
                                 </?php echo $services_info['description']; ?>      </p>
                        </div>
                    </div>
                </div>
                 </?php endforeach; ?>                      
                            </div>
        </div>
    </div>
</section>
