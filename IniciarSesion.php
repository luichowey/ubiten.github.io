<?php

session_start();

require 'basededatos.php';

if (!empty($_POST['nocontrol']) && !empty($_POST['contrasena'])) {
    $records = $conn->prepare('SELECT id, nocontrol, contrasena FROM alumnos_registrados WHERE nocontrol=:nocontrol');
    $records->bindParam(':nocontrol', $_POST['nocontrol']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (isset($results) && is_array($results) && count($results) > 0 && ($_POST['contrasena'] == $results['contrasena'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: PaginaPrincipal.php');
    } else {
        $message = 'Las credenciales no coinciden';
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
    <link rel="stylesheet" href="estilosesion.css">
    <title>Inicio de sesion</title>
</head>
<body>
    <header>
        <img src="img/logoubitenMINI.png" width="90" height="90">
        <h1>Inicio de sesion Ubiten</h1>
    </header>

    <h2 class="subtitulo">Ingrese sus datos:</h2>  
    <?php if (!empty($message)) : ?>
        <p class="aviso"> <?= $message ?> </p>
    <?php endif; ?>

    <main>
        <form method="post">
            <input type="text" name="nocontrol" placeholder="Ingrese su No.Control..."> <p>
            <input type="password" name="contrasena" placeholder="Ingrese su contrase&ntilde;a..."> <p>
            <input type="submit" name="iniciar" placeholder="Entrar">
        </form>
        <?php
        ?>
    </main>

    <footer>
        <a href="https://www.facebook.com/profile.php?id=100082994479123" target="_blank"> <img src="img/icofacebook.png" alt="Nuestro Facebook" width="50" height="50"> </a>
        <p>Nuestro Facebook</p>
    </footer>
</body>
</html>