<?php

/**
 * ControllerClient for all Client actions
 */
class ControllerClient extends ControllerBase {

    /**
     * Shows all rows from the table Client
     *
     * @return void
     */
    function index() {

        //Looks if the session user exists and if not redirects to User/login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Create new repo object
        $repo = new RepositoryClient($this->registry);

        //Try and catch for fetching all entries
        try {
            $entries = $repo->fetchAll();
        } catch (\Exception $exception) {
            $errorMessages = $exception->getMessage();
            $this->registry['view']->set('errorMessages', $errorMessages);
        }

        //Check if entry exists in DB
        if (!isset($entries) || $entries == NULL) {
            throw new \Exception("Entry does not exist in the database!");
            exit;
        }

        //Setting entries for the view and show the respectiv view
        $this->registry['view']->set('entries', $entries);
        $this->registry['view']->show('ViewClientIndex');
    }

    /**
     * Gets all the entries from the database that match the args in the url
     *
     * @return void
     */
    function show() {

        //Looks if the session user exists and if not redirects to User/login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Instantiates a new repo object by the current args
        $repo = new RepositoryClient($this->registry);

        //Check if args is a number value
        if (!is_numeric($this->registry->get('args')[0])) {
            throw new \Exception("Client argument incorrect!");
            exit;
        }

        //Try and catch to check fetch by args
        try {
            $entry = $repo->fetch((int)$this->registry->get('args')[0]);
        } catch (\Exception $exception) {
            $errorMessages = $exception->getMessage();
            $this->registry['view']->set('errorMessages', $errorMessages);
        }

        //Check if entry exists in DB
        if (!isset($entry) || $entry == NULL) {
            throw new \Exception("Entry does not exist in the database!");
            exit;
        }

        //sets for the view all entries which can be used with get functions from model, then shows the view.
        $this->registry['view']->set('entry', $entry);
        $this->registry['view']->show('ViewClientDetail');
    }

    /**
     * Adds a new client
     *
     * @return void
     */
    function add() {

        //Looks if the session user exists and if not redirects to User/login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Makes a new repo Object
        $repo = new RepositoryClient($this->registry);

        //Checks if request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //If state isnt set, state POST is set to 0
            if (!isset($_POST['state'])) {
                $_POST['state'] = 0;
            }

            //Instance of a new Validation object and check POST via validate method
            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            //Checks if isValid is not true and sets validation messages else inserts entry via repo
            if (!$isValid) {

                $this->registry['view']->set('validate', $repo->validationArray);
                $this->registry['view']->set('messages', $validation->getMessages());
                $this->registry['view']->show('ViewClientAdd');

            } else {

                //Try and catch for add method in repo
                try {
                    if ($repo->add($_POST)) {
                        header('Location: http://' . $_SERVER["HTTP_HOST"] . "/Client/index");
                    }
                } catch (\Exception $exception) {
                    echo $exception->getMessage();
                }
            }
        }

        //Sets validate for view and shows view
        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->show('ViewClientAdd');
    }

    /**
     * Updates the client entries in the edit action
     *
     * @return void
     */
    function edit() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        // Makes a new repo client object
        $repo = new RepositoryClient($this->registry);

        //Checks if args is a number else shows exception and exits programm
        if (!is_numeric($this->registry->get('args')[0])) {
            throw new \Exception("Client argument incorrect!");
            exit;
        }

        //With the repo object fetch all entries by args
        $entry = $repo->fetch((int)$this->registry->get('args')[0]);

        //If request method is post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Instance of a new Validation object and check POST via validate method
            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            //Checks if isValid is not true and sets validation messages else inserts entry via repo
            if (!$isValid) {

                $this->registry['view']->set('messages', $validation->getMessages());
                $this->registry['view']->set('entry', $entry);
                $this->registry['view']->show('ViewClientEdit');

            } else {

                //If state isnt set, state POST is set to 0
                if (!isset($_POST['state'])) {
                    $_POST['state'] = 0;
                }

                //If the repo was updated redirect to index action
                if ($repo->update($_POST, $entry->getId())) {
                    header('Location: http://' . $_SERVER["HTTP_HOST"] . "/client");
                }
            }
        }

        //Set validation, set the entry for the view and show the view
        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->set('entry', $entry);
        $this->registry['view']->show('ViewClientEdit');
    }

    /**
     * Delete an entry by args
     *
     * @return void
     */
    function delete() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Makes a new Repo object
        $repo = new RepositoryClient($this->registry);

        //Check if args is a number value
        if (!is_numeric($this->registry->get('args')[0])) {
            throw new \Exception("Client argument incorrect!");
            exit;
        }

        //Deletes entry by args and redirects to index action
        if ($repo->delete((int)$this->registry->get('args')[0])) {
            header('Location: http://' . $_SERVER["HTTP_HOST"] . "/Client/index");
        }
    }
}
