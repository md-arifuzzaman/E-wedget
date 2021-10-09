<!-- Start testimonial Section -->
<section class="testimonial_2" data-ahope='<?php echo wp_json_encode($option) ?>'>
<?php
echo '<div class="row">
            <div class="testimonial_area_4 swiper-container">
                <div class="swiper-wrapper">';
if ($settings['member_list']) {
    foreach ($settings['member_list'] as $members) {
        echo '<div class="swiper-slide">
                        <div class="single_testionial">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-4 col-lg-3">
                                    <div class="author">
                                        '.get_that_image( $members['member_photo'] ).'
                                        <div class="author_info">
                                            <h4>' . $members['member_name'] . '<span>' . $members['member_designation'] . '</span></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-9">
                                    <div class="content">
                                        <i class="ti-quote-left"></i>
                                        <p>' . $members['member_info'] . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
}
echo '</div>
                <div class="swiper-button-next"><i class="fas fa-long-arrow-alt-right"></i></div>
                <div class="swiper-button-prev"><i class="fas fa-long-arrow-alt-left"></i></div>
            </div>
    </div>
</section>
<!-- End testimonial Section -->';