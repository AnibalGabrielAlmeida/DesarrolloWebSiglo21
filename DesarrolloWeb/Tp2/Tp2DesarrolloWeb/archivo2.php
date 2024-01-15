<?php
session_start(); 

// Variable para controlar la visibilidad del formulario
$mostrarFormulario = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datosFormulario = [];
    echo "<h2>Datos del formulario:</h2>";
    for ($i = 0; $i <= 4; $i++) {
        $campo = 'campo' . $i;
        $valor = $_POST[$campo];
        $datosFormulario[$campo] = $valor;
        echo "<p>Form$i: $valor</p>";
    }

    $mostrarFormulario = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        
        <?php
        if ($mostrarFormulario) {
        ?>
        <h1>Formulario 2</h1>
        <form method="post" action="archivo2.php">
       
            <div class="mb-3">
                <label for="campo0" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="campo0" name="campo0" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>" required>
            </div>

            
            <div class="mb-3">
                <label for="campo1" class="form-label">Juego solicitado</label>
                <input type="text" class= "form-control" id="campo1" name="campo1">
            </div>

          
            <div class="mb-3">
                <label for= "campo2" class="form-label">Edición</label>
                <input type="number" class="form-control" id="campo2" name="campo2" step="1" pattern="\d+">
            </div>

          
            <div class="mb-3">
                <label for="campo3" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="campo3" name="campo3" step="1" pattern="\d+">
            </div>

          
            <div class="mb-3">
                <label for="campo4" class="form-label">Observaciones</label>
                <input type="text" class="form-control" id="campo4" name="campo4">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html
