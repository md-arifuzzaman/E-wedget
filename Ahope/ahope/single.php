<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header();
if (is_active_sidebar('sidebar-1')) {
    $main = 'col-md-8';
    $sidebar = 'col-md-4';
} else {
    $main = 'col-md-12';
    $sidebar = 'col-md-12';
}
?>
    <!-- Start Blog Section -->
    <section class="single_blog_with_sidebar">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($sidebar); ?>">
                    <?php get_template_part('layouts/sidebar', 'left'); ?>
                </div>
                <div class="<?php echo esc_attr($main); ?>">
                    <?php if (have_posts()) :

                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            get_template_part('template-parts/singlecontent');

                        endwhile;

                    endif; ?>
                </div>

            </div>
        </div> <!-- end container -->
    </section>

<?php get_footer();