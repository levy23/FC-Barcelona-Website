<?php

/**
 * Registers the `team` post type.
 */
function team_init() {
	register_post_type( 'team', array(
		'labels'                => array(
			'name'                  => __( 'Teams', 'cru' ),
			'singular_name'         => __( 'Team', 'cru' ),
			'all_items'             => __( 'All Teams', 'cru' ),
			'archives'              => __( 'Team Archives', 'cru' ),
			'attributes'            => __( 'Team Attributes', 'cru' ),
			'insert_into_item'      => __( 'Insert into team', 'cru' ),
			'uploaded_to_this_item' => __( 'Uploaded to this team', 'cru' ),
			'featured_image'        => _x( 'Featured Image', 'team', 'cru' ),
			'set_featured_image'    => _x( 'Set featured image', 'team', 'cru' ),
			'remove_featured_image' => _x( 'Remove featured image', 'team', 'cru' ),
			'use_featured_image'    => _x( 'Use as featured image', 'team', 'cru' ),
			'filter_items_list'     => __( 'Filter teams list', 'cru' ),
			'items_list_navigation' => __( 'Teams list navigation', 'cru' ),
			'items_list'            => __( 'Teams list', 'cru' ),
			'new_item'              => __( 'New Team', 'cru' ),
			'add_new'               => __( 'Add New', 'cru' ),
			'add_new_item'          => __( 'Add New Team', 'cru' ),
			'edit_item'             => __( 'Edit Team', 'cru' ),
			'view_item'             => __( 'View Team', 'cru' ),
			'view_items'            => __( 'View Teams', 'cru' ),
			'search_items'          => __( 'Search teams', 'cru' ),
			'not_found'             => __( 'No teams found', 'cru' ),
			'not_found_in_trash'    => __( 'No teams found in trash', 'cru' ),
			'parent_item_colon'     => __( 'Parent Team:', 'cru' ),
			'menu_name'             => __( 'Teams', 'cru' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_rest'          => true,
		'rest_base'             => 'team',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'team_init' );

/**
 * Sets the post updated messages for the `team` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `team` post type.
 */
function team_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['team'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Team updated. <a target="_blank" href="%s">View team</a>', 'cru' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'cru' ),
		3  => __( 'Custom field deleted.', 'cru' ),
		4  => __( 'Team updated.', 'cru' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Team restored to revision from %s', 'cru' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Team published. <a href="%s">View team</a>', 'cru' ), esc_url( $permalink ) ),
		7  => __( 'Team saved.', 'cru' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Team submitted. <a target="_blank" href="%s">Preview team</a>', 'cru' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Team scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team</a>', 'cru' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Team draft updated. <a target="_blank" href="%s">Preview team</a>', 'cru' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'team_updated_messages' );
