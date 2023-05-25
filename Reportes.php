<?php
require 'basededatos.php';

$message = '';

if (!empty($_POST['nocontrol'])) {
    $nocontrol = $_POST['nocontrol'];
    $reporte = $_POST['reporte'];

    // Obtener el reporte actual del alumno
    $sqlSelect = "SELECT reporte FROM alumnos_registrados WHERE nocontrol = :nocontrol";
    $stmtSelect = $conn->prepare($sqlSelect);
    $stmtSelect->bindParam(':nocontrol', $nocontrol);
    $stmtSelect->execute();
    $row = $stmtSelect->fetch(PDO::FETCH_ASSOC);
    

    // Verificar si se encontraron resultados
    if ($row) {
        $reporteActual = $row['reporte'];

        // Concatenar los reportes existentes con el nuevo reporte y agregar separación
        $reporteConcatenado = $reporteActual ? $reporteActual . "/" . $reporte : $reporte;

        // Actualizar el reporte en la base de datos
        $sqlUpdate = "UPDATE alumnos_registrados SET reporte = :reporte WHERE nocontrol = :nocontrol";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':nocontrol', $nocontrol);
        $stmtUpdate->bindParam(':reporte', $reporteConcatenado);

        if ($stmtUpdate->execute()) {
            $message = 'SE AGREGÓ EL REPORTE EXITOSAMENTE';
        } else {
            $message = 'VUELVA A INTENTAR';
        }
    } else {
        $message = 'No se encontró el número de control';
    }
}
?>
    <!-- // $sql = "UPDATE alumnos_registrados SET reporte = :reporte WHERE nocontrol=:nocontrol";
    // $stmt = $conn->prepare($sql);
    // $stmt->bindParam(':nocontrol',$_POST['nocontrol']);
    // $stmt->bindParam(':reporte',$_POST['reporte']);

    // if ($stmt->execute()) {
    //     $message = 'SE AGREGO EL REPORTE EXITOSAMENTE';
    // } else {
    //     $message = 'VUELVA A INTENTAR';
    // } -->
    

<!-- ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@900&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estiloreportes.css">
    <title>Reportes Ubiten</title>
</head>
<body>
    <header>
        <img src="img/logoubitenMINI.png" width="90" height="90">
        <h1>Reportes</h1>
    </header>

    <nav>
        <ul>
            <li> <a href="RegistroNuevoAlumno.php"> Volver al registro </a> </li>
            <li> <a href="IniciarSesion.php"> Revisar el estado de un alumno </a> </li>
        </ul>
    </nav>
    <h2 class="subtitulo">Ingrese el nuevo reporte:</h2>

    <?php if (!empty($message)): ?>
    <p class="aviso"> <?= $message ?> </p>
    <?php endif; ?>

    <main>
        <form action="Reportes.php" method="post">
            <input type="text" name="nocontrol" placeholder="Ingrese el No.Control..."> <p>
            <textarea id="comentarios" name="reporte" rows="5" cols="40" style="resize: none; placeholder="Escriba el reporte"></textarea>
            <input type="submit" name="registrar" placeholder="Registrar">
        </form>
    </main>

    <footer>
        <a href="https://www.facebook.com/profile.php?id=100082994479123" target="_blank"> <img src="img/icofacebook.png" alt="Nuestro Facebook" width="50" height="50"> </a>
        <p>Nuestro Facebook</p>
    </footer>
</body>
</html>