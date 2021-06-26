<?php

namespace models;
require_once("Conexion.php");

class Usuario{

    public function iniciarSesion($rut, $clave){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut=:A AND clave=:B");
        $stm->bindParam(":A",$rut);
        $stm->bindParam(":B",md5($clave));
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function crearUsuario($data){
        $stm = Conexion::conector()->prepare("INSERT INTO usuario VALUES(:A,:B,:C,:D)");
        $stm->bindParam(":A",$data['rut']);
        $stm->bindParam(":B",$data['nombre']);
        $stm->bindParam(":C",$data['rol']);
        $stm->bindParam(":D",md5($data['clave']));
        return $stm->execute();
    }

    public function getVendedores($rol){
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rol=:A");
        $stm->bindParam(":A", $rol);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

}