<?php
/**
 * Plugin Name: Inline Corporation
 * Description: Inline Corporation shared plugin
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://www.vincentragosta.com
 * Text Domain: inlinecorp_com
 * Domain Path: /languages
 */

require_once( __DIR__ . '/config.php' );

/**
 *
 * Loads the Plugin's PHP autoloader.
 */
function inlinecorp_autoload() {
	if ( inlinecorp_can_autoload() ) {
		require_once( inlinecorp_autoloader() );
		return true;
	} else {
		return false;
	}
}

/**
 * In server mode we can autoload if autoloader file exists. For
 * test environments we prevent autoloading of the plugin to prevent
 * global pollution and for better performance.
 */
function inlinecorp_can_autoload() {
	if ( ! defined( 'PHPUNIT_RUNNER' ) ) {
		if ( file_exists( inlinecorp_autoloader() ) ) {
			return true;
		} else {
			error_log(
				"Fatal Error: Composer not setup in " . VINCENTRAGOSTA_PLUGIN_DIR
			);
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Defaults is Composer's autoloader
 */
function inlinecorp_autoloader() {
	return VINCENTRAGOSTA_PLUGIN_DIR . '/vendor/autoload.php';
}

/**
 * Plugin code entry point. Singleton instance is used to maintain single
 * instance of the plugin throughout the current lifecycle.
 */
function inlinecorp_autorun() {
	if ( inlinecorp_autoload() ) {
		$plugin = \InlineCorp\Plugin::get_instance();
		$plugin->enable();
	} else {
		add_action( 'admin_notices', 'inlinecorp_autoload_notice' );
	}
}

function inlinecorp_autoload_notice() {
	$class = 'notice notice-error';
	$message = __( 'Autoload is not setup. Remember to run composer install on both the InlineCorp plugin and theme', 'inlinecorp_com' );
	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
}

inlinecorp_autorun();
