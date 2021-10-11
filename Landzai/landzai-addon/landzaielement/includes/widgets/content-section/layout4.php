<?php
    echo'<!-- fantastic-area start here  -->
    <div class="fantastic-area ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <div class="fantastic-info">
                        <div class="section-title-two mb-0">
                            <h2 class="title">'.$settings['title'].'</h2>
                            <span class="section-divider"></span>
                            <div class="vedio-btn">
                                <a  '.get_that_link($settings['link']).' class="primary-btn-two popup-video" data-autoplay="true" data-vbtype="video" >'.$settings['button'].'</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="fantastic-image">
                    '.get_that_image($settings['image']).'
                        <a  '.get_that_link($settings['link']).' class="play-btn popup-video" data-autoplay="true" data-vbtype="video" ><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fantastic-area end here  -->';