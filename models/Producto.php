<?php

namespace models;
require_once("Conexion.php");

class Producto
{

    public function getproducto(){
        $stm = Conexion::conector()->prepare("SELECT * FROM producto");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
  


    public function insertarProducto($data){
        $sql = "INSERT INTO producto VALUES(:A,:B,:C,:D,:E,:F)";
        $stm = Conexion::conector()->prepare($sql);
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['prerequisito']);
        $stm->bindParam(":C", $data['precio_venta']);
        $stm->bindParam(":D", $data['precio_compra']);
        $stm->bindParam(":E", $data['cantidad']);
        $stm->bindParam(":F", $data['codigo_ingreso']);
        $count = $stm->execute();
        print($stm->errorCode());
        print_r($stm->errorInfo());
        return $count;
    }

    public function buscarxnombre($nombre){
        $sql = Conexion::conector()->prepare("SELECT * FROM producto WHERE nombre=:A");
        $stm->bindParam(":A", $nombre);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

   

   

}