<?php

namespace config;


class Config{

    private  $dbHost;
    private  $dbName;
    private  $dbUser;
    private  $dbPassword;
    
    public function __construct()
    {
        $this->dbHost = $_ENV["DB_HOST"];
        $this->dbName = $_ENV["DB_DATABASE"];
        $this->dbUser = $_ENV["DB_USERNAME"];
        $this->dbPassword = $_ENV["DB_PASSWORD"];
    }

    
    public function getHost()
    {
        return $this->dbHost;
    }

    public function getUser()
    {
        return $this->dbUser;
    }

    public function getPassword()
    {
        return $this->dbPassword;
    }

    public function getDatabaseName()
    {
        return $this->dbName;
    }

}