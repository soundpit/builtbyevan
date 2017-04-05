<?php

/*
* 	This defines a custom post type of "project"
*/


function create_projects_init() {
	$labels = array(
		'name'               => __( 'Projects' ),
		'singular_name'      => __( 'Project' ),
		'menu_name'          => __( 'Projects' ),
		/*'name_admin_bar'     => __( 'Portfolio' ), */
		'add_new'            => __( 'Add New Project' ),
		'add_new_item'       => __( 'Add New Project' ),
		'new_item'           => __( 'New Project' ),
		'edit_item'          => __( 'Edit Project' ),
		'view_item'          => __( 'View All Projects' ),
		'all_items'          => __( 'All Projects' ),
		'search_items'       => __( 'Search Projects' ),
		'parent_item_colon'  => __( 'Parent Items:' ),
		'not_found'          => __( 'No Projects found.' ),
		'not_found_in_trash' => __( 'No Projects found in Trash.' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false, //testing this change
		'menu_position'      => null,
		'supports'           => array( 'title','editor' ) //wipes the edit field ready for custom metaboxes
	);

	register_post_type( 'project', $args );
}

add_action( 'init', 'create_projects_init' );