<?php
include('../../php/Conexion_bd.php');

include('../../php/Conexion_bd.php');

header('Content-Type: application/json');

$sql = "SELECT * FROM recomendaciones";
$resultado = $conexion->query($sql);
$envios = false;
if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        if ($fila['Visto'] == "") {
            $envios = true;
            break;
        }
    }
}
echo json_encode(['envios' => $envios]);
$conexion->close();
