<?php
    use models\Usuario as Usuario;
    session_start();
    require_once("../models/Usuario.php");
    $model = new Usuario();
    $rol="vendedor";
    $usuarios = $model->getVendedores($rol);
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
        <?php if($_SESSION['user']['rol']=="administrador"){ ?>

            <nav class="deep-orange accent-4">
                <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="margin-left: 20px;"><i class="material-icons" style="font-size: 40px;">admin_panel_settings</i>Admin</a>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right: 20px; font-family:'Raleway', sans-serif;">
                    <li><a href="salir.php"><i class="material-icons" style="font-size: 40px;">exit_to_app</i></a></li>
                </ul>
                </div>
            </nav>

            <ul id="slide-out" class="sidenav"style="padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(221, 221, 221, 0.8)">
                <li>
                    <div class="user-view">
                        <div class="background">
                            
                        </div>
                        <div style="display: flex;">
                            <a href="#user" class="black-text"><i class="material-icons black-text"  style="font-size: 40px;">admin_panel_settings</i></a>
                            <a href="#user" class="black-text" style="margin-left: 10px;">Administrador</a>
                         
                        </div>
                    </div>
                </li>
                <li><a href="salir.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">exit_to_app</i></a></li>
            </ul>

            <div class="container" style="padding:20px; margin-top:20px; border-radius:10px; align-content:center; background: rgba(255, 255, 255, 0.8)">
                <div class="row">
                    <div class="col l4 m4 s12">
                        <?php if(!isset($_SESSION['editar'])){ ?>
                            <h4>A??adir usuario</h4>
                            <br>
                            <form action="../controllers/NewUser.php" method="POST">
                                <div class="input-field">
                                    <i class="material-icons prefix">lock_outline</i>
                                    <input id="u" type="text" name="rut">
                                    <label for="u">Usuario</label>
                                </div> 
                                <div class="input-field">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="d" type="text" name="name">
                                    <label for="d">Nombre</label>
                                </div> 
                                <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="icon" type="password" class="validate" name="pass">
                                    <label for="icon">Contrase??a</label>
                                </div>
                                <button class="waves-effect waves-light btn ancho-100 deep-orange" style="font-family: 'Coustard', serif;">Crear usuario</button>
                            </form>

                            <p class="green-text center">
                                <?php 
                                    if(isset($_SESSION['resp'])){
                                        echo $_SESSION['resp'];
                                        unset($_SESSION['resp']);
                                    }
                                ?>
                            </p>
                            <p class="red-text center">
                                <?php 
                                    if(isset($_SESSION['error'])){
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                ?>
                            </p>

                        <?php }?>
                            
                        
                
                    </div>
                
                    <div class="col l8 m8 s12">
                        <form action="../controllers/TablaUsers.php" method="POST">
                            <table>
                                <tr>
                                    <td>Usuario</td>
                                    <td>Nombre</td>
                                   
                                </tr> 
                                <?php foreach($usuarios as $item){ ?>
                                    
                                        <tr class="black-text">                                   
                                            <td><?=$item['rut']; ?></td>
                                            <td><?=$item['nombre']; ?></td>
                                           
                                        </tr>
                                    
                                <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        <?php }else { ?>
            <div class="card-panel" style="width:400px; margin:0 auto; margin-top:20px; border-radius:10px; background: rgba(255, 255, 255, 0.8)">
            <h4 class="center" style="color:#ef5350;">Error de acceso</h4>
            <p class="center">Debes ser administrador para ingresar</p>
            <div style="display: flex; justify-content: space-between;">
                <p>
                    <a href="../view/user.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">arrow_back</i></a>
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
            <p class="center">Debes iniciar sesi??n</p>
            <p class="center">
                <a href="../index.php"><i class="material-icons deep-orange-text" style="font-size: 40px;">home</i></a>
            </p>
        </div>

    <?php } ?>    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
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