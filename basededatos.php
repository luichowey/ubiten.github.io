<?php
// $server = "bznyc9qsummzu5d0akxj-mysql.services.clever-cloud.com";
// $username = "uv3zq2mhctbjrw1r";
// $password = "4517zBoVi4";
// $basedatos = "bznyc9qsummzu5d0akxj";

$server = "bznyc9qsummzu5d0akxj-mysql.services.clever-cloud.com";
$username = "uv3zq2mhctbjrw1r";
$password = "DJIBxcPalUuqEsNMKP5r";
$basedatos = "bznyc9qsummzu5d0akxj";
$port = 3306;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Opcional: Configura el manejo de errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Opcional: Configura el modo de obtención de resultados
];
try {
    $conn = new PDO("mysql:host=$server;dbname=$basedatos;port=$port", $username, $password, $options);
} catch (PDOException $e) {
    die('conexion fallida: '.$e->getMessage());
}
?>