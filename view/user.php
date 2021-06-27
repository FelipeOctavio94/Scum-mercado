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
    <link href="../css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Coustard&display=swap" rel="stylesheet"> 
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
                        <li><a href="../view/producto.php">Productos<i class="material-icons left"></i></a></li>
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
                <li><a href="../view/producto.php">Productos</a></li>
                <li><a href="salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a></li>
            </ul>
            
            <div class="container" style="width:500px; padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(255, 255, 255, 0.8)">
            <?php if(!isset($_SESSION['editar'])){ ?>
                <form action="../controllers/InsertarProducto.php" method="POST">
                    <h4>Nuevo Producto</h4>
                    <br>
                
                    <div class="input-field">
                        
                        <input id="n" type="text" name="nombre">
                        <label for="n">Nombre</label>
                    </div>
                    <div class="input-field">
                       
                        <input id="d" type="text" name="prerequisito">
                        <label for="d">Pre-requisitos</label>
                    </div>
                    <div class="input-field">
                        
                        <input id="t" type="text" name="precio_venta">
                        <label for="t">Precio de Venta</label>
                    </div>
                    <div class="input-field">
                        
                        <input type="text" class="text"  name="precio_compra">
                        <label for="f">Precio de Compra</label>
                    </div>
                    <div class="input-field">
                        
                        <input id="e" type="text" name="cantidad">
                        <label for="e">Cantidad</label>
                    </div> 
                    <div class="input-field">
                        
                        <input id="c" type="text" name="codigo_ingreso">
                        <label for="c">Codigo de Spawn</label>
                    </div> 
                    <button class="waves-effect waves-light btn ancho-100 deep-orange" style="font-family: 'Coustard', serif;">Añadir</button>
                </form>

                <p class="green-text center">
                    <?php
                        if(isset($_SESSION['c_resp'])){
                            echo $_SESSION['c_resp'];
                            unset($_SESSION['c_resp']);
                        }
                    ?>
                </p>
                <p class="red-text center">
                    <?php
                        if(isset($_SESSION['c_error'])){
                            echo $_SESSION['c_error'];
                            unset($_SESSION['c_error']);
                        }
                    ?>
                </p>
            </div>
        <?php }?>
            
        <?php }else{ ?>
            <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; background: rgba(255, 255, 255, 0.8)">
                <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
                <p class="center">Debes ser vendedor para ingresar a esta página</p>
                <div style="display: flex; justify-content: space-between;">
                    <p>
                        <a href="../view/admin.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">arrow_back</i></a>
                    </p>
                    <p class="right">
                        <a href=" salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>src="../js/crearProducto.js"</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    
</body>
</html>