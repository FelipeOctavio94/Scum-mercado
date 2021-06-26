<?php

namespace controllers;

use models\Producto as Producto;

require_once("../models/Producto.php");

class ControlTabla
{
    public $bt_edit;
    public $bt_delete;

    public function __construct()
    {
        $this->bt_edit = $_POST['bt_edit'];
        $this->bt_delete = $_POST['bt_delete'];
    }

    public function procesar()
    {
        if (isset($this->bt_edit)) {
            // echo "editar el ID $this->bt_edit";
            session_start();
            $_SESSION['editar'] = "ON";
            $modelo = new Producto();
            $producto = $modelo->buscarProducto($this->bt_edit);
            $_SESSION['producto'] = $producto[0];

            header("Location: ../producto.php");
        } else {
            //echo "eliminar el ID $this->bt_delete";
            $modelo = new Producto();
            $modelo->eliminarProducto($this->bt_delete);
            header("Location: ../producto.php");
        }
    }
}

$obj = new ControlTabla();
$obj->procesar();
