<?php

/**
 * EventRepository class.
 * 
 * @package EventSphere
 */

namespace EventSphere\Repositories;

use EventSphere\Contracts\EventRepositoryInterface;

class PostMetaEventRepository implements EventRepositoryInterface
{
    public function getAllEvents(int $limit = -1): array
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
