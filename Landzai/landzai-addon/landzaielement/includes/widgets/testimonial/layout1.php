<?php
    echo '<!-- testimonial area start here  -->
    <section class="testimonial-area section" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                         <h2 class="title">'.$settings['title'].'</h2>
                        <p class="sub-title">'.$settings['info'].'</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slide">';

        if ($settings['testi_list']) {
            foreach ($settings['testi_list'] as $testi) {
            echo '<div class="sigle-testimonial text-center">
                            <div class="quote-iocn">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <div class="clint-image">
                               '.get_that_image($testi['thumb']).'
                            </div>
                            <p>'.$testi['t_info'].'</p>
                            <div class="clinmg-info">
                                <h4><a '.get_that_link($testi['t_link']).'>'.$testi['t_title'].'</a></h4>
                                <span>'.$testi['t_subtitle'].'</span>
                            </div>
                        </div>';
                }
            }
            echo ' </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end here  -->';