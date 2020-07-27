<?php

/*
 * initiate our little shiny framework
 *
 */
namespace Ns\Inc;

use \Ns\Inc\Src\Traits\Singleton;

class Init {

    use Singleton;

    function __construct() {

        Src\Admin::instance();
        Src\Install::instance();
        Src\Setup::instance();

    }

}
