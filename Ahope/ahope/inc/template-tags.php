<?php

/**
 * 
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 */

function ahope_theme_options($opt){
	$options = get_option('_ahopeoption');
	if (isset($options[$opt])){
		return $options[$opt];
	}
}

function ahope_theme_meta($opt)
{
    $options = get_post_meta(get_the_ID(), '_ahopemeta', 'true');
    if (isset($options[$opt])) {
        return $options[$opt];
    }
}

function ahope_post_author(){
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( '%s', 'By:', 'ahope' ),
		'<a class="b_author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="ti-user"></i>' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo wp_kses_post($byline);
}

function ahope_post_date(){

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_attr( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_attr( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( '%s', 'post date', 'ahope' ),
		$time_string
	);

	echo '<span class="single-date"><i class="fas fa-clock"></i> '.$posted_on.'</span>';
}

function ahope_category(){

        if ( 'post' == get_post_type() ) {
            $categories = get_the_category();
            $separator = ' '; 
             
            $output = '';
            if($categories){
                foreach($categories as $category) {
          
                    $output .= '<a class="cat-bg" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
                }
            $cat= trim($output, $separator);
            echo '<span class="catbg-wrap">'.$cat.'</span>';
            }
        }

}

add_filter('wp_list_categories', 'ahope_cat_count_span');
function ahope_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="cat-num">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}
function ahope_style_the_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="cat-num">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('get_archives_link', 'ahope_style_the_archive_count');

add_filter('wp_generate_tag_cloud', 'ahope_tagcloud_inline_style',10,1);
function ahope_tagcloud_inline_style($input){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input); 
}

function ahope_comment(){
    if ( ! post_password_required() ) {

        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

        if ( comments_open() ) {
            if ( $num_comments == 0 ) {
                $comments = esc_attr__('0 Comment', 'ahope');
            } elseif ( $num_comments > 1 ) {
                $comments = $num_comments . esc_attr__('Comments', 'ahope');
            } else {
                $comments = esc_attr__('1 Comment','ahope');
            }
            $write_comments = $comments;

        } else {
            $write_comments =  esc_attr__('off', 'ahope');
        }
        echo '<a href="'.get_the_permalink().'" class="b_comments"><i class="ti-comments"></i> '.$write_comments.'</a>';
    }
}

function ahope_html($out){
	return $out;
}


