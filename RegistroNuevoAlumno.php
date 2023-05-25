<?php
require 'basededatos.php';

$message = '';

if (!empty($_POST['nocontrol'])) {
    $sql = "INSERT INTO alumnos_registrados (nocontrol, nombre, tutor, telefono, correo, contrasena, sexo, carrera, grado, grupo) VALUES (:nocontrol, :nombre, :tutor, :telefono, :correo, :contrasena, :sexo, :carrera, :grado, :grupo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nocontrol',$_POST['nocontrol']);
    $stmt->bindParam(':nombre',$_POST['nombre']);
    $stmt->bindParam(':tutor',$_POST['tutor']);
    $stmt->bindParam(':telefono',$_POST['telefono']);
    $stmt->bindParam(':correo',$_POST['correo']);
    $stmt->bindParam(':contrasena',$_POST['contrasena']);
    $stmt->bindParam(':sexo',$_POST['sexo']);
    $stmt->bindParam(':carrera',$_POST['carrera']);
    $stmt->bindParam(':grado',$_POST['grado']);
    $stmt->bindParam(':grupo',$_POST['grupo']);

    if ($stmt->execute()) {
        $message = 'ALUMNO REGISTRADO CON EXITO';
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
    <link rel="stylesheet" href="estiloregistro.css">
    <title>Nuevo alumno</title>
</head>
<body>
    <header>
        <img src="img/logoubitenMINI.png" width="90" height="90">
        <h1>Registro Nuevo Alumno</h1>
    </header>

    <nav>
        <ul>
            <li> <a href="Reportes.php"> Agregar un reporte a un alumno </a> </li>
            <li> <a href="IniciarSesion.php"> Revisar el estado de un alumno </a> </li>
        </ul>
    </nav>
    <h2 class="subtitulo">Ingrese los nuevos datos:</h2>

    <?php if (!empty($message)): ?>
    <p class="aviso"> <?= $message ?> </p>
    <?php endif; ?>

    <main>
        <form action="RegistroNuevoAlumno.php" method="post">
                <div class="radios">
                <p class="identificador">Sexo:</p>
                <input type="radio" name="sexo" value="masculino" class="generos">
                <label for="masculino">Masculino</label> <p>
                <input type="radio" name="sexo" value="Femenino" class="generos">
                <label for="femenino">Femenino</label> <p>
                </div>
                <div class="radios">
                <p class="identificador">Carrera:
                <input type="radio" name="carrera" value="alimentos" class="generos">
                <label for="alimentos">Alimentos</label> <p>
                <input type="radio" name="carrera" value="programacion" class="generos">
                <label for="programacion">Programacion</label> <p>
                </div>
                <div class="radios">
                <p class="identificador">Grado:
                <input type="radio" name="grado" value="1" class="generos">
                <label for="1">1ro</label> <p>
                <input type="radio" name="grado" value="2" class="generos">
                <label for="2">2do</label> <p>
                <input type="radio" name="grado" value="3" class="generos">
                <label for="3">3Ro</label> <p>
                </div>
                <div class="radios">
                <p class="identificador">Grupo:
                <input type="radio" name="grupo" value="a" class="generos">
                <label for="a">A</label> <p>
                <input type="radio" name="grupo" value="b" class="generos">
                <label for="b">B</label> <p>
                <input type="radio" name="grupo" value="c" class="generos">
                <label for="c">C</label> <p>
                </div>

            <input type="text" name="nocontrol" placeholder="Ingrese el No.Control..."> <p>
            <input type="text" name="nombre" placeholder="Ingrese el nombre..."> <p>
            <input type="text" name="tutor" placeholder="Ingrese el tutor..."> <p>
            <input type="text" name="telefono" placeholder="Ingrese el telefono..."> <p>
            <input type="text" name="correo" placeholder="Ingrese el correo..."> <p>
            <input type="password" name="contrasena" placeholder="Ingrese la contrase&ntilde;a..."> <p>
            <input type="submit" name="registrar" placeholder="Registrar">
        </form>
    </main>

    <footer>
        <a href="https://www.facebook.com/profile.php?id=100082994479123" target="_blank"> <img src="img/icofacebookw.png" alt="Nuestro Facebook" width="50" height="50"> </a>
        <p>Nuestro Facebook</p>
    </footer>
</body>
</html>