<?php

namespace controllers;

use models\Producto as Producto;

require_once("../models/Producto.php");

class BuscarProductoNombre{
    public $nombre;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
    }

    public function buscarxNombre(){

        if ($this->nombre == "") {
            $mensaje = ["msg"=>"Ingrese un producto"];
            echo json_encode($mensaje);
            return;
        }

        $model = new Producto();
        $arreglo = $model-> buscarxnombre($this->nombre);
        

        if (count($arreglo)) {
            $arr = $arreglo[0];
            $arr["msg"] = "Producto encontrado";
            echo json_encode($arr); 

        } else {
            $mensaje = ["msg"=>"Producto no existe"];
            echo json_encode($mensaje);
        }
        
    }

}
$obj = new BuscarProductoNombre();
$obj->buscarxNombre();