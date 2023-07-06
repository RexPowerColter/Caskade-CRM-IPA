<?php

/**
 * ControllerContract
 */
class ControllerContract extends ControllerBase {

    /**
     * Shows all rows from the table Contract
     *
     * @return void
     */
    function index() {
        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Create new repo object
        $repo = new RepositoryContract($this->registry);

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
        $this->registry['view']->show('ViewContractIndex');
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
        $repo = new RepositoryContract($this->registry);

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
        $this->registry['view']->show('ViewContractDetail');
    }

    /**
     * add
     *
     * @return void
     */
    function add() {
        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        $repo = new RepositoryContract($this->registry);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['state'])) {
                $_POST['state'] = 0;
            }

            $_POST['file'] = basename($_FILES["file"]["name"]);

            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            if (!$isValid) {

                $this->registry['view']->set('validate', $repo->validationArray);
                $this->registry['view']->set('messages', $validation->getMessages());
                $this->registry['view']->show('ViewContractAdd');
            } else {

                //Try and catch to check for add method in repo
                try {
                    if ($repo->add($_POST)) {

                        /*Trying the upload feature this should only be used in the contracts for uploading contracts also the contracts are pdf documents only have to implement that*/
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["file"]["name"]);

                        //Make uploads folder structure to save files with controller/action/arguments
                        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        //Throw exception of file is not a PDF but gets stopped by HTML anyway
                        if ($fileType == "pdf") {
                            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                        } else {
                            throw new \Exception("File is not a PDF!");
                            exit;
                        }

                        //Redirects to Contract index
                        header('Location: http://' . $_SERVER["HTTP_HOST"] . "/Contract/index");
                    }
                } catch (\Exception $exception) {

                    $errorMessages = $exception->getMessage();
                    $this->registry['view']->set('errorMessages', $errorMessages);
                }
            }
        }

        $repoClient = new RepositoryClient($this->registry);
        $clients = $repoClient->fetchAll();
        $this->registry['view']->set('clients', $clients);

        $repoProduct = new RepositoryProduct($this->registry);
        $products = $repoProduct->fetchAll();
        $this->registry['view']->set('products', $products);

        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->show('ViewContractAdd');
    }

    /**
     * edit
     *
     * @return void
     */
    function edit() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Makes a new Repo object
        $repo = new RepositoryContract($this->registry);

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

        //Checks if request method is post
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!isset($_POST['state'])) {
                $_POST['state'] = 0;
            }

            /*Trying the upload feature this should only be used in the contracts for uploading contracts also the contracts are pdf documents only have to implement that*/
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);

            //Make uploads folder structure to save files with controller/action/arguments
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($fileType == "pdf") {
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }

            $_POST['file'] = basename($_FILES["file"]["name"]);
            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            if (!$isValid) {
                $this->registry['view']->set('messages', $validation->getMessages());
                $this->registry['view']->set('entry', $entry);
                $this->registry['view']->show('ViewContractEdit');
            } else {

                if ($repo->update($entry->getId(), $_POST)) {
                    header('Location: http://' . $_SERVER["HTTP_HOST"] . "/contract");
                }
            }
        }

        $repoClient = new RepositoryClient($this->registry);
        $clients = $repoClient->fetchAll();
        $this->registry['view']->set('clients', $clients);

        $repoProduct = new RepositoryProduct($this->registry);
        $products = $repoProduct->fetchAll();
        $this->registry['view']->set('products', $products);

        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->set('entry', $entry);
        $this->registry['view']->show('ViewContractEdit');
    }

    /**
     * delete
     *
     * @return void
     */
    function delete() {
        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Check if args is a number value
        if (!is_numeric($this->registry->get('args')[0])) {
            throw new \Exception("Client argument incorrect!");
            exit;
        }

        //Makes a new repo object
        $repo = new RepositoryContract($this->registry);

        //Deletes repo entry by get args and redirects to Contract/index
        if ($repo->delete((int)$this->registry->get('args')[0])) {
            header('Location: http://' . $_SERVER["HTTP_HOST"] . "/Contract/index");
        }
    }
}
