<?php
    echo'<!-- features-area-three start here  -->
    <section class="features-area-three section-top pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title-four mb-45 text-center ">
                        <h2 class="title">'.$settings['title'].'</span></h2>
                        <p class="sub-title">'.$settings['info'].'</p>
                    </div>
                </div>
            </div>
            <div class="row">';
            $loop=0;
            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    $loop++;
                        if($loop==2){
                            $f_bg='bg-two';
                        }else{
                            $f_bg='';
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
                            <a class="arrow-btn" '.get_that_link($settings['link']).'><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>';
            }
            wp_reset_postdata();
        }
        echo '</div>
        </div>
    </section>
    <!-- features-area-three end here  -->';