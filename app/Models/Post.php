<?php

namespace app\Models;


use app\Core\Database\Database;
use app\Core\Exception\DatabaseException;
use app\Core\Exception\ModelException;

class Post {
    
    protected $database;

    protected static $table = "posts";


    public function __construct()
    {
        $this->database = new Database();
    }

    // insert database 

    public static function insertRequestAll()
    {
        $tableName = self::$table;

        $database = self::getModels();

        $results = $database->query("INSERT INTO {$tableName}(title, content, user_id, created_at) VALUES(:title, :content, :user_id, :created_at)", [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'user_id' => $_POST['user_id'],
            'created_at' => $_POST['created_at']
        ]);
        
        return $results;
    }
    // update posts 
    public static function update($id)
    {
        $tableName = self::$table;
        $database = self::getModels();

        $statement = $database->query("UPDATE {$tableName} SET title = :title, user_id = :user_id, content = :content, created_at = :created_at WHERE id = :id", [
            "id" => $id,
            "title" => $_POST["title"],
            "user_id" => $_POST["user_id"],
            "content" => $_POST["content"],
            "created_at" => $_POST["created_at"]
        ]);

        return $statement;

    }

    // delete posts 

    public static function delete($id)
    {
        $tableName = self::$table;
        $database = self::getModels();
        try {
            $statement = $database->query("DELETE FROM {$tableName} where id = :id", [
                "id" => $id,
            ]);
            return $statement;
        } catch (DatabaseException $e) {
            DatabaseException::ExceptionMessage("Gagal menghapus entri!".$e->getMessage());
        }
    }  

    //ambil semua data 
    public static  function all()
    {   
        $tableName = self::$table;

        $database = self::getModels();

        if (! self::tableExists($tableName)) {

            ModelException::ModelExistsException("tabel '{$tableName}' tidak ditemukan dalam basis data");
        }
        $results = $database->query("SELECT * FROM {$tableName}")->get();

        return $results;
    }
    //end
    
    //cari data berdasarkan id 
    public static  function findId(int $id)
    {
        $tableName = self::$table;

        $database = self::getModels();

        $results = $database->query("SELECT * FROM {$tableName} WHERE id = :id", [
            "id" => $id,
        ])->findOrFail();

        return (object) $results;
    }

    public static function tableExists(string $tableName)
    {
       
       $database = self::getModels();


        $tables = $database->query("SHOW TABLES")->get();
        foreach ($tables as $table) {
            if (in_array($tableName, $table)) {
                return true;
            }
        }
        return false;
    }

    protected static  function getModels()
    {
        $models = new Post();
        return $models->database;
    }

   

}

