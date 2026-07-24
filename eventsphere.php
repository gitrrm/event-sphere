<?php
/**
 * Plugin Name: EventSphere
 * Description: A plugin to manage events and registrations.
 * Version: 1.0.0
 * Author: Rashmi Ranjan Muduli
 * text-domain: eventsphere
 * License: MIT
 */

if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}

require_once plugin_dir_path(__FILE__) . 'includes/Bootstrap.php';

require_once plugin_dir_path(__FILE__) . 'includes/Autoloader.php';

EventSphere\Autoloader::register();
new EventSphere\Bootstrap();