<?php

/**
 * RepositoryProduct makes queries also sets validaton array
 */
class RepositoryProduct extends RepositoryBase {

    //Define validation array
    public $validationArray = [
        "name" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "age" => ["required" => true, "minLength" => 1, "maxLength" => 10, "type" => "number"],
        "alcohol_percentage" => ["required" => true, "minLength" => 2, "maxLength" => 10, "type" => "text"],
        "volume" => ["required" => true, "minLength" => 1, "maxLength" => 10, "type" => "number"],
        "storage_time" => ["required" => true, "minLength" => 1, "maxLength" => 10, "type" => "number"],
        "price" => ["required" => true, "minLength" => 1, "maxLength" => 10, "type" => "number"],
    ];

    /**
     * fetch
     *
     * @param  int $id
     * @return object
     */
    function fetch(int $id): object {
        static $query = 'SELECT `id`, `name`, `age`, `alcohol_percentage`, `volume`, `storage_time`, `price` FROM `product` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        if ($statement->rowCount() === 0) {
            throw new OutOfRangeException();
        }

        $productItem = $statement->fetchObject('EntityProduct');

        return $productItem;
    }

    /**
     * fetchAll
     *
     * @return array
     */
    function fetchAll(): array {
        static $query = 'SELECT * FROM `product`';

        $statement = $this->db->prepare($query);
        $statement->execute();

        $rows = $this->db->query($query)->fetchAll(
            PDO::FETCH_CLASS,
            'EntityProduct'
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
        $query = 'INSERT INTO `product` SET     `name` = :name,
                                                `age` = :age,
                                                `alcohol_percentage` = :alcohol_percentage,
                                                `volume` = :volume,
                                                `storage_time` = :storage_time,
                                                `price` = :price';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':name' => $form['name'],
            ':age' => $form['age'],
            ':alcohol_percentage' => $form['alcohol_percentage'],
            ':volume' => $form['volume'],
            ':storage_time' => $form['storage_time'],
            ':price' => $form['price']
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
        static $query = 'DELETE FROM `product` WHERE `id` = :id';
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

        static $query = 'UPDATE `product` SET 
        `name` = :name,
        `age` = :age,
        `alcohol_percentage` = :alcohol_percentage,
        `volume` = :volume,
        `storage_time` = :storage_time,
        `price` = :price
        WHERE `id` = :id';

        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':id' => $id,
            ':name' => $form['name'],
            ':age' => $form['age'],
            ':alcohol_percentage' => $form['alcohol_percentage'],
            ':volume' => $form['volume'],
            ':storage_time' => $form['storage_time'],
            ':price' => $form['price']
        ]);

        return $result;
    }
}
