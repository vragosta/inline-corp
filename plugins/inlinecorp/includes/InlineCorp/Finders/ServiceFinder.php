<?php

namespace InlineCorp\Finders;

/**
 * ServiceFinder is a central place to find and filter projects in the theme.
 * API Helpers are provider in the \VincentRagosta namespace to commonly
 * used methods below.
 *
 * Usage:
 *
 * $finder = new ServiceFinder();
 * $finder->get_foo();
 */
class ServiceFinder {

	public $post_id;
	public $post;

	public function __construct( $post_id ) {
		$this->post_id = $post_id;
	}

	public function get_post_id() {
		return $this->post_id;
	}

	public function get_post() {
		if ( is_null( $this->post ) ) {
			$this->post = get_post( $this->post_id );
		}
		return $this->post;
	}
}
