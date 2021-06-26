<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scum Pandemia Mercado</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coustard&display=swap" rel="stylesheet"> 
    <link href="../css/style.css" rel="stylesheet">
</head>
<body style="background-image: url('../img/fondo1.jpg'); font-family: 'Coustard', serif;">
    <?php if(isset($_SESSION['user'])){ ?> 
        <?php if($_SESSION['user']['rol']=="vendedor"){ ?>
            <nav class="deep-orange accent-4">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo" style="margin-left: 20px;"><i class="material-icons" style="font-size: 40px;">assignment_ind</i> <?= $_SESSION['user']['nombre'] ?></a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 20px;">
                    <li><a href="../view/user.php">Añadir producto<i class="material-icons left">playlist_add</i></a></li>
                        <li><a href="../view/buscarProducto.php">Buscar producto<i class="material-icons left">search</i></a></li>
                        <li><a href="../view/ingresoProducto.php">Productos<i class="material-icons left"></i></a></li>
                        <li><a href="salir.php"><i class="material-icons" style="font-size: 40px;">exit_to_app</i></a></li>
                    </ul>
                </div>
            </nav>

            <ul id="slide-out" class="sidenav">
                <li>
                    <div class="user-view">
                        <div class="background">
                          
                        </div>
                        <div style="display: flex;">
                            <a href="#user" class="white-text"><i class="material-icons white-text"  style="font-size: 40px;">assignment_ind</i></a>
                            <a href="#user" class="white-text" style="margin-left: 10px;"><?= $_SESSION['user']['nombre'] ?></a>
                        </div>
                    </div>
                </li>
                <li><a href="../view/user.php">Añadir producto</a></li>
                <li><a href="../view/buscarProducto.php">Buscar producto</a></li>
                <li><a href="#">productos</a></li>
                <li><a href="salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a></li>
            </ul>

            <div class="container" style="padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(255, 255, 255, 0.8)">
                <h5>Buscar producto</h5>
                <br>
                <div class="row" id="app">
                    <form @submit.prevent="buscarNombre">
                        <div class="col l3 m3 s12">
                            <div class="input-field">
                                <i class="material-icons prefix">lock_outline</i>
                                <input id="p" type="text" v-model="nombre">
                                <label for="p">Nombre del producto</label>
                            </div> 
                        </div>

                        <div class="col l3 m3 s12">
                            <br>
                            <button class="btn-small deep-orange">Buscar</button>
                        </div>
                    </form>

                
                    <div class="col l12 m12 s12">
                        <hr style="height:3px; border:none; background: #dd2c00; margin-bottom:20px;">

                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Pre-requisitos</th>
                                <th>Precio venta</th>
                                <th>Precio compra</th>
                                <th>Cantidad</th>
                                <th>Codigo del producto</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr v-for="p in productos">
                                <td>{{p.nombre}}</td>
                                <td>{{p.prerequisito}}</td>
                                <td>{{p.precio_venta}}</td>
                                <td>{{p.precio_compra}}</td>
                                <td>{{p.cantidad}}</td>
                                <td>{{codigo_ingreso}}</td>
                                <td>
                                    
                                </td>
                                <td>
                                   
                                </td>
                            </tr>

                        </table>

                        <!-- modal -->
                    


                    </div>
                    
                </div>

            </div>
        <?php }else{ ?>
            <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; background: rgba(255, 255, 255, 0.8)">
                <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
                <p class="center">Debes ser vendedor para ingresar a esta página</p>
                <div style="display: flex; justify-content: space-between;">
                    <p>
                        <a href="../view/admin.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">arrow_back</i></a>
                    </p>
                    <p class="right">
                        <a href="salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a>
                    </p>
                </div>
            </div>
        <?php } ?>

    <?php }else{ ?>
        <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; background: rgba(255, 255, 255, 0.8)">
            <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
            <p class="center">Debes iniciar sesión</p>
            <p class="center">
                <a href="../index.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">home</i></a>
            </p>
        </div>
    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
 
    <script src="../js/buscarProducto.js"></script>
</body>
</html>