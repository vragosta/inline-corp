<?php

namespace InlineCorp;

/**
 * The InlineCorp Plugin providers various helper functions in
 * the \InlineCorp namespace that can be used directly by templates.
 *
 * These are organized around features and are loaded in below.
 *
 * NOTE: This file and all helpers here are auto-loaded by composer very
 * early in the excution cycle. Only functions that reference other
 * parts of the code base should be declared here.
 *
 * Calling add_action or add_filter can cause unexpected issues with AJAX and
 * CLI scripts as WordPress has not completely loaded at this point.
 */
use InlineCorp\Plugin;

function get_plugin() {
	return Plugin::get_instance();
}

require_once( __DIR__ . '/Api/Service.php' );
require_once( __DIR__ . '/Api/Partial.php' );