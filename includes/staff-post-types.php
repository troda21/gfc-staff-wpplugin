<?php
	
/**
 * Add the Staff Post Type
 */
 
if ( ! function_exists('staff_post_type') ) {

	function staff_post_type() {
		$labels = array(
			'name'                => 'Staff',
			'singular_name'       => 'Staff',
			'menu_name'           => 'Staff',
			'parent_item_colon'   => 'Parent Staff:',
			'all_items'           => 'All Staff',
			'view_item'           => 'View Staff',
			'add_new_item'        => 'Add New Staff',
			'add_new'             => 'Add Staff',
			'edit_item'           => 'Edit Staff',
			'update_item'         => 'Update Staff',
			'search_items'        => 'Search Staff',
			'not_found'           => 'Not found',
			'not_found_in_trash'  => 'Not found in Trash',
		);
		$args = array(
			'label'               => 'staff_post_type',
			'description'         => 'This is where we keep the staff member info.',
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', ),
			'taxonomies'          => array( 'campus', ' department' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 25,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'staff', $args );
	}
	add_action( 'init', 'staff_post_type', 0 );
}


/**
 * Add the Campus Taxonomy
 */

if ( ! function_exists( 'campus_taxonomy' ) ) {
	function campus_taxonomy() {
		$labels = array(
			'name'                       => 'Campuses',
			'singular_name'              => 'Campus',
			'menu_name'                  => 'Campus',
			'all_items'                  => 'All Campuses',
			'parent_item'                => 'Parent Campus',
			'parent_item_colon'          => 'Parent Campus:',
			'new_item_name'              => 'New Campus Name',
			'add_new_item'               => 'Add New Campus',
			'edit_item'                  => 'Edit Campus',
			'update_item'                => 'Update Campus',
			'separate_items_with_commas' => 'Separate Campuses with commas',
			'search_items'               => 'Search Campuses',
			'add_or_remove_items'        => 'Add or remove Campuses',
			'choose_from_most_used'      => 'Choose from the most used Campuses',
			'not_found'                  => 'Not Found',
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'campus', array( 'staff' ), $args );
	}
	add_action( 'init', 'campus_taxonomy', 0 );
}

/**
 * Add the Department Taxonomy
 */

if ( ! function_exists( 'Department_taxonomy' ) ) {
	function Department_taxonomy() {
		$labels = array(
			'name'                       => 'Departments',
			'singular_name'              => 'Department',
			'menu_name'                  => 'Department',
			'all_items'                  => 'All Departments',
			'parent_item'                => 'Parent Department',
			'parent_item_colon'          => 'Parent Department:',
			'new_item_name'              => 'New Department Name',
			'add_new_item'               => 'Add New Department',
			'edit_item'                  => 'Edit Department',
			'update_item'                => 'Update Department',
			'separate_items_with_commas' => 'Separate Departments with commas',
			'search_items'               => 'Search Departments',
			'add_or_remove_items'        => 'Add or remove Departments',
			'choose_from_most_used'      => 'Choose from the most used Departments',
			'not_found'                  => 'Not Found',
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'department', array( 'staff' ), $args );
	}
	add_action( 'init', 'department_taxonomy', 0 );
}
