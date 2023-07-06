<?php

/**
 * RepositoryContract makes queries also sets validaton array
 */
class RepositoryContract extends RepositoryBase {

    //Define validation array
    public $validationArray = [
        "name" => ["required" => true, "minLength" => 3, "maxLength" => 30, "type" => "text"],
        "start_date" => ["required" => true, "minLength" => 3, "maxLength" => 20, "type" => "date"],
        "end_date" => ["required" => true, "minLength" => 3, "maxLength" => 20, "type" => "date"],
        "final_price" => ["required" => true, "minLength" => 1, "maxLength" => 10, "type" => "number"],
        "file" => ["required" => false, "minLength" => 3, "maxLength" => 50, "type" => "file"],
        "state" => ["required" => false, "minLength" => '', "maxLength" => '', "type" => "checkbox"],
    ];

    /**
     * fetch
     *
     * @param  int $id
     * @return object
     */
    function fetch(int $id): object {
        static $query = 'SELECT `id`, `name`, `start_date`, `end_date`, `final_price`, `file`, `state` FROM `contract` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        if ($statement->rowCount() === 0) {
            throw new OutOfRangeException();
        }

        $contractItem = $statement->fetchObject('EntityContract');

        //products
        static $queryProduct = 'SELECT product.* FROM contract_product
        JOIN product ON product.id = contract_product.product_id
        WHERE contract_product.contract_id = :id ';

        $statementProduct = $this->db->prepare($queryProduct);
        $statementProduct->execute([':id' => $id]);

        $products = $statementProduct->fetchAll(
            PDO::FETCH_CLASS,
            'EntityProduct'
        );

        $contractItem->setProducts($products);

        //clients
        static $queryClient = 'SELECT client.* FROM contract_client
        JOIN client ON client.id = contract_client.client_id
        WHERE contract_client.contract_id = :id ';

        $statementClient = $this->db->prepare($queryClient);
        $statementClient->execute([':id' => $id]);

        $clients = $statementClient->fetchAll(
            PDO::FETCH_CLASS,
            'EntityClient'
        );

        $contractItem->setClients($clients);

        return $contractItem;
    }

    /**
     * fetchAll
     *
     * @return array
     */
    function fetchAll(): array {
        static $query = 'SELECT * FROM `contract`';

        $statement = $this->db->prepare($query);
        $statement->execute();

        $rows = $statement->fetchAll(
            PDO::FETCH_CLASS,
            'EntityContract'
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

        $query = 'INSERT INTO `contract` SET `name` = :name,
                                                `start_date` = :start_date,
                                                `end_date` = :end_date,
                                                `final_price` = :final_price,
                                                `file` = :file,
                                                `state` = :state';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([
            ':name' => $form['name'],
            ':start_date' => $form['start_date'],
            ':end_date' => $form['end_date'],
            ':final_price' => $form['final_price'],
            ':file' => $form['file'],
            ':state' => $form['state']
        ]);

        $contractId = $this->db->lastInsertId();

        //Products
        foreach ($form['products'] as $productId) {
            $queryContractProduct = 'INSERT INTO `contract_product` SET `contract_id` = :contract_id, `product_id` = :product_id';
            $statementContractProduct = $this->db->prepare($queryContractProduct);
            $result = $statementContractProduct->execute([
                ':contract_id' => $contractId,
                ':product_id' => $productId,
            ]);
        }

        //Clients
        foreach ($form['clients'] as $clientId) {
            $queryContractClient = 'INSERT INTO `contract_client` SET `contract_id` = :contract_id, `client_id` = :client_id';
            $statementContractClient = $this->db->prepare($queryContractClient);
            $result = $statementContractClient->execute([
                ':contract_id' => $contractId,
                ':client_id' => $clientId,
            ]);
        }

        return $result;
    }



    /**
     * update
     *
     * @param mixed $id
     * @param mixed $form
     * @return bool
     */
    function update($id, $form): bool {

        $fileString = '';

        $array = [
            ':id' => $id,
            ':name' => $form['name'],
            ':start_date' => $form['start_date'],
            ':end_date' => $form['end_date'],
            ':final_price' => $form['final_price'],
            ':state' => $form['state']
        ];

        if ($form['file']) {
            $array[':file'] = $form['file'];
            $fileString = 'file = :file,';
        }

        $query = sprintf('UPDATE contract SET 
        name = :name,
        start_date = :start_date,
        end_date = :end_date,
        final_price = :final_price,
        %s
        state = :state
        WHERE id = :id', $fileString);

        $statement = $this->db->prepare($query);
        $result = $statement->execute($array);

        $queryDeleteContractProduct = 'DELETE FROM `contract_product` WHERE `contract_id` = :contract_id';
        $statementDeleteContractProduct = $this->db->prepare($queryDeleteContractProduct);
        $result = $statementDeleteContractProduct->execute([':contract_id' => $id]);

        foreach ($form['products'] as $productId) {
            $queryContractProduct = 'INSERT INTO `contract_product` SET `contract_id` = :contract_id, `product_id` = :product_id';
            $statementContractProduct = $this->db->prepare($queryContractProduct);
            $result = $statementContractProduct->execute([
                ':contract_id' => $id,
                ':product_id' => $productId,
            ]);
        }

        $queryDeleteContractClient = 'DELETE FROM `contract_client` WHERE `contract_id` = :contract_id';
        $statementDeleteContractClient = $this->db->prepare($queryDeleteContractClient);
        $result = $statementDeleteContractClient->execute([':contract_id' => $id]);

        foreach ($form['clients'] as $clientId) {
            $queryContractClient = 'INSERT INTO `contract_client` SET `contract_id` = :contract_id, `client_id` = :client_id';
            $statementContractClient = $this->db->prepare($queryContractClient);
            $result = $statementContractClient->execute([
                ':contract_id' => $id,
                ':client_id' => $clientId,
            ]);
        }

        return $result;
    }

    /**
     * delete
     *
     * @param mixed $id
     * @return bool
     */
    function delete($id): bool {
        static $query = 'DELETE FROM `contract` WHERE `id` = :id';
        $statement = $this->db->prepare($query);
        $result = $statement->execute([':id' => $id]);
        return $result;
    }


    function endcontract($form) {

        if (!isset($form['month']))  $form['month'] = date("m");
        if (!isset($form['year']))  $form['year'] = date("Y");

        $compareStartDate = $form['year'] . "-" . $form['month'] . "-01";
        $compareEndDate =  $form['year']  . "-" . $form['month'] . "-" . date("t");

        static $query = 'SELECT * FROM `contract` WHERE end_date BETWEEN :compareStartDate and  :compareEndDate';

        $statement = $this->db->prepare($query);
        $statement->execute([':compareStartDate' => $compareStartDate, ':compareEndDate' => $compareEndDate]);

        $rows = $statement->fetchAll(
            PDO::FETCH_CLASS,
            'EntityContract'
        );

        return $rows;
    }

    function salesvolume($form) {

        $filterString = "";
        $filterArray = [];

        if (isset($form['year']) && is_numeric($form['year'])) {
            $compareStartDate = $form['year'] . "-01" . "-01";
            $compareEndDate =  $form['year']  . "-12-" . date("t");
            $filterString = "WHERE end_date BETWEEN :compareStartDate and  :compareEndDate";
            $filterArray = [':compareStartDate' => $compareStartDate, ':compareEndDate' => $compareEndDate];
        }

        $query = sprintf('SELECT ROUND(SUM(final_price),2) as total, YEAR(end_date) as year
        FROM `contract` %s GROUP BY YEAR(end_date)', $filterString);

        $statement = $this->db->prepare($query);
        $statement->execute($filterArray);

        $rows = $statement->fetchAll();

        return $rows;
    }
}
