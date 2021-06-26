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
        if ($this->nombre == "") {
            $_SESSION['error_buscar'] = "Complete el nombre";
            header("Location: ../buscarProducto.php");
            return;
        } 
        $modelo = new Producto();
        $arr = $modelo->buscarProducto($this->nombre);
        if (count($arr) == 0) {
            $_SESSION['error_buscar'] = "Nombre no existe";
        } else {
            $_SESSION['producto_buscar'] = $arr[0]; //['id'=>?, 'nombre'=>?]
        }

        header("Location: ../buscarProducto.php");
    }

}
$obj = new BuscarProductoNombre();
$obj->buscarProducto();