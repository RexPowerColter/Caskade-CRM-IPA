<?php

/**
 * Router
 */
class Router {
    
    /**
     * registry
     *
     * @var mixed
     */
    private $registry;
        
    /**
     * path
     *
     * @var mixed
     */
    private $path;
        
    /**
     * args
     *
     * @var array
     */
    private $args = array();
    
    /**
     * __construct
     *
     * @param  mixed $registry
     * @return void
     */
    function __construct($registry) {
        $this->registry = $registry;
    }
    
    /**
     * setPath
     *
     * @param  mixed $path
     * @return void
     */
    function setPath($path) {

        $path = trim($path, '\\');
        $path .= DIRSEP;

        if (is_dir($path) == false) {
            throw new Exception('Invalid controller path: `' . $path . '`');
        }

        $this->path = $path;
    }
    
    /**
     * delegate
     *
     * @return void
     */
    function delegate() {

        // Analyze route
        $this->getController($file, $controller, $action, $args);

        // File available?
        if (is_readable($file) == false) {
            //Add 404 view to be displayed
            die('404 Not Found');
        }

        // Include the file
        include($file);

        // Initiate the class
        $class = 'Controller' . $controller;
        $controller = new $class($this->registry);

        // Action available?
        if (is_callable(array($controller, $action)) == false) {
            die('404 Not Found');
        }

        // Run action
        $controller->$action();
    }

        
    /**
     * getController
     *
     * @param  mixed $file
     * @param  mixed $controller
     * @param  mixed $action
     * @param  mixed $args
     * @return void
     */
    private function getController(&$file, &$controller, &$action, &$args) {
        $route = (empty($_GET['route'])) ? '' : $_GET['route'];

        if (empty($route)) {
            $route = 'index';
        }

        // Get separate parts
        $route = trim($route, '\\');
        $parts = explode('/', $route);



        // Find right controller
        $cmd_path = $this->path;
        foreach ($parts as $part) {
            $fullpath = $cmd_path . 'Controller' . ucfirst($part);

            // Is there a dir with this path?
            if (is_dir($fullpath)) {
                $cmd_path .= $part . DIRSEP;
                array_shift($parts);
                continue;
            }

            // Find the file
            if (is_file($fullpath . '.php')) {
                $controller = ucfirst($part);
                array_shift($parts);
                break;
            }

        }

        if (empty($controller)) {
            $controller = 'index';
        };

        // Get action
        $action = array_shift($parts);
        if (empty($action)) {
            $action = 'index';
        }

        $args = $parts;
        $file = $cmd_path . 'Controller' . $controller . '.php';
        $this->registry->set('args', $args);
    }
}