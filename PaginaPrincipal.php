<?php
    session_start();

    require 'basededatos.php';

    if(isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, nocontrol, nombre, tutor, telefono, correo, contrasena, sexo, carrera, grado, grupo, estado, reporte, chequeo FROM alumnos_registrados WHERE id=:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if (count($results) > 0) {
            $user = $results;
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilospaginaprincipal.css">
    <title>Pagina principal</title>
</head>
<body>
<header>
        <img src="img/logoubitenMINI.png" width="90" height="90">
        <h1>Inicio de sesion Ubiten</h1>
    </header>

    <nav>
    <p>SIN PERDIDA DEL EXITO EDUCATIVO DE SUS HIJOS</p>
    </nav>

    <aside>
    <a href=""> <img src="img/perfil.png" width="50" class="opciones"> Perfil </a>
    <a href="https://www.facebook.com/CecyteNayarit"> <img src="img/contacto.png" width="50" class="opciones"> Contacto </a>
    <a href="mailto:luis141cardona@gmail.com"> <img src="img/opiniones.png" width="50" class="opciones"> Sugerencias </a>
    </aside>

    <h2>Estado: <?= $user['estado'] ?> </h2>
    <?php if ($user['estado'] == 'Activo') { ?>
        <!-- <h2>Su hijo <?= $user['nombre'] ?> está en nuestras instalaciones</h2> -->
        <h2>Su hijo/a <?= htmlspecialchars($user['nombre'], ENT_QUOTES) ?> está en nuestras instalaciones </h2>
        <h2>Carrera: <?= htmlspecialchars($user['carrera'], ENT_QUOTES) ?> </h2>
    <?php } else { ?>
        <h2>El alumno no está en nuestras instalaciones</h2>
    <?php } ?>



    <main>
        <h2>HORA DE LLEGADA:</h2>
        <h3 align="center" class="prueba"><?= htmlspecialchars($user['chequeo'], ENT_QUOTES) ?> </h3> <br> <hr>
        <h3>Reportes: <?= nl2br(htmlspecialchars($user['reporte'], ENT_QUOTES)) ?> </h3> 
    </main>

        <footer class="informacion">
            <p class="link"> <a href="eventos.html" > Eventos </a> </p>
    </div>
</body>
</html>