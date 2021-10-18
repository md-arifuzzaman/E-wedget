<?php
    echo'<!-- faq-area two start here  -->
    <section class="faq-area-two section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title-four mb-45 text-center ">
                        <h2 class="title">'.$settings['title'].'</h2>
                        <p class="sub-title">'.$settings['info'].'</p>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordion-faq-two">
                <div class="row">
                    <div class="col-lg-6">';

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
                                <button type="button" class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#collapse'.$faq['_id'].'"> '.$faq['f_title'].'</button>
                            </div>
                            <div id="collapse'.$faq['_id'].'" class="collapse '.$show.'" aria-labelledby="heading'.$faq['_id'].'" data-parent="#accordion-faq-two">
                                <div class="card-body">
                                    <p>'.$faq['f_info'].'</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
                        echo '</div>
                    <div class="col-lg-6">';

                    if ($settings['faq_list2']) {
                        $index = 0;
                        foreach ($settings['faq_list2'] as $faq2) {
                            $index++;
                            if ($index == 0){
                                $show = 'show';
                                $collapsed = '';
                            } else {
                                $show = '';
                                $collapsed = 'collapsed';
                            }
                            echo '<div class="card">
                            <div class="card-header" id="heading'.$faq2['_id'].'">
                                <button type="button" class="btn btn-link '.$collapsed.'" data-toggle="collapse" data-target="#collapse'.$faq2['_id'].'"> '.$faq2['f_title2'].'</button>
                            </div>
                            <div id="collapse'.$faq2['_id'].'" class="collapse '.$show.'" aria-labelledby="heading'.$faq2['_id'].'" data-parent="#accordion-faq-two">
                                <div class="card-body">
                                    <p>'.$faq2['f_info2'].'</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
                        echo '</div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq-area two end here  -->';