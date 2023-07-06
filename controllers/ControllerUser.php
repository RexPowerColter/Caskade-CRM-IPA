<?php

/**
 * ControllerUser
 */
class ControllerUser extends ControllerBase {

    /**
     * show all users
     *
     * @return void
     */
    function index() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //makes a new repo and fetches all entries
        $repo = new RepositoryUser($this->registry);

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

        //sets entries for the view and shows the view
        $this->registry['view']->set('entries', $entries);
        $this->registry['view']->show('ViewUserIndex');
    }


    /**
     * add a new user
     *
     * @return void
     */
    function add() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Set a new repo user
        $repo = new RepositoryUser($this->registry);

        //If request method is post...
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //If password and password repeat match = true
            if ($_POST['password'] === $_POST['password_repeat']) {

                //Set a new validation object and validate all post responds
                $validation = new Validation($_POST, $repo->validationArray);
                $isValid = $validation->validate();

                //Check if validation is false
                if (!$isValid) {
                    $this->registry['view']->set('validate', $repo->validationArray);
                    $this->registry['view']->set('messages', $validation->getMessages());
                    $this->registry['view']->show('ViewUserAdd');
                } else {

                    //Try and catch for fetching all entries
                    try {

                        //Add post to repo method add and redirect to User/index
                        if ($repo->add($_POST)) {
                            header('Location: http://' . $_SERVER["HTTP_HOST"] . "/User/index");
                        }
                    } catch (\Exception $exception) {
                        $errorMessages = $exception->getMessage();
                        $this->registry['view']->set('errorMessages', $errorMessages);
                    }
                }
            }
        }

        //Sets validate for the view then shows views UserAdd
        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->show('ViewUserAdd');
    }

    /**
     * edit user entry
     *
     * @return void
     */
    function edit() {

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

        //Set a new repo user and fetch all entries by args
        $repo = new RepositoryUser($this->registry);
        $entry = $repo->fetch((int)$this->registry->get('args')[0]);


        //If request method post...
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Set all entries to the view
            $this->registry['view']->set('entry', $entry);

            //Set a new validation object and validate all post responds
            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            //Check if validation is false
            if (!$isValid) {
                $this->registry['view']->set('validate', $repo->validationArray);
                $this->registry['view']->set('messages', $validation->getMessages());
                $this->registry['view']->show('ViewUserEdit');
            } else {

                //Try and catch for fetching all entries
                try {

                    //Add post to repo method updateAll and redirect to User/index
                    if ($repo->updateAll($_POST, $entry)) {
                        header('Location: http://' . $_SERVER["HTTP_HOST"] . "/User/index");
                    }
                } catch (\Exception $exception) {
                    $errorMessages = $exception->getMessage();
                    $this->registry['view']->set('errorMessages', $errorMessages);
                }
            }
        }

        //Sets validate for the view and set all entries to the view and shows the view
        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry['view']->set('entry', $entry);
        $this->registry['view']->show('ViewUserEdit');
    }

    /**
     * delete user
     *
     * @return void
     */
    function delete() {

        //Looks if the session user exists and if not redirects to User/Login
        $session = new ModelSession();
        if (!$session->get('user')) {
            header('Location: /User/login');
        }

        //Try and catch to check fetch by args
        try {

            //Make a new repo user obj and delete by args then redirect to User/index
            $repo = new RepositoryUser($this->registry);
            $repo->delete((int)$this->registry->get('args')[0]);
            header('Location: http://' . $_SERVER["HTTP_HOST"] . "/User/index");
        } catch (\Exception $exception) {
            $errorMessages = $exception->getMessage();
            $this->registry['view']->set('errorMessages', $errorMessages);
        }
    }

    /**
     * login user method
     *
     * @return void
     */
    function login() {

        //Make a new repo user obj
        $repo = new RepositoryUser($this->registry);

        //If request method post...
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Make a new validation obj with post parameters and call up validate method
            $validation = new Validation($_POST, $repo->validationArray);
            $isValid = $validation->validate();

            //Check if validate return false
            if (!$isValid) {

                //Set validate for the view and set messages for the view
                $this->registry['view']->set('validate', $repo->validationArray);
                $this->registry['view']->set('messages', $validation->getMessages());

                //remove current layout
                $this->registry->remove('layoutPath');

                //Set new Login page layout for the registry
                $newLayout = "views/LayoutLogin.php";
                $this->registry->set('layoutPath', $newLayout);
                $this->registry['view']->show('ViewUserLogin');
                return;
            } else {

                //Try and catch to check fetch by args
                try {

                    //Fetch username and password with post parameters
                    $user = $repo->fetchByUsernameAndPassword($_POST);

                    //If user isnt set, set session message failed
                    if (!$user) {
                        $_SESSION['messages'][] = "failed";
                    }
                } catch (\Exception $exception) {
                    $errorMessages = $exception->getMessage();
                    $this->registry['view']->set('errorMessages', $errorMessages);
                }

                //Makes a new model obj and sets the user for it
                $session = new ModelSession();
                $session->set("user", $user);

                //Redirects to Contract/index
                header('Location: http://' . $_SERVER["HTTP_HOST"] . "/Contract/index");
            }
        }

        //Set validate to the view removes the layoutpath
        $this->registry['view']->set('validate', $repo->validationArray);
        $this->registry->remove('layoutPath');

        //Sets new layout path to the view then shows the view
        $newLayout = "views/LayoutLogin.php";
        $this->registry->set('layoutPath', $newLayout);
        $this->registry['view']->show('ViewUserLogin');
    }

    /**
     * logout
     *
     * @return void
     */
    function logout() {

        //Try and catch to check fetch by args
        try {
            $session = new ModelSession();
            $session->remove("user");
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }

        //Redirect to User/login
        header('Location: http://' . $_SERVER["HTTP_HOST"] . "/User/login");
    }

    /**
     * reset password
     *
     * @return void
     */
    function reset() {

        //Set a new repo user obj
        $repo = new RepositoryUser($this->registry);

        //If Request method = post...
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Fetch by username post
            $user = $repo->fetchByUsername($_POST);

                //If user exists...
                if ($user) {

                    //Try and catch to check fetch by args
                    try {

                        //Make new Repo token obj and call up add
                        $repo_token = new RepositoryToken($this->registry);
                        $token = $repo_token->add($user);
                    } catch (\Exception $exception) {
                        echo $exception->getMessage();
                    }


                    //Redirect to User/verification
                    header('Location: http://' . $_SERVER["HTTP_HOST"] . "/User/verification/" . $token->getToken());
                }

                //Remove layoutpath
                $this->registry->remove('layoutPath');

                //Set new layoutpayth to the view and show view
                $newLayout = "views/LayoutLogin.php";
                $this->registry->set('layoutPath', $newLayout);
            }
        

        //Remove layoutpath
        $this->registry->remove('layoutPath');

        //Set a new layoutpath for the view and show view
        $newLayout = "views/LayoutLogin.php";
        $this->registry->set('layoutPath', $newLayout);
        $this->registry['view']->show('ViewUserReset');
    }

    /**
     * verification
     *
     * @return void
     */
    function verification() {

        //Set a new repo obj
        $repoToken = new RepositoryToken($this->registry);

        //If request method post...
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //If password and password_repeat are equal...
            if ($_POST['password'] === $_POST['password_repeat']) {

                //Get token by post token
                $token = $repoToken->fetchByToken($_POST['token']);

                //Try and catch to check fetch by args
                try {

                    //Set a new repo user obj and update password by post and $token
                    $repoUser = new RepositoryUser($this->registry);
                    $repoUser->updatePassword($_POST, $token);

                    //Delete token after successfully setting a new password
                    $repoToken->deleteToken($token);

                } catch (\Exception $exception) {
                    echo $exception->getMessage();
                }

                //Redirect to User/login
                header('Location: http://' . $_SERVER["HTTP_HOST"] . "/User/login");
            }
        }

        //Set new Validate for view
        $this->registry['view']->set('validate', $repoToken->validationArray);

        //Remove layoutpath
        $this->registry->remove('layoutPath');

        //Set new layout and sets it for the view
        $newLayout = "views/LayoutLogin.php";
        $this->registry->set('layoutPath', $newLayout);

        //Check if args is a number value
        if (!is_string($this->registry->get('args')[0])) {
            throw new \Exception("Client argument incorrect!");
            exit;
        }

        //Fetch entry by token
        $entry = $repoToken->fetchByToken($this->registry->get('args')[0]);

        //Set token for view and show view
        $this->registry['view']->set('token', $entry->getToken());
        $this->registry['view']->show('ViewUserVerification');
    }
}
