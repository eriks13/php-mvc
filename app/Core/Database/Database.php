<?php

namespace app\Core\Database;

use config\Config;
use PDO;
use app\Core\Exception\DatabaseException;
use PDOException;


class Database{

    protected $connection;

    protected $statement;
    
    public function __construct()
    {
        $config = new Config();
        $dbHost =  $config->getHost();
        $dbName = $config->getDatabaseName();
        $dbUser = $config->getUser();
        $dbPassword = $config->getPassword();


        try {
            $this->connection = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            DatabaseException::ExceptionMessage("koneksi gagal!".$e->getMessage());
        }
    }


    // kueri database 

    public function query(string $query, array $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    // kueri database 

    // cari data
    public function find()
    {
        return $this->statement->fetch();
    }

    //ambil hasil atau tampilkan kesalahan
    public function findOrFail()
    {
        $results = $this->find();

        if (!$results) {
           throw new DatabaseException("data '{$results}' tidak ditemukan");
        }
        return $results;
    }

}