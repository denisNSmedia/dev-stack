<?php

/*
 * handle get next article ajax request
 *
 */
namespace Ns\Inc\Src\Admin\Http\Endpoints;

use \Ns\Inc\Src\Request\Request;

if ( ! defined('ABSPATH') ) {
	exit;
}

class Endpoint_Example extends Endpoint {

	public $action = 'ns_example';

    public function action() {

		wp_send_json([
			'success' => true,
		]);

	}

}
