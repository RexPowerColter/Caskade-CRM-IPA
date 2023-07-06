<?php

/**
 * RepositoryUser makes queries also sets validaton array
 */
class RepositoryUser extends RepositoryBase {

    //Define validation array
    public $validationArray = [
        "username" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "email"],
        "password" => ["required" => false, "minLength" => 0, "maxLength" => 50, "type" => "password"],
        "password_repeat" => ["required" => true, "minLength" => 3, "maxLength" => 50, "type" => "password"],
    ];

    /**
     * fetchUserByUsername
     *
     * @param string $form
     * 
     */
    function fetchByUsernameAndPassword($form) {

        $query = 'SELECT * FROM `user` WHERE `username` = :username AND `password` = :password';
        $statement = $this->db->prepare($query);

        $statement->execute([
            ':username' => $form['username'],
            ':password' => md5($form['password'])
        ]);

        if ($statement->rowCount() === 0) {
            return false;
        }

        $userItem = $statement->fetchObject('EntityUser');

        return $userItem;
    }

    
    /**
     * fetch
     *
     * @param  int $id
     * @return object
     */
    function fetch(int $id): object {
        static $query = 'SELECT `id`, `username`, `password` FROM `user` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        if ($statement->rowCount() === 0) {
            throw new OutOfRangeException();
        }

        $userItem = $statement->fetchObject('EntityUser');

        return $userItem;
    }

    
    /**
     * fetchAll
     *
     * @return array
     */
    function fetchAll(): array {
        static $query = 'SELECT * FROM `user`';

        $statement = $this->db->prepare($query);
        $statement->execute();

        $rows = $this->db->query($query)->fetchAll(
            PDO::FETCH_CLASS,
            'EntityUser'
        );

        return $rows;
    }

    /**
     * add
     *
     * @param mixed $form
     * @return bool
     */
    function add($form): bool {

        $query = 'INSERT INTO `user` SET `username` = :username, `password` = :password';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':username' => $form['username'],
            ':password' => md5($form['password'])
        ]);

        return $result;
    }


    /**
     * delete
     *
     * @param mixed $id
     * @return bool
     */
    function delete($id): bool {
        static $query = 'DELETE FROM `user` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([':id' => $id]);

        return $result;
    }

    /**
     * updateUsername
     *
     * @param  mixed $form
     * @return bool
     */
    function updateUsername($form): bool {
        static $query = 'UPDATE `user` SET `username` = :username WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':id' => $form['id'],
            ':username' => $form['username']
        ]);

        return $result;
    }

    /**
     * update
     *
     * @param mixed $form
     * @return bool
     */
    function updateAll($form, $entry): bool {
        static $query = 'UPDATE `user` SET `username` = :username, `password` = :password WHERE `id` = :id';
        $statement = $this->db->prepare($query);

        $result = $statement->execute([
            ':id' => $entry->getId(),
            ':username' => $form['username'],
            ':password' => md5($form['password'])
        ]);

        return $result;
    }

    
    /**
     * fetchByUsername
     *
     * @param  mixed $form
     * @return void
     */
    function fetchByUsername($form) {
        $query = 'SELECT * FROM `user` WHERE `username` = :username';
        $statement = $this->db->prepare($query);

        $statement->execute([
            ':username' => $form['username']
        ]);

        if ($statement->rowCount() === 0) {
            return false;
        }

        $userItem = $statement->fetchObject('EntityUser');

        return $userItem;
    }
    
    /**
     * updatePassword
     *
     * @param  mixed $form
     * @param  mixed $token
     * @return bool
     */
    function updatePassword($form, $token): bool {
        $query = 'UPDATE `user` SET
        `password` = :password WHERE `id` = :id';

        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':id' => $token->getUser_id(),
            ':password' => md5($form['password'])
        ]);
        
        return $result;
    }
}
