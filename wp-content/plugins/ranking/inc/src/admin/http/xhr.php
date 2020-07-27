<?php

/*
 * handle ajax requests
 *
 */
namespace Ns\Inc\Src\Admin\Http;

if ( ! defined('ABSPATH') ) {
	exit;
}

class Xhr {

	use \Ns\Inc\Src\Traits\Singleton;

    public function __construct() {

		if( wp_doing_ajax() ) {

            if( isset( $_REQUEST['action'] ) ) {

				// php display errors if debug is set to true
				$this->display_errors();

				// add ajax handlers
				// new Endpoints\Endpoint_Example();

            }
        }
	}

	// php display errors if debug is set to true
    function display_errors() {

		if ( defined( 'WP_DEBUG' ) and WP_DEBUG === true ) {
			@ini_set( 'display_errors', 1 );
		}

    }

}
