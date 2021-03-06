<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Appal
 */

get_header();

?>

    <div id="primary" class="content-area ">
        <main id="main" class="site-main">
            <?php appal_404_content(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->


<?php
get_footer();
