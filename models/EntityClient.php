<?php

/**
 * EntityClient
 */
class EntityClient {
    
    /**
     * id
     *
     * @var mixed
     */
    private $id;
    
    /**
     * title
     *
     * @var mixed
     */
    private $title;
    
    /**
     * firstname
     *
     * @var mixed
     */
    private $firstname;
    
    /**
     * lastname
     *
     * @var mixed
     */
    private $lastname;
    
    /**
     * birthday
     *
     * @var mixed
     */
    private $birthday;
    
    /**
     * nationality
     *
     * @var mixed
     */
    private $nationality;
    
    /**
     * street
     *
     * @var mixed
     */
    private $street;
    
    /**
     * zipcode
     *
     * @var mixed
     */
    private $zipcode;
    
    /**
     * city
     *
     * @var mixed
     */
    private $city;
    
    /**
     * country
     *
     * @var mixed
     */
    private $country;
    
    /**
     * phone
     *
     * @var mixed
     */
    private $phone;
    
    /**
     * email
     *
     * @var mixed
     */
    private $email;
    
    /**
     * iban
     *
     * @var mixed
     */
    private $iban;
    
    /**
     * bank
     *
     * @var mixed
     */
    private $bank;
    
    /**
     * account
     *
     * @var mixed
     */
    private $account;
        
    /**
     * state
     *
     * @var mixed
     */
    private $state;
    
    /**
     * contracts
     *
     * @var mixed
     */
    private $contracts;

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
     * Get the value of title
     */ 
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday() {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday) {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of nationality
     */ 
    public function getNationality() {
        return $this->nationality;
    }

    /**
     * Set the value of nationality
     *
     * @return  self
     */ 
    public function setNationality($nationality) {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get the value of street
     */ 
    public function getStreet() {
        return $this->street;
    }

    /**
     * Set the value of street
     *
     * @return  self
     */ 
    public function setStreet($street) {
        $this->street = $street;

        return $this;
    }

    /**
     * Get the value of zipcode
     */ 
    public function getZipcode() {
        return $this->zipcode;
    }

    /**
     * Set the value of zipcode
     *
     * @return  self
     */ 
    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity() {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */ 
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of iban
     */ 
    public function getIban() {
        return $this->iban;
    }

    /**
     * Set the value of iban
     *
     * @return  self
     */ 
    public function setIban($iban) {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get the value of bank
     */ 
    public function getBank() {
        return $this->bank;
    }

    /**
     * Set the value of bank
     *
     * @return  self
     */ 
    public function setBank($bank) {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get the value of account
     */ 
    public function getAccount() {
        return $this->account;
    }

    /**
     * Set the value of account
     *
     * @return  self
     */ 
    public function setAccount($account) {
        $this->account = $account;

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
     * Get contracts
     *
     * @return  mixed
     */ 
    public function getContracts() {
        return $this->contracts;
    }

    /**
     * Set contracts
     *
     * @param  mixed  $contracts  contracts
     *
     * @return  self
     */ 
    public function setContracts($contracts) {
        $this->contracts = $contracts;

        return $this;
    }
}