<?php
/**
 * This file contains the necessary theme configuration functions.
 *
 * @package Inline Corp - Twenty Seventeen
 * @since 0.1.0
 */

namespace InlineCorp\Functions\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @since 0.1.0
 * @uses add_action()
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'inlinecorp_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
}

/**
 * Declare theme support.
 *
 * @since 0.1.0
 * @uses add_theme_support(), set_post_thumbnail_size(), add_image_size(), and add_post_type_support(), show_admin_bar()
 * @return void
 */
function inlinecorp_setup() {
	# Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	# Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	# Add excerpt support to...
	add_post_type_support( 'page', 'excerpt' );

	# If set to 'false', the admin bar will not display on front end.
	show_admin_bar( false );
}

/**
 * Enqueue scripts for front-end.
 *
 * @since 0.1.0
 * @uses wp_register_script(), p_enqueue_script(), wp_localize_script()
 * @return void
 */
function scripts() {
	wp_register_script(
		'bootstrap',
		INLINECORP_COM_TEMPLATE_URL . "/assets/lib/bootstrap/dist/js/bootstrap.min.js",
		array( 'jquery' ),
		INLINECORP_COM_VERSION,
		true
	);

	wp_enqueue_script(
		'inlinecorp',
		INLINECORP_COM_TEMPLATE_URL . "/assets/js/inline-corp---twenty-seventeen.js",
		array( 'jquery', 'bootstrap' ),
		INLINECORP_COM_VERSION,
		true
	);

	wp_localize_script(
		'inlinecorp_com',
		'InlineCorp', array(
			'themeUrl' => INLINECORP_COM_TEMPLATE_URL,
			'options'  => array(
				'apiUrl'  => home_url( '/wp-json/v1' ),
				'homeUrl' => home_url(),
				'nonce'   => wp_create_nonce( 'wp_rest' ),
			)
		)
	);
}

/**
 * Enqueue styles for front-end.
 *
 * @since 0.1.0
 * @uses wp_register_style(), wp_enqueue_style()
 * @return void
 */
function styles() {
	wp_register_style(
		'fontawesome',
		INLINECORP_COM_TEMPLATE_URL . "/assets/lib/fontawesome/css/font-awesome.min.css",
		array(),
		INLINECORP_COM_VERSION
	);

	wp_register_style(
		'ionicons',
		INLINECORP_COM_TEMPLATE_URL . "/assets/lib/ionicons/css/ionicons.min.css",
		array(),
		INLINECORP_COM_VERSION
	);

	wp_register_style(
		'bootstrap',
		INLINECORP_COM_TEMPLATE_URL . "/assets/lib/bootstrap/dist/css/bootstrap.min.css",
		array(),
		INLINECORP_COM_VERSION
	);

	wp_register_style(
		'sanitize',
		INLINECORP_COM_TEMPLATE_URL . "/assets/lib/sanitize/sanitize.min.css",
		array(),
		INLINECORP_COM_VERSION
	);

	wp_enqueue_style(
		'inlinecorp',
		INLINECORP_COM_TEMPLATE_URL . "/assets/css/inlinecorp---twenty-seventeen.css",
		array( 'fontawesome', 'ionicons', 'bootstrap', 'sanitize' ),
		INLINECORP_COM_VERSION
	);
}
