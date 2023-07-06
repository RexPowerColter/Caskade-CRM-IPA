<?php

/**
 * RepositoryToken makes queries also sets validaton array
 */
class RepositoryToken extends RepositoryBase {

    //Define validation array
    public $validationArray = [
        "password" => ["required" => true, "minLength" => 3, "maxLength" => 50, "type" => "password"],
        "password_repeat" => ["required" => true, "minLength" => 3, "maxLength" => 50, "type" => "password"],
    ];

    function add($user) {

        $query = 'INSERT INTO `token` SET `user_id` = :user_id, `token` = :token';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            'user_id' => $user->getId(),
            'token' => bin2hex(random_bytes(10))
        ]);

        $token = $this->fetchById($this->db->lastInsertId());

        return $token;
    }

    function fetchById(int $id): object {
        $query = 'SELECT `id`, `user_id`, `token` FROM `token` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        if ($statement->rowCount() === 0) {
            throw new OutOfRangeException();
        }

        $tokenItem = $statement->fetchObject('EntityToken');
        return $tokenItem;
    }

    function fetchByToken($token) {

        $query = 'SELECT `id`, `user_id`, `token` FROM `token` WHERE `token` = :token';
        $statement = $this->db->prepare($query);
        $statement->execute([':token' => $token]);

        if ($statement->rowCount() === 0) {
            throw new OutOfRangeException();
        }

        $tokenItem = $statement->fetchObject('EntityToken');
        return $tokenItem;
    }

    function deleteToken($token) {
        $query = 'DELETE FROM `token` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([':id' => $token->getId()]);
        return $result;
    }
}
