<?php
echo '  <!-- banner area start here  -->
        <section class="banner-area">
            <div class="round-shape">
                <span class="round"></span>
                <span class="round"></span>
                <span class="round"></span>
                <span class="round"></span>
                <span class="round"></span>
            </div>
            <div class="trangle-shape">
                <span class="trangle"></span>
                <span class="trangle"></span>
                <span class="trangle"></span>
                <span class="trangle"></span>
                <span class="trangle"></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="banner-text-wrap">
                            <h1 class="banner-title">'.$settings['title'].'</h1>
                            <p class="banner-content">'.$settings['info'].'</p>
                            <ul class="button-lsit">
                                <li><a '.get_that_link($settings['link1']).' class="primary-btn active">'.$settings['button1'].' <i class="icon fas fa-angle-right"></i></a></li>
                                <li><a '.get_that_link($settings['link2']).' class="primary-btn video-btn popup-video" data-autoplay="true" data-vbtype="video">'.$settings['button2'].' <i class="icon fas fa-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-img text-center">
                            '.get_that_image($settings['image'], 'phone-image').'
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area end here  -->';