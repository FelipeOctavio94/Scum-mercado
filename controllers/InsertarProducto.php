<?php

namespace controllers;

require("../models/Producto.php");

use models\Producto as Producto;

class InsertarProducto{
    private $nombre;
    private $prerequisito;
    private $precio_venta;
    private $precio_compra;
    private $cantidad;
    private $codigo_ingreso;
  

    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->prerequisito = $_POST['prerequisito'];
        $this->precio_venta = $_POST['precio_venta'];
        $this->precio_compra= $_POST['precio_compra'];
        $this->cantidad = $_POST['cantidad'];
        $this->codigo_ingreso = $_POST['codigo_ingreso'];
    
    }
    public function guardarProducto(){
        session_start();
        if($this->nombre == "" || $this->precio_venta == ""||  $this->cantidad == "" || $this->codigo_ingreso == ""){
            $_SESSION['c_error']="Complete los campos";
            header("Location: ../view/user.php");
            return;

        }
        $model = new Producto();
        $data = ['nombre'=>$this->nombre,
        'prerequisito'=>$this->prerequisito,
        'precio_venta'=>$this->precio_venta,
        'precio_compra'=>$this->precio_compra,
        'cantidad'=>$this->cantidad,
        'codigo_ingreso'=>$this->codigo_ingreso];

        $count = $model->insertar($data);
        if($count == 1){
            $_SESSION['c_resp'] = "Producto creado!";
        }else{
            $_SESSION['c_error'] = "Error en la base de datos :(";
        }
        header("Location: ../view/user.php");
        

    }
}
$obj = new InsertarProducto();
$obj->guardarProducto();
