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

require_once __DIR__ . '/vendor/autoload.php';

new EventSphere\Bootstrap();