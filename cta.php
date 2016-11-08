<?php
  /*
  Plugin Name: REACTA
  Description: Reaction's Assignable Calls to Action
  Version:     1.0
  Author:      Reaction
  Author URI:  http://reaction.ca
  Text Domain: reaction
  Domain Path: /lang
   */

  /*-------------------------------------------------------------------------------
  // Register Custom Post Types
  -------------------------------------------------------------------------------*/

  function craft_cta_cpt() {

  	$cta_labels = array(
  		'name'                => _x( 'Calls to Action', 'Post Type General Name', 'reaction' ),
  		'singular_name'       => _x( 'Call to Action', 'Post Type Singular Name', 'reaction' ),
  		'menu_name'           => __( 'Calls to Action', 'reaction' ),
  		'name_admin_bar'      => __( 'Calls to Action', 'reaction' ),
  		'parent_item_colon'   => __( 'Parent:', 'reaction' ),
  		'all_items'           => __( 'All CTAs', 'reaction' ),
  		'add_new_item'        => __( 'Add New CTA', 'reaction' ),
  		'add_new'             => __( 'Add New', 'reaction' ),
  		'new_item'            => __( 'New', 'reaction' ),
  		'edit_item'           => __( 'Edit', 'reaction' ),
  		'update_item'         => __( 'Update', 'reaction' ),
  		'view_item'           => __( 'View', 'reaction' ),
  		'search_items'        => __( 'Search', 'reaction' ),
  		'not_found'           => __( 'Not found', 'reaction' ),
  		'not_found_in_trash'  => __( 'Not found in Trash', 'reaction' ),
  	);

    $cta_args = array(
  		'label'               => __( 'Calls to Action', 'reaction' ),
  		'description'         => __( 'Assignable CTAs', 'reaction' ),
  		'labels'              => $cta_labels,
  		'supports'            => array( 'title', 'thumbnail', 'revisions', ),
  		'hierarchical'        => false,
  		'public'              => true,
  		'show_ui'             => true,
  		'show_in_menu'        => true,
  		'menu_position'       => 5,
  		'menu_icon'           => 'dashicons-megaphone',
  		'show_in_admin_bar'   => true,
  		'show_in_nav_menus'   => true,
  		'can_export'          => true,
  		'has_archive'         => false,
  		'exclude_from_search' => true,
  		'publicly_queryable'  => true,
  		'capability_type'     => 'page',
  	);

    register_post_type( 'cta', $cta_args );
  }

  add_action( 'init', 'craft_cta_cpt', 0 );

  // Define Columns
  function cta_cpt_custom_columns( $columns ) {
    $columns = array(
      'cb'	 	           => '<input type="checkbox" />',
      'title' 	         => 'Headline',
      'cta_link'		   =>	'CTA Link',
    );

    return $columns;
  }

  add_filter('manage_cta_posts_columns', 'cta_cpt_custom_columns');

  // Output Columns
  function cta_cpt_custom_columns_output( $column_name, $post_ID ) {

    if ($column_name == 'cta_link') {
        echo get_field('cta_link');
    }
  }

  add_action('manage_cta_posts_custom_column', 'cta_cpt_custom_columns_output', 10, 2);
