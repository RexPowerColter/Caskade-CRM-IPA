<?php

/**
 * EntityContract_Product
 */
class EntityContract_Product {
    
    /**
     * id
     *
     * @var mixed
     */
    private $id;
    
    /**
     * product_id
     *
     * @var mixed
     */
    private $product_id;
    
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
     * Get the value of product_id
     */ 
    public function getProduct_id() {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id) {
        $this->product_id = $product_id;

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