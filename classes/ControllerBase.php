<?php

/**
 * ControllerBase
 */
abstract class ControllerBase {
        
    /**
     * registry
     *
     * @var mixed
     */
    protected $registry;

    /**
     * allows you to initialize an object's properties upon creation of the object
     *
     * @return void
     */
    function __construct($registry) {
        $this->registry = $registry;
    }

    abstract function index();
}
