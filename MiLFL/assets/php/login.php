<?php

    include 'conexion_bd.php';

    $dni = $_POST['dni'];
    $pass = $_POST['pass'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE dni='$dni'
    and pass='$pass'");

    if(mysqli_num_rows($validar_login) > 0){
        header("location: ../../inicio.php");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existe, verifique los datos ingresados");
                window.location = "../../index.php";
            </script>
        ';
        exit;
    }

?>