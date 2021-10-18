<?php
    echo'<!-- pricing three ara start here  -->
    <div class="pricing-area-three section-top  pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title-four mb-45 text-center ">
                        <h2 class="title">'.$settings['stitle'].'</h2>
                        <p class="sub-title">'.$settings['sinfo'].'</p>
                    </div>
                </div>
            </div>
            <div class="row">';
             $loop=0;
            if ($settings['price_list']) {
                foreach ($settings['price_list'] as $monthly) {
                    $loop++;
                        if($loop==2){
                            $a_bg='active';
                        }else{
                            $a_bg='';
                        }
                    echo '<div class="col-lg-4 col-md-6">
                    <div class="single-price-table '.$a_bg.'">
                        <div class="price-table-header">
                            <h3>' . $monthly['title'] . '</h3>
                            <h2>' . $monthly['price'] . '</h2>
                        </div>
                        <div class="price-table-body">
                            <ul class="package-feature">';
                            landzai_list_control($monthly['features'], '');
                          echo '</ul>
                        </div>
                        <div class="price-table-footer">
                            <a class="primary-btn-four-solid" ' . get_that_link($monthly['link']) . '>' . $monthly['button'] . '</a>
                        </div>
                    </div>
                </div>';
            }
        }
        echo '</div>
        </div>
    </div>
    <!-- pricing three ara end here  -->';