<?php

/**
 * Event Post Type class.
 * 
 * @package EventSphere
 */

namespace EventSphere\PostTypes;

class EventPostType
{
    public function __construct()
    {
        add_action(
            'init',
            [$this, 'register_post_type']
        );
    }

    public function register_post_type()
    {
        $labels = array(
            'name' => __('Events', 'eventsphere'),
            'singular_name' => __('Event', 'eventsphere'),
            'menu_name' => __('Events', 'eventsphere'),
            'name_admin_bar' => __('Event', 'eventsphere'),
            'add_new' => __('Add New', 'eventsphere'),
            'add_new_item' => __('Add New Event', 'eventsphere'),
            'new_item' => __('New Event', 'eventsphere'),
            'edit_item' => __('Edit Event', 'eventsphere'),
            'view_item' => __('View Event', 'eventsphere'),
            'all_items' => __('All Events', 'eventsphere'),
            'search_items' => __('Search Events', 'eventsphere'),
            'parent_item_colon' => __('Parent Events:', 'eventsphere'),
            'not_found' => __('No events found.', 'eventsphere'),
            'not_found_in_trash' => __('No events found in Trash.', 'eventsphere')
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
        );

        register_post_type('event', $args);
    }
}
