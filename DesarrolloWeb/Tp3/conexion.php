<?php

$dsn = "mysql:host=localhost;dbname=retrogame;charset=utf8";
$usuario = "root";
$contrasena = "J!mh4ll3127";

try {
    
    $conexion = new PDO($dsn, $usuario, $contrasena);

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    echo "Error de conexión: " . $e->getMessage();
    die(); 
}
?>
