<?php

    function obtenerArchivo($id_archivo) {

        include "../../../assets/php/conexion_bd.php";

        $query_archivo = mysqli_query($conexion, "SELECT tipo, ruta FROM archivos WHERE id_archivo = '$id_archivo'");
        $archivo_data = mysqli_fetch_array($query_archivo);
        $extension = $archivo_data['tipo'];
        $ruta = $archivo_data['ruta'];

        $ruta = "../" . $ruta;

        switch($extension){
            case 'png':
                return '<img src="'.$ruta.'" class="modal__content modal__content--img">';
                break;
            case 'jpg':
                return '<img src="'.$ruta.'" class="modal__content modal__content--img">';
                break;
            case 'jpeg':
                return '<img src="'.$ruta.'" class="modal__content modal__content--img">';
                break;
            case 'svg':
                return '<img src="'.$ruta.'" class="modal__content modal__content--img">';
                break;    
            case 'pdf':
                return '<embed src="'.$ruta.'" type="application/pdf" class="modal__content modal__content--pdf"></embed>';
                break;
            case 'mp3':
                return '<audio src="'.$ruta.'" controls class="modal__content modal__content--audio"></audio>';
                break;
            case 'wav':
                return '<audio src="'.$ruta.'" controls class="modal__content modal__content--audio"></audio>';
                break;
            case 'mp4':
                return '<video src="'.$ruta.'" controls class="modal__content modal__content--video"></video>';
                break;
        }

    }

?>