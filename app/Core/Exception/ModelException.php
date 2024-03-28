<?php

namespace app\Core\Exception;

use Exception;

class ModelException extends Exception 
{
    public static function ModelExistsException(string $tableName)
    {
       try {
        try {
            throw new ModelException($tableName);
        } catch (ModelException $e) {
            throw $e;
        }
       } catch (Exception $e) {
        exit($e->getMessage());
       }
    } 
}