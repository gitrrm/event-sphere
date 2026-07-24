<?php
/**
 * EventService class.
 * 
 * @package EventSphere
 */

namespace EventSphere\Services;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
use EventSphere\Repositories\EventRepository;

class EventService
{
    private EventRepository $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

}