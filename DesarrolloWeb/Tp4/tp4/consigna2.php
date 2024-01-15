<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "J!mh4ll3127";
$dbname = "retrogame";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el id desde la URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // sql
        $sql = "SELECT * FROM juegos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener los resultados como un array asociativo
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            // Convertir a JSON
            $json_data = json_encode($result, JSON_UNESCAPED_UNICODE);
            echo $json_data;
            
        } else {
            // aviso en el caso de no encontrar datos
            echo json_encode(array('error' => 'No se encontraron registros para el código proporcionado.'));
        }
    } else {
        //aviso en el caso de que no se proporciono la id, o se quiso proporcionar de alguna otra forma erronea.
        echo json_encode(array('error' => 'Se debe proporcionar un id válido como parámetro en la URL'));
    }
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

$conn = null;

?>
