<?php

    class Conectar {
        public function conexion() {
            $servidor = "localhost";
            $usuario = "";
            $password = "";
            $base = "milfl";

            $conexion = mysqli_connect($servidor, $usuario, $password, $base);

            return $conexion;
        }
    }

?>