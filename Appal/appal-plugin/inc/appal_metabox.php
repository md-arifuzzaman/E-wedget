<?php


add_action('cmb2_init', 'appal_metabox_options');

function appal_metabox_options()
{
    // Start with an underscore to hide fields from custom fields list
    $prefix = '_appal_';

    // Page Options

    $cmb2_post_page_opt = new_cmb2_box(array(
        'id' => $prefix . 'page_option',
        'title' => esc_html__('Options', 'appal'),
        'object_types' => array('page', 'post', 'product'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));
    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Custom Header', 'appal'),
        'id' => $prefix . 'meta_header_switch',
        'desc' => esc_html__('Switch for custom header', 'appal'),
        'type' => 'radio_inline',
        'options' => array(
            'header_on' => __( 'Turn On', 'appal' ),
            'header_off'   => __( 'Turn Off', 'appal' ),
        ),
        'default' => 'header_off',
    ));
    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Select Header', 'appal'),
        'id' => $prefix . 'meta_header',
        'desc' => esc_html__('Select Custom Header ', 'appal'),
        'type' => 'select',
        'options' => appal_post_query('appal_builders'),
    ));
    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Custom Footer', 'appal'),
        'id' => $prefix . 'meta_footer_switch',
        'desc' => esc_html__('Switch for custom footer', 'appal'),
        'type' => 'radio_inline',
        'options' => array(
            'footer_on' => __( 'Turn On', 'appal' ),
            'footer_off'   => __( 'Turn Off', 'appal' ),
        ),
        'default' => 'footer_off',
    ));
    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Select Footer', 'appal'),
        'id' => $prefix . 'meta_footer',
        'desc' => esc_html__('Select Custom Footer ', 'appal'),
        'type' => 'select',
        'options' => appal_post_query('appal_builders'),
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Logo', 'appal'),
        'id' => $prefix . 'meta_upload_logo_img',
        'desc' => esc_html__('upload image here ', 'appal'),
        'type' => 'file',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Display Header', 'appal'),
        'id' => $prefix . 'dis_header',
        'type' => 'select',
        'desc' => esc_html__('Select here', 'appal'),
        'options' => array(
            '1' => esc_html__('Yes', 'appal'),
            '2' => esc_html__('No', 'appal'),
        ),
        'default' => '1',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Display Footer', 'appal'),
        'id' => $prefix . 'disp_footer',
        'type' => 'select',
        'desc' => esc_html__('Select here', 'appal'),
        'options' => array(
            '1' => esc_html__('Yes', 'appal'),
            '2' => esc_html__('No', 'appal'),
        ),
        'default' => '1',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Page Layout', 'appal'),
        'id' => $prefix . 'page_layout',
        'type' => 'select',
        'desc' => esc_html__('Select here', 'appal'),
        'options' => array(
            '1' => esc_html__('Left Sidebar', 'appal'),
            '2' => esc_html__('Right Sidebar', 'appal'),
            '3' => esc_html__('Full Width', 'appal'),
            '4' => esc_html__('Full Width Stretch', 'appal'),
        ),
        'default' => '2',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Blog Post Column ( this option only for blog post )', 'appal'),
        'id' => $prefix . 'blog_post_column',
        'type' => 'select',
        'desc' => esc_html__('Select here', 'appal'),
        'options' => array(
            '1' => esc_html__('Column 1', 'appal'),
            '2' => esc_html__('Column 2', 'appal'),
            '3' => esc_html__('Column 3', 'appal'),
        ),
        'default' => '1',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Posts Per Page ', 'appal'),
        'id' => $prefix . 'post_per_page',
        'desc' => esc_html__('enter value here', 'appal'),
        'type' => 'text',
        'default' => '6',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Header Layout', 'appal'),
        'id' => $prefix . 'header_layout',
        'type' => 'select',
        'desc' => esc_html__('Select here', 'appal'),
        'options' => array(
            '0' => esc_html__('Default', 'appal'),
            '1' => esc_html__('Box', 'appal'),
            '2' => esc_html__('Full Width', 'appal'),
        ),
        'default' => '0',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Separate Header', 'appal'),
        'id' => $prefix . 'sep_header_opt',
        'type' => 'checkbox',
        'desc' => esc_html__('check / uncheck here', 'appal'),
        'default' => '0',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Header Colors', 'appal'),
        'id' => $prefix . 'header_styles',
        'type' => 'select',
        'desc' => esc_html__('Select here', 'appal'),
        'options' => array(
            '0' => esc_html__('Default', 'appal'),
            '1' => esc_html__('Black', 'appal'),
            '2' => esc_html__('White', 'appal'),
        ),
        'default' => '0',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Sticky Header Colors', 'appal'),
        'id' => $prefix . 'sticky_header_styles',
        'type' => 'select',
        'desc' => esc_html__('Select here', 'appal'),
        'options' => array(
            '0' => esc_html__('Default', 'appal'),
            '1' => esc_html__('Blue', 'appal'),
            '2' => esc_html__('Pink', 'appal'),
            '3' => esc_html__('Blue Gradient', 'appal'),
            '4' => esc_html__('Black', 'appal'),
            '5' => esc_html__('Blue Pink Gradient', 'appal'),
        ),
        'default' => '0',
    ));

    $cmb2_post_page_opt->add_field(array(
        'name' => esc_html__('Hide Banner ', 'appal'),
        'id' => $prefix . 'hide_banner',
        'desc' => esc_html__('Check/Uncheck here', 'appal'),
        'type' => 'checkbox',
    ));

    $cmb2_post_page_opt->add_field(array(
        'id' => $prefix . 'home_banner_img',
        'name' => esc_html__('Banner Background Image', 'appal'),
        'desc' => esc_html__('upload image here ', 'appal'),
        'type' => 'file',
    ));

    //Tab Content Options
    $appal_tab_content_options = new_cmb2_box(array(
        'id' => $prefix . 'tab_content_option',
        'title' => esc_html__('Tab Content', 'appal'),
        'object_types' => array('tab_content'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ));

    $appal_tab_content_options->add_field(array(
        'name' => esc_html__('Heading', 'appal'),
        'id' => $prefix . 'tab_heading',
        'desc' => esc_html__('enter code here', 'appal'),
        'type' => 'textarea',
        'default' => 'Easy and most <br>user friendly app Features',
    ));

    $appal_tab_group_field_id = $appal_tab_content_options->add_field(array(
        'id' => $prefix . 'tab_group_field_opt',
        'type' => 'group',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => esc_html__('Feature list  {#}', 'appal'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => esc_html__('Add New Feature list', 'appal'),
            'remove_button' => esc_html__('Remove Feature list', 'appal'),
            'sortable' => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ));


    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $appal_tab_content_options->add_group_field($appal_tab_group_field_id, array(
        'name' => esc_html__('Feature', 'appal'),
        'id' => $prefix . 'tab_feature',
        'type' => 'textarea',
        'default' => '',

    ));


    //End TAB Content


    //Tab Content Options

    $appal_faq_content_options = new_cmb2_box(array(
        'id' => $prefix . 'faq_content_option',
        'title' => esc_html__('FAQ Content', 'appal'),
        'object_types' => array('faq_content'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
    ));

    $appal_faq_group_field_id = $appal_faq_content_options->add_field(array(
        'id' => $prefix . 'faq_group_field_opt',
        'type' => 'group',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => esc_html__('FAQ Content list  {#}', 'appal'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => esc_html__('Add New FAQ Content list', 'appal'),
            'remove_button' => esc_html__('Remove FAQ Content list', 'appal'),
            'sortable' => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ));


    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $appal_faq_content_options->add_group_field($appal_faq_group_field_id, array(
        'name' => esc_html__('Title', 'appal'),
        'id' => $prefix . 'faq_content_title',
        'type' => 'text',
        'default' => '1. How to Purchase your product ?',

    ));

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $appal_faq_content_options->add_group_field($appal_faq_group_field_id, array(
        'name' => esc_html__('Content', 'appal'),
        'id' => $prefix . 'faq_content',
        'type' => 'textarea',
        'default' => 'We are promisess to their customer to make sure bes services transaction is a transfer of value between Bitcoin wallets that gets included in block chain. Bitcoin wallets keep a secret piece of data called a private key or seed. ',

    ));

    //Services Options
    $cmb2_services_options = new_cmb2_box(array(
        'id' => $prefix . 'serv_option',
        'title' => esc_html__('Services Options', 'appal'),
        'object_types' => array('service'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));


    $cmb2_services_options->add_field(array(
        'name' => esc_html__('Icon Background Image', 'appal'),
        'id' => $prefix . 'ser_bg_img',
        'desc' => esc_html__('upload background image here', 'appal'),
        'type' => 'file',
    ));

    $cmb2_services_options->add_field(array(
        'name' => esc_html__('Icon', 'appal'),
        'id' => $prefix . 'ser_icon',
        'desc' => esc_html__('enter icon name here', 'appal'),
        'type' => 'text',
        'default' => 'uil uil-airplay',
    ));

    $cmb2_services_options->add_field(array(
        'name' => esc_html__('Link', 'appal'),
        'id' => $prefix . 'ser_link',
        'desc' => esc_html__('enter link here', 'appal'),
        'type' => 'text',
        'default' => '#',
    ));


    //Post Options
    $cmb2_post_options = new_cmb2_box(array(
        'id' => $prefix . 'posts_option',
        'title' => esc_html__('Post Options', 'appal'),
        'object_types' => array('post'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));


    $cmb2_post_options->add_field(array(
        'name' => esc_html__('Audio / Video Post Embed Code ', 'appal'),
        'id' => $prefix . 'vid_post_title',
        'type' => 'title',
    ));

    $cmb2_post_options->add_field(array(
        'name' => esc_html__('Embed Code', 'appal'),
        'id' => $prefix . 'embed_code',
        'desc' => esc_html__('enter embed code here', 'appal'),
        'type' => 'textarea_code',
    ));

    //Start Clients Options

    $cmb2_clients = new_cmb2_box(array(
        'id' => $prefix . 'clients_options',
        'title' => esc_html__('Clients Info', 'appal'),
        'object_types' => array('client'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));

    $cmb2_clients->add_field(array(
        'name' => esc_html__('Website Address', 'appal'),
        'id' => $prefix . 'client_url',
        'type' => 'text',
        'default' => '#',
    ));


    //Start Testimonials Options

    $cmb2_testimonial = new_cmb2_box(array(
        'id' => $prefix . 'testimonials_options',
        'title' => esc_html__('Testimonials Info', 'appal'),
        'object_types' => array('testimonials'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));

    $cmb2_testimonial->add_field(array(
        'name' => esc_html__('Designation', 'appal'),
        'id' => $prefix . 'test_designation',
        'type' => 'text',
        'default' => 'Themeforest',
    ));

    $cmb2_testimonial->add_field(array(
        'name' => esc_html__('Rating', 'appal'),
        'id' => $prefix . 'test_rating',
        'type' => 'select',
        'options' => array(
            '1' => esc_html__('1', 'appal'),
            '2' => esc_html__('2', 'appal'),
            '3' => esc_html__('3', 'appal'),
            '4' => esc_html__('4', 'appal'),
            '5' => esc_html__('5', 'appal'),
        ),
    ));


    //Start Team Options
    $cmb2_team_options = new_cmb2_box(array(
        'id' => $prefix . 'team_options',
        'title' => esc_html__('Team Info', 'appal'),
        'object_types' => array('team'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));

    $cmb2_team_options->add_field(array(
        'name' => esc_html__('Designation', 'appal'),
        'id' => $prefix . 'team_designation',
        'type' => 'text',
        'default' => 'Product Designer',
    ));


    $team_group_field_id = $cmb2_team_options->add_field(array(
        'id' => $prefix . 'team_social_option',
        'type' => 'group',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => esc_html__('Social  {#}', 'appal'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => esc_html__('Add New Social', 'appal'),
            'remove_button' => esc_html__('Remove Social', 'appal'),
            'sortable' => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ));

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb2_team_options->add_group_field($team_group_field_id, array(
        'name' => esc_html__('Icon', 'appal'),
        'id' => $prefix . 'team_social_icon',
        'type' => 'text',
        'default' => 'fab fa-facebook-f',
        'description' => esc_html__('write icon here .get all icons https://themify.me/themify-icons', 'appal'),
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ));

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb2_team_options->add_group_field($team_group_field_id, array(
        'name' => esc_html__('Label', 'appal'),
        'id' => $prefix . 'team_social_link',
        'type' => 'text',
        'default' => '#',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ));


    //Start Pricing Table Options
    $cmb2_pricing_table_options = new_cmb2_box(array(
        'id' => $prefix . 'pricng_table_options',
        'title' => esc_html__('Pricing Info', 'appal'),
        'object_types' => array('pricing_table'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Featured Plan', 'appal'),
        'id' => $prefix . 'pri_ft_plan',
        'type' => 'checkbox',
    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Offer Text', 'appal'),
        'id' => $prefix . 'pri_offr_txt',
        'type' => 'text',
    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Currency', 'appal'),
        'id' => $prefix . 'pri_currency',
        'type' => 'text',
        'default' => '$',
    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Monthly Price', 'appal'),
        'id' => $prefix . 'pri_mon_price',
        'type' => 'text',
        'default' => '49.99',
    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Yearly Price', 'appal'),
        'id' => $prefix . 'pri_year_price',
        'type' => 'text',
        'default' => '85',
    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Icon', 'appal'),
        'id' => $prefix . 'pri_icon',
        'type' => 'text',
        'default' => 'flaticon-paper-plane',
    ));

    $pricing_table_group_field_id = $cmb2_pricing_table_options->add_field(array(
        'id' => $prefix . 'pricing_feature_option',
        'type' => 'group',
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options' => array(
            'group_title' => esc_html__('Feature  {#}', 'appal'), // since version 1.1.4, {#} gets replaced by row number
            'add_button' => esc_html__('Add New Feature', 'appal'),
            'remove_button' => esc_html__('Remove Feature', 'appal'),
            'sortable' => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ));

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb2_pricing_table_options->add_group_field($pricing_table_group_field_id, array(
        'name' => esc_html__('Feature', 'appal'),
        'id' => $prefix . 'pricing_feature',
        'type' => 'textarea_small',
        'default' => '100 MB Disk Space',

    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Button Text', 'appal'),
        'id' => $prefix . 'pri_btn_text',
        'type' => 'text',
        'default' => 'Get Started',
    ));

    $cmb2_pricing_table_options->add_field(array(
        'name' => esc_html__('Button Link', 'appal'),
        'id' => $prefix . 'pri_btn_link',
        'type' => 'text',
        'default' => '#',
    ));

    //Woocommerce
    $cmb2_woproduct_options = new_cmb2_box(array(
        'id' => $prefix . 'woopro_options',
        'title' => esc_html__('Info', 'appal'),
        'object_types' => array('product'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'      => array( 'id' => array( 2, ) ), // Specific post IDs to display this metabox
    ));


    $cmb2_woproduct_options->add_field(array(
        'name' => esc_html__('Select Banner', 'appal'),
        'id' => $prefix . 'wop_banner_opt',
        'type' => 'select',
        'options' => array(
            '1' => esc_html__('Image Banner', 'appal'),
            '2' => esc_html__('Search Banner', 'appal'),
        ),
        'default' => '1',
    ));

    $cmb2_woproduct_options->add_field(array(
        'name' => esc_html__('Search Banner Text', 'appal'),
        'id' => $prefix . 'wop_serbtext',
        'type' => 'textarea_small',
        'default' => 'Most Completed App Store Website Search your Desire App',
    ));

    $cmb2_woproduct_options->add_field(array(
        'name' => esc_html__('Select User', 'appal'),
        'id' => $prefix . 'wop_author',
        'type' => 'select',
        'options' => appal_get_user_options(array('fields' => array('display_name'))),
    ));

}