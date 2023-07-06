<?php

/**
 * ControllerIndex
 */
class ControllerIndex extends ControllerBase {
    
    /**
     * index
     *
     * @return void
     */
    function index() {
        $this->registry['view']->show('ViewContractIndex');
    }
}