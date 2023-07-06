<?php

// PHP 7.4 or higher else the Programm dies
if (version_compare(phpversion(), '7.4.0', '<') == true) {
    die('You arent using PHP 7.4 and higher');
}

// Constants:
define('DIRSEP', DIRECTORY_SEPARATOR);

// Get site path
$site_path = realpath(dirname(__FILE__) . DIRSEP) . DIRSEP;

define('site_path', $site_path);

/**
 * custom_autoload makes all files root files
 *
 * @param  mixed $class_name
 * @return void
 */
function custom_autoload($class_name) {

    //$filename = strtolower($class_name) . '.php';
    $filename = $class_name . '.php';
    $types = ['classes', 'controllers', 'models', 'views'];
    foreach ($types as $type) {
        $file = site_path . $type . DIRSEP . $filename;
        if (file_exists($file)) {
            include($file);
        }
    }
}

spl_autoload_register('custom_autoload');

$registry = new Registry;