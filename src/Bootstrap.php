<?php

/**
 * Bootstrap file for the EventSphere plugin.
 * 
 * @package EventSphere
 */

namespace EventSphere;

use EventSphere\PostTypes\EventPostType;
use EventSphere\Repositories\PostMetaEventRepository;
use EventSphere\Services\EventService;
use EventSphere\Admin\EventMetaBox;

class Bootstrap
{

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        new EventPostType();

        $repository = new PostMetaEventRepository();

        new EventService( $repository );

        new EventMetaBox();
        
    }
}
