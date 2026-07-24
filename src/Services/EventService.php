<?php
/**
 * EventService class.
 * 
 * @package EventSphere
 */

namespace EventSphere\Services;

use EventSphere\Contracts\EventRepositoryInterface;

class EventService
{
    private EventRepositoryInterface $repository;

    public function __construct(EventRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

}