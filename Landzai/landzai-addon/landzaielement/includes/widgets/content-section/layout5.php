<?php
    echo'<!-- highlights-product area start here  -->
    <section class="highlights-product-area section section-bg-two ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="highlights-img text-center">
                    '.get_that_image($settings['image']).'
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="highlights-product-info">
                        <div class="section-title-three mb-37">
                            <h2 class="title">'.$settings['title'].'</h2>
                        </div>
                        <ul class="highlights-features">';
                        if ($settings['content_list5']) {
                            foreach ($settings['content_list5'] as $list5) {
                                echo ' <li>'.$list5['title5'].'</li>';
                            }
                        }
                            echo'</ul>
                        <a class="primary-btn-three" '.get_that_link($settings['link']).'>'.$settings['button'].'</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- highlights-product area end here  -->';