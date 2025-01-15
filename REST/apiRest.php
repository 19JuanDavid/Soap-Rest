<?php

/*NOTA:
En el formulario de registro de usuarios, una vez se haya registrado un usuario, 
click en aceptar el alert y recargar la página para visualizar el usuario registrado en la tabla de usuarios registrados.
*/

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$archivoJson = '../usuarios.json';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (file_exists($archivoJson)) {
        $data = json_decode(file_get_contents($archivoJson), true);
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }
} else {
    http_response_code(405); 
    echo json_encode(["error" => "Método no permitido"]);
}
