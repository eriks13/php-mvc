<?php


namespace app\Core\Exception;

use Exception;


class RouteException extends Exception{


    public static function RouteExceptionErrorMethodAndCalss($method, $controller)
    {
      try {
        try {
          throw new RouteException("Error. Method '{$method}' tidak ditemukan di controller '{$controller}'");
        } catch (RouteException $e) {
          throw $e;
        }
      } catch (Exception $e) {
        exit($e->getMessage());
      }
    }

}