<?php
require 'basededatos.php';

$message = '';

if (!empty($_POST['nocontrol'])) {
    date_default_timezone_set('America/Mexico_City');
    $hora = date('H:i:s');
    $sql = "UPDATE alumnos_registrados SET estado = :estado, chequeo = :hora WHERE nocontrol=:nocontrol";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nocontrol',$_POST['nocontrol']);
    $stmt->bindParam(':estado',$_POST['estado']);
    $stmt->bindParam(':hora', $hora);


    if ($stmt->execute()) {
        $message = 'TE HAS REGISTRADO CON EXITO';
    } else {
        $message = 'VUELVA A INTENTAR';
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
    <link rel="stylesheet" href="estilochequeo.css">
    <title>Bienvenido a tu CECyTE</title>
</head>
<body>
    <header>
        <img src="img/logoubitenMINI.png" width="90" height="90">
        <h1>Bienvenido a CECyTE</h1>
    </header>

    <h2 class="subtitulo">Ingresa tu numero de control:</h2>

    <?php if (!empty($message)): ?>
    <h3 class="aviso"> &#161; <?= $message ?> &#33; </h3>
    <?php endif; ?>

    <main>
        <form action="ChequeoAlumno.php" method="post">
            <input type="text" name="nocontrol" placeholder="No. control"> <p>
            <div class="radios">
                <p class="identificador">Estado:</p>
                <input type="radio" name="estado" value="Activo" class="generos">
                <label for="activo">Activo</label> <p>
                <input type="radio" name="estado" value="Inactivo" class="generos">
                <label for="inactivo">Inactivo</label> <p>
                <input type="hidden" id="hora" name="chequeo">
                </div>
            <input type="submit" name="registrar" placeholder="Registrarse" id="boton">
            <!-- <input type="hidden" id="hora" name="chequeo"> -->
        </form>

    </main>

    <footer>
        <a href="https://www.facebook.com/profile.php?id=100082994479123" target="_blank"> <img src="img/icofacebook.png" alt="Nuestro Facebook" width="50" height="50"> </a>
        <p>Nuestro Facebook</p>
    </footer>
</body>
</html>