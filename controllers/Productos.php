<?php

use models\Producto as Producto;

require_once("../models/Producto.php");

class Productos
{

    public function getProductos()
    {
        $model = new Producto();
        echo json_encode($model->getproducto());
    }
}

$obj = new Productos();
$obj->getProductos();
