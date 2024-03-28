<?php 

namespace app\Core\Exception;


use PDOException;

class DatabaseException extends PDOException
{
    public static function ExceptionMessage(string $message)
    {
        try {
            try {
                throw new DatabaseException($message);
            } catch (DatabaseException $e) {
                throw $e;
            }
        } catch (PDOException $e) {
           exit($e->getMessage());
        }
    } 
}