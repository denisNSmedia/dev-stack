<?php

/*
 * singleton for single initialization
 *
 */
namespace Ns\Inc\Src\Traits;

trait Singleton {

	protected static $instance = null;

	// initiate instance
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

}
