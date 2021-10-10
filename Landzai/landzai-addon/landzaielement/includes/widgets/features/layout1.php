<?php
    echo'<!-- features-area start here  -->
    <section class="features-area section pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-two text-center">
                        <h2 class="title">'.$settings['title'].'</h2>
                        <span class="section-divider"></span>
                    </div>
                </div>
            </div>
            <div class="row">';
            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) {
                    $wp_query->the_post();
                    echo '<div class="col-lg-4 col-md-6">
                    <div class="single-feature text-center">
                        <div class="feature-icon">';
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full');
                        }
                        echo '</div>
                        <div class="feature-info">
                            <h3><a href="#">' . get_the_title() . '</a></h3>
                            <p>' . get_the_excerpt() . '</p>
                        </div>
                    </div>
                </div>';
            }
            wp_reset_postdata();
        }
        echo '

            </div>
        </div>
    </section>
    <!-- features-area end here  -->';