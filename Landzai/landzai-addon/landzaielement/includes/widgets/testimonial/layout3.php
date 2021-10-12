<?php
    echo'<!-- testimonial-three-area atart here  -->
    <section class="testimonial-three-area section section-bg-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title-three mb-37 text-center ">
                        <h2 class="title">'.$settings['title'].'</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-list-three testimonial-three-active">';

            if ($settings['testi_list']) {
                foreach ($settings['testi_list'] as $testi) {
                echo '<div class="single-testimonial">
                    <div class="testimonial-content">
                        <p>“'.$settings['info'].'</p>
                    </div>
                    <div class="clint-info">
                        <div class="media">
                        '.get_that_image($testi['thumb'],'clint-img').'
                            <div class="media-body align-self-center">
                              <h4 class="clint-name "><a '.get_that_link($testi['t_link']).'>'.$testi['t_title'].'</a></h4>
                              <span>'.$testi['t_subtitle'].'</span>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }
        echo '</div>
        </div>
    </section>
    <!-- testimonial-three-area end here  -->';