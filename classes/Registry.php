<?php

/**
 * Registry
 */
class Registry implements ArrayAccess {
        
    /**
     * vars
     *
     * @var array
     */
    private $vars = array();
    
    /**
     * sets variables for the vars array
     *
     * @param  mixed $key
     * @param  mixed $var
     * @return void
     */
    function set($key, $var) {

        if (isset($this->vars[$key]) == true) {
            throw new Exception('Unable to set var `' . $key . '`. Already set.');
        }

        $this->vars[$key] = $var;
        return true;
    }
    
    /**
     * get variabels from the vars array
     *
     * @param  mixed $key
     * @return void
     */
    function get($key) {
        if (isset($this->vars[$key]) == false) {
            return null;
        }
        return $this->vars[$key];
    }
    
    /**
     * remove variables by key from the vars array
     *
     * @param  mixed $key
     * @return void
     */
    function remove($key) {
        unset($this->vars[$key]);
    }
    
        
    /**
     * offsetExists
     *
     * @param  mixed $offset
     * @return bool
     */
    public function offsetExists($offset) : bool {
        return isset($this->vars[$offset]);
    }
    
        
    /**
     * offsetGet
     *
     * @param  mixed $offset
     * @return mixed
     */
    function offsetGet($offset) : mixed {
        return $this->get($offset);
    }
    
        
    /**
     * offsetSet
     *
     * @param  mixed $offset
     * @param  mixed $value
     * @return void
     */
    function offsetSet(mixed $offset, mixed $value): void {
        $this->set($offset, $value);
    }
    
        
    /**
     * offsetUnset
     *
     * @param  mixed $offset
     * @return void
     */
    function offsetUnset(mixed $offset): void {
        unset($this->vars[$offset]);
    }
}
