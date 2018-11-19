<?php

function create_post_type()
{
  register_post_type(
    'director',
    array(
      'labels' => array(
        'name' => __('Directors'),
        'singular_name' => __('Director')
      ),
      'hierarchical'       => true,
      'public'             => true,
      'menu_icon'          => 'dashicons-groups',
      'has_archive'        => true,
      'supports'           => array( 'title', 'thumbnail' ),
      'publicly_queryable' => true
    )
  );


  register_post_type(
    'faculty-staff-member',
    array(
      'labels' => array(
        'name' => __('Faculty Staff Members'),
        'singular_name' => __('Faculty Staff Member')
      ),
      'hierarchical'       => true,
      'public'             => true,
      'menu_icon'          => 'dashicons-welcome-learn-more',
      'has_archive'        => true,
      'supports'           => array( 'title', 'thumbnail' ),
      'publicly_queryable' => true
    )
  );
}
add_action('init', 'create_post_type');