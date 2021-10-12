<?php
    echo'<!-- feedback area start here  -->
    <section class="feedback-area section pb-90 section-bg">
        <div class="container">
            <div class="feedback-top">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title-two mb-0">
                            <h2 class="title">'.$settings['title'].'</h2>
                            <span class="section-divider"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="counter-list">';
                        if ($settings['counter_list']) {
                            foreach ($settings['counter_list'] as $counter) {
                                echo '<div class="single-counter text-center">
                                <div class="counter-number">
                                    <span class="counter">'.$counter['counter_number'].'</span><span>K</span>
                                </div>
                                <h4 class="counter-title">'.$counter['counter_title'].'</h4>
                            </div>';
                        }
                    }
                            echo '</div>
                    </div>
                </div>
            </div>
            <div class="feedback-list">
                <div class="row">';
                    $loop=0;
                if ($settings['conten_list']) {
                    foreach ($settings['conten_list'] as $conten) {
                        $loop++;
                        if($loop==2){
                            $bg='bg-one';
                        }else {
                            $bg='';
                        }
                        echo '<div class="col-lg-4 col-md-6">
                        <div class="single-feedback">
                            <h3 class="feedback-title">
                                <span class="feedback-number '.$bg.'">0'.$loop.'</span> 
                                '.$conten['conten_title'].'
                            </h3>
                            <div class="feedback-content">
                                <p>'.$conten['conten_info'].'</p>
                            </div>
                        </div>
                    </div>
                ';
                }
            }
                    echo '</div>
        </div>
    </section>
    <!-- feedback area end here  -->';