<?php

    //Función creada para cerrar sesiones.

    session_start();
    session_destroy();
    header("location: ../../index.php");

?>