<?php

/**
 * EntityContract_Client
 */
class EntityContract_Client {
    
    /**
     * id
     *
     * @var mixed
     */
    private $id;
    
    /**
     * client_id
     *
     * @var mixed
     */
    private $client_id;
    
    /**
     * contract_id
     *
     * @var mixed
     */
    private $contract_id;

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
     * Get the value of client_id
     */ 
    public function getClient_id() {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     *
     * @return  self
     */ 
    public function setClient_id($client_id) {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * Get the value of contract_id
     */ 
    public function getContract_id() {
        return $this->contract_id;
    }

    /**
     * Set the value of contract_id
     *
     * @return  self
     */ 
    public function setContract_id($contract_id) {
        $this->contract_id = $contract_id;

        return $this;
    }
}