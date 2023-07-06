<?php
class View {
    
    /**
     * layoutPath
     *
     * @var mixed
     */
    private $layoutPath;

    /**
     * registry
     *
     * @var mixed
     */
    private $registry;

    /**
     * vars
     *
     * @var array
     */
    private $vars = array();

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
     * set a view
     *
     * @param  mixed $varname
     * @param  mixed $value
     * @param  mixed $overwrite
     * @return void
     */
    function set($varname, $value, $overwrite = false) {
        if (isset($this->vars[$varname]) == true and $overwrite == false) {
            trigger_error('Unable to set var `' . $varname . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);
            return false;
        }

        $this->vars[$varname] = $value;

        return true;
    }

    /**
     * remove a view
     *
     * @param  mixed $varname
     * @return void
     */
    function remove($varname) {
        unset($this->vars[$varname]);
        return true;
    }

    /**
     * Used to show a view
     *
     * @param  mixed $name
     * @return void
     */
    function show($name) {

        $path = site_path . 'views' . DIRSEP . $name . '.php';

        if (file_exists($path) == false) {
            trigger_error('View `' . $name . '` does not exist.', E_USER_NOTICE);
            return false;
        }

        // Load variables
        foreach ($this->vars as $key => $value) {
            $$key = $value;
        }

        //Turn on output buffering
        ob_start();

        //Includes the path set in the gobal.php config file
        include($path);

        //Gets current buffer content and deletes it
        $view = ob_get_clean();

        //Sets the layoutpath in the registry
        $this->layoutPath = $this->registry->get('layoutPath');

        //Includes the layout path
        include $this->layoutPath;
    }
}
