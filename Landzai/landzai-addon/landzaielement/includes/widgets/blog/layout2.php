<?php
    echo'<!-- blog area two start here  -->
    <section class="blog-area-two section section-bg pb-90">
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
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="' . get_the_permalink() . '">';
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('full');
                            }
                            echo '</a>
                        </div>
                        <div class="blog-info">
                            <h3 class="blog-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>
                            <ul class="blog-meta">
                                <li><a href="'.get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('j')).'"><i class="far fa-calendar"></i> '.get_the_time('j F, Y').'</a></li>
                                <li><a href="#"><i class="far fa-clock"></i> '.display_read_time().' Min To Read</a></li>
                            </ul>
                            <p class="blog-cotent">' . get_the_excerpt() . '</p>
                            <a href="' . get_the_permalink() . '" class="blog-btn">Read More</a>
                        </div>
                    </div>
                </div>';
            }
            wp_reset_postdata();
        }
        echo '</div>
        </div>
    </section>
    <!-- blog area two end here  -->';