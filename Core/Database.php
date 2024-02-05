<?php

namespace Core;

use PDO;

// connect to the mysql db server and execute a query
class Database
{

    public $connection;

    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        // set up dsn string
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        // create a new instance  of a pdo class
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {
        // prepare the query statement
        $this->statement = $this->connection->prepare($query);

        // execute the query statement
        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}
