<?php

namespace controllers;

class NuevoProducto
{

    public function __construct()
    {
        session_start();
        unset($_SESSION['data']);
        unset($_SESSION['error_tipo']);
        unset($_SESSION['error_nombre']);
        unset($_SESSION['error_tipo']);
        unset($_SESSION['cliente']);
        unset($_SESSION['success']);
        header('Location: ../ingresoProducto.php');
    }
}

$obj = new NuevoProducto();