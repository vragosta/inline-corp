<?php

namespace InlineCorp;

use InlineCorp\Finders\ServiceFinder;
use InlineCorp\PostTypes\PostTypeFactory;

/**
 * Plugin is the main entry point into the Inline Corp plugin
 * architecture. This class does not strictly enforce singleton pattern
 * for easier testing. But should be used as a singleton elsewhere.
 *
 * Usage:
 *
 * $plugin = Plugin::get_instance();
 * $plugin->enable();
 *
 * The plugin object holds various objects and dependencies instance of
 * global variables.
 */
class Plugin {

	static public $instance;

	static public function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Plugin();
		}
		return self::$instance;
	}

	public $post_type_factory;

	public function enable() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'init_admin' ) );
	}

	/**
	 * Instantiates objects and activates various parts of the
	 * Inline Corp plugin.
	 *
	 * There is an implicit order of declaration here. For instance
	 * Taxonomies must be registered before the Post Types etc.
	 */
	function init() {
		$this->post_type_factory = new PostTypeFactory();
		$this->post_type_factory->build_all();
	}

	function get_service_finder( $post_id ) {
		return new ServiceFinder( $post_id );
	}
}
