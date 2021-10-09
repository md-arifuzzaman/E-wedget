<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ahope_register_required_plugins' );

function ahope_register_required_plugins() {

	$plugins = array(

		array(
			'name' => esc_attr__('Ahope Core','ahope'),
			'slug' => 'ahope-core',
			'source' => get_template_directory_uri() . '/plugin/ahope-core.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false, 
			'external_url' => '',
		),
		array(
			'name' => esc_attr__('Contact Form 7','ahope'),
			'slug'=> 'contact-form-7', 
			'required' => true, 
			'force_activation'=> false,
			'force_deactivation' => false,
		),
        array(
			'name' => esc_attr__('Ahope Demo Importer','ahope'),
			'slug'=> 'one-click-demo-import',
			'required' => true,
			'force_activation'=> false,
			'force_deactivation' => false,
		),

		array(
			'name' => esc_attr__('Elementor','ahope'),
			'slug' => 'elementor', 
			'required' => true, 
			'version' => '', 
			'force_activation' => false, 
			'force_deactivation' => false,
			'external_url' => '',
		),		
	);

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true, 
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message'=> '',
    );

    tgmpa( $plugins, $config );

}