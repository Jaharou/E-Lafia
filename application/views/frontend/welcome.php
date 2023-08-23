<section class="slice sct-color-2 pb-0">
    <div class="container">
        <div class="row align-items-md-center">
            
            <div class="col col-md-6 col-sm-12 col-12">
                <img src="<?php echo base_url(); ?>/uploads/fronted/welcome.png" 
                    class="img-fluid img-center">
            </div>
            
            <div class="col col-md-6 col-sm-12 col-12">
                <div class="px-3 py-3 text-center text-lg-left">
                    <h3 class="heading heading-3 strong-500">
                        Welcome To <?php echo $system_title; ?>                  </h3>
                    <p class="mt-4">
                       <?php echo $this->db->get_where('settings', array('type' => 'welcome_message'))->row()->description; ?>                    </p>
                </div>
            </div>

        </div>
    </div>
</section>