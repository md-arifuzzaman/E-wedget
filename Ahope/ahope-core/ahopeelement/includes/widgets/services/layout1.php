<?php
echo ' <!-- Start Service Section  -->
    <section class="service_area_2">
            <div class="row text-center">';
if( $wp_query->have_posts() ) {
    while( $wp_query->have_posts() ) {
        $wp_query->the_post();
        echo '<div class="col-lg-4 col-md-6">
                    <div class="single_service_item_2">
                        <div class="service_img">
                            <div class="service_img_tablecell">
                               '.get_the_post_thumbnail().'
                            </div>
                        </div>
                        <h3>' . get_the_title() . '</h3>
                        <p>' . get_the_excerpt(). '</p>
                        <a href="' . get_the_permalink() . '" class="boxed_btn"><span>'.$settings['btn'].'</span></a>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo'</div>
    </section>
    <!-- End Service Section  -->
    ';