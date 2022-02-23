<?php

    require_once "Conexion.php";

    class Gestor extends Conectar {
        public function obtenerRutaArchivo($idArchivo) {
            $conexion = Conectar::conexion();

            $sql = "SELECT nombre, tipo
                    FROM archivos 
                    WHERE id_archivo = '$idArchivo'";
            $result =  mysqli_query($conexion,$sql);
            $datos = mysqli_fetch_array($result);
            $nombreArchivo = $datos['nombre'];
            $extension = $datos['tipo'];
            return self::tipoArchivo($nombreArchivo,$extension);

        }

        public function tipoArchivo($nombre, $extension){

            $ruta = "../../archivos/".$nombre;
            
            switch($extension){
                case 'png':
                    return '<img src="'.$ruta.'" width="80%">';
                    break;
                case 'jpg':
                    return '<img src="'.$ruta.'" width="80%">';
                    break;
                case 'pdf':
                    return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf"
                    width="100%" height="600px" />';
                    break;
                case 'mp3':
                    return '<audio controls src="'.$ruta.'"></audio>';
                    break;
                case 'mp4':
                    return '<video src="'.$ruta.'" controls width="100%" height="600px"></video>';
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

?>