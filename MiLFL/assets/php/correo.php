<?php

    include 'conexion_bd.php';

    $dni = $_POST['dni-recuperacion'];
    $codigo = rand(100000, 999999);

    // Obtiene todos los codigos que se hallan en la tabla de codigos_recuperacion.
    $query_codigos = mysqli_query($conexion, "SELECT * FROM codigos_recuperacion");

    while ($codigos = mysqli_fetch_array($query_codigos)) {

        $codigo_id = $codigos['id'];

        // Si el codigo generado es igual a uno que quedo en la tabla sin eliminar, elimina el viejo e inserta el nuevo.
        if ($codigo == $codigos['codigo'])
            mysqli_query($conexion, "DELETE FROM codigos_recuperacion WHERE id = '$codigo_id'");
    }

    // Inserta el codigo temporal en la tabla de codigos_recuperacion.
    mysqli_query($conexion, "INSERT INTO codigos_recuperacion (codigo, dni_usuario) VALUES ('$codigo', '$dni')");

    // Obtiene el e-mail asociado a la cuenta que tiene el dni que se escribio.

    $datos;

    // Hay que ver si se puede optimizar esto.

    $query_datos = mysqli_query($conexion, "SELECT * FROM administradores WHERE dni='$dni'");
    if (mysqli_num_rows($query_datos) > 0)
        $datos = mysqli_fetch_array($query_datos);
    
    $query_datos = mysqli_query($conexion, "SELECT * FROM profesores WHERE dni='$dni'");
    if (mysqli_num_rows($query_datos) > 0)
        $datos = mysqli_fetch_array($query_datos);

    $query_datos = mysqli_query($conexion, "SELECT * FROM alumnos WHERE dni='$dni'");
    if (mysqli_num_rows($query_datos) > 0)
        $datos = mysqli_fetch_array($query_datos);
    
    $query_datos = mysqli_query($conexion, "SELECT * FROM directivos WHERE dni='$dni'");
    if (mysqli_num_rows($query_datos) > 0)
        $datos = mysqli_fetch_array($query_datos);

    $query_datos = mysqli_query($conexion, "SELECT * FROM preceptores WHERE dni='$dni'");
    if (mysqli_num_rows($query_datos) > 0)
        $datos = mysqli_fetch_array($query_datos);

    
    $nombre = $datos['nombre_completo'];
    $destinatario = $datos['correo'];

    //Armado de la cabecera del mail.
    $header = "From: noreply@example.com" . "\r\n";
    $header .= "Reply-To: noreply@example.com" . "\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();

    $asunto = "MiLFL - Recuperá tu cuenta.";

    //Armado del mensaje en texto plano del mail.
    $mensajeCompleto = "Hola " . $nombre . ", entendemos que perdiste el acceso a tu cuenta de MiLFL, por lo que te enviamos un código de recuperación para que introduzcas en la página de inicio de sesión y así poder recuperar tu contraseña. Atentamente, el equipo de MiLFL.\r\n\r\n";
    $mensajeCompleto .= "Código de recuperación: " . $codigo;

    //Se envía el mail y enviamos al usuario a otra pagina.

    $mail = mail($destinatario, $asunto, $mensajeCompleto, $header);

    if($mail)
        echo 'Se ha enviado un e-mail a ' . $destinatario . ' con éxito. Ahora solo tenes que <a href="recuperar-cuenta.php">Introducir el código de recuperación</a>';
    else
        echo 'Ocurrió un error en el envío del e-mail. Intenta nuevamente, si esto persiste, comunicate con el equipo de MiLFL vía e-mail en <a href="mailto:soporte@milfl.com">soporte@milfl.com</a>.';
    

?>