<?php

/**
 * EntityProduct
 */
class EntityProduct {
    
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
     * age
     *
     * @var mixed
     */
    private $age;
    
    /**
     * alcohol_percentage
     *
     * @var mixed
     */
    private $alcohol_percentage;
    
    /**
     * volume
     *
     * @var mixed
     */
    private $volume;
    
    /**
     * storage_time
     *
     * @var mixed
     */
    private $storage_time;
        
    /**
     * price
     *
     * @var mixed
     */
    private $price;

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
     * Get the value of age
     */ 
    public function getAge() {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age) {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of alcohol_percentage
     */ 
    public function getAlcohol_percentage() {
        return $this->alcohol_percentage;
    }

    /**
     * Set the value of alcohol_percentage
     *
     * @return  self
     */ 
    public function setAlcohol_percentage($alcohol_percentage) {
        $this->alcohol_percentage = $alcohol_percentage;

        return $this;
    }

    /**
     * Get the value of volume
     */ 
    public function getVolume() {
        return $this->volume;
    }

    /**
     * Set the value of volume
     *
     * @return  self
     */ 
    public function setVolume($volume) {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get the value of storage_time
     */ 
    public function getStorage_time() {
        return $this->storage_time;
    }

    /**
     * Set the value of storage_time
     *
     * @return  self
     */ 
    public function setStorage_time($storage_time) {
        $this->storage_time = $storage_time;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }
    
}