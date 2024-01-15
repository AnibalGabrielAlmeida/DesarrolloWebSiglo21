<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Asincrónica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Formulario -->
            <form id="consultaForm" class="mb-3">
                <div class="mb-3">
                    <label for="numeroConsulta" class="form-label fw-bold">Número de id para la consulta:</label>
                    <input type="number" class="form-control" id="numeroConsulta" name="numeroConsulta" required>
                </div>
                <button type="button" class="btn btn-primary" onclick="realizarConsulta()">Consultar</button>
            </form>

            <!-- Espacio para mostrar resultados (se seteo para que antes de realizar la consulta este oculto) -->
            <div id="resultados" class="border p-3 d-none"></div>
        </div>
    </div>

    <script>
        // Función para realizar la consulta asincrónica
        function realizarConsulta() {
            // Obtener el número de consulta del formulario
            var numeroConsulta = $("#numeroConsulta").val();

            // Realizar la solicitud AJAX
            $.ajax({
                url: 'consigna2.php', //vinculado con el archivo de la consigna anterior
                method: 'GET',
                data: { id: numeroConsulta },
                dataType: 'json',
                success: function(data) {
                    // Mostrar los resultados y hacer visible el recuadro
                    var resultadosDiv = $("#resultados");
                    if (data.error) {
                        resultadosDiv.html("<p class='text-danger'>Error: " + data.error + "</p>");
                    } else {
                        resultadosDiv.html("<pre>" + JSON.stringify(data, null, 2) + "</pre>");
                    }
                    resultadosDiv.removeClass("d-none"); // Hacer visible
                },
                error: function() {
                    $("#resultados").html("<p class='text-danger'>Error al realizar la consulta.</p>");
                }
            });
        }
    </script>
</body>
</html>
