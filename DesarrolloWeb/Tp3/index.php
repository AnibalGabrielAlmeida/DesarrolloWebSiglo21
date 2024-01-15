<?php

include 'conexion.php';


function obtenerJuegos() {
    global $conexion;
    $consulta = $conexion->prepare("SELECT * FROM juegos");
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}


$juegos = obtenerJuegos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Juegos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">RetroGame</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agregar.php">Agregar Juego</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="borrar.php">Borrar Juego</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="seleccionar_modificar.php">Modificar Juego</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Lista de Juegos</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Plataforma</th>
                <th>Año</th>
                <th>Categoría</th>
                <th>Idioma</th>
                <th>Estado</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($juegos as $juego): ?>
                <tr>
                    <td><?= $juego['id']; ?></td>
                    <td><?= $juego['nombre']; ?></td>
                    <td><?= $juego['empresa']; ?></td>
                    <td><?= $juego['plataforma']; ?></td>
                    <td><?= $juego['año']; ?></td>
                    <td><?= $juego['categoria']; ?></td>
                    <td><?= $juego['idioma']; ?></td>
                    <td><?= $juego['estado']; ?></td>
                    <td><?= $juego['precio']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>

