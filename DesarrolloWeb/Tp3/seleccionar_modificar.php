<?php
require_once 'conexion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_juego = $_POST['id_juego'];

    header("Location: modificar.php?id=$id_juego");
    exit;
}

$stmt = $conexion->query('SELECT id, nombre FROM juegos');
$juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Juego para Modificar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Seleccionar Juego para Modificar</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Volver a la Lista</a>

        <form method="POST">
            <div class="form-group">
                <label for="id_juego">Selecciona un juego:</label>
                <select name="id_juego" class="form-control" required>
                    <?php foreach ($juegos as $juego): ?>
                        <option value="<?= $juego['id']; ?>"><?= $juego['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modificar Juego</button>
        </form>
    </div>
</body>
</html>
