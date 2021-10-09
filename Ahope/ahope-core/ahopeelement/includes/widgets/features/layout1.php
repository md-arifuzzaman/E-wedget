<?php
echo '<!-- Start Feature Section -->
    <section class="feature_area">
            <div class="row text-center">';
if( $wp_query->have_posts() ) {
    while( $wp_query->have_posts() ) {
        $wp_query->the_post();
        echo '<div class="col-md-4">
                    <div class="single_feature_item_14">
                        <div class="gradient_overlay"></div>
                        <div class="feature_img">
                            <div class="feature_img_tablecell">
                                '.get_the_post_thumbnail().'
                            </div>
                        </div>
                       <a href="' . get_the_permalink() . '"><h3>' . get_the_title() . '</h3></a>
                        <p>' . get_the_excerpt() . '</p>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo'</div>
    </section>
    <!-- End Feature Section -->';