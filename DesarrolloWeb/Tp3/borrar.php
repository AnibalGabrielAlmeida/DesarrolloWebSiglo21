<?php
require_once 'conexion.php'; 

if (!isset($conexion)) {
    echo "Error al incluir el archivo de conexión.";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $idBorrar = $_POST['id_borrar'];

    if (!empty($idBorrar)) {
        $stmt = $conexion->prepare('DELETE FROM juegos WHERE id = ?');
        $stmt->execute([$idBorrar]);

        header('Location: index.php');
        exit;
    } else {
        $error = "Seleccione un juego para borrar.";
    }
}


$stmt = $conexion->prepare('SELECT id, nombre FROM juegos');
$stmt->execute();
$juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Juego</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Borrar Juego</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Volver a la Lista</a>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="id_borrar">Seleccione un juego:</label>
                <select name="id_borrar" class="form-control">
                    <?php foreach ($juegos as $juego): ?>
                        <option value="<?= $juego['id']; ?>"><?= $juego['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Borrar Juego</button>
        </form>
    </div>
</body>
</html>
