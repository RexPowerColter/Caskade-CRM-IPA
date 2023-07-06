<?php

/**
 * ControllerProduct
 */
class ControllerProduct extends ControllerBase {

    /**
     * Shows all rows from the table Product
     *
     * @return void
     */
    function index() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Makes a new repo object
        $repo = new RepositoryProduct($this->registry);

        //Try and catch for fetching all entries
        try {
            $entries = $repo->fetchAll();
        } catch (\Exception $exception) {
            $errorMessages = $exception->getMessage();
            $this->registry['view']->set('errorMessages', $errorMessages);
        }

        //Set entries for the View also shows the respectiv view
        $this->registry['view']->set('entries', $entries);
        $this->registry['view']->show('ViewProductIndex');
    }

    /**
     * Gets all the entries from the database that match the args in the url
     *
     * @return void
     */
    function show() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Instantiates a new repo object by the current args
        $repo = new RepositoryProduct($this->registry);

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
        $this->registry['view']->show('ViewProductDetail');
    }

    /**
     * add a new product
     *
     * @return void
     */
    function add() {
        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Create a new repo object
        $repo = new RepositoryProduct($this->registry);

        //If request method is post do...
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Sets a new Validation obj and calls up validate method
            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            //Checks if validate return false
            if (!$isValid) {

                //Sets the validate messages for the view then shows the view
                $this->registry['view']->set('validate', $repo->validationArray);
                $this->registry['view']->set('messages', $validation->getMessages());
                $this->registry['view']->show('ViewProductAdd');

            } else {

                //Try and catch
                try {
                    if ($repo->add($_POST)) {
                        header('Location: http://' . $_SERVER["HTTP_HOST"] . "/Product/index");
                    }
                } catch (\Exception $exception) {
                    $errorMessages = $exception->getMessage();
                    $this->registry['view']->set('errorMessages', $errorMessages);
                }
            }
        }

        //Set validate and show view
        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->show('ViewProductAdd');
    }

    /**
     * edit a existing product
     *
     * @return void
     */
    function edit() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Makes a new repo obj and fetches all entries by args
        $repo = new RepositoryProduct($this->registry);
        $entry = $repo->fetch((int)$this->registry->get('args')[0]);

        //If request method post...
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Set a new validation obj and calls up validate method
            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            //Checks if validate method returns false
            if (!$isValid) {

                //Set validate messages and show view
                $this->registry['view']->set('messages', $validation->getMessages());
                $this->registry['view']->set('entry', $entry);
                $this->registry['view']->show('ViewProductEdit');

            } else {

                //Try and catch
                try {
                    if ($repo->update($_POST, $entry->getId())) {
                        header('Location: http://' . $_SERVER["HTTP_HOST"] . "/product");
                    }
                } catch (\Exception $exception) {
                    $errorMessages = $exception->getMessage();
                    $this->registry['view']->set('errorMessages', $errorMessages);
                }

            }
        }

        //Set valdiate and entry and show view
        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->set('entry', $entry);
        $this->registry['view']->show('ViewProductEdit');
    }

    /**
     * delete a product
     *
     * @return void
     */
    function delete() {
        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Makes a new repo object
        $repo = new RepositoryProduct($this->registry);

        //Check if args is a number value
        if (!is_numeric($this->registry->get('args')[0])) {
            throw new \Exception("Client argument incorrect!");
            exit;
        }

        //Deletes current entry by args and redirects to product index
        if ($repo->delete((int)$this->registry->get('args')[0])) {
            header('Location: http://' . $_SERVER["HTTP_HOST"] . "/Product/index");
        }
    }
}
