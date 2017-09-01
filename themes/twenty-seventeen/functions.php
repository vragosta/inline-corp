<?php
/**
 * InlineCorp - Twenty Seventeen functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Inline Corp - Twenty Seventeen
 * @since 0.1.0
 */

# Useful global constants.
define( 'INLINECORP_COM_VERSION', '0.1.0' );
define( 'INLINECORP_COM_TEMPLATE_URL', get_template_directory_uri() );
define( 'INLINECORP_COM_PATH', get_template_directory() . '/' );
define( 'INLINECORP_COM_INC', INLINECORP_COM_PATH . 'includes/' );
define( 'INLINECORP_SITE_ADMIN', 1 );

# Include compartmentalized functions.
require_once INLINECORP_COM_INC . 'functions/core.php';

# Run the setup functions.
InlineCorp\Functions\Core\setup();
