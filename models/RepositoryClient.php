<?php

/**
 * RepositoryClient makes queries also sets validaton array
 */
class RepositoryClient extends RepositoryBase {

    //Define validation array
    public $validationArray = [
        "title" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "firstname" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "lastname" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "birthday" => ["required" => true, "minLength" => 3, "maxLength" => 10, "type" => "date"],
        "nationality" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "street" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "zipcode" => ["required" => true, "minLength" => 3, "maxLength" => 10, "type" => "number"],
        "city" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "country" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "phone" => ["required" => true, "minLength" => 3, "maxLength" => 20, "type" => "text"],
        "email" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "email"],
        "iban" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "bank" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "account" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "state" => ["required" => false, "minLength" => '', "maxLength" => '', "type" => "checkbox"],
    ];

    /**
     * fetch
     *
     * @param  int $id
     * @return object
     */
    function fetch(int $id): object {

        static $query = 'SELECT `id`, `title`, `firstname`, `lastname`, `birthday`, `nationality`, `street`, `zipcode`, `city`, `country`, `phone`, `email`, `iban`, `bank`, `account`, `state` FROM `client` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        if ($statement->rowCount() === 0) {
            throw new OutOfRangeException();
        }

        $clientItem = $statement->fetchObject('EntityClient');

        //contracts
        static $queryContract = 'SELECT contract.* FROM contract_client
        JOIN contract ON contract.id = contract_client.contract_id
        WHERE contract_client.client_id = :id ';

        $statementContract = $this->db->prepare($queryContract);
        $statementContract->execute([':id' => $id]);

        $contracts = $statementContract->fetchAll(
            PDO::FETCH_CLASS,
            'EntityContract'
        );

        $clientItem->setContracts($contracts);

        return $clientItem;
    }

    /**
     * fetchAll
     *
     * @return array
     */
    function fetchByName($term): array {

        static $query = 'SELECT * FROM `client` WHERE `firstname` LIKE :term OR `lastname` LIKE :term  ';
        $statement = $this->db->prepare($query);
        $statement->execute(['term' => '%' . $term . '%']);

        $rows = $statement->fetchAll(
            PDO::FETCH_CLASS,
            'EntityClient'
        );

        $result = [];

        foreach ($rows as $row) {
            $result[] = [
                "id" => $row->getId(),
                "label" => $row->getFirstname() . " " . $row->getLastname()
            ];
        }

        return $result;
    }

    /**
     * fetchAll
     *
     * @return array
     */
    function fetchAll(): array {

        static $query = 'SELECT * FROM `client`';
        $statement = $this->db->prepare($query);
        $statement->execute();

        $rows = $this->db->query($query)->fetchAll(
            PDO::FETCH_CLASS,
            'EntityClient'
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
        $query = 'INSERT INTO `client` SET      `title` = :title,
                                                `firstname` = :firstname,
                                                `lastname` = :lastname,
                                                `birthday` = :birthday,
                                                `nationality` = :nationality,
                                                `street` = :street,
                                                `zipcode` = :zipcode,
                                                `city` = :city,
                                                `country` = :country,
                                                `phone` = :phone,
                                                `email` = :email,
                                                `iban` = :iban,
                                                `bank` = :bank,
                                                `account` = :account,
                                                `state` = :state';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':title' => $form['title'],
            ':firstname' => $form['firstname'],
            ':lastname' => $form['lastname'],
            ':birthday' => $form['birthday'],
            ':nationality' => $form['nationality'],
            ':street' => $form['street'],
            ':zipcode' => $form['zipcode'],
            ':city' => $form['city'],
            ':country' => $form['country'],
            ':phone' => $form['phone'],
            ':email' => $form['email'],
            ':iban' => $form['iban'],
            ':bank' => $form['bank'],
            ':account' => $form['account'],
            ':state' => $form['state']
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
        static $query = 'DELETE FROM `client` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([':id' => $id]);

        return $result;
    }

    /**
     * update
     *
     * @param mixed $id
     * @param mixed $form
     * @return bool
     */
    function update($form, $id): bool {

        static $query = 'UPDATE `client` SET 
        `title` = :title,
        `firstname` = :firstname,
        `lastname` = :lastname,
        `birthday` = :birthday,
        `nationality` = :nationality,
        `street` = :street,
        `zipcode` = :zipcode,
        `city` = :city,
        `country` = :country,
        `phone` = :phone,
        `email` = :email,
        `iban` = :iban,
        `bank` = :bank,
        `account` = :account,
        `state` = :state
        WHERE `id` = :id';

        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':id' => $id,
            ':title' => $form['title'],
            ':firstname' => $form['firstname'],
            ':lastname' => $form['lastname'],
            ':birthday' => $form['birthday'],
            ':nationality' => $form['nationality'],
            ':street' => $form['street'],
            ':zipcode' => $form['zipcode'],
            ':city' => $form['city'],
            ':country' => $form['country'],
            ':phone' => $form['phone'],
            ':email' => $form['email'],
            ':iban' => $form['iban'],
            ':bank' => $form['bank'],
            ':account' => $form['account'],
            ':state' => $form['state']
        ]);

        return $result;
    }
}
