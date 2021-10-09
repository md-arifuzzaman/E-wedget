<?php
echo '     <!-- Start Feature Section -->
    <section class="feature_7">
            <div class="row align-items-center ">';
if( $wp_query->have_posts() ) {
    while( $wp_query->have_posts() ) {
        $wp_query->the_post();
        echo '<div class="col-md-6 col-lg-3">
                    <div class="single_feature_item_11">
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