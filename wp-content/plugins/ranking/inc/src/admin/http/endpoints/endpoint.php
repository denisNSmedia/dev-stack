<?php

/*
 * class for ajax endpoint
 *
 */
namespace Ns\Inc\Src\Admin\Http\Endpoints;

if ( ! defined('ABSPATH') ) {
	exit;
}

abstract class Endpoint {

	public $action;

    public function __construct() {

		add_action( sprintf( 'wp_ajax_%s', $this->action ), [ $this, 'action' ] );
		add_action( sprintf( 'wp_ajax_nopriv_%s', $this->action ), [ $this, 'action' ] );

	}

    public function action() {}

}
