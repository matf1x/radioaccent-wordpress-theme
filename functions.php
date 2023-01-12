<?php
// Theme setup
function rav2_stup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'ra-featured-image', 2000, 1200, true );

	add_image_size( 'ra-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => 'Top Menu',
		'social' => __( 'Social Links Menu', 'radioaccentv4' ),
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
		'quote',
		'link',
		'audio',
	) );

	/** Change the read more excerpt */
	function wpdocs_excerpt_more( $more ) {
		return '[...]';
	}
	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

	// Change the length of the excerpt
	function wpdocs_custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
}
add_action( 'after_setup_theme', 'rav2_stup' );