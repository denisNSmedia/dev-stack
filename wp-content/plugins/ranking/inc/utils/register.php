<?php

namespace Ns\Inc\Utils;

/*
 * register helpers
 *
 */
class Register {

    use \Ns\Inc\Src\Traits\Singleton;

    function __construct() {
        // ..
    }

    // use to register any helper
    public function register( $name, $inst = false ) {

		$this->$name = $inst;

	}

    public function __call( $method, $params ) {

        if ( isset( $this->$method ) ) {
            return $this->$method;
        }

        return;

    }

}
