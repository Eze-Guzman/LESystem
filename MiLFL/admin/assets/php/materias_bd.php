<?php

    require_once "conexion/conexion.php";
    class Materias extends Conectar {
        public function agregarMateria($datos) {
            $conexion = Conectar::conexion();
            $sql = "INSERT INTO materias_biblioteca (id_usuario, nombre)
                    VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("is",$datos['id'],$datos['materia']);
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }
    }

?>