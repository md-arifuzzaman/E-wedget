<?php
    echo'<!-- hero banner area start here  -->
        <section class="banner-area-v2">
            '.get_that_image($settings['top-left-image'], 'dot').'
            '.get_that_image($settings['top-right-image'], 'round-two').'
            '.get_that_image($settings['bottom-left-image'], 'round').'
            '.get_that_image($settings['bottom-right-image'], 'dot-one').'
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="banner-text-wrap">
                            <h2 class="banner-title">'.$settings['title'].'</h2>
                            <p class="banner-content">'.$settings['info'].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero banner area end here  -->
        <!-- subbanner area start here  -->
        <div class="subbanner-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subbanner-img">
                        '.get_that_image($settings['image']).'
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- subbanner area end here  -->';