<?php

namespace controllers;

require_once("../models/Usuario.php");
use models\Usuario as Usuario;

class Login{
    private $rut;
    private $clave;

    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['pass'];
    }

    public function login(){
        session_start();
        if($this->rut=="" || $this->clave==""){
            $_SESSION['error']="Complete los campos";
            header("Location: ../index.php");
            return;
        }

        $modelo = new Usuario();
        $array = $modelo->iniciarSesion($this->rut, $this->clave);
        //print_r($array);
        
        if(count($array)==0){
            $_SESSION['error'] = "Usuario o contraseña invalida";
            header("Location: ../index.php");
            return;
        }

        $_SESSION['user'] = $array[0];

        $a = $array[0];
        
            switch ($a["rol"]) {
                case "administrador":
                    $_SESSION['user'] = $a;
                    header("Location: ../view/admin.php");
                    break;
                case "vendedor":
                    $_SESSION['user'] = $a;
                    header("Location: ../view/buscarProducto.php");
                    break;
                default:
                    $_SESSION ['error'] = "Usuario no encontrado.";
                    header("Location: ../index.php");
                    break;
            } 
        
    }

}
$obj = new Login();
$obj->login();