<?php

/*NOTA:
En el formulario de registro de usuarios, una vez se haya registrado un usuario, 
click en aceptar el alert y recargar la página para visualizar el usuario registrado en la tabla de usuarios registrados.
*/

require_once __DIR__ . '/../POPOS/user.php';

class serverSoap{
    public function guardarUsuarios($nombreUsuario, $correo, $contrasena) {

    $contraseñaCifrada = password_hash($contrasena, PASSWORD_BCRYPT);

    $archivoJson = '../usuarios.json';
    $data = [];
    if(file_exists($archivoJson)){
        $data = json_decode(file_get_contents($archivoJson), true);
    }
    
    $data[] = [
        'nombreUsuario' => $nombreUsuario,
        'correoUsuario' => $correo,
        'contraseñaUsuario' => $contraseñaCifrada
    ];

    file_put_contents($archivoJson, json_encode($data, JSON_PRETTY_PRINT));
    
}

 public static function iniciarServidor(){
        $server = new SoapServer(null, ['uri' => "http://localhost/entorno_servidor/PRACTICA_SOAP"]);

        $server->setClass('serverSoap');

        $server->handle();
    }
}

serverSoap::iniciarServidor();
