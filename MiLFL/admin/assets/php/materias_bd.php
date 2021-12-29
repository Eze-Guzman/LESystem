<?php

    require_once "../../../assets/php/conexion_bd";
    class Categorias extends conexion {
        public function agregarCategoria($datos) {
            $conexion = conexion::conexion();
            $sql = "INSERT INTO categorias (id_usuario, nombre)
                    VALUES (?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("is",$datos[id],$datos['materia']);
            $respuesta = $query->execute();
            $query->close();

            return $resupuesta;
        }
    }

?>