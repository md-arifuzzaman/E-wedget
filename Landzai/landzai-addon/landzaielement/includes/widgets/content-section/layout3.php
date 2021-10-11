<?php
    echo'<!-- support area start here  -->
    <section class="support-area section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="support-info">
                        <div class="section-title-two mb-0">
                            <h2 class="title">'.$settings['title'].'</h2>
                            <span class="section-divider"></span>
                        </div>
                        <div class="support-content">
                            <p>'.$settings['info'].'</p>
                        </div>
                        <div class="feature-list">';
                        if ($settings['content_list3']) {
                            foreach ($settings['content_list3'] as $list3) {
                                echo ' <div class="single-feature">
                                <div class="feature-icon">
                                '.get_that_image($list3['image3']).'
                                </div>
                                <h3>'.$list3['title3'].'</h3>
                            </div>';
                        }
                    }
                        echo'</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="support-img">
                    '.get_that_image($settings['image']).'
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- support area end here  -->';