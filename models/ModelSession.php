<?php

/**
 * ModelSession getters and setters also constructor for acctual session
 */
class ModelSession {
    
    /**
     * __construct for making a new session if one hasnt started
     *
     * @return void
     */
    public function __construct() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
    }

    /**
     * get session by key
     *
     * @param  string $key
     * @return void
     */
    public function get(string $key) {
        
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }
    
    /**
     * set session by key and value
     *
     * @param  string $key
     * @param  mixed $value
     * @return void
     */
    public function set(string $key, $value) {
        $_SESSION[$key] = $value;
        return $this;
    }
    
    /**
     * remove session by key
     *
     * @param  string $key
     * @return void
     */
    public function remove(string $key): void {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }
    
    /**
     * clear session
     *
     * @return void
     */
    public function clear(): void {
        session_unset();
    }
    
    /**
     * has checks session key
     *
     * @param  string $key
     * @return bool
     */
    public function has(string $key): bool {
        return array_key_exists($key, $_SESSION);
    }
}
