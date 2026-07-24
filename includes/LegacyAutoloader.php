<?php
/**
 * Legacy PSR-4 Style Autoloader
 *
 * This class was built to understand how PSR-4 autoloading works
 * internally. It has been replaced by Composer's PSR-4 autoloader
 * and is retained only for educational purposes.
 *
 * @package EventSphere
 */

namespace EventSphere;

if (! defined('ABSPATH')) {
    exit;
}


class LegacyAutoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload(string $class): void
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
