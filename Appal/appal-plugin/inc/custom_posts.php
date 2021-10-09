<?php


if (!function_exists('appal_client')) {

// Register Client
    function appal_client()
    {

        $labels = array(
            'name' => esc_html_x('Clients', 'Post Type General Name', 'appal'),
            'singular_name' => esc_html_x('Client', 'Post Type Singular Name', 'appal'),
            'menu_name' => esc_html__('Clients', 'appal'),
            'name_admin_bar' => esc_html__('Clients', 'appal'),
            'archives' => esc_html__('Item Archives', 'appal'),
            'attributes' => esc_html__('Item Attributes', 'appal'),
            'parent_item_colon' => esc_html__('Parent Item:', 'appal'),
            'all_items' => esc_html__('All Items', 'appal'),
            'add_new_item' => esc_html__('Add New Item', 'appal'),
            'add_new' => esc_html__('Add New', 'appal'),
            'new_item' => esc_html__('New Item', 'appal'),
            'edit_item' => esc_html__('Edit Item', 'appal'),
            'update_item' => esc_html__('Update Item', 'appal'),
            'view_item' => esc_html__('View Item', 'appal'),
            'view_items' => esc_html__('View Items', 'appal'),
            'search_items' => esc_html__('Search Item', 'appal'),
            'not_found' => esc_html__('Not found', 'appal'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'appal'),
            'featured_image' => esc_html__('Featured Image', 'appal'),
            'set_featured_image' => esc_html__('Set featured image', 'appal'),
            'remove_featured_image' => esc_html__('Remove featured image', 'appal'),
            'use_featured_image' => esc_html__('Use as featured image', 'appal'),
            'insert_into_item' => esc_html__('Insert into item', 'appal'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'appal'),
            'items_list' => esc_html__('Items list', 'appal'),
            'items_list_navigation' => esc_html__('Items list navigation', 'appal'),
            'filter_items_list' => esc_html__('Filter items list', 'appal'),
        );
        $args = array(
            'label' => esc_html__('Client', 'appal'),
            'description' => esc_html__('Post Type Description', 'appal'),
            'labels' => $labels,
            'supports' => array('title', 'thumbnail'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-businessman',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('client', $args);

    }

    add_action('init', 'appal_client', 0);

}

if (!function_exists('appal_tab_content')) {

// Register Tab Content
    function appal_tab_content()
    {

        $labels = array(
            'name' => esc_html_x('Tab Content', 'Post Type General Name', 'appal'),
            'singular_name' => esc_html_x('Tab Content', 'Post Type Singular Name', 'appal'),
            'menu_name' => esc_html__('Tab Content', 'appal'),
            'name_admin_bar' => esc_html__('Tab Content', 'appal'),
            'archives' => esc_html__('Item Archives', 'appal'),
            'attributes' => esc_html__('Item Attributes', 'appal'),
            'parent_item_colon' => esc_html__('Parent Item:', 'appal'),
            'all_items' => esc_html__('All Items', 'appal'),
            'add_new_item' => esc_html__('Add New Item', 'appal'),
            'add_new' => esc_html__('Add New', 'appal'),
            'new_item' => esc_html__('New Item', 'appal'),
            'edit_item' => esc_html__('Edit Item', 'appal'),
            'update_item' => esc_html__('Update Item', 'appal'),
            'view_item' => esc_html__('View Item', 'appal'),
            'view_items' => esc_html__('View Items', 'appal'),
            'search_items' => esc_html__('Search Item', 'appal'),
            'not_found' => esc_html__('Not found', 'appal'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'appal'),
            'featured_image' => esc_html__('Featured Image', 'appal'),
            'set_featured_image' => esc_html__('Set featured image', 'appal'),
            'remove_featured_image' => esc_html__('Remove featured image', 'appal'),
            'use_featured_image' => esc_html__('Use as featured image', 'appal'),
            'insert_into_item' => esc_html__('Insert into item', 'appal'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'appal'),
            'items_list' => esc_html__('Items list', 'appal'),
            'items_list_navigation' => esc_html__('Items list navigation', 'appal'),
            'filter_items_list' => esc_html__('Filter items list', 'appal'),
        );
        $args = array(
            'label' => esc_html__('Tab Content', 'appal'),
            'description' => esc_html__('Post Type Description', 'appal'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-editor-kitchensink',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('tab_content', $args);

    }

    add_action('init', 'appal_tab_content', 0);

}

if (!function_exists('appal_services_content')) {

// Register Service
    function appal_services_content()
    {

        $labels = array(
            'name' => esc_html_x('Services', 'Post Type General Name', 'appal'),
            'singular_name' => esc_html_x('Service', 'Post Type Singular Name', 'appal'),
            'menu_name' => esc_html__('Services', 'appal'),
            'name_admin_bar' => esc_html__('Services', 'appal'),
            'archives' => esc_html__('Item Archives', 'appal'),
            'attributes' => esc_html__('Item Attributes', 'appal'),
            'parent_item_colon' => esc_html__('Parent Item:', 'appal'),
            'all_items' => esc_html__('All Items', 'appal'),
            'add_new_item' => esc_html__('Add New Item', 'appal'),
            'add_new' => esc_html__('Add New', 'appal'),
            'new_item' => esc_html__('New Item', 'appal'),
            'edit_item' => esc_html__('Edit Item', 'appal'),
            'update_item' => esc_html__('Update Item', 'appal'),
            'view_item' => esc_html__('View Item', 'appal'),
            'view_items' => esc_html__('View Items', 'appal'),
            'search_items' => esc_html__('Search Item', 'appal'),
            'not_found' => esc_html__('Not found', 'appal'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'appal'),
            'featured_image' => esc_html__('Featured Image', 'appal'),
            'set_featured_image' => esc_html__('Set featured image', 'appal'),
            'remove_featured_image' => esc_html__('Remove featured image', 'appal'),
            'use_featured_image' => esc_html__('Use as featured image', 'appal'),
            'insert_into_item' => esc_html__('Insert into item', 'appal'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'appal'),
            'items_list' => esc_html__('Items list', 'appal'),
            'items_list_navigation' => esc_html__('Items list navigation', 'appal'),
            'filter_items_list' => esc_html__('Filter items list', 'appal'),
        );
        $args = array(
            'label' => esc_html__('Service', 'appal'),
            'description' => esc_html__('Post Type Description', 'appal'),
            'labels' => $labels,
            'supports' => array('title',),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-megaphone',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('service', $args);

    }

    add_action('init', 'appal_services_content', 0);

}

if (!function_exists('appal_testimonials')) {

// Register Custom Post Type
    function appal_testimonials()
    {

        $labels = array(
            'name' => esc_html_x('Testimonials', 'Post Type General Name', 'appal'),
            'singular_name' => esc_html_x('Testimonial', 'Post Type Singular Name', 'appal'),
            'menu_name' => esc_html__('Testimonials', 'appal'),
            'name_admin_bar' => esc_html__('Testimonials', 'appal'),
            'archives' => esc_html__('Item Archives', 'appal'),
            'parent_item_colon' => esc_html__('Parent Item:', 'appal'),
            'all_items' => esc_html__('All Items', 'appal'),
            'add_new_item' => esc_html__('Add New Item', 'appal'),
            'add_new' => esc_html__('Add New', 'appal'),
            'new_item' => esc_html__('New Item', 'appal'),
            'edit_item' => esc_html__('Edit Item', 'appal'),
            'update_item' => esc_html__('Update Item', 'appal'),
            'view_item' => esc_html__('View Item', 'appal'),
            'search_items' => esc_html__('Search Item', 'appal'),
            'not_found' => esc_html__('Not found', 'appal'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'appal'),
            'featured_image' => esc_html__('Featured Image', 'appal'),
            'set_featured_image' => esc_html__('Set featured image', 'appal'),
            'remove_featured_image' => esc_html__('Remove featured image', 'appal'),
            'use_featured_image' => esc_html__('Use as featured image', 'appal'),
            'insert_into_item' => esc_html__('Insert into item', 'appal'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'appal'),
            'items_list' => esc_html__('Items list', 'appal'),
            'items_list_navigation' => esc_html__('Items list navigation', 'appal'),
            'filter_items_list' => esc_html__('Filter items list', 'appal'),
        );
        $args = array(
            'label' => esc_html__('Testimonial', 'appal'),
            'description' => esc_html__('Post Type Description', 'appal'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail',),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-smiley',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('testimonials', $args);

    }

    add_action('init', 'appal_testimonials', 0);

}

if (!function_exists('appal_pricing_table')) {

// Register Pricing Table
    function appal_pricing_table()
    {

        $labels = array(
            'name' => esc_html_x('Pricing Table', 'Post Type General Name', 'appal'),
            'singular_name' => esc_html_x('Pricing Table', 'Post Type Singular Name', 'appal'),
            'menu_name' => esc_html__('Pricing Table', 'appal'),
            'name_admin_bar' => esc_html__('Pricing Table', 'appal'),
            'archives' => esc_html__('Item Archives', 'appal'),
            'attributes' => esc_html__('Item Attributes', 'appal'),
            'parent_item_colon' => esc_html__('Parent Item:', 'appal'),
            'all_items' => esc_html__('All Items', 'appal'),
            'add_new_item' => esc_html__('Add New Item', 'appal'),
            'add_new' => esc_html__('Add New', 'appal'),
            'new_item' => esc_html__('New Item', 'appal'),
            'edit_item' => esc_html__('Edit Item', 'appal'),
            'update_item' => esc_html__('Update Item', 'appal'),
            'view_item' => esc_html__('View Item', 'appal'),
            'view_items' => esc_html__('View Items', 'appal'),
            'search_items' => esc_html__('Search Item', 'appal'),
            'not_found' => esc_html__('Not found', 'appal'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'appal'),
            'featured_image' => esc_html__('Featured Image', 'appal'),
            'set_featured_image' => esc_html__('Set featured image', 'appal'),
            'remove_featured_image' => esc_html__('Remove featured image', 'appal'),
            'use_featured_image' => esc_html__('Use as featured image', 'appal'),
            'insert_into_item' => esc_html__('Insert into item', 'appal'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'appal'),
            'items_list' => esc_html__('Items list', 'appal'),
            'items_list_navigation' => esc_html__('Items list navigation', 'appal'),
            'filter_items_list' => esc_html__('Filter items list', 'appal'),
        );
        $args = array(
            'label' => esc_html__('Pricing Table', 'appal'),
            'description' => esc_html__('Post Type Description', 'appal'),
            'labels' => $labels,
            'supports' => array('title'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-grid-view',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('pricing_table', $args);

    }

    add_action('init', 'appal_pricing_table', 0);

}

if (!function_exists('appal_team_member')) {

// Register Team
    function appal_team_member()
    {

        $labels = array(
            'name' => esc_html_x('Team', 'Post Type General Name', 'appal'),
            'singular_name' => esc_html_x('Team', 'Post Type Singular Name', 'appal'),
            'menu_name' => esc_html__('Team', 'appal'),
            'name_admin_bar' => esc_html__('Team', 'appal'),
            'archives' => esc_html__('Item Archives', 'appal'),
            'attributes' => esc_html__('Item Attributes', 'appal'),
            'parent_item_colon' => esc_html__('Parent Item:', 'appal'),
            'all_items' => esc_html__('All Items', 'appal'),
            'add_new_item' => esc_html__('Add New Item', 'appal'),
            'add_new' => esc_html__('Add New', 'appal'),
            'new_item' => esc_html__('New Item', 'appal'),
            'edit_item' => esc_html__('Edit Item', 'appal'),
            'update_item' => esc_html__('Update Item', 'appal'),
            'view_item' => esc_html__('View Item', 'appal'),
            'view_items' => esc_html__('View Items', 'appal'),
            'search_items' => esc_html__('Search Item', 'appal'),
            'not_found' => esc_html__('Not found', 'appal'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'appal'),
            'featured_image' => esc_html__('Featured Image', 'appal'),
            'set_featured_image' => esc_html__('Set featured image', 'appal'),
            'remove_featured_image' => esc_html__('Remove featured image', 'appal'),
            'use_featured_image' => esc_html__('Use as featured image', 'appal'),
            'insert_into_item' => esc_html__('Insert into item', 'appal'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'appal'),
            'items_list' => esc_html__('Items list', 'appal'),
            'items_list_navigation' => esc_html__('Items list navigation', 'appal'),
            'filter_items_list' => esc_html__('Filter items list', 'appal'),
        );
        $args = array(
            'label' => esc_html__('Team', 'appal'),
            'description' => esc_html__('Post Type Description', 'appal'),
            'labels' => $labels,
            'supports' => array('title', 'thumbnail'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-users',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('team', $args);

    }

    add_action('init', 'appal_team_member', 0);

}

if (!function_exists('appal_faq_content')) {

// Register Custom Post Type
    function appal_faq_content()
    {

        $labels = array(
            'name' => esc_html_x('FAQ Content', 'Post Type General Name', 'appal'),
            'singular_name' => esc_html_x('FAQ Content', 'Post Type Singular Name', 'appal'),
            'menu_name' => esc_html__('FAQ Content', 'appal'),
            'name_admin_bar' => esc_html__('FAQ Content', 'appal'),
            'archives' => esc_html__('Item Archives', 'appal'),
            'attributes' => esc_html__('Item Attributes', 'appal'),
            'parent_item_colon' => esc_html__('Parent Item:', 'appal'),
            'all_items' => esc_html__('All Items', 'appal'),
            'add_new_item' => esc_html__('Add New Item', 'appal'),
            'add_new' => esc_html__('Add New', 'appal'),
            'new_item' => esc_html__('New Item', 'appal'),
            'edit_item' => esc_html__('Edit Item', 'appal'),
            'update_item' => esc_html__('Update Item', 'appal'),
            'view_item' => esc_html__('View Item', 'appal'),
            'view_items' => esc_html__('View Items', 'appal'),
            'search_items' => esc_html__('Search Item', 'appal'),
            'not_found' => esc_html__('Not found', 'appal'),
            'not_found_in_trash' => esc_html__('Not found in Trash', 'appal'),
            'featured_image' => esc_html__('Featured Image', 'appal'),
            'set_featured_image' => esc_html__('Set featured image', 'appal'),
            'remove_featured_image' => esc_html__('Remove featured image', 'appal'),
            'use_featured_image' => esc_html__('Use as featured image', 'appal'),
            'insert_into_item' => esc_html__('Insert into item', 'appal'),
            'uploaded_to_this_item' => esc_html__('Uploaded to this item', 'appal'),
            'items_list' => esc_html__('Items list', 'appal'),
            'items_list_navigation' => esc_html__('Items list navigation', 'appal'),
            'filter_items_list' => esc_html__('Filter items list', 'appal'),
        );
        $args = array(
            'label' => esc_html__('FAQ Content', 'appal'),
            'description' => esc_html__('Post Type Description', 'appal'),
            'labels' => $labels,
            'supports' => array('title'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-editor-help',
            'show_in_admin_bar' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('faq_content', $args);

    }

    add_action('init', 'appal_faq_content', 0);
    // Builder Post Type
    function appal_builder_post_type()
    {
        $labels = array(
            'name' => __('Appal Builder', 'appal'),
            'singular_name' => __('Appal Builder', 'appal'),
            'add_new' => __('Add appal builder', 'appal'),
            'add_new_item' => __('Add appal builder', 'appal'),
            'edit_item' => __('Edit appal builder', 'appal'),
            'new_item' => __('New appal builder', 'appal'),
            'all_items' => __('All appal builder', 'appal'),
            'view_item' => __('View appal builder', 'appal'),
            'search_items' => __('Search appal builder', 'appal'),
            'not_found' => __('No appal builder found', 'appal'),
            'not_found_in_trash' => __('No portfolio found in the trash', 'appal'),
            'parent_item_colon' => '',
            'menu_name' => __('Appal Builder', 'appal')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'menu_position' => 3,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'elementor'),
            'has_archive' => false,
        );
        register_post_type('appal_builders', $args);
    }

    add_action('init', 'appal_builder_post_type');
    function create_builder_post_taxonomy()
    {
        $labels = array(
            'name' => __('Category', 'appal'),
            'singular_name' => __('Category', 'appal'),
            'search_items' => __('Search categories', 'appal'),
            'all_items' => __('Categories', 'appal'),
            'parent_item' => __('Parent category', 'appal'),
            'parent_item_colon' => __('Parent category:', 'appal'),
            'edit_item' => __('Edit category', 'appal'),
            'update_item' => __('Update category', 'appal'),
            'add_new_item' => __('Add category', 'appal'),
            'new_item_name' => __('New category', 'appal'),
            'menu_name' => __('Category', 'appal'),
        );
        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'rewrite' => array('slug' => 'appal_builder_cat'),
        );
        register_taxonomy('appal_builder_cat', 'appal_builders', $args);
    }

    add_action('init', 'create_builder_post_taxonomy');
}