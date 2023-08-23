                  <!--<section class="swiper-js-container background-image-holder" data-holder-type="fullscreen" data-holder-offset=".navbar">
    <div class="swiper-container" data-swiper-effect="fade" data-swiper-autoplay="true" data-swiper-items="1" data-swiper-space-between="0">
        <div class="swiper-wrapper">
             </?php foreach ($slider as $slider_info): ?>  
                        <!- Slide ->
                <div class="swiper-slide" data-swiper-autoplay="5000">
                    <div class="slice holder-item holder-item-light has-bg-cover bg-size-cover" 
                    style="background-image: url(</?php echo base_url(); ?>/uploads/slider/</?php echo $slider_info['slider_id']; ?>.jpg); background-position: bottom bottom;">
                        <span class="mask mask-dark--style-2"></span>
                        <div class="container d-flex align-items-center no-padding">
                            <div class="col">
                                <div class="row row-cols-xs-spaced align-items-center py-5 text-center text-md-left">
                                    <div class="col-md-7 col-lg-6">
                                        <h2 class="heading heading-1 animated" data-animation-in="bounceInDown" data-animation-delay="200">
                                            </?php echo $slider_info['title']; ?>                                       </h2>

                                        <p class="mt-4 animated" 
                                            data-animation-in="fadeInDown" 
                                                data-animation-delay="1000">
                                            </?php echo $slider_info['content']; ?>                                       </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <!- Slide ->
                </?php endforeach; ?>
                        
            <!- Add Arrows -->
            <!--<div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>

        </div>
    </div>
</section>