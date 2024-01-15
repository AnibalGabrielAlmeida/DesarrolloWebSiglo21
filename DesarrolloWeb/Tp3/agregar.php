<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $plataforma = $_POST['plataforma'];
    $año = $_POST['año'];
    $categoria = $_POST['categoria'];
    $idioma = $_POST['idioma'];
    $estado = $_POST['estado'];
    $precio = $_POST['precio'];

    if (!empty($nombre) && !empty($empresa) && !empty($plataforma) && !empty($año) && !empty($categoria) && !empty($idioma) && !empty($estado) && !empty($precio)) {
        $stmt = $conexion->prepare('INSERT INTO juegos (nombre, empresa, plataforma, año, categoria, idioma, estado, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$nombre, $empresa, $plataforma, $año, $categoria, $idioma, $estado, $precio]);

        header('Location: index.php');
        exit;
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Juego</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Juego</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Volver a la Lista</a>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" name="empresa" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="plataforma">Plataforma:</label>
                <input type="text" name="plataforma" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="año">Año:</label>
                <input type="number" name="año" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" name="categoria" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="idioma">Idioma:</label>
                <input type="text" name="idioma" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Juego</button>
        </form>
    </div>
</body>
</html>
