
<section class="home-top-widgets">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="home-widget widget-1">
                    <i class="fa fa-phone"></i>
                    <h4><?php echo get_phrase('emergency_contact'); ?></h4>
                    <h3><?php echo $phone; ?></h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="home-widget widget-2">
                    <i class="fa fa-calendar"></i>
                    <h4> <?php echo get_phrase('doctor_appointment'); ?></h4>
                    <a href="<?php echo base_url(); ?>home/appointment" 
                        class="btn">
                       <?php echo get_phrase('book_an_appointment'); ?>                  </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="home-widget widget-3">
                    <i class="fa fa-clock-o"></i>
                    <h4>  <?php echo get_phrase('opening_hours'); ?></h4>
                                        <ul>
                         <?php foreach ($openig_hours as $openig_hours_info): ?>  
                             <li class="clearfix"> <?php echo $openig_hours_info['open_day']; ?> 
                            <span class="float-right"> <?php echo $openig_hours_info['open_time']; ?></span></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>