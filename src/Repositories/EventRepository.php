<?php

/**
 * EventRepository class.
 * 
 * @package EventSphere
 */

namespace EventSphere\Repositories;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class EventRepository
{
    public function get_all_events($limit = -1)
    {
        $args = array(
            'post_type' => 'event',
            'post_status' => 'published',
            'post_per_page' => $limit,
        );

        $query = new \WP_Query($args);
        return $query->posts;
    }
}
