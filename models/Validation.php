<?php

class Validation
{

    /**
     * data
     *
     * @var mixed
     */
    private $data;

    /**
     * validationArray
     *
     * @var mixed
     */
    private $validationArray;

    /**
     * messages
     *
     * @var array
     */
    private $messages = [];

    /**
     * __construct
     *
     * @param  mixed $data
     * @param  mixed $validationArray
     * @return void
     */
    function __construct($data, $validationArray) {
        $this->data = $data;
        $this->validationArray = $validationArray;
    }

    /**
     * validate
     *
     * @return bool
     */
    function validate(): bool {
        $this->checkRequired();
        $this->checkMinLength();
        $this->checkMaxLength();
        $this->checkType();

        //If count = zero form properly works
        return count($this->messages) ? false : true;
    }

    /**
     * checkRequired
     *
     * @return void
     */
    function checkRequired() {
        foreach ($this->validationArray as $key => $item) {

            //If name is required and data array is empty add to messages array a message
            if ($item['required'] && isset($this->data[$key]) && !$this->data[$key]) {
                $this->messages[$key] = "Feld: " . $key . " sollte ausgefüllt sein";
            }
        }
    }

    /**
     * checkMinLength
     *
     * @return void
     */
    function checkMinLength() {
        foreach ($this->validationArray as $key => $item) {

            if (isset($item['minLength']) && isset($this->data[$key]) && in_array($item['type'], ["text", "password"]) && $item['minLength'] > strlen($this->data[$key])) {
                $this->messages[$key] = "Das feld: " . $key . " sollte mehr als " . $item['minLength'] . " zeichen haben";
            }
        }
    }

    /**
     * checkMaxLength
     *
     * @return void
     */
    function checkMaxLength() {
        foreach ($this->validationArray as $key => $item) {

            if (isset($item['maxLength']) && isset($this->data[$key]) && in_array($item['type'], ["text", "password"]) && $item['maxLength'] < strlen($this->data[$key])) {
                $this->messages[$key] = "Das feld: " . $key . " sollte weniger als " . $item['maxLength'] . " zeichen haben";
            }
        }
    }

    /**
     * checkType
     *
     * @return void
     */
    function checkType() {

        foreach ($this->validationArray as $key => $item) {

            if (isset($item['type'])) {

                //Makes sure that input fields type text are strings
                if ($item['type'] == "text" && !is_string($this->data[$key])) {
                    $this->messages[$key] = "Das feld: " . $key . " sollte Text sein";
                }

                //Makes sure that input fields with type number are numeric values
                if ($item['type'] == "number" && !is_numeric($this->data[$key])) {
                    $this->messages[$key] = "Das feld: " . $key . " sollte eine Zahl sein";
                }

                //Makes sure that date input field types are dates
                if ($item['type'] == "date" && !strtotime($this->data[$key])) {
                    $this->messages[$key] = "Das feld: " . $key . " sollte ein datum sein";
                }

                //Makes sure that email input field types are built like an email
                if ($item['type'] == "email" && !filter_var($this->data[$key], FILTER_VALIDATE_EMAIL)) {
                    $this->messages[$key] = "Das feld: " . $key . " sollte eine email sein";
                }
            }
        }
    }

    /**
     * Get the value of messages
     */
    public function getMessages() {
        return $this->messages;
    }

    /**
     * Set the value of messages
     *
     * @return  self
     */
    public function setMessages($messages) {
        $this->messages = $messages;

        return $this;
    }
}
