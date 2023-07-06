<?php

/**
 * RepositoryBase
 */
abstract class RepositoryBase {
        
    /**
     * registry
     *
     * @var mixed
     */
    protected $registry;
    
    /**
     * db
     *
     * @var mixed
     */
    protected $db;
    
    /**
     * constructs a new db key for the registry
     *
     * @param mixed $registry
     * @return void
     */
    function __construct($registry) {
        $this->registry = $registry; 
        $this->db = $registry['db'];
    }
}
