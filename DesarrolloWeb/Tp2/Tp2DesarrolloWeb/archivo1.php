<?php
session_start(); 

if (isset($_POST['nombre'])) {
    $_SESSION['nombre'] = $_POST['nombre'];
    header('Location: archivo2.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Formulario 1</h1>
        <form method="post" action="archivo1.php">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
