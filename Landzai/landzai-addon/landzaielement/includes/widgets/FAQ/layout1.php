<?php
    echo ' <!-- faq area start here  -->
    <section class="faq-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">'.$settings['title'].'</h2>
                        <p class="sub-title">'.$settings['info'].'</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="faq-list">
                        <div class="accordion" id="accordionExample">';

    if ($settings['faq_list']) {
        $index = 0;
        foreach ($settings['faq_list'] as $faq) {
            $index++;
            if ($index == 0){
                $show = 'show';
                $collapsed = '';
            } else {
                $show = '';
                $collapsed = 'collapsed';
            }
            echo '<div class="card">
                                <div class="card-header" id="heading'.$faq['_id'].'">
                                    <button type="button" class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#collapse'.$faq['_id'].'">'.$faq['f_title'].'</button>
                                </div>
                                <div id="collapse'.$faq['_id'].'" class="collapse '.$show.'" aria-labelledby="heading'.$faq['_id'].'" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>'.$faq['f_info'].' </p>
                                    </div>
                                </div>
                            </div>';
        }
    }
            echo '</div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="faq-img">
                        '.get_that_image($settings['image']).'
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq area end here  -->';