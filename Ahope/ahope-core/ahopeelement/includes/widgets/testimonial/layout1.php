<section class="testimonial_area" data-ahope='<?php echo wp_json_encode($option) ?>'>
<?php
echo '<div class="swiper-container testimonial_wrapper ">
                        <div class="swiper-wrapper">';
if ($settings['member_list']) {
    foreach ($settings['member_list'] as $members) {
        echo '<div class="swiper-slide">
                                    <div class="single_testionial">';
                                        if ($settings['quote'] == 'yes') {
                                            echo '<div class="ticket">
                                            <p><i class="ti-quote-left"></i></p>
                                        </div>';
                                        }
                                        echo '<p>' . $members['member_info'] . '</p>
                                        <h4>' . $members['member_name'] . '<span>' . $members['member_designation'] . '</span></h4>
                                        <div class="triangle"></div>
                                    </div>
                                </div>';
    }
}
echo '</div>
                        <div class="swiper-pagination"></div>
                    </div>
    </section>
    <!-- End Testimonial Section -->';