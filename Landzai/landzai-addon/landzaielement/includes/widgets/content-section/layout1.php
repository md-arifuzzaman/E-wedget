<?php
    echo '<!-- built app area start here  -->
    <section class="built-app-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="bulit-app-content">
                        <h2>'.$settings['title'].'</h2>
                        <p>'.$settings['info'].'</p>
                        <a '.get_that_link($settings['link']).' class="primary-btn">'.$settings['button'].' <i class="icon fas fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bulit-app-img">
                          '.get_that_image($settings['image']).'
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- built app area end here  -->';