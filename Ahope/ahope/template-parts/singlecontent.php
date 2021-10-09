<div id="post-<?php the_ID(); ?>" <?php post_class('details_section'); ?>>
    <div class="blog_img <?php if (!has_post_thumbnail()) {echo esc_attr('no-blog_img');}; ?>">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php echo esc_url(get_permalink()) ?>"><?php the_post_thumbnail('full'); ?></a>
        <?php endif; ?>
        <div class="blog_meta_list d-flex justify-content-between">
            <a href="<?php echo esc_url(get_day_link(false, false, false)); ?>" class="b_date"><i
                        class="ti-calendar"></i><?php echo get_the_time('j M Y'); ?></a>
            <?php ahope_post_author(); ?>
            <?php ahope_comment(); ?>
            <a href="" class="b_tags"><i class="ti-tag"></i><?php ahope_post_single_tag(); ?></a>
        </div>
    </div>
    <h2 class="b_heading"><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>
    <?php ahope_post_single_share(); ?>
    <?php ahope_related_post(); ?>
    <?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    ?>
</div>