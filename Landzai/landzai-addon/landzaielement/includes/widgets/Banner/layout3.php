<?php
    echo'<!-- hero banner area start here  -->
    <section class="banner-area-v3">
        '.get_that_image($settings['top-left-image'], 'tangle-one').'
        '.get_that_image($settings['top-right-image'], 'tangle-two').'
        '.get_that_image($settings['bottom-left-image'], 'tangle-three').'
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="banner-info">
                        <h2>'.$settings['title'].'</h2>
                        <p>'.$settings['info'].'</p>
                        <ul class="banner-btn-list">
                            <li><a class="primary-btn-three" '.get_that_link($settings['link1']).'>'.$settings['button1'].'</a></li>
                            <li><a class="primary-btn-three active" '.get_that_link($settings['link2']).'>'.$settings['button1'].'</a></li>
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