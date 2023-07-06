<?php

/**
 * EntityToken
 */
class EntityToken {
    
    /**
     * id
     *
     * @var mixed
     */
    private $id;
    
    /**
     * user_id
     *
     * @var mixed
     */
    private $user_id;
    
    /**
     * token
     *
     * @var mixed
     */
    private $token;

    /**
     * Get the value of id
     */ 
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id() {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id) {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of token
     */ 
    public function getToken() {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token) {
        $this->token = $token;

        return $this;
    }

}