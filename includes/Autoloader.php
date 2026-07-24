<?php

/**
 * Plugin Autoloader.
 *
 * @package EventSphere
 */

namespace EventSphere;

if (! defined('ABSPATH')) {
    exit;
}


class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {

        $prefix = 'EventSphere\\';

        if (strpos($class, $prefix) !== 0) {
            return;
        }

        $relative_class = substr($class, strlen($prefix));

        $file = plugin_dir_path(__FILE__) . '../src/' . str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            require $file;
        }
    }
}
