<?php

namespace controllers;

require("../models/Usuario.php");

use models\Usuario as Usuario;

class NewUser{
    private $nombre;
    private $rut;
    private $clave;

    public function __construct()
    {
        $this->nombre = $_POST['name'];
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['pass'];
    }

    public function añadir(){
        session_start();
        if($this->nombre=="" || $this->rut==""|| $this->clave==""){
            $_SESSION['error']="Complete los campos";
            header("Location: ../view/admin.php");
            return;
        }

        $model = new Usuario();
        $data = ['rut'=>$this->rut, 'nombre'=>$this->nombre, 'rol'=>"vendedor", 'clave'=>$this->clave];
        $count = $model->crearUsuario($data);

        if($count==1){
            $_SESSION['resp'] = "Usuario creado!";
        }else{
            $_SESSION['error'] = "Error en la base de datos :(";
        }
        header("Location: ../view/admin.php");
    }

}
$obj= new NewUser();
$obj->añadir();