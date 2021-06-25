<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">



</head>

<body background="img/fondo.jpg">




<div class="container ">
        <div class="row" >
            <div class="col l4 m4 s12">
                
            </div>
            <div class="col l4 m4 s12">
            <div class="card-content">
                        <div class="center card-image">
                            <img src="img/lentes.png">
                        </div>
                                         
            </div>






            <div class="#e0e0e0 grey lighten-2">
                <br>
            <h4 class="center #455a64 blue-grey-text accent-4">Acceda a su cuenta</h4> 
                        <br> 

                    <form action="controllers/ControlLogin.php" method="POST">


                        <div class="card-content">

                          

                            <div class="card-errors">

                                <?php
                                session_start();
                                if (isset($_SESSION['error'])) { ?>

                                    <h6 class="center red-text text-darken"> <?php echo $_SESSION['error'];  ?></h6>

                                <?php unset($_SESSION['error']);
                                }

                                ?>


                            </div>



                            <div class="input-field">

                                <input type="text" name="rutUsuario" id="nombre">
                                <label for="nombre">Ingrese su R.U.T</label>

                            </div>

                            <div class="input-field">

                                <input type="password" name="claveUsuario" id="clave">
                                <label for="clave">Ingrese su contraseña</label>


                            </div>

                            <div class="input-field center-align back-field-desactived">

                                <button class="btn black ancho-100">Iniciar Sesión</button>

                            </div>




                        </div>






                    </form>
                    <p class="center">
                    <a href="info.php">Informacion de los creadores!!</a>
                    </p>
                    <br>
                </div>

                </div>

            </div>


        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>




</body>

</html>