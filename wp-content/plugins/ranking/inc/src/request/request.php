<?php

/*
 * class to handle request
 *
 */
namespace Ns\Inc\Src\Request;

class Request {

    use \Ns\Inc\Src\Traits\Singleton;

    public $params;

    function __construct() {

        $this->params = Ns()->sanitize( $_REQUEST );
        $this->method = $_SERVER['REQUEST_METHOD'];

    }

    // check if request has specific parameter
    public function has( $id ) {
        return isset( $this->params[ $id ] );
    }

    // check if request has specific parameter and if it is empty
    public function is_empty( $id ) {
        return ! $this->has( $id ) or empty( $this->params[ $id ] );
    }

    // get specific parameter
    public function get( $id ) {
        return $this->has( $id ) ? $this->params[ $id ] : false;
    }

}
