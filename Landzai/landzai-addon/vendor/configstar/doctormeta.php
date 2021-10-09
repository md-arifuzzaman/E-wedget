<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_doctormeta';


CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Doctor Options',
  'post_type'    => ['doctors'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Doctors Fields',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'doctor_icon',
          'type'  => 'icon',
          'title' => 'Doctor Icon',
      ),
  )
) );

