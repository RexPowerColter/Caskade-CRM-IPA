<?php

/**
 * EntityContract
 */
class EntityContract {
    
    /**
     * id
     *
     * @var mixed
     */
    private $id;
    
    /**
     * name
     *
     * @var mixed
     */
    private $name;
    
    /**
     * start_date
     *
     * @var mixed
     */
    private $start_date;
    
    /**
     * end_date
     *
     * @var mixed
     */
    private $end_date;
    
    /**
     * final_price
     *
     * @var mixed
     */
    private $final_price;
    
    /**
     * file
     *
     * @var mixed
     */
    private $file;
    
    /**
     * state
     *
     * @var mixed
     */
    private $state;
    
    /**
     * products
     *
     * @var mixed
     */
    private $products;
    
    /**
     * clients
     *
     * @var mixed
     */
    private $clients;

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
     * Get the value of name
     */ 
    public function getName() {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of start_date
     */ 
    public function getStart_date() {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     *
     * @return  self
     */ 
    public function setStart_date($start_date) {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of end_date
     */ 
    public function getEnd_date() {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     *
     * @return  self
     */ 
    public function setEnd_date($end_date) {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Get the value of final_price
     */ 
    public function getFinal_price() {
        return $this->final_price;
    }

    /**
     * Set the value of final_price
     *
     * @return  self
     */ 
    public function setFinal_price($final_price) {
        $this->final_price = $final_price;

        return $this;
    }

    /**
     * Get the value of file
     */ 
    public function getFile() {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file) {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState() {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state) {
        $this->state = $state;

        return $this;
    }

    /**
     * Get products
     *
     * @return  mixed
     */ 
    public function getProducts() {
        return $this->products;
    }

    /**
     * Set products
     *
     * @param  mixed  $products  products
     *
     * @return  self
     */ 
    public function setProducts($products) {
        $this->products = $products;

        return $this;
    }

    /**
     * Get clients
     *
     * @return  mixed
     */ 
    public function getClients() {
        return $this->clients;
    }

    /**
     * Set clients
     *
     * @param  mixed  $clients  clients
     *
     * @return  self
     */ 
    public function setClients($clients) {
        $this->clients = $clients;

        return $this;
    }

    /**
     * checkProduct
     *
     * @param  mixed $checkProductId
     * @return bool
     */
    public function checkProduct($checkProductId): bool {

        $exists = false;

        foreach($this->products as $product) {
            if($checkProductId === $product->getId()) {
                $exists = true;
            }
        }

        return $exists;
    }

}
