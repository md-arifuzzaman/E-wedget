<?php
    echo'<!-- testimonial-four-area start here  -->
    <section class="testimonial-four-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title-four mb-45 text-center ">
                        <h2 class="title">'.$settings['title'].'</h2>
                        <p class="sub-title">'.$settings['info'].'</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="testimonial-slide-four">';
                if ($settings['testi_list']) {
                    foreach ($settings['testi_list'] as $testi) {
                    echo '<div class="sngle-testimonial">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                            <p>'.$testi['t_info'].'
                            </p>
                        </div>
                        <div class="clint-info">
                            <div class="media">
                            '.get_that_image($testi['thumb']).'
                                <div class="media-body align-self-center">
                                  <h3 class="clint-name"><a '.get_that_link($testi['t_link']).'>'.$testi['t_title'].'</a></h3>
                                  <span class="clipnt-profesion">'.$testi['t_subtitle'].'</span>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }
            echo '</div>
            </div>
        </div>
    </section>
    <!-- testimonial-four-area end here  -->';