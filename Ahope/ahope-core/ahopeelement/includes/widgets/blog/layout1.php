<section class="blog_area_2" data-ahope='<?php echo wp_json_encode($option) ?>'>
       <?php
       echo '<div class="swiper-container blog_carousel">
            <div class="swiper-wrapper ">';
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            echo '<div class="swiper-slide">
                    <div class=" single_blog_item_2">
                        <div class="blog_img blog_img_1" data-background="'.get_the_post_thumbnail_url().'"></div>
                        <div class="blog_content">
                            <h2>' . get_the_title() . '</h2>
                            <p>' . get_the_excerpt() . '</p>
                            <a href="' . get_the_permalink() . '" class="boxed_btn"><span>Learn More</span></a>
                        </div>
                    </div>
                </div>';
        }
        wp_reset_postdata();
    }
    echo '</div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- End Blog Section -->';