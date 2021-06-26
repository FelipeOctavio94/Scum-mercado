<?php

namespace models;

use PDO;
use PDOException;

class Conexion{
    //public static $user="root";
    //public static $pass="";
    //public static $URL="mysql:host=localhost;dbname=mercado";

      public static $user="ukfqa48l4dcg86rr";
      public static $pass="TfXviTyj0uvS0a4OWamP";
      public static $URL="mysql:host=bymr6vwwkdai42mtnopv-mysql.services.clever-cloud.com;dbname=bymr6vwwkdai42mtnopv";

    public static function conector(){
        try{
            return new \PDO(Conexion::$URL,Conexion::$user,Conexion::$pass);
        }catch(PDOException $e){
            return null;
        }
    }

}