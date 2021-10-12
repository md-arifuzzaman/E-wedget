<?php
    echo'<!-- about two area start here  -->
    <section class="about-area-two section section-bg-two">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="about-info">
                        <div class="section-title-three mb-37">
                            <h2 class="title">'.$settings['title'].'</h2>
                        </div>
                        <p>'.$settings['info'].'</p>
                    </div>
                    <div class="counter-list">';
                    if ($settings['counter_list']) {
                        foreach ($settings['counter_list'] as $counter) {
                            echo '<div class="single-counter ">
                            <div class="counter-number">
                                <span class="counter">'.$counter['counter_number'].'</span><span>K</span>
                            </div>
                            <h4 class="counter-title">'.$counter['counter_title'].'</h4>
                        </div>';
                    }
                }
                        echo '</div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="about-img text-center">
                    '.get_that_image($settings['image']).'
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about two area start here  -->';