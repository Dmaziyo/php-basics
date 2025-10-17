<?php

class Database
{

    private $connection;
    private $statement;

    public function __construct($config, $username = 'root', $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        // connect to mysql
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    // make it more flexible
    public function query($query, $params = [])
    {

        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        $this->statement = $statement;

        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function fetchOrAbort()
    {
        $result = $this->statement->fetch();
        if (! $result) {
            abort();
        }
        return $result;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }
}
