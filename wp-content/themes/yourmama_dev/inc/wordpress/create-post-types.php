<?php
/*
* Post Types
*/
function create_post_types() {
  register_post_type( 'diretores', array(
    'labels'        => array(
      'name'          => __( 'Diretores' ),
      'singular_name' => __( 'Diretor(a)' )
    ),
    'public'        => true,
    'has_archive'   => false,
    'hierarchical'  => false,
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'publicly_queryable' => true,
    'rewrite'       => array('slug' => 'diretores'),
    'menu_icon'     => 'dashicons-hammer',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
    )
  );
  register_post_type( 'cinema-tv', array(
    'labels'        => array(
      'name'          => __( 'Cinema/TV' ),
      'singular_name' => __( 'Cinema/TV' )
    ),
    'public'        => true,
    'has_archive'   => false,
    'hierarchical'  => false,
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'publicly_queryable' => true,
    'rewrite'       => array('slug' => 'cinema-tv'),
    'menu_icon'     => 'dashicons-hammer',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
    )
  );
  register_post_type( 'tratamentos', array(
    'labels'        => array(
      'name'          => __( 'Tratamentos' ),
      'singular_name' => __( 'Tratamentos' )
    ),
    'public'        => true,
    'has_archive'   => false,
    'hierarchical'  => false,
    'exclude_from_search' => true,
    'capability_type' => 'post',
    'publicly_queryable' => true,
    'rewrite'       => array('slug' => 'tratamentos'),
    'menu_icon'     => 'dashicons-hammer',
    'supports'      => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions' ),
    )
  );
  flush_rewrite_rules();
}
add_action( 'init', 'create_post_types' );

function create_taxonomy() {
  register_taxonomy( 'status', 'cinema-tv', array(
    'label'        => __( 'Status', 'textdomain' ),
    'rewrite'      => array( 'slug' => 'status' ),
    'hierarchical' => false,
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'query_var' => true
  ) );
  flush_rewrite_rules();
}
// add_action( 'init', 'create_taxonomy', 0 );