<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_featuremeta';


CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Features Options',
  'post_type'    => ['features'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Features Fields',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'feature_icon',
          'type'  => 'icon',
          'title' => 'Feature Icon',
      ),
  )
) );

