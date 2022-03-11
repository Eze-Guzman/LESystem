<?php

    include "../../assets/php/conexion_bd.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style-usuarios.css">
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <title>Cuaderno de Comunicados</title>
</head>
<body>

<!-- Contenedor de Sección "Cuaderno de Comunicados" -->

    <section id="container">

        <h1>Lista de Usuarios</h1>
        <a href="nuevo_mensaje.php" class="btn_new">Nuevo Mensaje</a>

            <!-- Tabla contendora de los mensajes -->

            <table>
            <tr>
                <th>Leído</th>
                <th>De</th>
                <th>Título</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>

            <?php

            //Consulta de Mensajes

                $query = mysqli_query($conexion, "SELECT * FROM mensajes");

                //Condicional muestra-datos de la tabla MENSAJES

                    while ($data = mysqli_fetch_array($query)) {

                        $usuario = mysqli_query("SELECT * FROM administradores WHERE id = '".$data['de']."'");
                        $user = mysql_fetch_array($usuario);

                        if ($data['leido'] == 1) { $leido = "<img src='images/unread.png'>"; 
                        } else {
                            $leido = "<img src='images/read.png'>";
                        }

                        ?>
                            <tr>
                                <td><?php echo $leido; ?></td>
                                <td><?php echo $user['usuario']; ?></td>
                                <td><a href="mensaje.php?id=<?php echo $data['id']; ?>"> <?php echo $data['titulo']; ?></a></td>
                                <td><?php echo $data['fecha']; ?></td>
                                <td><a href="borrar.php?id=<?php echo $data['id']; ?>"><img src="images/delete.png" width="20"></a></td>

                            </tr>

                        <?php
                    }
            ?>

            </table>

    </section>

<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></body>
</html>