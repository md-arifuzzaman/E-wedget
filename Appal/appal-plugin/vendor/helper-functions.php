<?php
function appal_menu_query() {
    $menus = wp_get_nav_menus();
    $items = array();
    $i     = 0;
    foreach ( $menus as $menu ) {
        if ( $i == 0 ) {
            $default = $menu->slug;
            $i ++;
        }
        $items[ $menu->slug ] = $menu->name;
    }

    return $items;
}

function appal_post_query($type = '')
{
    $args = array(
        'numberposts' => -1,
        'post_type'   => $type
    );

    $posts = get_posts( $args );
    $list = array();
    foreach ($posts as $cpost){
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}
function appal_single_cate($taxonomy){

    global $post;
    $output='';
    $ids=  $taxonomy;
    $terms = wp_get_post_terms($post->ID, $ids);
    $separator = ', ';
    if($terms){
        foreach($terms as $term) {
            $term_link = get_term_link($term);
            $output .='<a href="' . esc_url($term_link) . '">'.$term->name.'</a>'.$separator;
        }
    }
    return trim($output, $separator);
}
function appal_cate_query($tax) {

    $categories_obj = get_categories('taxonomy='.$tax.'');
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
    }
    return $categories;
}
function appal_render_template($template)
{
    return do_shortcode('[INSERT_ELEMENTOR id="' . $template . '"]');

}