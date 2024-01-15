<?php
require_once 'conexion.php';

$mensaje = '';
$nombre_juego = '';
$empresa = '';
$plataforma = '';
$año = '';
$categoria = '';
$idioma = '';
$estado = '';
$precio = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id_juego = $_GET['id'];

    $stmt = $conexion->prepare('SELECT * FROM juegos WHERE id = ?');
    $stmt->execute([$id_juego]);
    $juego = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($juego) {
        $nombre_juego = $juego['nombre'];
        $empresa = $juego['empresa'];
        $plataforma = $juego['plataforma'];
        $año = $juego['año'];
        $categoria = $juego['categoria'];
        $idioma = $juego['idioma'];
        $estado = $juego['estado'];
        $precio = $juego['precio'];
    } else {
        $mensaje = 'Juego no encontrado.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_juego = $_POST['id'];
    $nombre_juego = $_POST['nombre'];
    $empresa = $_POST['empresa'];
    $plataforma = $_POST['plataforma'];
    $año = $_POST['año'];
    $categoria = $_POST['categoria'];
    $idioma = $_POST['idioma'];
    $estado = $_POST['estado'];
    $precio = $_POST['precio'];

    $stmt = $conexion->prepare('UPDATE juegos SET nombre=?, empresa=?, plataforma=?, año=?, categoria=?, idioma=?, estado=?, precio=? WHERE id=?');
    $stmt->execute([$nombre_juego, $empresa, $plataforma, $año, $categoria, $idioma, $estado, $precio, $id_juego]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Juego</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Modificar Juego</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Volver a la Lista</a>

        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-danger"><?= $mensaje; ?></div>
        <?php else: ?>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $id_juego; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $nombre_juego; ?>" required>
                </div>
                <div class="form-group">
                    <label for="empresa">Empresa:</label>
                    <input type="text" name="empresa" class="form-control" value="<?= $empresa; ?>" required>
                </div>
                <div class="form-group">
                    <label for="plataforma">Plataforma:</label>
                    <input type="text" name="plataforma" class="form-control" value="<?= $plataforma; ?>" required>
                </div>
                <div class="form-group">
                    <label for="año">Año:</label>
                    <input type="number" name="año" class="form-control" value="<?= $año; ?>" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <input type="text" name="categoria" class="form-control" value="<?= $categoria; ?>" required>
                </div>
                <div class="form-group">
                    <label for="idioma">Idioma:</label>
                    <input type="text" name="idioma" class="form-control" value="<?= $idioma; ?>" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" class="form-control" value="<?= $estado; ?>" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" class="form-control" value="<?= $precio; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
