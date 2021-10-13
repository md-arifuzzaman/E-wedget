<?php
    echo'<!-- about three area start here  -->
    <section class="about-area-three section ">';
        $loop=0;
        if ($settings['content_list3']) {
            foreach ($settings['content_list3'] as $list) {
                $loop++;
                echo  get_that_image($list['image3'], 'ellipse'.$loop);
            }
        }
        echo'<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="about-img text-center">
                    '.get_that_image($settings['image']).'
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about-info">
                        <div class="section-title-four ">
                            <h2 class="title">'.$settings['title'].'</h2>
                        </div>
                        <p>'.$settings['info'].'</p>
                        <a class="primary-btn-four" '.get_that_link($settings['link']).'>'.$settings['button'].'</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about three area start here  -->';