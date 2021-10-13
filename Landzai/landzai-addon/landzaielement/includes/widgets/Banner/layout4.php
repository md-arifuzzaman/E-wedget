<?php
    echo'<!-- hero banner area start here  -->
    <section class="banner-area-v4">';
    $loop=0;
    if ($settings['icon_list']) {
        foreach ($settings['icon_list'] as $list) {
            $loop++;
            echo  get_that_image($list['icon'], 'ellipse'.$loop);
        }
    }
        echo'<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="banner-info">
                        <h2>'.$settings['title'].'</h2>
                        <p>'.$settings['info'].'</p>
                        <ul class="banner-btn-list">
                            <li><a class="primary-btn-four" '.get_that_link($settings['link1']).'>'.$settings['button1'].'</a></li>
                            <li><a '.get_that_link($settings['link2']).' class="primary-btn-four video-btn popup-video" data-autoplay="true" data-vbtype="video"><i class="icon fas fa-play"></i>'.$settings['button2'].'</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="banner-image">
                    '.get_that_image($settings['image']).'
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero banner area end here  -->';