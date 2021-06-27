<?php

use models\Producto as Producto;

require_once("../models/Producto.php");

class BuscarProductoNombre{
    public $nombre;

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
    }

    public function buscarProducto(){
        session_start();
        if(isset($_SESSION['user'])){
            
            $modelo= new Producto();
            $array= $modelo->buscarProducto($this->nombre);

            echo json_encode($array);


        }else{

            echo json_encode(["msg"=>"No tienes permisos para estar aqui"]);
        }
    }

}
$obj = new BuscarProductoNombre();
$obj->buscarProducto();