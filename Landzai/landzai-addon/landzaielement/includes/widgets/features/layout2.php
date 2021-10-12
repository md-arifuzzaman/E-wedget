<?php
    echo'<!-- features-area-two start here  -->
    <section class="features-area-two section-top pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title-three mb-37 text-center ">
                        <h2 class="title">'.$settings['title'].'</h2>
                    </div>
                </div>
            </div>
            <div class="row">';
            $loop=0;
            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    $loop++;
                            if($loop==1){
                                $f_bg='';
                            }elseif($loop==2) {
                                $f_bg='bg-two';
                            }elseif($loop==3) {
                                $f_bg='bg-three';
                            }elseif($loop==4) {
                                $f_bg='bg-four';
                            }elseif($loop==5) {
                                $f_bg='bg-five';
                            }else {
                                $f_bg='bg-six';
                            }
                    echo '<div class="col-lg-4 col-md-6">
                    <div class="single-features text-center">
                        <div class="features-icon '.$f_bg.'">';
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full');
                        }
                        echo '</div>
                        <div class="features-info">
                            <h3>' . get_the_title() . '</h3>
                            <p>' . get_the_excerpt() . '</p>
                        </div>
                    </div>
                </div>';
            }
            wp_reset_postdata();
        }
        echo '</div>
        </div>
    </section>
    <!-- features-area-two end here  -->';