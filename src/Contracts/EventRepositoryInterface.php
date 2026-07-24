<?php
/**
 * EventRepositoryInterface interface.
 *
 * @package EventSphere
 */
namespace EventSphere\Contracts;

interface EventRepositoryInterface
{
    public function getAllEvents(int $limit = -1): array;
}