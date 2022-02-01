<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style-agregar-u.css">
    <title>Agregar Usuarios - MiLFL</title>
</head>
<body>
    
    <div class="form-container">
        <h2>Agregar usuario - ESTUDIANTE</h2>

        <form action="../assets/php/registros/registro_alumno_bd.php" method="POST">
            <label for="">Nombre</label>
            <input type="text" placeholder="Nombre Completo" name="nombre">
            <label for="">DNI</label>
            <input type="text" placeholder="DNI" name="dni">
            <label for="">Correo Electrónico</label>
            <input type="email" name="correo" id="" placeholder="Correo Electrónico">
            <label for="">Contraseña</label>
            <input type="pass" name="pass" id="" placeholder="Contraseña">
            <label for="">Curso</label>
            <select name="curso_id" id="">
                <option value="0">---</option>
                <option value="1">1° Año</option>
                <option value="2">2° Año</option>
                <option value="3">3° Año</option>
                <option value="4">4° Año</option>
                <option value="5">5° Año</option>
                <option value="6">6° Año</option>
            </select>
            <input type="hidden" name="rol_id" value="3">
            <button>Agregar</button>
        </form>

    </div>

</body>
</html>