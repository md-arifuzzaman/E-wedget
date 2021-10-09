<?php
echo ' <!-- Start Blog Section -->
    <section class="blog_area_4">
            <div class="row">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-md-4">
                    <div class="single_blog_item_3">
                        <div class="blog_img">
                            '.get_the_post_thumbnail().'
                        </div>
                        <a class="blog_info" href="' . get_the_permalink() . '">
                            <p class="meta_date">' . get_the_time('j M') . '</p>
                            <h2>' . get_the_title() . '</h2>
                        </a>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo '</div>
    </section>
    <!-- End Blog Section -->';