<?php
echo ' <!-- Start Feature Section -->
    <section class="feature_area_2">
            <div class="row ">';
if( $wp_query->have_posts() ) {
    while( $wp_query->have_posts() ) {
        $wp_query->the_post();
        echo '<div class="col-md-6 col-lg-4">
                    <div class="single_feature_item_4">';
                    if (!empty(get_feature_meta('feature_icon'))) {
                        echo '<div class="feature_icon d-flex align-items-center justify-content-center">
                            <i class=" ' . get_feature_meta('feature_icon') . '"></i>
                        </div>';
                    }
                        echo '<h3>' . get_the_title() . '</h3>
                        <p>' . get_the_excerpt() . '</p>
                        <a href="' . get_the_permalink() . '" class="boxed_btn">Learn More<i class="ti-angle-double-right"></i></a>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo'</div>
    </section>
    <!-- End Feature Section -->';