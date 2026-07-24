<?php

/**
 * Bootstrap file for the EventSphere plugin.
 * 
 * @package EventSphere
 */

namespace EventSphere;

use EventSphere\PostTypes\EventPostType;
use EventSphere\Repositories\EventRepository;
use EventSphere\Services\EventService;

class Bootstrap
{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        new EventPostType();

        $repository = new EventRepository();

        new EventService( $repository );
    }
}
