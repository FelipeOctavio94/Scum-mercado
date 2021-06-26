<?php

namespace controllers;

use models\Producto as Producto;

require_once("../models/Producto.php");

class InsertarProducto{
    public $nombre;
    public $prerequisito;
    public $precio_venta;
    public $precio_compra;
    public $cantidad;
    public $codigo_ingreso;
  

    public function __construct()
    {
        $this->capturarDatos();
        

    }
    public function insertar(){
        $this->capturarDatos();
        session_start();
        $nombre = "";
        if ($this->nombre == "" || $this->prerequisito == "" || $this->precio_venta == ""|| $this->precio_compra == "" || $this->cantidad == "" || $this->codigo_ingreso == "") {
            $mensaje = ["msg"=>"complete los campos vacios"];
            echo json_encode($mensaje);
            return;

        } 
        $data = $this->data($nombre);
        print_r($data);
        $model = new Producto();
        $count = $model->insertarProducto($data);
        if ($count == 1) {
            $_SESSION['success']="Producto creado con exito";
        }
        
        header("Location: ../ingresoProducto.php");
       
    }

    public function capturarDatos(){
        $this->nombre = $_POST['nombre'];
        $this->prerequisito = $_POST['prerequisito'];
        $this->precio_venta = $_POST['precio_venta'];
        $this->precio_compra= $_POST['precio_compra'];
        $this->cantidad = $_POST['cantidad'];
        $this->codigo_ingreso = $_POST['codigo_ingreso'];
    }

    public function data($nombre){
        return [
            'nombre'=>$this->nombre,
            'prerequisito'=>$this->prerequisito,
            'precio_venta'=>$this->precio_venta,
            'precio_compra'=>$this->precio_compra,
            'cantidad'=>$this->cantidad,
            'codigo_ingreso'=>$this->codigo_ingreso
        ];

    }


}
$obj = new InsertarProducto();
$obj->insertar();
