<?php
echo '<section class="feature_6">
            <div class="row ">';
if( $wp_query->have_posts() ) {
    while( $wp_query->have_posts() ) {
        $wp_query->the_post();
        echo '<div class="col-12 col-md-6 col-lg-3">
                    <div class="single_feature_item_5">
                        <div class="feature_icon d-flex align-items-center justify-content-center">
                            '.get_the_post_thumbnail().'
                        </div>
                        <a href="'.get_the_permalink().'"><h3>' . get_the_title() . '</h3></a>
                       <p>' . get_the_excerpt() . '</p>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo'</div>
    </section>
    <!-- End Feature Section -->';