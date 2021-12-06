<?php

    session_start();

    if(isset($_SESSION['users'])) {
        header("location: inicio.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b4fe7d1adf.js" crossorigin="anonymous"></script>
    <script src="assets/js/visor-pass.js"></script>
    <title>MiLFL</title>
</head>
<body>
    
    <div class="form-info">

        <div class="info">
            
            <img src="assets/img/logo.png" alt="">
            <h1 class="h">Mi LFL</h1>
            <h3 class="h">Instituto Luis Federico Leloir</h3>
            <h5 class="h">Nuestro Campus</h5>

        </div>

        <div class="form">

            <h4>Bienvenido a MiLFL</h4>

            <form action="assets/php/login.php" method="POST" onclick="hideOrShowpassword()">

                <input type="text" name="dni" id="dni" placeholder="Ingrese su DNI">
                <input type="password" name="pass" id="pass"
                placeholder="Ingrese su Contraseña">

                <div class="check-form">
                    <input type="checkbox" name="recordarme" id="recordarme"> Recordarme
                </div>

                <div class="ver-pass">
                    <input type="checkbox" name="ver_pass" id="ver_pass"> Mostrar Contraseña
                </div>

                <button type="submit">Iniciar Sesión</button>

            </form>

            <a id="open" href="#">¿Olvidaste tus datos?</a>

        </div>

    </div>

        <div class="modal-container" id="modal_container">
            <div class="modal">
                <h1>Recuperación de Cuenta</h1>
                <h5>Ingresa el dato que recuerdes</h5>
                <form action="">
                    <select name="" id="">
                        <option value="dni">DNI</option>
                        <option value="usuario">Correo Electrónico</option>
                    </select>
                    <i class="icon fas fa-arrow-right"></i>
                    <input type="text" name="" id="">
                    <button type="submit" id="close">Enviar</button>
                </form>
            </div>
        </div>

    <script src="assets/js/close.js"></script>

</body>
</html>