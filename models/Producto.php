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
  


    public function insertar($data){
        $stm = Conexion::conector()->prepare("INSERT INTO producto VALUES(null,:A,:B,:C,:D,:E,:F)");;
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['prerequisito']);
        $stm->bindParam(":C", $data['precio_venta']);
        $stm->bindParam(":D", $data['precio_compra']);
        $stm->bindParam(":E", $data['cantidad']);
        $stm->bindParam(":F", $data['codigo_ingreso']);
        return $stm->execute();
    }

    public function buscarProducto($id){
        $sql = Conexion::conector()->prepare("SELECT * FROM producto WHERE id=:A");
        $stm->bindParam(":A", $id);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function eliminarProducto($id)
    {
        $stm = Conexion::conector()->prepare("DELETE FROM producto where id=:A");
        $stm->bindParam(":A", $id);
        return $stm->execute();
    }

    public function editarProducto($id, $data)
    { //$data=["nombre"=>valor1, "descripcion"=>valor]
        $stm = Conexion::conector()->prepare("UPDATE producto SET nombre=:A, cantidad=:B WHERE id=:C");
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['cantidad']);
        $stm->bindParam(":C", $id);
        return $stm->execute();
    }

   

   

}