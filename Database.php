<?php

class Database
{

    private $connection;

    public function __construct()
    {
        // connect to mysql
        $dsn              = "mysql:host=localhost;port=3306;dbname=php-course;charset=utf8mb4";
        $this->connection = new PDO($dsn, "root", "root");
    }

    // make it more flexible
    public function query($query)
    {

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}
