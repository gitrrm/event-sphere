<?php

/**
 * Bootstrap file for the EventSphere plugin.
 * 
 * @package EventSphere
 */

namespace EventSphere;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use EventSphere\PostTypes\EventPostType;

class Bootstrap
{

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        new EventPostType();
    }
}
