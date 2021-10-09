<?php
echo ' <section class="blog_area">
            <div class="row  justify-content-center">';
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();
        echo '<div class="col-md-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="blog_img blog_bg_1" data-background="'.get_the_post_thumbnail_url().'">
                            '.ahope_single_category().'
                        </div>
                        <div class="blog_content">
                            <a href="' . get_the_permalink() . '"><h2>' . get_the_title() . '</h2></a>
                            <p>' . get_the_excerpt() . '</p>
                            <div class="blog-meta-area">
                                <a href="'.get_author_posts_url(get_the_author_meta('ID')).'" class="auth-meta">'.get_avatar(get_the_author_meta('ID')).' '.get_the_author().'</a>
                                <a href="'.get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('j')).'" class="time-meta">'.get_the_time('M j, Y').'</a>
                                <a href="#" class="share-meta"><i class="fas fa-share-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>';
    }
    wp_reset_postdata();
}
echo '</div>
    </section>
<!-- End Blog Section -->';