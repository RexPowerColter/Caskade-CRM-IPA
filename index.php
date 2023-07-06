<?php

//Used to display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

# Used to set a custom autoloader and initialize the Registry
require 'startup.php';

# Connect to DB
include 'global.php';

# Load view object
$view = new View($registry);
$registry->set('view', $view);

# Load router
$router = new Router($registry);
$registry->set('router', $router);

# Delegate controllers
$router->setPath(site_path . 'controllers');

$router->delegate();
