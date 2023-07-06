<?php

/**
 * ControllerApi
 */
class ControllerApi extends ControllerBase {

    /**
     * Required index function by ControllerBase
     *
     * @return void
     */
    function index() {
        //No index function
    }

    /**
     * gets all the clients and responds it to the js autocomplete file as a json
     *
     * @return void
     */
    function clients() {

        //Check if args is a number value
        if (!is_string($this->registry->get('args')[0])) {
            throw new \Exception("Client argument incorrect!");
            exit;
        }

        //Try and catch to check fetch by args
        try {
            $term = $this->registry->get('args')[0];
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            exit;
        }

        //Makes a new repo and fetches clients by name
        $repoClient = new RepositoryClient($this->registry);
        $clients = $repoClient->fetchByName($term);

        //Json responds for the autocomplete js
        echo json_encode($clients);
    }
}
