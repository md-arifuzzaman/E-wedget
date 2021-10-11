<?php
    echo'<!-- about area start here  -->
    <section class="about-area section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image">
                    '.get_that_image($settings['image']).'
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title-two mb-0">
                            <h2 class="title">'.$settings['title'].'</h2>
                            <span class="section-divider"></span>
                        </div>
                        <p>'.$settings['info'].'</p>
                        <a '.get_that_link($settings['link']).' class="primary-btn-two">'.$settings['button'].'</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end here  -->';